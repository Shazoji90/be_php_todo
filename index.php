<?php
$todos = [];
if(file_exists('todo.txt')) { //pengecekan jika file todo.txt tidak ada
    $file = file_get_contents('todo.txt');
    $todos = unserialize($file);
}

if(isset($_POST['todo'])) {
    $data = $_POST['todo'];
    $todos[] = [    //membuat baris baru
        'todo' => $data,
        'status' => 0
    ];
    file_put_contents('todo.txt', serialize($todos));
}

?>

<h1>Todo App</h1>

<form method="POST">
<label>Apa kegiatanmu hari ini?</label><br/>
<input type="text" name="todo"/>
<button type="submit">Simpan</button>
</form>

<ul>
    <?php foreach($todos as $key => $value): ?>
    <li>
        <input type="checkbox" name="todo"/>
        <label><?= $value['todo']; ?></label>
        <a href="#">hapus</a>
    </li>
    <?php endforeach; ?>
</ul>
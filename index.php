<?php
$todos = [];
$file = file_get_contents('todo.txt');
$todos = unserialize($file);
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
    <li>
        <input type="checkbox" name="todo"/>
        <label>Todo 1</label>
        <a href="#">hapus</a>
    </li>
    <li>
        <input type="checkbox" name="todo"/>
        <label>Todo 1</label>
        <a href="#">hapus</a>
    </li>
    <li>
        <input type="checkbox" name="todo"/>
        <label>Todo 1</label>
        <a href="#">hapus</a>
    </li>
    <li>
        <input type="checkbox" name="todo"/>
        <label>Todo 1</label>
        <a href="#">hapus</a>
    </li>
</ul>
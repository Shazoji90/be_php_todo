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
    header('Location:/');
}

if(isset($_GET['status'])) {
    $todos[$_GET['key']]['status'] = $_GET['status'];
    file_put_contents('todo.txt', serialize($todos));
    header('Location:/');
}

if(isset($_GET['hapus'])) {
    unset($todos[$_GET['key']]);
    file_put_contents('todo.txt', serialize($todos));
    header('Location:/');
}

print_r($todos);

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
        <input type="checkbox" name="todo" onclick="window.location.href = '/?status=<?= ($value['status'] == 0) ? 1 : 0; ?>&key=<?= $key; ?>'" <?= ($value['status'] == 1) ? 'checked' : ''; ?>/>
        <label><?= ($value['status'] == 1) ? "<del>".$value['todo']."</del>" : $value['todo']; ?></label>
        <a href="/?hapus=1&key=<?= $key; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus todo ini?')">hapus</a>
    </li>
    <?php endforeach; ?>
</ul>
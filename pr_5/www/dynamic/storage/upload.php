<?php
$uploaddir = '/var/www/denis/storage/files/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<pre>';
setlocale(LC_ALL, 'en_US.UTF-8');
$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
if ($ext != "pdf") {
    echo "Это не pdf файл!!! Выберите  pdf для загрузки";
} else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    }
}

echo "</pre>";
?>
<a href="files.php">К списку</a>
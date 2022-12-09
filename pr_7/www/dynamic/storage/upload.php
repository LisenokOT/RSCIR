<?php
$uploaddir = '/var/www/denis/storage/files/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo '<h3>';
setlocale(LC_ALL, 'en_US.UTF-8');
$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
if ($ext != "pdf") {
    echo "Это не pdf файл!!! Выберите  pdf для загрузки";
} else {
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        exec('file ' . $uploadfile, $ext);
        $status = strripos($ext[0], 'pdf document');
        if ($status == True){
            echo "Файл корректен и был успешно загружен.\n";
        }
        else {
            $temp = array();
            exec('rm ' . $uploadfile, $temp);
            echo "Вы загружаете файл с расширением pdf, но на самом деле его расширение: ";
            echo mb_substr($ext[0], strripos($ext[0], ': ') + 2) . "</h3>";
            echo "<h3>Не пытайтесь нас обмануть и выберите  pdf для загрузки!</h3>";
        }
        
    }
    else {
        echo "Ошибочная загадка...\n";
    }
}

echo "</h3>";
?>
<a href="files.php">К списку</a>
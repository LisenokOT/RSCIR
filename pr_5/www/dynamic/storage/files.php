<?php $mysqli = new mysqli("database", "user", "password", "appDB"); ?>
<DOCTYPE HTML>
<html lang="en">
<head>
    <title>Hello world page</title>
</head>
<body>
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <div>
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
        <br>
        <label for="file_field">Отправить ваш файл:</label>
        <br>
        <input id="file_field" name="userfile" type="file"/>
    </div>
    <br>
    <input type="submit" value="Отправить файл"/>
</form>
<h1>Таблица загруженных файлов</h1>

    <?php
    $files = scandir('./files');
    if (count($files) <= 2) {
        echo "<h2>Нет загруженных файлов</h2>";
    } else {
        echo "<h2>Загруженные файлы</h2>";
        echo"<table border=1>
            <tr>
                <th>number</th>
                <th>Name</th>
            </tr>";
        $i = 1;
        foreach ($files as $file) {
            if ($file != "." and $file != "..") {
            echo "<tr><td>$i</td><td><a  href='./files/".$file."'>".$file."</a></td></tr>";
            $i += 1;
            }
        }
    }
    ?>
</table>
</body>
</html>
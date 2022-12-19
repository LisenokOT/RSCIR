<form enctype="multipart/form-data" action="/oper/AddFiles" method="POST">
    <div>
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
        <br>
        <label for="file_field">Отправить ваш файл:</label>
        <br>
        <input id="file_field" name="file" type="file"/>
    </div>
    <br>
    <input type="submit" value="Отправить файл"/>
</form>
<h1>Таблица загруженных файлов</h1>

<?php
    if ($data["files"] == NULL) {
        if ($_COOKIE["lang"] == "en") {
            echo "<h3>No files uploaded</h3>";
        }
        else {
            echo "<h3>Нет загруженных файлов</h3>";
        }
    }
    else {
        if ($_COOKIE["lang"] == "en") {
            echo "<h1>Table of uploaded files</h1>
            <h2>Download files</h2>
            <table border=1>
                <tr>
                    <th>Number</th>
                    <th>Title</th>
                </tr>";
        } else {
        echo "<h1>Таблица загруженных файлов</h1>
        <h2>Загруженные файлы</h2>
        <table border=1>
            <tr>
                <th>Номер</th>
                <th>Названия</th>
            </tr>";
        }
        $i = 1;
        foreach ($data["files"] as $file) {
            if ($file != "." and $file != "..") {
            echo "<tr><td>$i</td><td><a  href='./storage/".$file."'>".$file."</a></td></tr>";
            $i += 1;
            }
        }
    }
?>
</table>
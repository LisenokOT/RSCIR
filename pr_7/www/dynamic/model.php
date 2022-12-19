<?php

class model{
    public function selectUsers(){
        $mysqli = openmysqli();
        $result = $mysqli->query("SELECT * FROM user");
        $mysqli->close(); 
        return $result;
    }

    public function selectTimetable(){
        $mysqli = openmysqli();
        $result = $mysqli->query("SELECT * FROM timetable");
        $mysqli->close(); 
        return $result;
    }

    public function selectFiles() {
        $files = scandir('./storage/files');
        if (count($files) <= 2) {
            $result = NULL;
        } else {
            $result = $files;
        return $result;
        }   
    }

    public function AddFiles(){
        if($_FILES['file']){
            $uploaddir = '/var/www/denis/storage/files/';
            $uploadfile = $uploaddir . basename($_FILES['file']['name']);

            echo '<pre>';
            setlocale(LC_ALL, 'en_US.UTF-8');
            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if ($ext != "pdf") {
                echo "Это не pdf файл!!! Выберите  pdf для загрузки";
            } else {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
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
            }
                echo '</pre>
                <a href="/storage/files.php">К списку</a>';
        }else
            header('Location: /storage/files.php');
    }

}
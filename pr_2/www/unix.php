<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Сироткин Денис">
    <meta name="description" content="Практика 2">
    <meta name="keywords" content="РСЧИР, php, HTML, CSS">
    <link rel="stylesheet" href="style.css">
    <title>Drawer</title>
</head>
<body>
    <div>
        <?php
        function print_cmd($cmd) {
            $lines = array();
            exec($cmd, $lines);
            echo "<p>> $cmd </p>";
            echo "<pre>> " . implode("\n> ", $lines) . "</pre>";
        }
        // Список комманд
        $command = $_GET["cmd"];
        $command_list = array('ps', 'ls', 'whoami', 'id', 'echo');
        if (in_array(explode(" ", $_GET["cmd"])[0], $command_list)){
            print_cmd($command);
        } else {
            echo "<p>Команда должна быть введена в формате: ?cmd=(Ваша команда)</p>";
            echo "<p>Например: ?cmd=ls</p>";
            echo "<p>Список доступных команд: 'ps', 'ls', 'whoami', 'id', 'echo (ваш текст)'</p>";
            echo '<a href="http://localhost:9000/unix.php?cmd=ls">Пример</a>';
        }
        ?>
    </div>
</body>
</html>
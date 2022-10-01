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
        $num = $_GET['num'];
        if (isset($num) && is_numeric($num)) {
            echo 'Число: ' . $num . ' Двоичный вид: '
                . sprintf("%07d", decbin(strval($num))) . '<br><br>';
            // 00    0 0 0  00
            // Shape R G B  Size
            $shape =    ($num >> 5) & 3; // 00-круг 01-прямоуг 10-квадр 11-треуг
            $r =      ($num >> 4) & 1;
            $g =    ($num >> 3) & 1; // RGB
            $b =     ($num >> 2) & 1;
            $size =    (($num >> 0) & 3) + 1; // 00-мал 01-сред 10-бол 11-очбол
            // HEX цвет
            $color = '"#'
                . ($r == 1    ? 'ff' : "00")
                . ($g == 1  ? 'ff' : "00")
                . ($b == 1   ? 'ff' : "00") . '"';
            $size = $size * 100;
    
            $shape_tag = '';
            switch ($shape) {
                case 0: // Круг
                    $radius = ($size / 2);
                    $shape_tag = "circle "
                        // Размер
                        . " cx=" . ($radius + 10) . " cy=" . ($radius + 10)
                        // Радиус
                        . " r=" . $radius . " ";
                    break;
                case 1: // Прямоугольник
                    $shape_tag = "rect "
                        . " r=" . $radius . " ";
                    break;
                case 1: // Прямоугольник
                    $shape_tag = "rect "
                        // Размер
                        . "width=" . ($size * 2) . " height=" . ($size);
                    break;
                case 2: // Квадрат
                    $shape_tag = "rect "
                        // Размер
                        . "width=" . ($size) . " height=" . ($size);
                    break;
                case 3: // Треугольник
                    $side = $size;
                    $shape_tag = "polygon points='"
                        // Точки
                        . ($side / 2 + 5) . ",10"
                        . " 10," . ($side) . " "
                        . ($side) . "," . ($side) . "'";
                    break;
            }
            echo '<svg>';
            echo '<' . $shape_tag . ' fill=' . $color . '  />';
            echo '</svg>';
        } else {
            echo "<p>Команда должна быть введена в формате: ?num=(Ваша команда)</p>";
            echo "<p>Например: ?num=1</p>";
            echo '<a href="http://localhost:9000/drawer.php?num=1">Пример</a>';
        }
        ?>
    </div>
</body>
</html>

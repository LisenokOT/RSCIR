<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Сироткин Денис">
    <meta name="description" content="Практика 2">
    <meta name="keywords" content="РСЧИР, php, HTML, CSS">
    <link rel="stylesheet" href="style.css">
    <title>Сортировка выбором</title>
</head>
<body>
    <div>
        <?php
            //Сортировка выбором
            function selectSort($arr) {
                for($i = 0; $i < count($arr)-1; $i++){
                    $minIndex = $i;
                    for($j = $i + 1; $j < count($arr); $j++) {
                        if ($arr[$j] < $arr[$minIndex]) {
                            $minIndex = $j;
                        }
                    }
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$minIndex];
                    $arr[$minIndex] = $temp;
                }
                return $arr;
            }
            
            if (isset($_GET['array'])) {
                // Массив
                echo "<p>Массив: [";
                echo implode(", ", explode(",", $_GET["array"]));
        
                // Отсортированный массив
                echo "]</p>\n<p>Отсортированный массив: [";
                echo implode(", ", selectSort(explode(",", $_GET["array"])));
                echo "]</p>";
            } else {
                echo "<p>Отсутствуют данные в параметре строки</p>";
                echo '<a href="http://localhost:9000/sort.php?array=5,4,3,2,1">Пример</a>';
            }
        ?>
    </div>
</body>
</html>
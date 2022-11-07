<?php
    $title = 'Расписание';
    require "assets/blocks/header.php";
?>

<div>
    <h1>Каталог</h1>
    <?php
        $mysqli = new mysqli("database", "user", "password", "appDB");
        #$mysqli->set_charset('utf8mb4');
	$result = $mysqli->query("SELECT * FROM timetable");
    ?>
    <table>
<?php 
	if ($result->num_rows > 0) foreach ($result as $row){
		echo "
	    <tr>
		<td>{$row['ID']}</td>
		<td>{$row['title']}</td><td>{$row['auditorium']}</td>
	    </tr>";
	}
?>
    </table>
</div>

<?php
    $mysqli->close();
    require "assets/blocks/footer.php";
?>

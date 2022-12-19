<div>
    <h1>Каталог</h1>
    <?php
        $mysqli = new mysqli("database", "user", "password", "appDB");
        #$mysqli->set_charset('utf8mb4');
	$result = $mysqli->query("SELECT * FROM timetable");
    ?>
    <table>
    <tr>
		<td>номер</td>
		<td>название предмета</td><td>аудитория</td>
    </tr>
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
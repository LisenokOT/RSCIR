<?php
    $title = 'Timetable';
    require "assets/blocks/header.php";
?>

<div>
    <h1>Catalog</h1>
    <?php
        $mysqli = new mysqli("database", "user", "password", "appDB");
	$result = $mysqli->query("SELECT * FROM timetable");
    ?>
    <table>
    <tr>
		<td>number</td>
		<td>title</td><td>auditorium</td>
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

<?php
    $mysqli->close();
    require "assets/blocks/footer.php";
?>

<?php
function openmysqli(): mysqli {
    $connection = new mysqli('mysql', 'user', 'password', 'appDB');
    return $connection;
}
function outputStatus($status, $message)
{
    echo '{status: ' . $status . ', message: "' . $message . '"}';
}
try {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            addSubject();
            break;
        case 'DELETE':
            removeSubject();
            break;
        case 'PATCH':
            updateSubjectAuditorium();
            break;
        case 'GET':
            getSubjectByID();
            break;
        default:
            outputStatus(2, 'Invalid Mode');
    }
}
catch (Exception $e) {
    $message = $e->getMessage();
    outputStatus(2, $message);
};

function addSubject() {
    $data = json_decode(file_get_contents('php://input'), True);
    if (!isset($data['title']) || !isset($data['auditorium'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $subTitle = $data['title'];
    $subAuditorium = $data['auditorium'];
    $result = $mysqli->query("SELECT * FROM timetable WHERE title = '{$subTitle}';");
    if ($result->num_rows === 1) {
        $message = 'subject '. $subTitle . ' already exists';
        outputStatus(1, $message);
    } else {
        $query = "INSERT INTO timetable (title, auditorium)
        VALUES ('" . $subTitle . "', '" . $subAuditorium . "');";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Added subject ' . $subTitle;
        outputStatus(0, $message);
    }
}
function removeSubject()
{
    $data = json_decode(file_get_contents('php://input'), True);
    if (!isset($data['id'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $subID = $data['id'];
    $result = $mysqli->query("SELECT * FROM timetable WHERE ID = '{$subID}';");
    if ($result->num_rows === 1) {
        $query = "DELETE FROM timetable WHERE ID = '" . $subID . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Removed subject ' . $subID;
        outputStatus(0, $message);
    } else {
        $message = 'Subject ' . $subID . ' does not exist';
        outputStatus(1, $message);
    }
}
function updateSubjectAuditorium()
{
    $data = json_decode(file_get_contents('php://input'), True);
    if (!isset($data['title']) || !isset($data['auditorium'])) {
        throw new Exception("No input provided");
    }
    $mysqli = openMysqli();
    $subTitle = $data['title'];
    $subAuditorium = $data['auditorium'];
    $result = $mysqli->query("SELECT * FROM timetable WHERE title = '{$subTitle}';");
    if ($result->num_rows === 1) {
        $query = "UPDATE timetable SET auditorium = '" . $subAuditorium . "' WHERE title = '" . $subTitle . "';";
        $mysqli->query($query);
        $mysqli->close();
        $message = 'Changed auditorium for ' . $subTitle;
        outputStatus(0, $message);
    } else {
        $message = $subTitle . ' does not exist';
        outputStatus(1, $message);
    }
}
function getSubjectByID()
{
    if (!isset($_GET['id'])) {
        $mysqli = openMysqli();
        $result = $mysqli->query("SELECT * FROM timetable;");
        echo "{\nstatus: 0\n";
        foreach ($result as $info) {
            echo"title: '" . $info['title'] . "', auditorium: '" . $info['auditorium'] . "';\n";
        }
        echo "}";
        $mysqli->close();
    }
    else{
        $mysqli = openMysqli();
        $subID = $_GET['id'];
        $result = $mysqli->query("SELECT * FROM timetable WHERE ID = '{$subID}';");
        if ($result->num_rows === 1) {
            foreach ($result as $info) {
                echo "{title: '" . $info['title'] . "', auditorium: '" . $info['auditorium'] . "';}";

            }
            $mysqli->close();
        } else {
            $message = 'Subject ID '. $subID . ' does not exist';
            outputStatus(1, $message);
        }
    }
}
?>
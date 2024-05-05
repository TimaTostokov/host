<?php

$server_name = "localhost";
$user_name = "temir";
$password = "";
$db_name = "testdb";
$table_name = "users";

$connect = new mysqli($server_name, $user_name, $password, $db_name);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "SELECT * FROM $table_name";
$result = $connect->query($sql);

if ($result->num_rows > 0) {

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);

} else {
    $messageArray = array();
    $messageArray[] = array("name" => "List is empty", "tel" => 0, "time" => "12:00", "age" => "17");
    echo json_encode($messageArray);
}

$connect->close();

?>
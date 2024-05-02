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

$data = json_decode(file_get_contents("php://input"), true, 512, JSON_THROW_ON_ERROR);

$name = "Temirlan";
$tel = "5353";
$time = "12:15";
$age = "17";
//
//$name = mysql_escape_string($connect, $data['name']);
//$tel = mysql_escape_string($connect, $data['tel']);
//$time = mysql_escape_string($connect, $data['time']);
//$age = mysql_escape_string($connect, $data['age']);

$sql = "INSERT INTO $table_name (name, tel, time, age) VALUES ('$name','$tel','$time','$age')";

if ($connect->query($sql) === TRUE) {
    echo json_encode(array("message" => "User saved!"));
} else {
    echo json_encode(array("message" => "User not saved! Get some error!"));
}

$connect->close();

?>
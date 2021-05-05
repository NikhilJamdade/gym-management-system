<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "gymsystem");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT pfees FROM package WHERE pname = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($fes);
$stmt->fetch();
$stmt->close();




echo $fes;
?>
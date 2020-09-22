<?php
include "config.php";
session_start();

$user_id = $_POST['user_id'];
$message = $_POST['message'];

$sqlInsert = "INSERT INTO messages (message, user_id, ref_id) VALUES ('".$message."','".$user_id."', '".$_SESSION['admin']."')";
$resultInsert = mysqli_query($conn, $sqlInsert);
if ($resultInsert) {
	echo 1;
}
<?php

$conn = mysqli_connect("localhost", "root", "", "chat_app");

if (!$conn) {
	echo "Connection Failed". mysql_error() or die();
}

?>
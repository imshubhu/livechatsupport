<?php
include "config.php";
session_start();

$adminSelect = "SELECT * FROM user WHERE type = 'admin'";
$adminResult = mysqli_query($conn, $adminSelect);
if ($adminResult) {
	
	$adminRow = mysqli_fetch_assoc($adminResult);
	$_SESSION['admin'] = $adminRow['id'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Live Chat Support System</title>
	<!-- External Style Sheet -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<div class="wrapper" id="liveChat">
		<div class="chatHeader">
			<h2>Live Chat</h2>
			<span><img src="img/online-icon.png">Online</span>
		</div>

		<div class="chatArea">
			<form id="registerForm">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" id="name" placeholder="Your Name">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" id="email" placeholder="Email Adress">
				</div>
				<div class="form-group">
					
					<input type="submit" name="start" id="start" value="Start Chat">
				</div>
			</form>
			<!-- FormEnd -->

			<div class="chat" style="display: none;" >
				<div id="loadChat">
					<!-- <?php if(isset($_SESSION['email'])){
						echo $_SESSION['email'];}?> -->
					
					
				</div>
				<div class="chatFrom">
					<form id="chatFrom">
						<div id="user"></div>
						<div class="form-group">
					<label>Message</label>
					<textarea name="message" id="message" rows="1"></textarea>
				</div>
				<div class="form-group">
					
					<input type="submit" name="send" id="send" value="Send">
				</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</body>
<script type="text/javascript" src="js/custom.js"></script>

</html>
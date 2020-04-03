<?php
	include 'connection.php';
	$db = new Connection();
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap css -->
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<!-- FOnt awesome -->
	<script src="./bootstrap/js/all.js"></script>
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
	<!-- main css -->
	<title>PhoneBook</title>
</head>
<body>
	<?php
		if(isset($_POST['submit']))
		{
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$query = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
			$db->addUser($query);
			header("location: login.php");
		}
	?>

	<form method="POST">
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="Register">
	</form>

	<!-- jquery -->
    <script src="./bootstrap/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
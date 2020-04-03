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
	<link rel="stylesheet" href="./bootstrap/css/main.css">
	<title>PhoneBook</title>
</head>
<body>
	<?php
		if (isset($_POST['submit'])) 
		{
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password';";
			$result = $db->getInfo($query);
			echo count($result);
			if(count($result) == 1)
			{
				foreach ($result as $data) 
				{
					session_start();
					$_SESSION['username'] = $data['username'];
					$_SESSION['userid'] = $data['id'];
				}
				header("location: index.php");
			}
			else echo "<h1>wrong</h1>";
		}
	?>
	
	<!-- Login form -->
	<div class="container-fluid pic">
		<div class="row height justify-content-center text-center">
			<div class="col-3 mt-5">
				<form class="font-weight-bold" method="POST">


			  	<div class="form-group">
			    	<label for="username">Username:</label>
					<div class="input-group">
						<div class="input-group-prepend">
		                <span class="input-group-text">
		                    <span class="fa fa-user"></span>
		                </span>                    
            		</div>
			    		<input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
					</div>
			  	</div>



			  	<div class="form-group">
			    	<label for="password">Password:</label>
					<div class="input-group">
						<div class="input-group-prepend">
		                <span class="input-group-text">
		                    <span class="fas fa-lock"></span>
		                </span>                    
            		</div>
			    	<input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
			  	</div>



			  	<input type="submit" class="btn btn-info my-4" name="submit" value="Login">
			

			</form>
			</div>
		</div>
	</div>

	


	<!-- <form method="POST">
		<input type="text" name="username"><br>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="Login">
	</form> -->

	<!-- jquery -->
    <script src="./bootstrap/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
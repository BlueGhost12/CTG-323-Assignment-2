<?php
	session_start();
	include 'connection.php';
	$db = new Connection();
	if(!isset($_SESSION['username']))
	{
		header("location: register.php");

	}
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

	 <!-- Navbar -->
    <div class="container-fluid pic">
        <!-- brand -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark py-3" style="background-color: #0F0A0A">
            <i class="fas fa-address-book fa-2x text-light"></i>
            <a class="navbar-brand pl-3 text-light" href="index.php">PhoneBook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar start -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Right navbar elements -->
                <ul class="navbar-nav mr-auto">
                <!-- 
                    <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li> -->
                </ul>
                <!-- left navbar elements -->
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <li class="nav-item">
                        <a class="nav-link ">
                            <i class="fas fa-user text-light"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="login.php">
                            <i class="fas fa-sign-out-alt text-light"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav> 
        <!-- Navbar end -->

        <section>
        	<div class="container-fluid py-4">
        		<div class="row height_description align-items-center text-center">
        			<div class="col">
        				<h3 class="font-weight-bold text-light">Welcome to PhoneBook</h3>
        				<p class="font-weight-bold px-5 text-light">
        					PhoneBook is your number 1. website in managing and storing your contacts. Here you can store the information of all your contacts and view them at a go. You can access your contacts from anywhere and anytime.
        				</p>
        				<a class="btn btn-light" href="view.php" role="button">Manage Contacts</a>
        			</div>
        		</div>
        	</div>
        </section>
	</div>

	<!-- jquery -->
    <script src="./bootstrap/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
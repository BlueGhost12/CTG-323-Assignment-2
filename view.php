<?php
	session_start();
	include 'connection.php';
	$db = new Connection();
	if(!isset($_SESSION['username']))
	{
		header("location: login.php");

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
	<title>Manage Contacts</title>
</head>
<body>

	 <!-- Navbar -->
    <div class="container-fluid viewPic">
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
                            <i class="fas fa-user text-white"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="login.php">
                            <i class="fas fa-sign-out-alt text-white"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav> 
        <!-- Navbar end -->

        <section>
        	<div class="container-fluid py-4">
        		<div class="row height_description align-items-center text-center">
        			<div class="col ">
        				<h3 class="text-gray-dark font-weight-bold">Manage your contacts</h3>
        				<p class="font-weight-bold px-5 text-gray-dark">
        					Here you can manage your contacts. PhoneBook allows you to add, delete, view and edit your contacts. Managing your contacts has never been easier than before.
        				</p>
        			</div>
        		</div>
        	</div>
        </section>
        	
		
		<!-- Contact adding and showing section -->
        <section>

        	<!-- Conact adding -->
        	<div class="container py-4">
        		<div class="row text-center">
        			<div class="col">
        				<h3 class="text-gray-dark font-weight-bold">Add a contact</h3>

						<?php
							if (isset($_POST['submit'])) 
							{
								if(!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address']))
								{
									$db->addContact($_POST['name'], $_POST['number'], $_POST['address'], $_SESSION['userid']);
									echo "Contact added successfully";
								}
							}
						?>

						<form action="view.php" class="was-validated text-left font-weight-bold text-warning" method="POST">
	  						<div class="form-group">
	    						<label for="name">Username:</label>
	    						<input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
	    					<div class="valid-feedback">Valid.</div>
	    					<div class="invalid-feedback">Please fill out this field.</div>
	  						</div>
	  						<div class="form-group">
	    						<label for="phone">Phone:</label>
	    						<input type="text" class="form-control" id="phone" placeholder="Enter number" name="phone" required>
	    						<div class="valid-feedback">Valid.</div>
	    						<div class="invalid-feedback">Please fill out this field.</div>
	  						</div>
	  						<div class="form-group">
	    						<label for="address">Address:</label>
	    						<input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required>
	    						<div class="valid-feedback">Valid.</div>
	    						<div class="invalid-feedback">Please fill out this field.</div>
	  						</div>
	  						<!-- <div class="form-group form-check">
	    						<label class="form-check-label">
	      						<input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
	      						<div class="valid-feedback">Valid.</div>
	      						<div class="invalid-feedback">Check this checkbox to continue.</div>
	    						</label>
	  						</div> -->
	  						<button type="submit" class="btn btn-info" name="submit">Add contact</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- Contact adding ends -->
		
		<!-- Contact table -->
		<section>
			<div class="container py-4">
				<div class="row text-center">
					<?php
						$id = $_SESSION['userid'];
						$query = "SELECT * FROM contacts WHERE user_id='$id';";
						$results = $db->getInfo($query);
					?>

					<div class="container py-4">
						<div class="row text-center text-warning">
							<div class="col">
								<table class="table table-sm">
									<thead class="black text-light thead-dark	">
										<tr>
											<th scope="col">Name</th>
											<th scope="col">Phone Number</th>
											<th scope="col">Address</th>
											<th scope="col" colspan="2">Actions</th>
										</tr>											
									</thead>
									<tbody class="text-light">
										<?php
											foreach ($results as $data) 
											{
										?>
												<tr>
													<td><?php echo $data['name']; ?></td>
													<td><?php echo $data['mobile_number']; ?></td>
													<td><?php echo $data['address']; ?></td>
													<td><a href="update.php?id=<?php echo $data['id']; ?>"> <h5 class="text-light">Edit</h5></a></td> <td><a href="delete.php?id=<?php echo $data['id']; ?>"><h5 class="text-light">Delete</h5></a></td>
												</tr>
										<?php
												}
										?>
									</tbody>
								</table>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</section>
		<!-- Contact table ends -->

	</div>

	<!-- jquery -->
    <script src="./bootstrap/js/jquery-3.4.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
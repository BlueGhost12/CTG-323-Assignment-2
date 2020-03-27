<?php
	include 'connection.php';
	$db = new Connection();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit contacts</title>
</head>
<body>

	<?php
		if (isset($_GET['id'])) 
		{
			$id = $_GET['id'];
			$data = $db->getContact($_GET['id']);
		}

		if (isset($_POST['submit'])) 
		{
			$db->updateContact($_POST['name'], $_POST['number'], $_POST['address'], $id);
			header("location: index.php");
			echo "Updated";
		}
	?>
	<?php
		foreach ($data as $i) 
		{
	?>
			<form method="POST" action="">
			<label for="name">Name:</label><br>
			<input type="text" id="name" name="name" placeholder="Eg: John Doe" value="<?php echo $i['name']; ?>"><br>

			<label for="number">Phone Number:</label><br>
			<input type="number" id="number" name="number" placeholder="Eg: 01XXXXXXXXX" value="<?php echo $i['mobile_number']; ?>"><br>

			<label for="address">Address:</label><br>
			<textarea name="address" id="address" placeholder="Eg: Mirpur-1, Dhaka"><?php echo $i['address']; ?></textarea>

			<input type="submit" name="submit" value="Edit contact">			
		</form>
	<?php
		}
	?>
</body>
</html>


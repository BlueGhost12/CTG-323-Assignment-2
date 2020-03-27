<?php
	include 'connection.php';
	$db = new Connection();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to phonebook</title>
</head>
<body>
	<h3>Add a contact</h3>

	<?php
		if (isset($_POST['submit'])) 
		{
			if(!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['address']))
			{
				$db->addContact($_POST['name'], $_POST['number'], $_POST['address']);
				echo "Contact added successfully";
			}
		}
		else
		{
			echo "All the fields must be filled";
		}
	?>

	<form method="POST" action="">
		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name" placeholder="Eg: John Doe"><br>

		<label for="number">Phone Number:</label><br>
		<input type="number" id="number" name="number" placeholder="Eg: 01XXXXXXXXX"><br>

		<label for="address">Address:</label><br>
		<textarea name="address" id="address" placeholder="Eg: Mirpur-1, Dhaka"></textarea>

		<input type="submit" name="submit" value="Add Contact">			
	</form>

	<?php
		$results = $db->getAllContacts();
	?>

	<table>
		<th>Name</th>
		<th>Phone Number</th>
		<th>Address</th>
		<th>Actions</th>
		<?php
			foreach ($results as $data) 
			{
		?>
				<tr>
				<td><?php echo $data['name']; ?></td>
				<td><?php echo $data['mobile_number']; ?></td>
				<td><?php echo $data['address']; ?></td>
				<td><a href="update.php?id=<?php echo $data['id']; ?>">Edit</a></td> <td><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
				</tr>
		<?php
			}
		?>
		
	</table>
</body>
</html>
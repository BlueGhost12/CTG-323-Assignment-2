<?php
	include 'connection.php';
	$db = new Connection();
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		$data = $db->deleteContact($_GET['id']);
		header("location: index.php");
		echo "Contact deleted";
	}
?>


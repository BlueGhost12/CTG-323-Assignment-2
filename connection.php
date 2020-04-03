<?php
	class Connection
	{
		public $conn;
		public function __construct()
		{
			$this->conn = new PDO("mysql:host=localhost;dbname=phonebook", "root", "");
		}

		// Add a contact
		public function addContact($name, $number, $address, $id)
		{
			$name = addslashes($name);
			$number = addslashes($number);
			$address = addslashes($address);
			$statement = $this->conn->prepare("INSERT INTO contacts (name, mobile_number, address, user_id) VALUES (:name, :mobile_number, :address, :id)");
			$statement->execute(
				array(
					':name' => $name,
					':mobile_number' => $number,
					':address' => $address,
					':id' => $id
				)
			);
		}

		//get all contacts
		public function getAllContacts()
		{
			$statement = $this->conn->prepare("SELECT * FROM contacts");
			$statement->execute();
			return $statement->fetchAll();
		}

		//get single contact
		public function getContact($id)
		{
			$statement = $this->conn->prepare("SELECT * FROM contacts WHERE id=$id");
			$statement->execute();
			return $statement->fetchAll();
		}

		// edit single contact
		public function updateContact($name, $number, $address, $id)
		{
			$title = addslashes($name);
			$details = addslashes($number);
			$day = addslashes($address);
			$statement = $this->conn->prepare("UPDATE contacts SET name='$name', mobile_number='$number', address='$address' WHERE id='$id'");
			$statement->execute();
		}

		//delete a contact
		public function deleteContact($id)
		{
			$statement = $this->conn->prepare("DELETE FROM contacts WHERE id=$id");
			$statement->execute();
		}

		public function addUser($query)
		{
			$statement = $this->conn->prepare($query);
			$statement->execute();
		}

		public function getInfo($query)
		{
			$statement = $this->conn->prepare($query);
			$statement->execute();
			$data = $statement->fetchAll();
			return $data;
		}
	}
?>
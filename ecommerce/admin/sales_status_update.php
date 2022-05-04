<?php
	include 'includes/session.php';

	if(isset($_POST['saveStatus'])){
		$id = $_POST['id'];
		$orderstatus = $_POST['orderstatus'];

		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
	
		try{

			$stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, firstname=:firstname, lastname=:lastname, address=:address, contact_info=:contact WHERE id=:id");
			$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'contact'=>$contact, 'id'=>$id]);

		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit user form first';
	}

	header('location: sales.php');

?>
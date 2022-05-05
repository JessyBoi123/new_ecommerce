<?php
	include 'includes/session.php';

	if(isset($_POST['saveStatus'])){

		$id = $_POST['transid'];
		$orderstatus = $_POST['orderstatus'];
		$conn = $pdo->open();
        
		try
        {

			$stmt = $conn->prepare("UPDATE sales SET OrderStatus=:OrderStatus WHERE id=:id");
			$stmt->execute(['OrderStatus'=>$orderstatus, 'id'=>$id]);

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
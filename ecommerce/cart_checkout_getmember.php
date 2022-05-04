<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	if(isset($_SESSION['user']))
    {
		try{
			$stmt = $conn->prepare("SELECT email , address , contact_info  FROM users WHERE id=:user_id");
            $stmt->execute(['user_id' => $user['id']]);


            foreach($stmt as $row){
                $output = array('email'=> $row['email'] , 'contact' => $row['contact_info'] , 'address'=> $row['address']);
            }

		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}


	$pdo->close();
	echo json_encode($output);

?>
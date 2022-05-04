<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	if(isset($_SESSION['user']))
    {
		try{
			$stmt = $conn->prepare("SELECT contact_info  FROM users WHERE id=:user_id");
            $stmt->execute(['user_id' => 1 ]);

            foreach($stmt as $row){
                $output = array('contact' => $row['contact_info']);
            }

		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}


	$pdo->close();
	echo json_encode($output);

?>
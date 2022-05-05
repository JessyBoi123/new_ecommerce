
<?php
include 'includes/session.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['saveCart'])) {

    

     $conn = $pdo->open();

    try {
        $now = date('Y-m-d');
        $stmt = $conn->prepare("INSERT INTO sales (user_id, 
                                                   sales_date, 
                                                   PaymentMethod, 
                                                   Email, 
                                                   OrderAddress, 
                                                   Contact) 
                                VALUES (:user_id, 
                                        :sales_date,
                                        :PaymentMethod, 
                                        :Email,
                                        :OrderAddress,
                                        :Contact)");
        $stmt->execute([
            'user_id' => $user['id'],
            'sales_date' => $now,
            'PaymentMethod' => $_POST['paymentmethod'],
            'Email' => $_POST['Email'],
            'OrderAddress' => $_POST['Address'],
            'Contact' => $_POST['ContactNumber'],
        ]);

        $salesid = $conn->lastInsertId();

             $_SESSION['success'] = 'Order is now for payment';

             try {
            $stmt = $conn->prepare("SELECT * FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
            $stmt->execute(['user_id' => $user['id']]);

            foreach ($stmt as $row) {
                $stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
                $stmt->execute(['sales_id' => $salesid, 'product_id' => $row['product_id'], 'quantity' => $row['quantity']]);
            }

            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
            $stmt->execute(['user_id' => $user['id']]);

            $_SESSION['success'] = 'Transaction successful. Thank you.';

            
    
        $name = "Arjie Test [SMPT]";  // Name of your website or yours
        $to = "tester.emailer10@gmail.com";  // mail of reciever
        $subject = "Jessie tutawsan lang";
        $body = "Sending Email Test - If success integrate the code to Jessie's project.";
        $from = "tester.emailer10@gmail.com";  // you mail
        $password = "testermail01";  // your mail password

        // Ignore from here

        require_once "PHPMailer/src/PHPMailer.php";
        require_once "PHPMailer/src/SMTP.php";
        require_once "PHPMailer/src/Exception.php";
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            echo "Email is sent!";
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        } 
    

        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();
} else {
    $_SESSION['error'] = 'Fill up checkout details';
}

header('location: index.php');

?>
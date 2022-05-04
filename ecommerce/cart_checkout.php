
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

            // //Create a new PHPMailer instance
            // $mail = new PHPMailer;

            // //Tell PHPMailer to use SMTP
            // $mail->isSMTP();

            // //Set the hostname of the mail server
            // $mail->Host = 'smtp.gmail.com';
            // // use
            // // $mail->Host = gethostbyname('smtp.gmail.com');
            // // if your network does not support SMTP over IPv6

            // //Set the SMTP port number - 587 for authenticated TLS
            // $mail->Port = 587;

            // //Set the encryption system to use - ssl (deprecated) or tls
            // $mail->SMTPSecure = 'tls';

            // //Whether to use SMTP authentication
            // $mail->SMTPAuth = true;

            // //Username to use for SMTP authentication - use full email address for gmail
            // $mail->Username = "gultebako@gmail.com";

            // //Password to use for SMTP authentication
            // $mail->Password = "123@ld3n!";

            // //Set who the message is to be sent from
            // $mail->setFrom('gultebako@gmail.com', 'Jessiee jess');

            // // //Set an alternative reply-to address
            // // $mail->addReplyTo('replyto@example.com', 'First Last');

            // //Set who the message is to be sent to
            // $mail->addAddress('cruzdenmarvic9@gmail.com', 'Den Cruz');
            // $mail->send();

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
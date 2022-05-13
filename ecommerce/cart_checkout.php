
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

  

             try {
            $stmt = $conn->prepare("SELECT * , products.id as prdID , products.name as ProductNames , (products.price*quantity) as subtotal   FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
            $stmt->execute(['user_id' => $user['id']]);

            $ITEMSCART ="<p>";

            $Totals =0;

            foreach ($stmt as $row) {

                $stmt = $conn->prepare("INSERT INTO details (sales_id, product_id, quantity) VALUES (:sales_id, :product_id, :quantity)");
                $stmt->execute(['sales_id' => $salesid, 'product_id' => $row['product_id'], 'quantity' => $row['quantity']]);

                $total= $row['RemainingStock'] - $row['quantity'];

                $stmt = $conn->prepare("UPDATE products  SET RemainingStock = :RemainingStock where id=:product_id");
                $stmt->execute(['RemainingStock' => $total, 'product_id' => $row['prdID'] ]);
                $Totals += $row['subtotal'];
           
                $ITEMSCART = $ITEMSCART . "<a>".$row['ProductNames']." x ".$row['quantity']." = PHP ".$row['subtotal']." <a/><br/>";
            }
            $ITEMSCART = $ITEMSCART  ."<p/>";
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id=:user_id");
            $stmt->execute(['user_id' => $user['id']]);

        
        $name = "Rice Next Door";  // Name of your website or yours
        $to =  $_POST['Email'];  // mail of reciever
        $subject = "Order confirmation";
        $body = "Summary of orders.<br/>". "Payment Method:".$_POST['paymentmethod']." <br/>" . $ITEMSCART ."Total: PHP ".   $Totals;
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

        
        $_SESSION['success'] = 'Transaction successful';

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
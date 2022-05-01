
<?php
include 'includes/session.php';

if (isset($_POST['saveCart'])) {

    $conn = $pdo->open();

    try {
        $now = date('Y-m-d');
        $stmt = $conn->prepare("INSERT INTO sales (user_id, sales_date) VALUES (:user_id , :sales_date)");
        $stmt->execute([
            'user_id' => $user['id'],
            'sales_date' => $now 
        ]);
        $_SESSION['success'] = 'Order is now for payment';

        //DELETE Cart
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = :user_id");
        $stmt->execute([
            'user_id' => $user['id']
          
        ]);



    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
    }
    $pdo->close();

} else {
    $_SESSION['error'] = 'Fill up checkout details';
}

header('location: index.php');

?>
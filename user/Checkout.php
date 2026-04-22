<?php
session_start();
include('../database/db.php');

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: register.php");
    exit;
}

if(isset($_POST['Checkout']) && !empty($_SESSION['Cart'])){
    $cart = $_SESSION['Cart'];
    $email = $_SESSION['email'];

    foreach($cart as $item){
        $name = $item['product_name'];
        $price = $item['product_price'];
        $quantity = $item['product_quantity'];
        $image = $item['img'];
        $product_desc = $item['product_desc'] ?? '';

        $sql = "INSERT INTO orders (user_email, product_name, product_price, product_quantity, img, product_desc, status)
                VALUES ('$email','$name','$price','$quantity','$image','$product_desc','Pending')";
        mysqli_query($conn, $sql);
    }

    // Clear cart
    $_SESSION['Cart'] = [];

    // Set session variable for popup
    $_SESSION['order_success'] = true;

    // Redirect to order history
    header("location: Order_history.php");
    exit;

} else {
    header("location: Cart.php");
    exit;
}
?>

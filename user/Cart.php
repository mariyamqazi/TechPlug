<?php

session_start();
include('../database/db.php');

// Redirect if not logged in
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    header("location: register.php");
    exit;
}

$email = $_SESSION['email'] ?? '';

/* ================================
   ADD TO CART LOGIC (ADD HERE)
================================ */
if(isset($_POST['add_to_cart'])){

    $product = [
        'product_id' => $_POST['product_id'],
        'product_name' => $_POST['name'],
        'product_price' => $_POST['price'],
        'product_quantity' => 1,
         'img' => '../images/' . $_POST['img'], 
        'product_desc' => $_POST['product_desc']
    ];

    // Initialize cart if not exist
    if(!isset($_SESSION['Cart'])){
        $_SESSION['Cart'] = [];
    }

    // Check duplicate product
    $found = false;

    foreach($_SESSION['Cart'] as &$item){
        if($item['product_id'] == $product['product_id']){
            $item['product_quantity']++;
            $found = true;
            break;
        }
    }

    // If new product
    if(!$found){
        $_SESSION['Cart'][] = $product;
    }

    header("Location: Cart.php");
    exit;
}

/* ================================
   EXISTING CART CODE
================================ */

// Initialize cart if not exist
if(!isset($_SESSION['Cart'])){
    $_SESSION['Cart'] = [];
}

// Handle quantity increment
if(isset($_GET['inc'])){
    $_SESSION['Cart'][$_GET['inc']]['product_quantity']++;
    header("Location: Cart.php"); exit;
}

// Handle quantity decrement
if(isset($_GET['dec'])){
    $_SESSION['Cart'][$_GET['dec']]['product_quantity']--;
    if($_SESSION['Cart'][$_GET['dec']]['product_quantity'] <= 0){
        unset($_SESSION['Cart'][$_GET['dec']]);
        $_SESSION['Cart'] = array_values($_SESSION['Cart']);
    }
    header("Location: Cart.php"); exit;
}

// Handle remove
if(isset($_GET['remove'])){
    unset($_SESSION['Cart'][$_GET['remove']]);
    $_SESSION['Cart'] = array_values($_SESSION['Cart']);
    header("Location: Cart.php"); exit;
}

// Calculate total
$total = 0;
foreach($_SESSION['Cart'] as $item){
    $total += $item['product_price'] * $item['product_quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome-<?php echo $_SESSION['username']?> || TechPlug</title>
<link rel="icon" sizes="64×64" href="../images/Logo.jpg">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
body{ background:#eaf2ff; font-family: 'Segoe UI', sans-serif; }
.card-box{ background:#fff; border-radius:20px; box-shadow:0 10px 30px rgba(0,0,0,0.1); padding:25px; margin-bottom:30px; }
.qty-btn{ width:30px; height:30px; border:none; background:#0d6efd; color:#fff; border-radius:50%; font-weight:bold; text-decoration:none; display:inline-flex; align-items:center; justify-content:center; }
.qty-number{ margin:0 10px; font-weight:bold; display:inline-block; min-width:20px; text-align:center; }
.checkout-btn{ background:#198754; border:none; padding:12px; width:100%; color:#fff; font-size:18px; border-radius:10px; transition:.3s; }
.checkout-btn:hover{ background:#157347; }
.table img{ width:70px; height:70px; object-fit:cover; border-radius:10px; }
</style>
</head>
<body>
<div class="container py-5">
<div class="row g-4">

<!-- User Info -->
<div class="col-lg-4">
<div class="card-box">
<h4 class="mb-3"><i class="fa fa-user me-2"></i>User Details</h4>
<p><b>Username:</b> <?= $_SESSION['username'] ?></p>
<p><b>Email:</b> <?= $_SESSION['email'] ?></p>

<hr>
<a href="Products.php" class="btn btn-primary w-100"><i class="fa fa-arrow-left me-2"></i>Continue Shopping</a>
<a href="Order_history.php" class="btn btn-info w-100 mt-2"><i class="fa fa-history me-2"></i>Order History</a>
</div>
</div>

<!-- Cart Table -->
<div class="col-lg-8">
<div class="card-box">
<h4 class="mb-3"><i class="fa fa-cart-shopping me-2"></i>Shopping Cart</h4>

<?php if(!empty($_SESSION['Cart'])): ?>
<table class="table align-middle">
<thead class="table-light">
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($_SESSION['Cart'] as $index => $item):
$itemTotal = $item['product_price'] * $item['product_quantity']; ?>
<tr>
<td>
  <div class="d-flex align-items-center gap-3">
    <img src="<?= $item['img'] ?>" alt="<?= $item['product_name'] ?>">

    <div><b><?= $item['product_name'] ?></b></div>
  </div>
</td>

<td>Rs. <?= $item['product_price'] ?></td>


<a href="?dec=<?= $index ?>" class="qty-btn">−</a>
<span class="qty-number"><?= $item['product_quantity'] ?></span>
<a href="?inc=<?= $index ?>" class="qty-btn">+</a>
</td>
<td>Rs. <?= $itemTotal ?></td>
<td>
<a href="?remove=<?= $index ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<div class="mt-4 p-3 bg-light rounded">
<h5>Grand Total: <b>Rs. <?= $total ?></b></h5>
<form method="POST" action="Checkout.php">
<button class="checkout-btn" name="Checkout"><i class="fa fa-credit-card me-2"></i>Place Order</button>
</form>
</div>

<?php else: ?>
<div class="alert alert-info">Your cart is empty. <a href="Products.php">Shop now!</a></div>
<?php endif; ?>

</div>
</div>

</div>
</div>
</body>
</html>

<?php
session_start();

include('../database/db.php');

$orders = []; // default empty orders

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
    $email = $_SESSION['email'];

    $sql = "SELECT * FROM orders WHERE user_email='$email' ORDER BY order_date DESC";
    $result = mysqli_query($conn, $sql);

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $orders[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $_SESSION['username']?>-Your order history || TechPlug</title>
<link rel="icon" sizes="64×64" href="../images/Logo.jpg">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>

body{font-family:'Segoe UI', sans-serif; background:#eaf2ff; padding:40px 0;}

.card-box{background:#fff; border-radius:20px; padding:25px; box-shadow:0 10px 30px rgba(0,0,0,0.1);}

.table img{width:70px; height:70px; object-fit:cover; border-radius:10px;}

.status-Pending{color:#ffc107; font-weight:bold;}

.status-Shipped{color:#0d6efd; font-weight:bold;}

.status-Delivered{color:#198754; font-weight:bold;}

#orderbtn{


font-size: 13px;
}

</style>
</head>
<body>
<div class="container">
<div class="card-box">
<h4 class="mb-3"><i class="fa fa-box me-2"></i>Order History</h4>

<?php if(count($orders) > 0): ?>
<table class="table align-middle">
<thead class="table-light">
<tr>
<th>Product</th>
<th>Description</th>
<th>Image</th>
<th>Quantity</th>
<th>Price</th>
<th>Status</th>
<th>Order Date</th>
</tr>
</thead>
<tbody>

<?php foreach($orders as $row):?> 
<tr>
<td><?= $row['product_name'] ?></td>
<td><?= $row['product_desc'] ?></td>
<td><img src="../images/<?= $row['img'] ?>" alt="<?= $row['product_name'] ?>"></td>
<td><?= $row['product_quantity'] ?></td>

<td>Rs. <?= $row['product_price'] ?></td>
<td class="status-<?= $row['status'] ?>"><?= $row['status'] ?></td>
<td><?= $row['order_date'] ?></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?php if(isset($_SESSION['order_success'])): ?>
<!-- Order Success Modal -->
<div class="modal fade" id="orderSuccessModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <i class="fa fa-check-circle fa-3x text-success mb-3"></i>
      <h5>Order Placed Successfully!</h5>
      <p>Thank you for shopping with us.</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
window.addEventListener('DOMContentLoaded', () => {
    var modal = new bootstrap.Modal(document.getElementById('orderSuccessModal'));
    modal.show();

    // Auto-close after 3 seconds
    setTimeout(() => { modal.hide(); }, 3000);
});
<?php unset($_SESSION['order_success']); ?>
</script>
<?php endif; ?>


<?php else: ?>
<p class="text-center text-muted">No orders to display. Please log in to see your order history.</p>
<?php endif; ?>
<a href="./Products.php" class="btn btn-primary mt-3" id="orderbtn" >Continue Shopping</a>

</div>
</div>


</body>
</html>

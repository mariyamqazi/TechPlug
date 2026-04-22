<?php
session_start();
include('../database/db.php');

// 🔐 Admin Login Check

if(!isset($_SESSION['email'])){
    header("location: login.php");
    exit;


    }

$admin_name = $_SESSION['email'];


// Total Orders

$order_query = "SELECT COUNT(*) AS total_orders FROM orders";
$order_result = mysqli_query($conn,$order_query);
$order_data = mysqli_fetch_assoc($order_result);
$total_orders = $order_data['total_orders'] ?? 0;

// Total Sales
$sales_query = "SELECT SUM(product_price * product_quantity) AS total_sales FROM orders";
$sales_result = mysqli_query($conn,$sales_query);
$sales_data = mysqli_fetch_assoc($sales_result);
$total_sales = $sales_data['total_sales'] ?? 0;

// Total Products
$product_query = "SELECT COUNT(*) AS total_products FROM orders"; // change table if you have products table
$product_result = mysqli_query($conn,$product_query);
$product_data = mysqli_fetch_assoc($product_result);
$total_products = $product_data['total_products'] ?? 0;

// Total Users
$user_query = "SELECT COUNT(*) AS total_users FROM mobile_web";
$user_result = mysqli_query($conn,$user_query);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'] ?? 0;


$orders_sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 10";
$orders_result = mysqli_query($conn,$orders_sql);


/* ================= UPDATE ORDER ================= */
if(isset($_POST['update_order'])){

$id = $_POST['order_id'];
$email = $_POST['user_email'];
$name = $_POST['product_name'];
$price = $_POST['product_price'];
$qty = $_POST['product_quantity'];

$sql = "UPDATE orders SET
user_email='$email',
product_name='$name',
product_price='$price',
product_quantity='$qty'
WHERE order_id='$id'";

if(mysqli_query($conn,$sql)){
echo "<script>
alert('Order Updated Successfully');
window.location.href='dashboard.php';
</script>";
}
}


/* ================= DELETE ORDER ================= */
if(isset($_POST['delete_order'])){

$id = $_POST['order_id'];

$sql = "DELETE FROM orders WHERE order_id='$id'";

if(mysqli_query($conn,$sql)){
echo "<script>
alert('Order Deleted Successfully');
window.location.href='dashboard.php';
</script>";
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TechPlug || Admin Dashboard</title>
<link rel="icon" sizes="64×64" href="../images/Logo.jpg">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

body
{background:#f4f7fe;
font-family:'Segoe UI',sans-serif;}

/* Sidebar */


.sidebar{
width:260px;height:100vh;position:fixed;
background:#0f172a;color:#fff;padding-top:20px;}

.sidebar h2{text-align:center;margin-bottom:30px;font-weight:bold;}

.sidebar a{
display:block;color:#cbd5e1;padding:12px 25px;
text-decoration:none;transition:.3s;font-weight:500;}

.sidebar a:hover{background:#1e293b;color:#fff;padding-left:30px;}

.main{margin-left:260px;padding:20px;}

.topbar{
background:#fff;padding:15px 25px;border-radius:15px;
display:flex;justify-content:space-between;align-items:center;
box-shadow:0 2px 10px rgba(0,0,0,.05);} 

.dashboard-card{
background:#fff;border-radius:20px;padding:20px;
box-shadow:0 4px 15px rgba(0,0,0,.05);
transition:.3s;}

.dashboard-card:hover{transform:translateY(-5px);} 

.card-icon{font-size:26px;padding:15px;border-radius:15px;color:#fff;}
.icon-sales{background:#3b82f6;}
.icon-orders{background:#22c55e;}
.icon-products{background:#f59e0b;}
.icon-users{background:#ef4444;}

.table thead{background:#0f172a;color:#fff;}


</style>
</head>

<body>

<!-- ===== SIDEBAR ===== -->

<div class="sidebar">
<h2>⚡ TechPlug</h2>
<a href=""><i class="fa fa-chart-line"></i> Dashboard</a>
<a href="./users/Products.php"><i class="fa fa-box"></i> Products</a>
<a href=""><i class="fa fa-shopping-cart"></i> Orders</a>
<a href=""><i class="fa fa-users"></i> Customers</a>
<a href="login.php"><i class="fa fa-sign-out-alt"></i> Logout</a>
</div>

<!-- ===== MAIN ===== -->

<div class="main">

<div class="topbar mb-4">
<h4>Admin Dashboard</h4>
<div>
Welcome, <b><?php echo $admin_name; ?></b>
<img src="../images/53.jpg" class="rounded-circle ms-2 " height="40px" width="40px">
</div>
</div>

<!-- ===== STATS ===== -->
<div class="row g-4 mb-4">

<div class="col-md-3">
<div class="dashboard-card d-flex justify-content-between align-items-center">
<div>
<h6>Total Sales</h6>
<h3>Rs. <?php echo $total_sales; ?></h3>
</div>
<div class="card-icon icon-sales"><i class="fa fa-dollar-sign"></i></div>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-card d-flex justify-content-between align-items-center">
<div>
<h6>Orders</h6>
<h3><?php echo $total_orders; ?></h3>
</div>
<div class="card-icon icon-orders"><i class="fa fa-shopping-cart"></i></div>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-card d-flex justify-content-between align-items-center">
<div>
<h6>Products</h6>
<h3><?php echo $total_products; ?></h3>
</div>
<div class="card-icon icon-products"><i class="fa fa-box"></i></div>
</div>
</div>

<div class="col-md-3">
<div class="dashboard-card d-flex justify-content-between align-items-center">
<div>
<h6>Users</h6>
<h3><?php echo $total_users; ?></h3>
</div>
<div class="card-icon icon-users"><i class="fa fa-users"></i></div>
</div>
</div>

</div>

<!-- ===== RECENT ORDERS ===== -->
<div class="dashboard-card">
<div class="d-flex justify-content-between mb-3">
<h5>Recent Orders</h5>
</div>

<div class="table-responsive">
<table class="table align-middle">
<thead>
<tr>
<th>#</th>
<th>User Email</th>
<th>Product</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>
</tr>
</thead>
<tbody>

<?php
if(mysqli_num_rows($orders_result) > 0){

while($row = mysqli_fetch_assoc($orders_result)){
$total = $row['product_price'] * $row['product_quantity'];
?>
<tr>
<td><?php echo $row['order_id']; ?></td>

<td><?php echo $row['user_email']; ?></td>
<td><?php echo $row['product_name']; ?></td>
<td>Rs. <?php echo $row['product_price']; ?></td>
<td><?php echo $row['product_quantity']; ?></td>
<td>Rs. <?php echo $total; ?></td>
<td>

<!-- EDIT BUTTON -->
<button 
class="btn btn-primary btn-sm editBtn"
data-id="<?php echo $row['order_id']; ?>"
data-email="<?php echo $row['user_email']; ?>"
data-name="<?php echo $row['product_name']; ?>"
data-price="<?php echo $row['product_price']; ?>"
data-qty="<?php echo $row['product_quantity']; ?>"
data-bs-toggle="modal"
data-bs-target="#editModal">

<i class="fa fa-edit"></i>
</button>

<!-- DELETE BUTTON -->
<button 
class="btn btn-danger btn-sm deleteBtn"
data-id="<?php echo $row['order_id']; ?>"
data-bs-toggle="modal"
data-bs-target="#deleteModal">

<i class="fa fa-trash"></i>
</button>

</td>

               
</tr>
<?php }} else { ?>
<tr><td colspan="6" class="text-center">No Orders Found</td></tr>
<?php } ?>

</tbody>
</table>
</div>
</div>
<!-- ================= EDIT MODAL ================= -->
<div class="modal fade" id="editModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="">

<div class="modal-header bg-primary text-white">
<h5 class="modal-title">Edit Order</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">

<input type="hidden" name="order_id" id="edit_id">

<div class="mb-2">
<label>Email</label>
<input type="email" name="user_email" id="edit_email" class="form-control">
</div>

<div class="mb-2">
<label>Product</label>
<input type="text" name="product_name" id="edit_name" class="form-control">
</div>

<div class="mb-2">
<label>Price</label>
<input type="text" name="product_price" id="edit_price" class="form-control">
</div>

<div class="mb-2">
<label>Qty</label>
<input type="text" name="product_quantity" id="edit_qty" class="form-control">
</div>

</div>

<div class="modal-footer">
<button type="submit" name="update_order" class="btn btn-success">
Update
</button>
</div>

</form>

</div>
</div>
</div>
<!-- ================= DELETE MODAL ================= -->
<div class="modal fade" id="deleteModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<form method="POST" action="">

<div class="modal-header bg-danger text-white">
<h5 class="modal-title">Delete Order</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body text-center">

<input type="hidden" name="order_id" id="delete_id">

<h5>Are you sure you want to delete this order?</h5>

</div>

<div class="modal-footer">
<button type="submit" name="delete_order" class="btn btn-danger">
Delete
</button>
</div>

</form>

</div>
</div>
</div>



</div>
</body>
<script>

// ===== EDIT DATA FETCH =====
document.querySelectorAll('.editBtn').forEach(button => {
    button.addEventListener('click', function(){

        document.getElementById('edit_id').value = this.dataset.id;
        document.getElementById('edit_email').value = this.dataset.email;
        document.getElementById('edit_name').value = this.dataset.name;
        document.getElementById('edit_price').value = this.dataset.price;
        document.getElementById('edit_qty').value = this.dataset.qty;

    });
});


// ===== DELETE DATA FETCH =====
document.querySelectorAll('.deleteBtn').forEach(button => {
    button.addEventListener('click', function(){

        document.getElementById('delete_id').value = this.dataset.id;

    });
});

</script>


</html>

<?php

session_start();




include('../database/db.php'); 

if(isset($_GET['product_id'])){

    $id = $_GET['product_id'];

    $sql = "SELECT * FROM orders WHERE product_id = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
    } else {
        echo "No Record Found";
    }

} else {
    echo "Invalid ID";
}


/* =========================
   UPDATE DATA
========================= */

if(isset($_POST['submit'])){

    $id = $_GET['product_id'];
    $emailaddress = $_POST['user_email'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
     $product_quantity = $_POST['product_quantity'];

$sql = "UPDATE orders 
            SET user_email='$emailaddress',
                product_name='$product_name',
                product_price='$product_price',
                product_quantity='$product_quantity'
            WHERE product_id='$id'";

    if($conn->query($sql) === TRUE){
        echo "<script>
                alert('Record Updated Successfully');
                window.location.href='dashboard.php';
              </script>";
    } else {
        echo "Update Failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Fredoka:wght@300..700&display=swap" rel="stylesheet">

<style>


 
*{

box-sizing: border-box;
margin: 0;
padding: 0;
font-family: 'Fredoka',sans-serif;

}




#box1{
    display: flex;
    width: 100%;
   
}

.sidebar {
    width: 250px;
   
    padding: 20px;
    transition: transform 0.3s ease;
    transform: translateX(-100%);
    position: fixed;
    height: 100%;
    background:	rgb(40,40,40);
    opacity: .9;
    left: 0; 
    
}

.sidebar.active {
    transform: translateX(0); 
}

.logo {
    font-size: 24px;
    margin-bottom: 20px;
    margin-top:10px;
   color:chocolate;
}
#top{
    font-family: 'Fredoka',sans-serif;
}

.fa-utensils{

color:chocolate;
 opacity: .8;;
 font-size: 22px;
 padding:5px;
} 
.sidebar ul {
    list-style-type: none;
    padding: 0;
    margin-top:50px;
    
}

.sidebar ul li {
    margin: 30px 0;
}

.sidebar a {
    text-decoration: none;
   
    color:white;
}
.sidebar a:hover {
    color:chocolate;
}
.content {
    flex: 1;
    padding: 20px;
    transition: margin-left 0.3s ease;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
@media (max-width: 595px) {
#top{
display:none;

}



}

.toggle-btn {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    z-index: 1;
}

.widgets {
    margin-top: 20px;
}
@media (max-width: 768px) {
    .toggle-btn {
        display: block; 
    }

    .content {
        margin-left: 0;
    }
} 

#text{
 
width: 600px; 

height:600px;

}


form{

padding:20px;
border-radius:10px;

box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);


background-color: rgb(243, 238, 238);

}


form:hover{
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition:.5s;
    
}

#colorful{

    
    
    height:auto;
}

#colorful1{

    font-weight:bold;

}


</style>
</head>
<body>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    




        <div class="col-md-12 col-sm-12 col-xs-12 position-relative" id="colorful">
<div class="d-flex justify-content-center">

<div class="container mt-5" id="text">

<h1  class="text-center">Update Data</h1>
<br><br>
<form action="edit_product.php?id=<?php echo $row['product_id']; ?>" method="post">

<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Id</label>
  <div class="col-sm-10">
    <input type="text" name="id"
           class="form-control"
           value="<?php echo $row['product_id']; ?>"
           readonly>
  </div>
</div>

<div class="row mb-3">
  <label class="col-sm-2 col-form-label">UserEmail</label>
  <div class="col-sm-10">
    <input type="email" name="user_email"
           class="form-control"
           value="<?php echo $row['user_email']; ?>">
  </div>
</div>


<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Product</label>
  <div class="col-sm-10">
    <input type="text" name="product_name"
           class="form-control"
           value="<?php echo $row['product_name']; ?>">
  </div>
</div>

<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Price</label>
  <div class="col-sm-10">
    <input type="text" name="product_price"
           class="form-control"
           value="<?php echo $row['product_price']; ?>">
  </div>
</div>
<div class="row mb-3">
  <label class="col-sm-2 col-form-label">Qty</label>
  <div class="col-sm-10">
    <input type="text" name="product_quantity"
           class="form-control"
           value="<?php echo $row['product_quantity']; ?>">
  </div>
</div>




<div class="row mb-3">
  <div class="col-sm-10 offset-sm-2">
    <button type="submit" name="submit"
            class="btn btn-warning">
      Update
    </button>
  </div>
</div>

</form>

    </div>
</div>
</div>

            </body>
</html>
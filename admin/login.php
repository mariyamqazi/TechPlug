<?php
  
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
   
session_start();



// Include your database connection

include('../database/db.php'); 


    ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TechPlug || Admin Login</title>
  <link rel="icon" sizes="64×64" href="../images/Logo.jpg">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      font-family:'Poppins', sans-serif;
    }

    body{
      height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
          background:#eaf2ff;

      /* background: linear-gradient(135deg,#0f2027,#203a43,#2c5364); */
    }

    .container{
      width:900px;
      height:520px;
      display:flex;
      background:#fff;
      border-radius:20px;
      overflow:hidden;
          box-shadow:0 20px 40px rgba(0,0,0,0.1);

    }

    /* LEFT SIDE */
    .left{
      flex:1;
      background: url('https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80') center/cover;
      position:relative;
    }

    .left::after{
      content:"";
      position:absolute;
      inset:0;
      background:rgba(0,0,0,0.55);
    }

    .left-content{
      position:absolute;
      color:#fff;
      z-index:2;
      padding:40px;
    }

    .left-content h1{
      font-size:36px;
      margin-bottom:10px;
      letter-spacing:1px;
    }

    .left-content p{
      font-size:14px;
      opacity:0.9;
    }

    /* RIGHT SIDE */
    .right{
      flex:1;
      display:flex;
      align-items:center;
      justify-content:center;
      
      background:#f7f9fc;
    }

    .login-box{
      width:320px;
      
    }

    .login-box h2{
      text-align:center;
      margin-bottom:30px;
     color: #0d6efd;

    }

    .input-group{
      margin-bottom:20px;
    }

    .input-group label{
      font-size:13px;
      color:#555;
      margin-bottom:6px;
      display:block;
    }

    .input-group input{
      width:100%;
      padding:12px 14px;
      border-radius:10px;
      border:1px solid #ccc;
      outline:none;
      transition:0.3s;
      background:#fff;
    }

    .input-group input:focus{
      border-color:#2c5364;
      box-shadow:0 0 0 2px rgba(44,83,100,0.15);
    }

    .btn{
      width:100%;
      padding:12px;
      border:none;
      border-radius:12px;
      background-color:  #0d6efd;;;
      /* background:linear-gradient(135deg,#2c5364,#203a43); */
      color:#fff;
      font-weight:500;
      cursor:pointer;
      transition:0.3s;
      margin-top:10px;
    }

    .btn:hover{
      transform:translateY(-2px);
      box-shadow:0 10px 20px rgba(0,0,0,0.2);
    }

    .footer-text{
      text-align:center;
      margin-top:18px;
      font-size:12px;
      color:#777;
    }

    .footer-text a{
      color:#2c5364;
      text-decoration:none;
      font-weight:500;
    }

    /* Responsive */
    @media(max-width:900px){
      .container{
        width:95%;
        flex-direction:column;
        height:auto;
      }

      .left{
        height:200px;
      }
    }
  </style>
</head>
<body>


     <?php
    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        $q = "SELECT * FROM `admin_login` WHERE email = '$email' and password = '$password'";
        $res = mysqli_query($conn, $q);
        if (mysqli_num_rows($res) > 0) {
            while ($data = mysqli_fetch_assoc($res)) {
                $_SESSION['email'] = $data['email'];
                header("location:dashboard.php");
            }
        }
    }

    ?>


  <div class="container">

    <!-- LEFT PANEL -->
    <div class="left">
      <div class="left-content">
        <h1>TechPlug</h1>
        <p>Admin Control Panel Login<br>
        Manage products, orders & users securely.</p>
      </div>
    </div>

    <!-- RIGHT PANEL -->
    <div class="right">
      <form class="login-box" method="POST" action="login.php">
        <h2>Admin Login</h2>

        <div class="input-group">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="admin@techplug.com" required>
        </div>

        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <button class="btn" type="submit" name="login">Login</button>

        <div class="footer-text">
          © 2026 TechPlug Admin Panel
        </div>
      </form>
    </div>

  </div>

</body>
</html>

<?php
session_start();
$showAlert = false;
$showError = false;
$login = false;

include('../database/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 🔵 REGISTER
    if (isset($_POST['register'])) {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        if ($password == $cpassword) {

            $sql = "INSERT INTO mobile_web (username, email, password)
                    VALUES ('$username', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {
                $showAlert = true;
            } else {
                $showError = "Username or Email already exists";
            }

        } else {
            $showError = "Passwords do not match";
        }
    }

    // 🔵 LOGIN
    if (isset($_POST['login'])) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM mobile_web WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result);

            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $user['username'];

            $login = true;

            header("location: Home.php");
            exit;

        } else {
            $showError = "Invalid Login Credentials";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Welcome to TechPlug Register || Login</title>
      <link rel="icon" sizes="64×64" href="../images/Logo.jpg">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    /* background:#eaf2ff; */
   
    background-color: #1e293b;
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    font-family:'Segoe UI', sans-serif;
}

.auth-box{
    width:900px;
    height:500px;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 20px 40px rgba(0,0,0,0.1);
}

/* Left Image + Text */
.auth-image{
    width:50%;
    background:#f7f9ff;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-align:center;
    padding:30px;
}

.auth-image img{
    width:80%;
}

.auth-image h4{
    margin-top:20px;
    font-weight:700;
    color:#0d6efd;
}

.auth-image p{
    font-size:14px;
    max-width:260px;
    color:#555;
}

/* Right Form */
.auth-form{
    width:50%;
    background:#0d6efd;
    color:#fff;
    padding:40px;
}

.form-control{
    border-radius:25px;
    padding:10px 20px;
}

.btn-custom{
    border-radius:25px;
    padding:10px;
    font-weight:600;
        /* background-color: #5a97fa; */
        background-color: #1a2331;
        
   color:white;
}
/* Remove hover effect */
.btn-custom:hover{
        background-color: #1a2331;

color:white;
    transform:none;
    box-shadow:none;
}

.toggle-text{
    font-size:14px;
    margin-top:15px;
}

.toggle-text a{
    color:#ffc107;
    cursor:pointer;
    text-decoration:none;
    font-weight:600;
}

.hidden{
    display:none;
}
</style>
</head>

<body>

<div class="auth-box">

    <!-- LEFT SIDE (IMAGE + TECHPLUG TEXT) -->
    <div class="auth-image">

        <img src="../images/loginpage1.jpg" alt="TechPlug">

        <h4>TechPlug Store</h4>

        <p>
            Discover the best tech accessories at unbeatable prices.  
            Fast delivery • Secure checkout • Quality guaranteed.
        </p>

    </div>

    <!-- RIGHT SIDE FORM -->
    <div class="auth-form">

        <!-- Toasts -->
        <div class="position-fixed top-0 end-0 p-3" style="z-index:1055">

            <?php if($showAlert): ?>
            <div class="toast text-bg-success border-0" id="successToast">
                <div class="d-flex">
                    <div class="toast-body">
                        ✅ Account created successfully!
                    </div>
                    <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
            <?php endif; ?>

            <?php if($showError): ?>
            <div class="toast text-bg-danger border-0" id="errorToast">
                <div class="d-flex">
                    <div class="toast-body">
                        ❌ <?= $showError ?>
                    </div>
                    <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
            <?php endif; ?>

            <?php if($login): ?>
            <div class="toast text-bg-info border-0" id="loginToast">
                <div class="d-flex">
                    <div class="toast-body">
                        ✅ Logged in successfully!
                    </div>
                    <button class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- REGISTER -->
        <form action="" method="POST" id="registerForm">
            <h3>Register</h3>

            <input type="text" class="form-control my-3" placeholder="Username" name="username" required>
            <input type="email" class="form-control my-3" placeholder="Email" name="email" required>
            <input type="password" class="form-control my-3" placeholder="Password" name="password" required>
            <input type="password" class="form-control my-3" placeholder="Confirm Password" name="cpassword" required>

            <button class="btn w-100 btn-custom" name="register">Register</button>

            <div class="toggle-text">
                Already have an account?
                <a onclick="toggleForm()">Login</a>
            </div>
        </form>

        <!-- LOGIN -->
        <form action="" method="POST" id="loginForm" class="hidden">
            <h3>Login</h3>

            <input type="email" class="form-control my-3" placeholder="Email address" name="email" required>
            <input type="password" class="form-control my-3" placeholder="Password" name="password" required>

            <button class="btn w-100 btn-custom" name="login">Login</button>

            <div class="toggle-text">
                Don't have an account?
                <a onclick="toggleForm()">Register</a>
            </div>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
function toggleForm(){
    document.getElementById("registerForm").classList.toggle("hidden");
    document.getElementById("loginForm").classList.toggle("hidden");
}

document.addEventListener('DOMContentLoaded', () => {
  const toastElList = [].slice.call(document.querySelectorAll('.toast'));
  toastElList.forEach((toastEl) => {
    const toast = new bootstrap.Toast(toastEl, { delay:3000 });
    toast.show();
  });
});
</script>

</body>
</html>

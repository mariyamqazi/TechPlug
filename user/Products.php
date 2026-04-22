<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: register.php");
    exit;
}

// Include your database connection
include('../database/db.php'); // make sure this file defines $conn

// Fetch products from database
$sql = "SELECT * FROM orders"; // assuming your table is called 'products'
$result = mysqli_query($conn, $sql);

$Products = []; // initialize array

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $Products[] = $row;
    }
}
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Welcome-<?php echo $_SESSION['username']?> || TechPlug</title>
              <link rel="icon" sizes="64×64" href="../images/Logo.jpg">

        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <style>



* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
  
  
    @media (max-width: 991px) {
    #log {
    display: block; 
    }
    
    
    }
    
  html {
  scroll-behavior: smooth;
  }
  


               .navbar {
    position: absolute;
    top: 25px;
    left: 0;
    width: 100%;
    z-index: 10;
      transition: all 0.4s ease;


}


/* When scrolled */
.navbar.scrolled {
  position: fixed;
  top: 0;
  background: rgba(0,0,0,0.9);
  backdrop-filter: blur(10px);
  box-shadow: 0 4px 20px rgba(0,0,0,0.4);
  padding: 10px 0;
}


  
#navlogo {
    height: 75px;
    width: auto;
    object-fit: contain;
    /* margin-right: 100px; */
}


    .navbar a {
        color: white;
        margin: 0 20px;
        text-decoration: none;
        font-weight: bold;
        font-family: 'Roboto';
        font-size: 14px;
    }

.navbar-nav {
    width: 100%;
    justify-content: center;
    align-items: flex-end;
    gap: 15px;
}

.nav-item {
    display: flex;
    align-items: flex-end;
}




.hero {
           
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/productimg.jpg');

   background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 650px;
    width: 100%;
    z-index: -1;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 140px;
    /*        animation: zoomInOut 10s ease-in-out infinite;
    transition: 0.5s;
    transform-origin: center center;*/
}
/* 
@keyframes zoomInOut {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.05);
    }

    100% {
        transform: scale(1);
    }
} */

.hero-content {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 0 20px;
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
}

#heading h6 {
    color: #FF0000;
    z-index: -1;
    font-size: 30px;
    font-family: 'Freestyle Script';
    letter-spacing: 2px;
}

#tophead {
    font-size: 2rem;
    font-weight: 700;
    color: #fff;
    line-height: 1.3;
}


#btnpart .btn {
   margin-top: -15px;
    padding: 5px 20px;
    font-size: 13px;
    
    transition: all 0.3s ease-in-out;
}



#btn1 {
    width: 120px;
    height: 30px;
    border: none;
    outline: none;
    color: white;
    z-index: -1;
    /* animation: btnanimate1 ease-in-out infinite 3s; */
}

@keyframes btnanimate1 {

    from {
        transform: translateX(-100%);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
}

#btn2 {
    border: solid 1px;
    /*    width: 150px;
    height: 50px;
    justify-content: center;
    text-align: center;*/
    color: white;
    width: 120px;
    height: 30px;
    z-index: -1;
    /* animation: btnanimate2 ease-in-out infinite 5s; */
}

/* 
@keyframes btnanimate2 {

    from {
        transform: translateX(100%);
        opacity: 0;
    }

    to {
        transform: translateX(0);
        opacity: 1;
    }
} */

#btn1:hover {
    background: white;
    transition: 0.5s;
    color: #FF7F00;
}

#btn2:hover {
    background: white;
    transition: 0.5s;
    color: #FF7F00;
}


.social-icons {
    display: flex;
    gap: 15px;
    margin-top: 10px;
    justify-content: center;
}



#socialbox {
    width: 27px;
    height: 27px;
    position: relative;
    margin-top: 10px;
    border-radius: 50%;
    background-color: #0d6efd;
    justify-content: center;
}


#face {
    color: white;
    font-size: 13px;
    margin-top: 5px;
    transition: color 0.3s ease;
    justify-content: center;
}


/* Responsive adjustments */
@media (max-width: 768px) {
    #tophead {
        font-size: 1.7rem;
    }

    #btnpart .btn {
        width: 100%;
        margin: 10px 0;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 15px;
    }
}

@media (max-width: 1100px) {

    .navbar a {
        font-size: 15px;
    }
}

@media (max-width: 977px) {

    #navlogo {
        display: none;
    }

    .navbar a {
        margin: 5px;
        font-size: 16px;
    }
}


@media (max-width: 768px) {
    .navbar-nav {
        flex-direction: column;
        align-items: center;
        top: 0;
    }

    .hero {
        height: 600px;
        padding-top: 120px;
        border-radius: 0;
    }

    #btnpart .btn {
        padding: 0;
        font-size: 13px;
    }
}


@media (max-width: 617px) {
    .navbar a {
        margin: 0;
        font-size: 15px;
    }
}

@media (max-width: 575px) {
    #navlogo {
        display: revert;
        width: 170px;
        height: 70px;
    }

    .navbar {
        background-color: black;
        top: 0;
    }

    h6 {
        font-size: 20px;
    }

    #tophead {
        font-size: 15px;
    }

    #btn1 {
        width: 20px;
        padding: 0px;
    }

    #btn2 {
        width: 20px;
        padding: 0px;
    }
}

@media (max-width: 345px) {
    #navlogo {
        width: 170px;
    }

    #heading h6 {
        font-size: 17px;
    }

    #tophead {
        font-size: 12px;
    }

    #btnpart .btn {
        font-size: 11px;
    }

    #socialbox {
        background-color: none;
        width: 0;
        margin: 10px;
    }

    #face {
        font-size: 18px;
    }
}

@media (max-width: 280px) {
    #navlogo {
        width: 150px;
    }
}

@media (max-width: 200px) {


    #heading h6 {
        font-size: 14px;
    }

    #tophead {
        font-size: 10px;
    }

    #btnpart .btn {
        font-size: 9px;
    }

    #socialbox {
        display: none;
    }
}

/* Top Bar */
.top-bar {
  display: flex;
  align-items: center;
  gap: 30px;
  margin-top: 100px;
  padding: 25px 40px;
  background: #fff;
}

.main-heading {
  font-size: 30px;
  font-weight: bold;
  white-space: nowrap;
}

/* Buttons */
.category-buttons button {
  background: none;
  border: none;
  font-size: 18px;
  margin-right: 15px;
  cursor: pointer;
  color: #666;
  padding-bottom: 5px;
}

.category-buttons button:hover,
.category-buttons button.active {
  color: #000;
  font-weight: bold;
  border-bottom: 2px solid #000;
}

  
.card-container {
  display: flex;
  justify-content: center;
  gap: 25px;
  padding: 40px;
  flex-wrap: wrap;
  
}


.card {
  width:  280px;
  background: #fff;
  border-radius: 12px;
  /* padding: 15px; */
  text-align: center;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
  transition: transform 0.3s;
}

.card:hover {
  transform: translateY(-5px);
}

.card img {
  width: 100%;
  height: 280px;
  object-fit: cover;
  border-radius: 10px;
}

.card h3 {
  margin: 12px 0 5px;
}

.card p {
  color: #444;
  font-weight: bold;
}

/* section 2 */


  #headingabout{
  
    font-weight: bold;
    font-size: 35px;
    font-family: "Roboto";
    margin-top: 30px
   
   }

  /* .container0{
    display: flex;
    justify-content: center;
    margin-top: -10px;
    flex-wrap: wrap;
     
    
    } */
    
    .card2{
        width: 300px;
    background-color: #f0f0f0;
  
    border-radius: 10px;
    margin: 30px;
     overflow: hidden; 
    box-shadow: 0px 4px 8px 0 rgba(0,0,0,0.2);
    
    }
    
    .card2 img{
        width: 100%;
        height: 220px;
        border-radius: 5px;
        /* border-top-left-radius: 20px;
        border-bottom-right-radius: 20px; */
    }
  
    .card-coontent{
    padding: 10px;
     margin-left: 20px;
    }
  
    
    .card-container:hover .card-coontent { 
    
      height: 100%;
      
  
    }
  
    
    
    .card-coontent h1{
    font-size: 22px;
    margin-bottom: 9px;
    /* margin-left: 30px; */
    font-family: "Fredoka",sans-serif; 
    /* font-weight: bold; */
    color: black;
    text-align: center;
    /* font-family: "Roboto", sans-serif; */
    
    }
    
  
    .card2:hover{
        /* background-color:rgb(107, 211, 211); */
        color: white;
        /* box-shadow: 0px 2px 20px blue; */
        transition: .7s;
        transform: scale(1.1);
        box-shadow: 0px 4px 8px 0 rgba(0,0,0,0.2);
    }

  
    .primary:hover{
      color: #024c9b;
      
      padding-bottom: 10px;
      cursor: pointer;
      text-decoration: underline;
  }
  
  
  
  
  
  
  
  
  @media(max-width:345px){
  
  
    .card-coontent h1{
  
  
      font-size: 20px;
   
       }
   
    
  }
  
  
  
  
  
  @media(max-width:260px){
  
  
    .primary{
  
  
      font-size: 15px;
       
    }
  
   #button0{
  
    width:100px;
    height: 20;
  
    font-size: 12px;
  
   }
  }
  
  @media(max-width:240px){
  
  
    .card-coontent h1{
  
  
      font-size: 18px;
       /* margin-left: 20px;
     */
  
    }
  
  
      .primary{
  
  
        font-size: 10px;
         
      }
   
   
  }
  
   */

footer {
    padding: 40px 40px;
    color: white;
    margin-top: 150px;
    background-color: #0e0c0c;
    
}

#footbox {
    /*    display:flex;
    align-items:flex-start;
 */
    margin-left: 20px;
    margin-top: 40px;
}

 
footer h5 {
    font-size: 25px;
    margin-bottom: 2rem;
    /*   margin-top:40px;
*/
}

footer ul {
    padding: 20px;
    margin: 0;
    list-style: none;
}

    footer ul li {
        margin-bottom: 20px; /* Increased vertical space between list items */
    }

footer p {
    margin-bottom: 30px;
}

.small {
    font-size: 16px;
}

footer .form-control {
    border-radius: 0;
    margin-bottom: 10px; /* space between form and button */
}

#search {
    height: 40px;
    font-size: 18px;
}

footer .btn {
    border-radius: 0;
    background-color:#0d6efd;
    border: none;
    outline: none;
    height: 40px;
}

#move2 {
    color:#0d6efd
}

    #move2:hover {
        background-color:white;
        color: #2d0b00;
        border-radius: 50%;
        transform: rotate(360deg);
        transition: .8s;
    }
/* Responsive Design */



@media (max-width: 1200px) {

    footer {
        margin-top: 250px;
    }

        footer .container {
            max-width: 90%;
        }
}

@media(max-width:400px) {

    #flogo {
        width: 180px;
    }
}

@media(max-width:260px) {

    #flogo {
        display: none;
    }
}


@media (max-width: 1100px) {

    #footbox {
        margin-left: 0px;
    }

    footer h5 {
        font-size: 18px;
    }

    #flogo {
        width: 170px;
    }

    .small {
        font-size: 13px;
    }
}

@media (max-width: 992px) {
    footer .col-md-3,
    footer .col-md-2,
    footer .col-md-5 {
        padding-right: 15px;
        padding-left: 15px;
    }

    footer .row {
        /*            flex-direction: column;*/
        align-items: center;
    }

    footer .col-md-3,
    footer .col-md-2,
    footer .col-md-5 {
        margin-bottom: 30px;
    }

    footer .col-md-5 {
        max-width: 100%;
    }
}

@media (max-width: 768px) {

    footer .row,
    #footbox {
        text-align: center;
        justify-content: center !important;
    }

    footer h5 {
        font-size: 1.1rem;
    }

    footer .form-control {
        max-width: 100%;
        margin-bottom: 15px;
    }

    #search {
        width: 100%;
        font-size: 12px;
        text-align: center;
        /*            margin-left:400px*/
    }

    footer .btn {
        width: 100%;
        text-align: center;
    }

    footer .text-md-end {
        text-align: left;
    }
}



        </style>
    </head>

    <body>
        <header>
          
<nav class="navbar navbar-expand-sm mb-3">
        <div class="container-fluid">

            <a class="navbar-brand d-sm-none" href="#">
                
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav align-items-center flex-wrap flex-sm-nowrap text-center w-100 justify-content-center">
                   
                 <li class="nav-item d-none d-sm-block">
                        <a class="nav-link px-0" href="#">
                            <img src="../images/logo3.png"alt="Logo" id="navlogo">

                        </a>
                    </li>

                
                
                <li class="nav-item">
                        <a href="./Home.php" class="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="./Home.php" class="">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="./Products.php"class="">Products</a>
                    </li>


                    
                    <li class="nav-item">
                        <a href="./Contact.php" class="">Contact</a>
                    </li>
                

               <li class="nav-item">
              <a href="logout.php" id="log" class="nav-link d-lg-none text-center" >Logout</a>
              </li>
                    
                </ul>

            </div>
        </div>
    </nav>


    <div class="hero">
        <div class="hero-content text-white text-center">
            <div id="heading">
                <h6>Welcome to TechPlug</h6>
                <h1 id="tophead">Where Power and Beauty Align</h1>
            </div>

            <div id="btnpart" class="mt-4">
                <button class="btn btn-primary me-3" id="btn1">View Shop</button>
           
            </div>

            <div class="social-icons">
                <a href="" target="_blank" id="socialbox"><i class="fa-solid fa-mobile-screen" id="face"></i></a>
                <a href="" target="_blank" id="socialbox"><i class="fa-solid fa-headphones" id="face"></i></a>
                <a href="" target="_blank" id="socialbox"><i class="fa-solid fa-microphone" id="face"></i></a>
                <a href="" target="_blank" id="socialbox"><i class="fa-brands fa-instagram" id="face"></i></a>

            </div>

        </div>
    </div>
            <!-- place navbar here -->
        </header>
        <main>

          <div class="top-bar">
    <h1 class="main-heading">Deals Of The Week</h1>

    <div class="category-buttons">
      <button class="active" onclick="loadProducts('accessories', this)">Accessories</button>
      <button onclick="loadProducts('earphones', this)">Earphones</button>
      <button onclick="loadProducts('microphones', this)">Microphones</button>
      <button onclick="loadProducts('smartwatches', this)">Smartwatches</button>
    </div>
  </div>


  <div class="card-container" id="cards"></div>


<br><br>

<!-- section 2 -->
             
  <div class="container">
    <div class="row text-center">
  <div>

       <h1 class="text-center" id="headingabout">Choose Your Desired Products</h1>
     
       </div>
      </div>
 </div>

<div class="card-container">
<?php foreach($Products as $product): ?>
  <div class="card2">
    <img src="../images/<?= $product['img'] ?>" alt="<?= $product['product_name'] ?>">


    <div class="card-coontent">
      <h1><?= $product['product_name'] ?></h1>
      <h6 style="color: red;">Rs. <?= $product['product_price'] ?></h6>
      <p><?= $product['product_desc'] ?></p>

      <form method="POST" action="Cart.php">
        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
        <input type="hidden" name="name" value="<?= $product['product_name'] ?>">
        <input type="hidden" name="price" value="<?= $product['product_price'] ?>">

        <input type="hidden" name="img" value="<?= $product['img'] ?>">
        <input type="hidden" name="product_desc" value="<?= $product['product_desc'] ?>">
        <button type="submit" name="add_to_cart" class="btn btn-primary">
          Add to Cart
        </button>
      </form>

      <a class="primary">See description</a>
    </div>
  </div>
<?php endforeach; ?>

</div>





<script>

//scroll//


window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");

  if (window.scrollY > 80) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});



    const products = {
  accessories: [
    { name: "USB cable", img: "../images/cable2.jpg", price: "$5" },
    { name: "Earbuds", img: "../images/earphone5.jpg", price: "$8" },
    { name: "Gaming Headset", img: "../images/headphone5.jpg", price: "$20" },
        { name: "Power Bank", img: "../images/power banks.jpg", price: "$20" },

  ],
  earphones: [
    { name: "Wired Earphones", img: "../images/earphone1.jpg", price: "$10" },
    { name: "Wireless Earbuds", img: "../images/earphone5.jpg", price: "$25" },
    { name: "Gaming Earphones", img: "../images/Earphones.png", price: "$30" },
        { name: "Wireless Earbuds", img: "../images/earphone2.jpg", price: "$20" },

  ],
  microphones: [
    { name: "Studio Microphone", img: "../images/phones2.webp", price: "$40" },
             { name: "Wireless headphone", img: "../images/headphone3.jpg", price: "$20" },

    { name: "Podcast Mic", img: "../images/Microphone.png", price: "$35" },
    { name: "Clip Microphone", img: "../images/microphon3.jpg", price: "$15" },

  ],
  smartwatches: [
    { name: "Fitness Watch", img: "../images/watches2.jpg", price: "$50" },
    { name: "Classic Smartwatch", img: "../images/watche3.jpg", price: "$70" },
    { name: "Pro Smartwatch", img: "../images/watches.jpg", price: "$90" },
        { name: "Fitness Watch", img: "../images/watches4.jpg", price: "$20" },

  ],
  
};

function loadProducts(category, btn) {
  const container = document.getElementById("cards");
  container.innerHTML = "";

  // active button
  document.querySelectorAll(".category-buttons button")
    .forEach(b => b.classList.remove("active"));
  btn.classList.add("active");

  products[category].forEach(item => {


  container.innerHTML += `
      <div class="card">
        <img src="${item.img}">
        <h3>${item.name}</h3>
        <p>${item.price}</p>
      </div>
    `;
  });
}

// Default load
loadProducts("accessories", document.querySelector(".category-buttons button"));





</script>



        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

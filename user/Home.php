<?php
session_start();

include('../database/db.php');


if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true){
header(("location: register.php"));
exit;

}

?>


<!doctype html>
<html lang="en">
    <head>
        
    <title>Welcome-<?php echo $_SESSION['username']?> || TechPlug </title>
      <link rel="icon" sizes="64×64" href="../images/Logo.jpg">
    
        
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"  />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
              
             <style>


* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
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

  
    @media (max-width: 991px) {
    #log {
    display: block; 
    }
    
    
    }
    
  


.hero {
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('../images/Cover2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 650px;
    width: 100%;
    z-index: 1;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 140px;
   
}

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
}

#btn2 {
    border: solid 1px;
    color: white;
    width: 120px;
    height: 30px;
    z-index: -1;
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



.card-container{
 display: flex;
 justify-content: center;
 margin-top: 70px;
 flex-wrap: wrap;
  
 
 }
 
 .card2{

 margin: 10px;
 }
 

 .card2 img{

    
     width:140px;
     height: 100px;

     border-radius: 100px;
     
     animation: imagechange 5s linear infinite;


   }

   


@keyframes imagechange {


 from { transform: translateX(-100%); opacity: 8; }
 to { transform: translateX(100%); opacity: 7; }

 }

 .card-coontent{
 padding: 10px;
 animation: imagechange 5s linear infinite;

 }


 
 /* .card-container:hover .card-coontent { 
 
   height: 100%;
   

 } */

 #category{

   text-decoration: none;
   list-style: none;
 }

 #category2{

 font-size: 15px;
 text-align: center;
 margin-top: -5px;
 color:rgb(248, 69, 99);
 }
 
 
 .card-coontent h1{
 font-size: 23px;
 margin-bottom: 9px;
 
 font-family: "Fredoka",sans-serif; 
 
 color: black;
 text-align: center;
 
 }



@media(max-width:1000px){
 

 
 .card2 img{

  animation: none;

 }
 .card-coontent{

   animation: none;
 }

}


@media(max-width:250px){
 

 
 .card2 img{

    
   width:200px;
  
   height: 200px;

  border-radius: 100%;
 
 
 }

}
 @media(max-width:240px){
 
 
   .card-coontent h1{
 
 
     font-size: 15px;
      /* margin-left: 20px;
    */
     }


 }

 #pro{

    margin:  0px 20px;
     box-shadow: 0px 4px 8px 0 rgba(0,0,0,0.2);
    height: 400px;
 }

#prohead{
    color:#0d6efd;
    padding: 7px;
    /* padding: 10px; */
    font-size: 16px;
}

#pro h6{

font-size: 12px;

}

#pro a{

font-size: 14px;

}




#coverbox{

display: flex;
justify-content: center;
/* width: 100%; */

}

#coverbox h1{
font-size: 30px;

}

#coverbox h4{
font-size: 20px;

}

#coverbox p{
font-size: 14px;

}

#coverbox .btn{
font-size: 12px;

}

#coverbox .fa-arrow-right{
font-size: 10px;


}
#coverimg{

width:100%;

border-radius: 10px;

}

#covertext{

    color: red;
    
    position: absolute;
    margin-right: 500px;
    margin-top: 120px;
    color: white;
}




#heading{

/* font-family: "Fredoka",sans-serif; */
font-family: "Roboto", sans-serif;

font-weight: bold;
font-size: 32px;

}


#iphone{

margin:-20px 50px;
width: 400px;
height: 450px;
/* height:100px; */
   
}
#i{
background-color: white;
  box-shadow: 0px 4px 8px 0 rgba(0,0,0,0.2);

}
#iphone h4{
font-size: 20px

}
#iphone p{
font-size: 14px

}
#iphone a{
font-size: 13px

}
#iphone .fa-arrow-right{
/* font-size: 12px */

}



.heading2 {
    margin-top: 270px;
  font-size: 30px;
  font-weight: 700;
  white-space: nowrap;
}

.small-text {
  font-size: 25px;
  font-weight: 400;

  word-spacing: 12px;
  color: #575656;
}

.carousel-container0 {
  display: flex;
  align-items: center;
  position: relative;
  overflow: hidden;
}

.card-container0 {
  display: flex;
  transition: transform 0.5s ease;
}

.card0 {
  min-width: 250px;
    
  margin: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.card-content0 h1 {
  
 
font-size: 20px;
  margin-bottom: 9px;
  /* margin-left: 30px; */
  font-family: "Fredoka",sans-serif; 
  /* font-weight: bold; */
  color: black;
  text-align: center;
  

}

.card-content0 {
  padding: 12px;
}

#imgcover{
  width: 100%;
height: 180px;
border-radius: 5px;
     
}

.card-content0 .btn{

font-size: 13px;

}

.card-content0 a{

font-size: 13px;

}

.order-button-1 {
  /* background-color: #ffcc00; */
  border: none;
  width:100px;
  height: 20;

  font-size: 20px;

  /* padding: 10px 15px; */
  cursor: pointer;
}


.primary0:hover{
    color: #024c9b;
    
    padding-bottom: 10px;
    cursor: pointer;
    text-decoration: underline;
}

.arrow {
  background-color: transparent;
  border: none;
  font-size: 30px;
  cursor: pointer;
  z-index: 1;
}

.left {
  position: absolute;
  left: 10px;
}

.right {
  position: absolute;
  right: 10px;
}


@media (max-width: 768px) {
  .card0 {
    min-width: 200px;
  }
}

#videohead{

margin-right: 180px;

}
.heading3{
margin-top: 170px;
  font-size: 33px;
  font-weight: 700;
  white-space: nowrap;

}

.small-text2{
color: #9e9c9c;
/* font-size: 20px; */
  font-size: 20px;
}

#videobox{

width: 100%;
margin-top: 20px;
}
#Video{

height: auto;
width: 100%;
border-radius: 50px;
/* padding: 30px; */
padding: 30px;
position: relative;
}
#videotext{
color: white;
margin-top: -500px;
position: relative;


}
#text2{
font-size: 37px;
font-weight: bold;

}
#videobtn{

  border-top-left-radius: 20px;
  border-bottom-right-radius: 30px;
  text-align: center;
  width: 150px;
  padding: 15px;
  font-size: 16px;
}

.clients-section {
  background-color: #f2f2f2;
  padding: 30px;
  margin-top: 350px;
  width: 100%;
  height: auto;
}

#card-container2 {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  height: 300px;
}
#clientshead2{
  color: #838282;
  font-size: 20px;
}
.card-subtitle{

font-weight: bold;
}

/* Footer Styling */


footer {
  
    color: white;
    margin-top: 150px;
    background-color: #0e0c0c;
    width: 100%;
    height: auto;

    padding: 40px 40px
}

#footbox {
/* padding: 50px; */
 margin-top: 30px;

}
#boxf{
    /* margin-top: -20px */
}
 
footer h5 {
    font-size: 19px;
    margin-bottom: 1rem;
    /*   margin-top:40px;
*/
}

footer ul {
    padding: 10px;
    margin: 0;
    list-style: none;
}

    footer ul li {
        margin-bottom: 10px; /* Increased vertical space between list items */
    }

footer p {
    margin-bottom: 20px;
}

.small {
    font-size: 14px;
}

footer .form-control {
    border-radius: 0;
    margin-bottom: 10px; /* space between form and button */
}

#search {
    height: 30px;
    font-size: 14px;
}

footer .btn {
    border-radius: 0;
    background-color:#0d6efd;
    border: none;
    outline: none;
    height: 30px;
    width: 70px;
    font-size: 14px;
}

#move2 {
font-size: 18px;
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
/* ===== GLOBAL RESPONSIVE FIX ===== */

img {
  max-width: 100%;
  height: auto;
}

/* Prevent overflow */
body, html {
  overflow-x: hidden;
}

/* Containers spacing fix */
.container,
.container-fluid {
  padding-left: 15px;
  padding-right: 15px;
}

/* Hero responsive */
@media (max-width: 768px) {
  .hero {
    height: auto;
    padding: 160px 20px 100px;
    text-align: center;
  }

  #tophead {
    font-size: 1.5rem;
  }
}

/* Product cards responsive */
@media (max-width: 992px) {
  .card-container {
    justify-content: center;
    gap: 20px;
  }

  #pro {
    width: 90% !important;
    margin: auto;
  }
}

/* Cover section responsive */
@media (max-width: 992px) {
  #covertext {
    position: static;
    margin: 20px 0;
    text-align: center;
  }
}

/* iPhone section responsive */
@media (max-width: 992px) {
  #iphone {
    width: 90%;
    margin: 20px auto;
    height: auto;
  }
}

/* Video text responsive */
@media (max-width: 992px) {
  #videotext {
    position: static;
    margin-top: 20px;
    text-align: center;
  }

  #text2 {
    font-size: 24px;
  }
}

/* Clients cards responsive */
@media (max-width: 992px) {
  #card-container2 {
    height: auto;
  }

  #card-container2 .card {
    width: 90% !important;
  }
}

/* Footer responsive spacing */
@media (max-width: 768px) {
  footer {
    margin-top: 80px;
  }
}


             </style>



    </head>

    <body>
        <header>


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
                        <a href="./Home.php"class="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="./Home.php"class="">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="./Products.php"class="">Products</a>
                    </li>

                    <li class="nav-item">
                        <a href="./Contact.php"class="">Contact</a>
                    </li>
                  
               <li class="nav-item">
              <a href="logout.php" id="log" class="nav-link d-lg-none text-center" >Logout</a>
              </li>

                </ul>
            </div>
        </div>
    </nav>

</header>




    <div class="hero">
        <div class="hero-content text-white text-center">
            <div id="heading">
                <h6>Welcome to TechPlug</h6>
                <h1 id="tophead">High Performance & Elegent Design</h1>
            </div>

            <div id="btnpart" class="mt-4">
              <a href="./Contact.php" class="btn btn-primary me-3" id="btn1">Contact Us</a>

                <!-- <button class="btn btn-primary me-3" id="btn1">Contact us <a href="./Contact.php"></button>
                -->
               <a href="#survey-video" class="btn btn-primary me-3" id="btn1">Survey</a>

            </div>

            <div class="social-icons">
                <a href="" target="_blank" id="socialbox"><i class="fa-solid fa-mobile-screen" id="face"></i></a>
                <a href="" target="_blank" id="socialbox"><i class="fa-solid fa-headphones" id="face"></i></a>
                <a href="" target="_blank" id="socialbox"><i class="fa-solid fa-microphone" id="face"></i></a>
                <a href="" target="_blank" id="socialbox"><i class="fa-brands fa-instagram" id="face"></i></a>

            </div>

        </div>
    </div>

    </header>
        <main>



  <div class="card-container">
   
    <div class="card2">
    
    <img src="../images/brand1.png" alt="">
    
    <div class="card-coontent">
     <a href="./Menu1.php" id="category">

   </div>
   </div>
      
   <div class="card2">
    
    <img src="../images/brand2.png" alt="">
    
    <div class="card-coontent">
   <a href="./Images/Menu1.php" id="category">
   </div>
   </div>
   
   
   <div class="card2">
    
    <img src="../images/brand4.png" alt="">
    
    <div class="card-coontent">
   <a href="./Images/Menu1.php" id="category">
   </div>
   </div>

   <div class="card2">
    
    <img src="../images/brand3.png" alt="">
    
    <div class="card-coontent">
   <a href="./Images/Menu2.php" id="category">
   </div>
   </div>
   
   <div class="card2">
    
    <img src="../images/brand5.png" alt="">
    
    <div class="card-coontent">
   <a href="./Images/Menu1.php" id="category">
   </div>
   </div>
   
   <div class="card2">
    
    <img src="../images/brand6.webp" alt="">
    
    <div class="card-coontent">
   <a href="./Images/Menu1.php" id="category">
   </div>
   </div>
   <div class="card2">
    
    <img src="../images/brand8.png" alt="">
    
    <div class="card-coontent">
   <a href="./Images/Menu1.php" id="category">
   </div>
   </div>
   
    <div class="card2">
    
    <img src="../images/brand1.png" alt="">
    
    <div class="card-coontent">
     <a href="" id="category">

   </div>
   </div>
      

   </div>


<br>

<div class="card-container">
 
<div class="card" style="width: 18rem;" id="pro">
        <h5 class="card-title" id="prohead">Earphones</h5>
            <h6 style="color: red; margin-left: 10px;">Rs.2000</h6>
  <img src="../images/Earphones.png" class="card-img-top" alt="..." style= height:270px;>
  <div class="card-body text-center">
    <a href="./Products.php" class="btn btn-primary">Add to cart</a>

  </div>

</div>

<div class="card" style="width: 18rem;" id="pro">
        <h5 class="card-title" id="prohead">Microphone</h5>
               <h6 style="color: red; margin-left: 10px;">Rs.2000</h6>
  <img src="../images/Microphone.png" class="card-img-top" alt="..."style= height:270px;>
  <div class="card-body text-center">
    <a href="./Products.php" class="btn btn-primary">Add to cart</a>
  </div>
</div>

<div class="card" style="width: 18rem;" id="pro">
        <h5 class="card-title"id="prohead">Headphones</h5>
  <h6 style="color: red; margin-left: 10px;">Rs.2000</h6>


  <img src="../images/headphone.png" class="card-img-top" alt="..."style= height:270px;>
  <div class="card-body text-center">
    <a href="./Products.php" class="btn btn-primary">Add to cart</a>
  </div>
</div>

<div class="card" style="width: 18rem;" id="pro">
        <h5 class="card-title"id="prohead">USB cable</h5>
         <h6 style="color: red; margin-left: 10px;">Rs.2000</h6>

  <img src="../images/cable.webp" class="card-img-top" alt="..."style= height:270px;>
  <div class="card-body text-center">
    <a href="./Products.php" class="btn btn-primary">Add to cart</a>
  </div>
</div>


</div>

<br><br><br><br>


<div class="container" id="coverbox">
    <img src="../images/cover.jpg" alt="" id="coverimg">
      <div id="covertext">
      
        <h1  >Premium Standards</h1>
      <br> 
      <h4>Elevate Your life with electronics designed for best performance</h4>
       
      <br>
      <p>  Lorem ipsum, dolor sit  amet consectetur adipisicing elit.
         Sed eaque delectus illo repellat <br>
     alias eius eum. Est Lorem ipsum, dolor sit  amet consectetur adipisicing elit. Sed eaque <br>
     delectus illo repellat voluptates quam consectetur,
     alias eius eum. Est labore, dolore <br>minima rerum blanditiis cum minima rerum blanditiis cum minima rerum
     </p>
      <a href= "./Products.php" class="btn btn-primary mt-2">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>

<br><br><br><br><br>

             
      <div class="container">
        <div class="row text-center">
      <div>
    
           <h1 class="text-center" id="heading">Power Your Digital Life</h1>
          </div>
     </div>
      </div>

<div class="card-container">

<div class="card"  id="iphone">
  <img src="../images/iphone2.jpg" class="card-img-top" alt="..." style="height: 100%;">
  <div class="card-body" id="i">
    <h4 class="card-title">iphone 12 </h4>
    <p class="card-text">
        Peak perfection Sleek Designs
       
    </p>

    <a href="./Products.php" class="btn btn-primary">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
  
</div>
</div>
<div class="card" id="iphone">
  <img src="../images/iphone.jpg" class="card-img-top" alt="..." style="height: 100%;">
  <div class="card-body" id="i">
    <h4 class="card-title">iphone 17</h4>
    <p class="card-text">Peak perfection Sleek Designs
</p>
    <a href="./Products.php" class="btn btn-primary">Show Now <i class="fa-solid fa-arrow-right"></i></a>
  </div>
</div>
</div>



<div class="container">
<h2 class="heading2">
  Most Sold This Week →
  <span class="small-text"> Headphones → Smartwatches → Chargers → Microphones</span>
</h2>

</div>


<div class="card-container">
 
<div class="card" style="width: 18rem;" id="pro">
        <h5 class="card-title" id="prohead">Earphones</h5>
            <h6 style="color: red; margin-left: 10px;">Rs.2000</h6>
  <img src="../images/Earphones.png" class="card-img-top" alt="..." style="height: 270px;">
  <div class="card-body text-center">
    <a href="./Products.php" class="btn btn-primary">Add to cart</a>
  </div>
</div>


<div class="card" style="width: 18rem;" id="pro">
        <h5 class="card-title"id="prohead">Headphones</h5>
  <h6 style="color: red; margin-left: 10px;">Rs.2000</h6>


  <img src="../images/headphone3.jpg" class="card-img-top" alt="..." style="height: 270px">
  <div class="card-body text-center">
    <a href="./Products.php" class="btn btn-primary">Add to cart</a>
  </div>
</div>
<div class="card" style="width: 18rem;" id="pro">
        <h5 class="card-title" id="prohead">Microphone</h5>
               <h6 style="color: red; margin-left: 10px;">Rs.2000</h6>
  <img src="../images/Microphone.png" class="card-img-top" alt="..."style="height: 270px">
  <div class="card-body text-center">
    <a href="./Products.php" class="btn btn-primary">Add to cart</a>
  </div>
</div>

</div>


<br><br><br><br><br>


             
      <div class="container">
        <div class="row text-center">
      <div>
    
           <h1 class="text-center" id="heading">Explore more Products</h1>
          </div>
     </div>
      </div>

<br><br>
<div class="carousel-container0">
  <button class="arrow left" id="prev">&#10094;</button>
  
  <div class="card-container0">
    <div class="card0">
      <img src="../images/watches2.jpg" alt="" id="imgcover">
      <div class="card-content0">
        <h1>Smartwatch</h1>
        <button class="btn btn-warning" onclick="openDetailPage('Italian food2')" id="button0">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>
    <div class="card0">
      <img src="../images/phones2.webp" alt="" id="imgcover">
      <div class="card-content0">
        <h1>Wireless Gaming Headphones</h1>
        <button class="btn btn-warning"onclick="openDetailPage('pasta2')"  id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>
    <div class="card0">
      <img src="../images/power banks.jpg" alt="Delicious Italian pasta dish" id="imgcover">
      <div class="card-content0">
        <h1>Powerbanks</h1>
        <button class="btn btn-warning" onclick="openDetailPage('pasta')"id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>
   
    <div class="card0">
      <img src="../images/speakers.jpg" alt="Delicious Italian pasta dish" id="imgcover">
      <div class="card-content0">
        <h1>Speakers</h1>
        <button class="btn btn-warning"onclick="openDetailPage('Italian food5')" id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>

    <div class="card0">
      <img src="../images/watche3.jpg" alt="Delicious Italian pasta dish"id="imgcover">
      <div class="card-content0">
        <h1>Smartwatch</h1>
        <button class="btn btn-warning" onclick="openDetailPage('Italian food1')" id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>

    
    <div class="card0">
      <img src="../images/micro.jpg" alt="Delicious Italian pasta dish"id="imgcover">
      <div class="card-content0">
        <h1>Microphone</h1>
        <button class="btn btn-warning"onclick="openDetailPage('Italian food2')" id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>
    
    <div class="card0">
      <img src="../images/cable.webp" alt="Delicious Italian pasta dish"id="imgcover">
      <div class="card-content0">
        <h1>Chargers</h1>
        <button class="btn btn-warning"onclick="openDetailPage('Italian food2')" id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>
    
    <div class="card0">
      <img src="../images/chargers2.jpg" alt="Delicious Italian pasta dish"id="imgcover">
      <div class="card-content0">
        <h1>Chargers</h1>
        <button class="btn btn-warning" onclick="openDetailPage('Italian food4')" id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>
    
    
    <div class="card0">
      <img src="../images/micro2.jpg" alt="Delicious Italian pasta dish"id="imgcover">
      <div class="card-content0">
        <h1>Microphone</h1>
        <button class="btn btn-warning"onclick="openDetailPage('Italian food2')" id="order-button-1">Order Now</button><br>
        <a class="primary0" href="#">See description</a>
      </div>
    </div>
    
  </div>

  <button class="arrow right" id="next">&#10095;</button>
</div>

<section id="survey-video"></section>

<div class="container" id="videohead">
<h2 class="heading3">
    Capture Every Detail →
  <span class="small-text2"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
</h2>

</div>


<div class="text-center" id="videobox">
<video id="Video"   controls>
<source src="../images/video-06.mp4" type="video/mp4">
</video>
<div id="videotext">
  
<h6 id="text">
Highest Quality</h6>
<h1 id="text2">Redefine Your Sound With</h1>
<h1 id="text2"> Precision Microphones</h1>
<a href="./Products.php" class="btn btn-primary mt-3" id="videobtn">Shop Now <i class="fa-solid fa-arrow-right"></i></a>
</div>
</div>



<div class="container-fluid clients-section" id="clients">

  <div class="row text-center">
    <h1 id="heading">Our Happy Clients</h1>
    <h4 id="clientshead2">See what our satisfied customers have to say about our electronic accessories.</h4>

</div>

  <div class="card-container" id="card-container2">

    <div class="card" style="width: 25rem;">
          <div class="card-body">
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star"style="color: yellow; font-size:13px"></i>
        <h5 class="card-subtitle mt-4 mb-2" style="font-size: 18px;">Best Customer Service</h5>
        <p class="card-text mt-4"style="font-size: 13px;">Lorem ipsum dolor sit amet consectetur asperiores necessitatib<br>
          adipisicing elit. Numquam commodi asperiores necessitatib<br>
          us saepe laborum beatae assumenda error autem in odio cum <br>
          adipisci consectetur, nam quidem quasi perferendis omnis,<br>
          us saepe laborum beatae assumenda error autem in odio cum <br>                
          adipisci consectetur, nam quidem quasi perferendis omnis,<br>

          </p>
      </div>

    </div>

    <div class="card" style="width:  25rem;">
      <div class="card-body">
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star"style="color: yellow; font-size:13px"></i>
        <h5 class="card-subtitle mt-4 mb-2" style="font-size: 18px;">Best Customer Service</h5>
        <p class="card-text mt-4"style="font-size: 13px;">Lorem ipsum dolor sit amet consectetur asperiores necessitatib<br>
          adipisicing elit. Numquam commodi asperiores necessitatib<br>
          us saepe laborum beatae assumenda error autem in odio cum <br>
          adipisci consectetur, nam quidem quasi perferendis omnis,<br>
          us saepe laborum beatae assumenda error autem in odio cum <br>                
          adipisci consectetur, nam quidem quasi perferendis omnis,<br>

          </p>
      </div>
    </div>

    <div class="card" style="width: 25rem;">
      <div class="card-body">
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star" style="color: yellow; font-size: 13px;"></i>
        <i class="fa-solid fa-star"style="color: yellow; font-size:13px"></i>
        <h5 class="card-subtitle mt-4 mb-2" style="font-size: 18px;">Best Customer Service</h5>
        <p class="card-text mt-4"style="font-size: 13px;">Lorem ipsum dolor sit amet consectetur asperiores necessitatib<br>
          adipisicing elit. Numquam commodi asperiores necessitatib<br>
          us saepe laborum beatae assumenda error autem in odio cum <br>
          adipisci consectetur, nam quidem quasi perferendis omnis,<br>
          us saepe laborum beatae assumenda error autem in odio cum <br>                
          adipisci consectetur, nam quidem quasi perferendis omnis,<br>

          </p>
      </div>
    </div>

  </div>
</div>
      
</main>


    <footer class="text-white">
        <div class="container" id="confoot">
            <div class="row justify-content-center text-center" id="footbox">

                <div class="col-md-3 mx-auto" id="boxf">
                    <img src="../images/Logo.jpg" alt="Logo" class="img-fluid mb-3" style="max-width: 200px;" id="navlogo">

                    <p class="small">Subscribe our app for more updates, get free discounts & experience surveys.</p>
                    <p class="small"><i class="fa-solid fa-location-dot me-2" style="font-size: 12px;"></i>Defence area North, Karachi-10082</p>
                    <p class="small"><i class="fa-solid fa-envelope  me-2" style="font-size: 12px;"></i>Techplug@gmail.com</p>
                </div>

                <div class="col-md-3 mx-auto" id="boxf">

                    <h5 class="fw-bold mb-3">Helpful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="./About.php" class="text-white text-decoration-none small">About Us</a></li>
                        <li><a href="./Contact.php" class="text-white text-decoration-none small">Help Center</a></li>
                        <li><a href="" class="text-white text-decoration-none small">Our Services</a></li>
                        <li><a href="./Contact.php" class="text-white text-decoration-none small">General Inquiries</a></li>
                    </ul>
                </div>

               
                <div class="col-md-3 mx-auto" id="boxf">

                    <h5 class="fw-bold mb-3">Explore More</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none small">FAQs</a></li>
                        <li><a href="#" class="text-white text-decoration-none small">Order Status</a></li>
                        <li><a href="#" class="text-white text-decoration-none small">Payment Options</a></li>
                        <li><a href="#" class="text-white text-decoration-none small">Shipping Rates</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-md-3 mx-auto" id="boxf">

                   
                    <h5 class="fw-bold mb-3">Newsletter</h5>
                    <p class="small">Stay updated with our latest news and offers.</p>

                    <form class="d-flex flex-column flex-md-row align-items-center justify-content-center">

                        <input type="email" class="me-md-2 mb-2 mb-md-0" placeholder="Your Email Address" style="max-width: 300px;" id="search">
                        <button type="submit" class="btn text-white">Send</button>
                    </form>
                </div>
            </div>

            <hr class="bg-light">

            <div class="row align-items-center">
                <div class="col-md-8">
                    <p class="small mb-0">
                        &copy; 2019: Design by
                        <a href="#" class="text-primary text-decoration-none">The Providers</a>
                    </p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <span class="me-2 small">Payment:</span>
                    <a href="#"><i class="fa-brands fa-cc-visa me-2" id="move2"></i></a>
                    <a href="#"><i class="fa-brands fa-cc-paypal me-2" id="move2"></i></a>
                    <a href="#"><i class="fa-brands fa-google-pay me-2" id="move2"></i></a>
                    <a href="#"><i class="fa-brands fa-cc-apple-pay" id="move2"></i></a>
                </div>
            </div>
        </div>
    </footer>

   



<script>

    const cardContainer0 = document.querySelector('.card-container0');
const cards = document.querySelectorAll('.card0');
let currentIndex = 0;
const totalCards = cards.length;

document.getElementById('next').addEventListener('click', () => {
  if (currentIndex < totalCards - 4) {
    currentIndex++;
    updateCarousel();
  }
});

document.getElementById('prev').addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
    updateCarousel();
  }
});

function updateCarousel() {
  const cardWidth = cards[0].offsetWidth;
  cardContainer0.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
}
    

//scroll//


window.addEventListener("scroll", function () {
  const navbar = document.querySelector(".navbar");

  if (window.scrollY > 80) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});
</script>


      






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

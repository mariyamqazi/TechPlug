<?php

session_start();

include('../database/db.php'); 

if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST ['phone'];
$textbox = $_POST['textbox'];

$sql = "INSERT INTO feedback(name,email,address,phone,textbox) VALUES ('$name','$email','$address','$phone','$textbox')";
$result = $conn->query($sql);

if($result){

echo "<script>alert('Message sent successfully') </script>";
} else{

 echo "<script> alert ('Message not delivered') </script>";

}


}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>  Welcome-<?php echo $_SESSION['username']?> || TechPlug</title>
      <link rel="icon" sizes="64×64" href="../images/Logo.jpg">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    *{
      font-family: 'Poppins', sans-serif;
       margin: 0;
  padding: 0;
  box-sizing: border-box;
    }

    body{
      /* background: linear-gradient(135deg,#0f2027,#203a43,#2c5364); */
     background-color: #1e293b;
     
      min-height: 100vh;
      color: #fff;
    }

   

  html {
  scroll-behavior: smooth;
  }
  



    .contact-section{
      padding: 40px 0;
    }

    .contact-card{
      background: #ffffff;
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.3);
      color: #333;
    }


    .btn-back {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  /* margin-top: -13px; */
  padding: 8px 8px;
        background: linear-gradient(45deg,#0d6efd,#00c6ff);
  color: #fff;
  font-size: 10px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 500;
  transition: 0.3s;
}

.btn-back:hover {
  transform: translateY(-2px);
}

    .contact-title{
      font-weight: 700;
      margin-bottom: 10px;
    }

    .contact-subtitle{
      color: #777;
      margin-bottom: 30px;
    }

    .form-control{
      border-radius: 12px;
      padding: 5px 15px;
      border: 1px solid #ddd;
      transition: 0.3s;
    }

    .form-control:focus{
      border-color: #0d6efd;
      box-shadow: none;
    }

    .btn-techplug{
      background: linear-gradient(45deg,#0d6efd,#00c6ff);
      border: none;
      border-radius: 10px;
      padding: 10px 20px;
      font-weight: 500;
      transition: 0.3s;
      color: #fff;
      font-size: 14px;
    }

    .btn-techplug:hover{
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .contact-info{
      background: linear-gradient(135deg,#0d6efd,#00c6ff);
      border-radius: 20px;
      padding: 40px;
      height: 100%;
      color: #fff;
    }

    .info-box{
      margin-bottom: 25px;
    }

    .info-box h6{
      font-weight: 600;
      margin-bottom: 5px;
    }

    .map-container{
      margin-top: 50px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    iframe{
      width: 100%;
      height: 350px;
      border: 0;
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

@media (max-width: 768px) {
  footer {
    margin-top: 80px;
  }
}



  </style>
</head>
<body>


<section class="contact-section">
  <div class="container">

    <div class="text-center mb-5">
      <h1 class="fw-bold">Contact TechPlug</h1>
      <p class="text-light">We’d love to hear from you. Send us a message 🚀</p>
    </div>

    <div class="row g-4">

      <!-- Contact Form -->
      <div class="col-lg-7">
        <div class="contact-card">
           <div class="mb-2">
      <a href="./Home.php" class="btn-back">
        <i class="fa-solid fa-arrow-left"></i> Back to Home
      </a>
    </div>
          <h3 class="contact-title">Send Message</h3>
          <p class="contact-subtitle">Fill the form and our team will get back to you.</p>

          <form action ="./Contact.php" method="post">
            <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
              </div>

              <div class="col-md-6 mb-3">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>
            </div>
  <div class="row">
              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="address" placeholder="Your Address" required>
              </div>

              <div class="col-md-6 mb-3">
                <input type="text" class="form-control" name="phone" placeholder="Your Phone Number" required>
              </div>
            </div>


            <!-- <div class="mb-3">
              <input type="text" class="form-control" placeholder="Address" name="address" required>
            </div>

             
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Phone Number" name="phone" required>
            </div> -->
            <div class="mb-3">
              <textarea class="form-control" rows="5" name="textbox" placeholder="Your Message" required ></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-techplug">Send Message</button>
          </form>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-5">
        <div class="contact-info">
          <h3 class="fw-bold mb-4">Get in Touch</h3>

          <div class="info-box">
            <h6>📍 Address</h6>
            <p>TechPlug HQ, Main Tech Street, Islamabad, Pakistan</p>
          </div>

          <div class="info-box">
            <h6>📞 Phone</h6>
            <p>+92 300 1234567</p>
          </div>

          <div class="info-box">
            <h6>✉️ Email</h6>
            <p>support@techplug.com</p>
          </div>

          <div class="info-box">
            <h6>🕒 Working Hours</h6>
            <p>Mon – Sat : 10 AM – 8 PM</p>
          </div>
        </div>
      </div>

    </div>

    <!-- Google Map -->
    <div class="map-container mt-5">
      <iframe
    
        src="https://www.google.com/maps?q=Lahore%20Pakistan&output=embed">
      </iframe>
    </div>

  </div>
</section>



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


</body>
</html>

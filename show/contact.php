<?php
    include("../database.php");

    if(isset($_GET['get_course_id'])){
        $course_id = $_GET["get_course_id"];
     }else{
        $course_id = '';
        //header('location:home.php');
     }

    
     if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
     }
     else{
        $user_id = '';
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
    <?php include 'header.php'; ?>

    <section class="contact">

        <div class="row">
     
           <div class="image">
              <img src="images/contact-img.svg" alt="">
           </div>

           <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.868604106882!2d121.26287893081934!3d24.970584741806945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34681f5490d43fcd%3A0x186eb5a7e52b332b!2z5YWD5pm65aSn5a24!5e0!3m2!1szh-TW!2stw!4v1684340473614!5m2!1szh-TW!2stw" 
                width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
           </div>
     
        </div>
     
        <div class="box-container">
     
           <div class="box">
              <i class="fas fa-phone"></i>
              <h3>phone number</h3>
              <a href="tel:1234567890">03 463 8800</a>
           </div>
           
           <div class="box">
              <i class="fas fa-envelope"></i>
              <h3>傳真</h3>
              <a>(03)463-8884</a>
           </div>
     
           <div class="box">
              <i class="fas fa-map-marker-alt"></i>
              <h3>office address</h3>
              <a href="#">320桃園市中壢區遠東路135號</a>
           </div>
     
        </div>
     
     </section>
                    
    
    <?php include 'footer.php'; ?>
    
    <!-- custom js file link -->
    <script src="script.js"></script>

</body>
</html>
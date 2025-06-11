 <!-- 連線資料庫 -->
 <?php
   include("../database.php");

   if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
   }
   else{
      $user_id = '';
   }
?>

<?php

   // 獲得所有課程數量
   $find_all_course = $conn->execute_query("SELECT * FROM `course`");
   $total_course_num = mysqli_num_rows($find_all_course);
   
   // 獲得所有評論數量
   $find_all_comment = $conn->execute_query("SELECT * FROM `comment`");
   $total_comment_num = mysqli_num_rows($find_all_comment);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
   <?php include 'header.php'; ?>    
   
   <section class="home-grid">

      <h1 class="heading">Introduction</h1>

      <div class="box-container">

         <div class="box">
            <h3 class="title">likes and comments</h3>
            <p class="likes">total courses : <span><?php echo $total_course_num;?></span></p>
            <a href="#" class="inline-btn">view likes</a>
            <p class="likes">total comments : <span><?php echo $total_comment_num;?></span></p>
            <a href="#" class="inline-btn">view comments</a>
            
            <?php
               if(!empty($user_id)){                 
            ?>
                  <p class="likes">add course<span></span></p>
                  <a href="add_course.php" class="inline-btn">Add Course</a>
            <?php
               }
            ?>
            
         </div>

         <div class="box">
            <h3 class="title">top categories</h3>
            <div class="flex">
                  <a href="#"><i class="fas fa-code"></i><span>development</span></a>
                  <a href="#"><i class="fa-solid fa-bug"></i><span>bug</span></a>
                  <a href="#"><i class="fas fa-pen"></i><span>design</span></a>
                  <a href="#"><i class="fas fa-chart-line"></i><span>marketing</span></a>
                  <a href="#"><i class="fa-solid fa-brain"></i><span>AI</span></a>
                  <a href="#"><i class="fa-solid fa-cloud-arrow-up"></i><span>cloud</span></a>
                  <a href="#"><i class="fas fa-cog"></i><span>software</span></a>
                  <a href="#"><i class="fa-solid fa-camera"></i><span>video</span></a>
            </div>
         </div>

         <div class="box">
            <h3 class="title">popular topics</h3>
            <div class="flex">
                  <a href="#"><i class="fab fa-html5"></i><span>HTML</span></a>
                  <a href="#"><i class="fab fa-css3"></i><span>CSS</span></a>
                  <a href="#"><i class="fab fa-js"></i><span>javascript</span></a>
                  <a href="#"><i class="fab fa-react"></i><span>react</span></a>
                  <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
                  <a href="#"><i class="fab fa-bootstrap"></i><span>bootstrap</span></a>
            </div>
         </div>

         <!-- <div class="box">
            <h3 class="title">become a tutor</h3>
            <p class="tutor">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Perspiciatis, nam?</p>
            <a href="teachers.php" class="inline-btn">get started</a>
         </div> -->

      </div>

   </section> 
   


   <?php include 'footer.php'; ?>    
    
    <!-- custom js file link -->
    <script src="script.js"></script>
</body>
</html>
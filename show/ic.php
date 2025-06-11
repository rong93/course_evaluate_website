 <!-- 連線資料庫 -->
 <?php
   include("../database.php");

   $sql = "SELECT * FROM course WHERE department = 3";
   $result = mysqli_query($conn, $sql);
   $count = 0;
   
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
    <title>IC</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php include 'header.php'; ?>    

   <section class="playlist-videos">

      <h1 class="heading">資訊傳播學系</h1>
   
      <div class="box-container">

         <!-- 顯示出所有該系課程 -->

         <?php
            foreach ($result as $r){
               $course_id = $r["course_id"];
               $course_name = $r["course_name"];
               $teacher = $r['teacher'];
               $picture_num = rand(1,9);
               $count += 1;
         ?>         
               
         <a id= <?php echo $course_id; ?> class="box" href="course.php?get_course_id=<?= $course_id;?>" onclick="go_to_course(this)">
            <i class="fas fa-play"></i>
            <div class="tutor">
               <img src="images/pic-<?php echo $picture_num; ?>.jpg" alt="">
               <div>
                  <h3 id="course_name<?php echo $course_id; ?>"><?php echo $course_name; ?></h3>
               </div>
            </div>
            <h3 id="teacher<?php echo $course_id; ?>"><?php echo $teacher; ?></h3>
         <div href="#" class="inline-btn">view</div>
         </a>
         
         <?php
            }
         ?>         
          
      </div>
   
   </section>

    
   <?php
      include 'footer.php'; 
   ?>    

   <!-- custom js file link -->
   <script src="script.js" type = "text/javascript"></script>

</body>
</html>

<?php
   mysqli_close($conn)
?>
<!-- 關閉資料庫 -->


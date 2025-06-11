<?php
   include("../database.php");

   if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
   }
   else{
      $user_id = '';
   }
//    echo "<script type='text/javascript'>alert('新增課程成功');</script>";

?>

<?php
   if(isset($_POST['submit'])){

    $course_name = $_POST['course_name'];
    $teacher_name = $_POST['teacher_name'];
    $department = $_POST['department'];
    if($department == '資訊工程學系'){
        $department = 1;
    }
    elseif($department == '資訊學院英語學士班'){
        $department = 2;
    }
    elseif($department == '資訊傳播學系'){
        $department = 3;
    }
    elseif($department == '資訊管理學系'){
        $department = 4;
    }
    
    $score1 = 0;
    $score2 = 0;
    $score3 = 0;
    $score4 = 0;
    $number_of_people = 0;
    date_default_timezone_set('Asia/Taipei');
    $now_time = date("Y-m-d H:i:s");
    
    $search_result = $conn->execute_query("SELECT * FROM course WHERE course_name = ? AND teacher = ?", [$course_name, $teacher_name]);
    $same_coure_num = mysqli_num_rows($search_result);

    if($same_coure_num != 0){
        echo "<script type='text/javascript'>alert('此課程已存在');</script>";
    }
    else{
        $add_course = $conn->execute_query('INSERT INTO course (course_name, teacher, department, star_1, star_2, star_3, star_4, number_of_people, `time`)
                                    VALUES (?,?,?,?,?,?,?,?,?)',[$course_name, $teacher_name, $department, $score1, $score2, $score3, $score4, $number_of_people, $now_time]);
        echo "<script type='text/javascript'>alert('新增課程成功');</script>";
    }
        
    
   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <?php include 'header.php'; ?>    

   
     
   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>Add Course</h3>

         <p>課程名稱 <span>*</span></p>
         <input type="text" name="course_name" placeholder="course name" required maxlength="50" class="box">

         <p>教授名稱 <span>*</span></p>
         <input type="text" name="teacher_name" placeholder="teacher name" required maxlength="20" class="box">
        
         <p>系所名稱 <span>*</span></p>
         <input type="text" name="department" placeholder="department" required maxlength="20" class="box">

         <input type="submit" value="新增課程" name="submit" class="btn">
      </form>


   
   </section>

    
   <?php include 'footer.php'; ?>    

    <!-- custom js file link -->
    <script src="script.js"></script>
</body>
</html>
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

<!-- 新增星級評論 -->
<?php
    if(isset($_POST['submit_evaluation'])){
        // echo "<script type='text/javascript'>alert('hello');</script>";
        // echo "<script type='text/javascript'>alert('$course_id');</script>";

        // 要新增的分數
        $score_1 = $_POST['score_1'];
        $score_2 = $_POST['score_2'];
        $score_3 = $_POST['score_3'];
        $score_4 = $_POST['score_4'];

        // 取得資料庫目前的分數
        $get_course_info = $conn->execute_query("SELECT * FROM course WHERE course_id = ?", [$course_id]);
        $row = $get_course_info->fetch_assoc();
        $score_1 += $row['star_1'];
        $score_2 += $row['star_2'];
        $score_3 += $row['star_3'];
        $score_4 += $row['star_4'];
        $people_num = $row['number_of_people']+1;

        // echo "<script type='text/javascript'>alert('$people_num');</script>";

        
        
        $update_scores1 = $conn->prepare("UPDATE `course` SET star_1 = ?  WHERE course_id = ?");
        $update_scores1->execute([$score_1, $course_id]);

        $update_scores2 = $conn->prepare("UPDATE `course` SET star_2 = ?  WHERE course_id = ?");
        $update_scores2->execute([$score_2, $course_id]);

        $update_scores3 = $conn->prepare("UPDATE `course` SET star_3 = ?  WHERE course_id = ?");
        $update_scores3->execute([$score_3, $course_id]);

        $update_scores4 = $conn->prepare("UPDATE `course` SET star_4 = ?  WHERE course_id = ?");
        $update_scores4->execute([$score_4, $course_id]);

        $update_num_of_people = $conn->prepare("UPDATE `course` SET  number_of_people = ? WHERE course_id = ?");
        $update_num_of_people->execute([$people_num, $course_id]);

        // echo "<script type='text/javascript'>alert('分數新增成功');</script>";
        header("location:course.php?get_course_id= $course_id&get_insert_score=True");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">

    <style>
        .input-number {
            font-size: 32px;
            max-width: 170px;
            flex: 1;
            display: inline-block;
            background: transparent;
            border: none;
            outline: none;
            font-family: Courier;
            color: #2d7bee;
            font-weight: bold;

            margin-right: auto;
            margin-left: auto;
            padding: 10px;
            }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>    
    
    <section class="form-container">

      <form action="" method="post">
        <h3>Evaluation</h3>

        <h3>課程難度</h3>
        <input type="number" name="score_1" value="5" max="10" min="0" class="input-number" required>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">


        <h3>作業/考試難度</h3>
        <input type="number" name="score_2" value="5" max="10" min="0" class="input-number" required >
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">


        <h3>私心推薦</h3>
        <input type="number" name="score_3" value="5" max="10" min="0" class="input-number" required>
        <hr style="height:2px;border-width:0;color:gray;background-color:gray">


        <h3>給分甜度</h3>
        <input type="number" name="score_4" value="5" max="10" min="0" class="input-number" required>

        
        <input type="submit" value="Evaluate new" name="submit_evaluation" class="btn">
        </form>
    </section>

    <!-- <form action="" method="post">
        <input type="number" value="3" max="10" min="0" class="input-number">
        <br>
        <br>
        <br>
        <input type="submit" name="submit" value="Submit" class="inline-btn" >
    </form> -->


    <?php include 'footer.php'; ?>    

    <!-- custom js file link -->
    <script src="script.js"></script>
</body>
</html>


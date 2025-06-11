<?php

    if(isset($_GET['get_course_id'])){
        $course_id = $_GET["get_course_id"];
     }else{
        $course_id = '';
        //header('location:home.php');
     }

    if(isset($_GET['get_insert_score'])){
        // echo "<script type='text/javascript'>alert('分數新增成功');</script>";
    }

     if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
     }
     else{
        $user_id = '';
     }
?>

 <!-- 連線資料庫 -->
 <?php
    include("../database.php");

    $result = $conn->execute_query("SELECT * FROM course WHERE course_id = ?", [$course_id]);
    $row = $result->fetch_assoc();
    // echo "<script type='text/javascript'>alert('$row[course_name]');</script>";
?>
<?php
    $course_id = $row["course_id"];
    $course_name = $row["course_name"];
    $teacher = $row['teacher'];

    // date_default_timezone_set('Asia/Taipei');
    // $now_time = date("Y-m-d H:i:s");
    // echo "<script type='text/javascript'>alert('$now_time');</script>";

?>

<!-- 新增留言 -->
<?php
    if(isset($_POST['add_comment'])){
        // echo "<script type='text/javascript'>alert('hello');</script>";
        if(!empty($_POST['comment_box'])){
            $comment = $_POST['comment_box'];

            // 第一種寫法
            // $add_comment_result = $conn->execute_query('INSERT INTO comment (course_name, teacher, comment_text)
            //                                                             VALUES (?,?,?)',[$course_name, $teacher, $_POST['comment_box']]);
            
            date_default_timezone_set('Asia/Taipei');
            $now_time = date("Y-m-d H:i:s");

            // 第二種寫法
            $insert_comment = $conn->prepare("INSERT INTO `comment`(course_name, teacher, comment_text, time, comment_user_id) VALUES(?,?,?,?,?)");
            $insert_comment->execute([$course_name, $teacher, $_POST['comment_box'], $now_time, $user_id]);

            //echo "<script type='text/javascript'>alert('$comment');</script>";
            
            // $message[] = 'new comment added!';

            echo "<script type='text/javascript'>alert('新增成功');</script>";
        }
    }
?>

<!-- 刪除留言 -->
<?php
    if(isset($_POST['delete_comment'])){

        $delete_comment_id = $_POST['comment_id'];
        // echo "<script type='text/javascript'>alert('$delete_comment_id');</script>";

        // $deletr_result = $conn->execute_query("DELETE * FROM comment WHERE comment_id = ?", [$delete_comment_id]);

        $delete_comment = $conn->prepare("DELETE FROM `comment` WHERE comment_id = ?");
        $delete_comment->execute([$delete_comment_id]);

        // echo "<script type='text/javascript'>alert('$a');</script>";


        echo "<script type='text/javascript'>alert('刪除成功');</script>";

    }
?>

<!-- 更新要編輯的留言 -->
<?php
    if(isset($_POST['update_now'])){

        $update_comment_id = $_POST['update_id'];
        $update_comment_txt = $_POST['update_box'];
        
        $update_comment = $conn->prepare("UPDATE `comment` SET comment_text = ? WHERE comment_id = ?");
        $update_comment->execute([$update_comment_txt, $update_comment_id]);
        echo "<script type='text/javascript'>alert('留言更新成功');</script>";

     }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>course</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include 'header.php'; ?>

    <!-- 編輯留言 start--> 
    <!-- 如果點擊編輯留言，這區才會出現 -->
    <?php
        if(isset($_POST['edit_comment'])){
            $edit_comment_id = $_POST['comment_id'];
                       
            $edit_comment_result = $conn->execute_query("SELECT * FROM comment WHERE comment_id = ?", [$edit_comment_id]);
            $row = $edit_comment_result->fetch_assoc();
            // $num_edit = mysqli_num_rows($edit_comment_result);

            // echo "<script type='text/javascript'>alert('$row[comment_text]');</script>";    
    ?>
    <section class="edit-comment">
        <h1 class="heading">Edit comment</h1>
        <form action="" method="post">
            <input type="hidden" name="update_id" value="<?= $row['comment_id']; ?>">
            <textarea name="update_box" class="box" maxlength="1000" required placeholder="please enter your comment" cols="30" rows="10"><?= $row['comment_text']; ?></textarea>
            <div class="flex">
                <a href="course.php?get_course_id=<?= $course_id; ?>" class="inline-option-btn">cancel edit</a>
                <input type="submit" value="update now" name="update_now" class="inline-btn">
            </div>
        </form>
    </section>
    <?php
        }
    ?>
    <!-- 編輯留言 end--> 

    <?php 
        $get_course_info = $conn->execute_query("SELECT * FROM course WHERE course_id = ?", [$course_id]);
        $row = $get_course_info->fetch_assoc();
        $evaluation_people_num = $row['number_of_people']; //評論人數
        $department = $row['department']; //學系
        $time = $row['time']; //課程加入時間

    ?>
    <!-- watch-course start -->
    <section class="watch-video">
        <div class="video-container">
            <div class="video">
                <!-- <video src="images/vid-1.mp4" controls poster="images/post-1-1.png" id="video"></video> -->
            </div>
            <h3 class="title">
                <?php 
                    if($department == 1){
                        echo '資訊工程學系';
                    }
                    elseif($department == 2){
                        echo '資訊學院英語學士班';
                    }
                    elseif($department == 3){
                        echo '資訊傳播學系';
                    }
                    else{
                        echo '資訊管理學系';
                    }
                ?>
            </h3>
            <div class="info">
                <p class="date"><i class="fas fa-calendar"></i><span><?php echo $time; ?></span></p>
                <p class="date"><i class="fas fa-heart"></i><span><?php echo $evaluation_people_num; ?> 人評分</span></p>
            </div>
            <div class="tutor">
                <img src="images/pic-<?php echo rand(1,9); ?>.jpg" alt="">
                <div>
                    <h3><?php echo $teacher; ?></h3>
                    <span><?php echo $course_name; ?></span>
                </div>
                <form action="" method="post" class="flex">
                    <?php
                        if(!empty($user_id)){ //----------------------------------------------------------if 有登入 就可以新增評論
                    ?>
                            <a href="evaluation.php?get_course_id=<?= $course_id;?>" class="inline-btn">Evaluation</a>
                    <?php
                        }else{ //----------------------------------------------------------else 否則 不行新增評論
                    ?>
                        <a href="#" class="inline-btn">登入後才能新增評分</a>
                    <?php
                        }//-----------------------------------------------------------------------------------end
                    ?>
                    
                </form>

            </div>
           
            
            <?php include '../rating/rating.php';?>
            

            <!-- <p class="description">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Itaque labore ratione, hic exercitationem mollitia obcaecati culpa dolor placeat provident porro.
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid iure autem non fugit sint. A, sequi rerum architecto dolor fugiat illo, iure velit nihil laboriosam cupiditate voluptatum facere cumque nemo!
            </p> -->
        </div>

    </section>
    <!-- watch-course end -->

    <!-- comment_start -->
    <?php
        $search_result = $conn->execute_query("SELECT * FROM comment WHERE course_name = ? AND teacher = ?", [$course_name, $teacher]);
        $comment_num = mysqli_num_rows($search_result);
        // echo "<script type='text/javascript'>alert('$rows[course_name]');</script>";
        // echo "<script type='text/javascript'>alert('$search_result');</script>";
    ?>
    <section class="comments">

        <h1 class="heading"><?php echo $comment_num; ?> comments</h1>

        <form action="" class="add-comment" method="post">
            <h3>add comments</h3>
            <textarea name="comment_box" placeholder="enter your comment" required maxlength="1000" cols="30" rows="10"></textarea>
            <?php
                if(!empty($user_id)){ //----------------------------------------------------------if 有登入 就可以新增留言
            ?>
                    <input type="submit" value="add comment" class="inline-btn" name="add_comment">
            <?php
                }else{ //----------------------------------------------------------else 否則 不行新增留言
            ?>
                <input type="submit" value="登入後才能留言" class="inline-btn" name="add_comment" disabled >
            <?php
                }//-----------------------------------------------------------------------------------end
            ?>

        </form>

        <h1 class="heading">user comments</h1>

        <div class="box-container">

            
            <?php
                // foreach ($rows as $row){
                if(mysqli_num_rows($search_result)>0){
                    while($row = mysqli_fetch_assoc($search_result)){
                        $comment_course_id = $row["comment_id"];
                        $comment_course_name = $row["course_name"];
                        $comment_teacher = $row["teacher"];
                        $comment_text = $row["comment_text"];
                        $comment_time = $row["time"];
                        $comment_user_id = $row['comment_user_id'];
                        $picture_num = $comment_user_id%9+1;

                        
            ?>

                        <?php
                            $get_user_info = $conn->execute_query("SELECT * FROM user_information WHERE user_id = ?", [$comment_user_id]);
                            $row = mysqli_fetch_assoc($get_user_info);
                            $comment_user_name = $row['name'];
                        ?>
                        <div class="box">
                            <div class="user">
                                <img src="images/pic-<?php echo $picture_num; ?>.jpg" alt="">
                                <div>
                                    <h3><?php echo $comment_user_name; ?></h3>
                                    <span><?php echo $comment_time; ?></span>
                                </div>
                            </div>
                            <div class="comment-box"><?php echo $comment_text; ?></div>

                            <form action="" method="post" class="flex-btn">
                                <input type="hidden" name="comment_id" value="<?= $comment_course_id; ?>">                       
                                    
                                <?php
                                    if($user_id == $comment_user_id){ //----------------------------------------------------------if 留言是登入者寫的 就可以編輯
                                ?>
                                        <button type="submit" name="edit_comment" class="inline-option-btn">edit comment</button>
                                        <button type="submit" name="delete_comment" class="inline-delete-btn" onclick="return confirm('delete this comment?');">delete comment</button>
                                <?php
                                    }else{ //----------------------------------------------------------else 否則 不行編輯
                                ?>
                                <?php
                                    }//-----------------------------------------------------------------------------------end
                                ?>
                            </form>

                        </div>

            <?php
                    }
                }
            ?>

        </div>

    </section>

    <!-- comment_end -->


    <?php include 'footer.php'; ?>

     <!-- custom js file link -->
    <script src="script.js"></script>

    <!-- 關閉資料庫 -->
    <?php
        mysqli_close($conn)
    ?>
    <!-- 關閉資料庫 -->

</body>
</html>

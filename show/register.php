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
   if(isset($_POST['submit'])){
      $user_name = $_POST['name'];
      $user_mail = $_POST['email'];
      $first_password = $_POST['first_pass'];
      $second_password = $_POST['second_pass'];


      $find_mail = $conn->execute_query("SELECT * FROM user_information WHERE mail = ?", [$user_mail]);

      if(mysqli_num_rows($find_mail) > 0){ #是否有重複mail

         // echo "<script type='text/javascript'>alert('$id');</script>";
         echo "<script type='text/javascript'>alert('mail已經存在');</script>";

      }
      else{
         if($first_password != $second_password){
            echo "<script type='text/javascript'>alert('密碼不相同');</script>";
         }
         else{

            $find_user_name = $conn->execute_query("SELECT * FROM user_information WHERE name = ?", [$user_name]);

            if(mysqli_num_rows($find_user_name) > 0){ #是否有重複name
               echo "<script type='text/javascript'>alert('name已經存在');</script>";
            }
            else{
               $insert_new_user = $conn->execute_query('INSERT INTO user_information (`name`,`mail`, `password`)            
                                                                     VALUES (?,?,?)',[$user_name, $user_mail, $first_password]);
               echo "<script type='text/javascript'>alert('註冊成功');</script>";
            }
         }
        

      }

   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
   <?php include 'header.php'; ?>    

     
   <section class="form-container">
   
      <form action="" method="post" enctype="multipart/form-data">
         <h3>register now</h3>

         <p>your name <span>*</span></p>
         <input type="text" name="name" placeholder="enter your name" required maxlength="50" class="box">

         <p>your email <span>*</span></p>
         <input type="email" name="email" placeholder="enter your email" required maxlength="50" class="box">

         <p>your password <span>*</span></p>
         <input type="password" name="first_pass" placeholder="enter your password" required maxlength="20" class="box">

         <p>confirm password <span>*</span></p>
         <input type="password" name="second_pass" placeholder="confirm your password" required maxlength="20" class="box">

         <input type="submit" value="register new" name="submit" class="btn">

         <p class="link">already have an acount?<a href="login.php"> login now</a></p>
      </form>  

     </section>  
   
   <?php include 'footer.php'; ?>    
   

    <!-- custom js file link -->
    <script src="script.js"></script>
</body>
</html>
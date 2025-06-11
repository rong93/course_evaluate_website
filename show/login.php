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

      $user_mail = $_POST['mail'];
      $user_password = ($_POST['password']);
   
      // $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
      // $select_user->execute([$email, $pass]);
      // $row = $select_user->fetch(PDO::FETCH_ASSOC);
      

      $login_verify = $conn->execute_query("SELECT * FROM user_information WHERE mail = ? AND password = ?", [$user_mail, $user_password]);

      if(mysqli_num_rows($login_verify) > 0){
         $row = $login_verify->fetch_assoc();
         $user_id = $row['user_id'];
         $user_name = $row['name'];
         echo "<script type='text/javascript'>alert('$user_id');</script>";
         echo "<script type='text/javascript'>alert('$user_name');</script>";

         echo "<script type='text/javascript'>alert('登入成功');</script>";


         setcookie('user_id', $row['user_id'], time() + 60*60*24*30, '/');
         header('location:home.php');

      }else{
         // $message[] = 'incorrect email or password!';
         echo "<script type='text/javascript'>alert('信箱或密碼錯誤');</script>";

      }
   
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <?php include 'header.php'; ?>    

   
     
   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>login now</h3>

         <p>your email <span>*</span></p>
         <input type="email" name="mail" placeholder="enter your email" required maxlength="50" class="box">

         <p>your password <span>*</span></p>
         <input type="password" name="password" placeholder="enter your password" required maxlength="20" class="box">

         <input type="submit" value="login new" name="submit" class="btn">
      </form>


   
   </section>

    
   <?php include 'footer.php'; ?>    

    <!-- custom js file link -->
    <script src="script.js"></script>
</body>
</html>
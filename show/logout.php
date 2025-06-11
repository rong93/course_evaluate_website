<?php
   include("../database.php");

   setcookie('user_id', '', time() - 1, '/');

   header('location:home.php');
?>
<?php
   include("../form/index.php");
   include("../form/login.php");
   include("../form/register.php");
   include("../form/success.php");
   header('location: ../form/login.php');

   if(isset($_GET['sign'])){
      $flag = $_GET['sign'];
   } else{
      $flag = '';
   }
   if($flag == 'register'){
      header('location: register.php');
   } else if($flag == 'login'){
      header('location: login.php');
   }
?>
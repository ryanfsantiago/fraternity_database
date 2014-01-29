<?php
session_start();
if(isset($_SESSION['manager']))
  unset($_SESSION['manager']);
  
  header("location: login.php"); 
?>
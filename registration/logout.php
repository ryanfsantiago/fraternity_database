<?php
session_start();
if(isset($_SESSION['passcode']))
  unset($_SESSION['passcode']);
  
  header("location: login.php"); 
?>
<?php
include('../config/constants.php'); 
//1.Destroy the session
session_destroy();//unset $_SESSION['user]

//2.Redirect to login page
header('location:'.SITEURL.'Resources/admin/login.php');
?>
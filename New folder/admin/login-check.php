<?php
    //Authorization-Access control
    //check whether user loged in or not
   
    if(!isset($_SESSION['user']))
    {
        $_SESSION['login-error']="<div class='error'>Please log into access Admin Panel</div>";
        //redirect to login page
        header('location:'.SITEURL.'Resources/admin/login.php');
    }
?>
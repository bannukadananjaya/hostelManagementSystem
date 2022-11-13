<?php include('../config/constants.php');
       include('login-check.php');    
?>

<html>
    <head>
        <title>
            Admin Page
        </title>
        <link rel="stylesheet" href="../css/style-form2.css">
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="wrapper">
            <header>
                <div class="container">    
                    <div class="topbar">
                        <div class="topbar-logo">
                            <a href="index.php"><img src="../img/logo.png" alt="logo" class="img-responsive"></a>
                        </div>
                        <div class="topbar-title ">
                            <h1 class="align-center">Hostel Management System</h1>
                            <!-- <h2 class="align-center">Books are a uniquely portable magic.</h2> -->
                        </div>
                        <div class="logout">
                            <a href="logout.php"><img src="../img/icons/logout.png" alt="logout" class="img-responsive"></a>
                        </div>
                    </div>
                </div>
            </header>

            <?php
                if('location:'=='location:'.SITEURL.'Resources/admin/update-admin.php'){

                }else{

                    ?>
                    <section class="navigation" >
                        <div class="container" >
                            <ul class="align-center">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="manage-admin.php">Admin</a></li>
                                <li><a href="manage-services.php">Services</a></li>
                                <li><a href="manage-students.php">Students</a></li>
                                <li><a href="manage-hostels.php">Hostels</a></li>
                                <li><a href="manage-roooms.php">Rooms</a></li>
                            </ul>
                        </div>
                    </section>
                    <hr>
                <?php
                }
                ?>
            
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
            <section class="navigation" >
                <div class="container" >
                    <ul class="align-center">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="manage-admin.php">Admin</a></li>
                        <li><a href="manage-services.php">Services</a></li>
                        <li><a href="manage-students.php">Students</a></li>
                        <li><a href="manage-hostels.php">Hostels</a></li>
                        <li><a href="manage-rooms.php">Rooms</a></li>
                    </ul>
                </div>
            </section>
            <hr>


<section class="content">
    <div class="container">
        
            <h1>Dash Board</h1>
            <br>
            <?php
                if(isset($_SESSION['login-success'])){
                    echo $_SESSION['login-success'];
                    unset ($_SESSION['login-success']);
                }
            ?>
            <br>
            <div class="dashboard-col">
                <div class="col-4">
                <h3 class="align-center">
                    <?php 
                    $sql="SELECT * FROM services";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    <br/>Services</h3>
                </div>
                <div class="col-4">
                    <h3 class="align-center">
                    <?php 
                    $sql2="SELECT * FROM students";
                    $res=mysqli_query($conn,$sql2);
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    <br/>
                    Students</h3>
                </div>
                <div class="col-4">
                    <h3 class="align-center">
                    <?php 
                    $sql2="SELECT * FROM hostels";
                    $res=mysqli_query($conn,$sql2);
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    <br/>Hostels</h3>
                </div>
               
                <div class="col-4">
                    <h3 class="align-center">
                    <?php 
                    $sql2="SELECT * FROM rooms";
                    $res=mysqli_query($conn,$sql2);
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    <br/>Rooms</h3>
                </div>
            </div>
       
    </div>
</section>
<section class="footer">
                <div class="container align-center">
                    <p>All right reserved, Food House. Developed by <a href="#">Banuka Dananjaya</a></p>
                </div>
            </section>

        </div>
    </body>
</html>
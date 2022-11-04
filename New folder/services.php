<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Resources/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <title>University Of Jaffna</title>
   
</head>
<body>
    <!-- wrapper class start here -->
    <div class="wrapper">
        <!-- header session start here -->
        <header>
            <div class="container">    
                <div class="topbar-1">
                    <div class="topbar-logo">
                        <a href="index.html"><img src="resources/img/logo.png" alt="logo" class="img-responsive"></a>
                    </div>
                    <div class="topbar-links">
                        <ul>
                            <li><a href="signin.php">Sign In</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                        </ul>
                    </div>
                </div>
                <div class="topbar-2 ">
                    <h1 class="align-center"> Hostel Management System</h1>
                    <h2 class="align-center">University Of Jaffna</h2>
                </div>
            </div>
        </header>
        <!-- header session end here -->

        <!-- navigation session start here -->
        <nav>
            <div class="container">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="canteen.php">Canteen</a></li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <!-- navigation session end here -->
        <section class="content">
            <h1 class="heading align-center"> Services</h1>
            <div class="service-box">
                <?php
                    $sql="  SELECT * 
                            FROM services";

                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['categoryId'];
                            $title=$row['title'];
                            $image_name=$row['imgName'];

                            ?>
                                <a href="">
                                    <div class="category-box-3">
                                        <?php
                                        if($image_name=="")
                                        {
                                            //image not available
                                            echo "<div class='error'> Image not available</div>";
                                        }
                                        else{
                                            //image availble
                                            ?>
                                            <img src="<?php echo SITEURL;?>Resources/img/categories/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive">
                                            <?php
                                        }
                                        ?>
                                        <div class="category-info">
                                            <div class="title">Studies</div>
                                            <div class="info"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, nisi.</p></div>
                                        </div> 
                                    </div>
                                </a>
                            <?php

                        }
                    }
                    else
                    {
                        echo "<div class='error'>Category not added</div>";
                    }
                ?>

                
                

            </div>
        </section>
        <footer>
                <div class="footer-box-1">
                <div class="box-4">
                        <h3>Quick Links</h3>
                        <ul>
                            <a href="index.html"><i class="fas fa-angle-right"></i>Home</a>
                            <a href="services.html"><i class="fas fa-angle-right"></i>services</a>
                            <a href="canteen.html"><i class="fas fa-angle-right"></i>canteen</a>
                            <a href="about-us.html"><i class="fas fa-angle-right"></i>about us</a>
                            <a href="contact-us.html"><i class="fas fa-angle-right"></i>Contact us</a>
                        </ul>
                    </div>
                    
                    
                    <div class="box-4">
                        <h3>Contact Us</h3>
                        <ul>
                            <a href="#"><i class="fas fa-angle-right"></i>+076-5346469</a>
                            <a href="#"><i class="fas fa-angle-right"></i>+077-7572307</a>
                            <a href="#"><i class="fas fa-angle-right"></i>banukasubasinghe13@gmail.com</a>
                        </ul>
                    </div>
                </div>
                <div class="footer-box-2">
                    <p class="align-center">    All right reserved. Designed by <a href="#"> Banuka Dananjaya </a></p> 
                </div>
            <!-- </div> -->
        </footer>
        <!-- footer session end here -->
        
    </div>
    <!-- wrapper class end here -->
</body>
</html>
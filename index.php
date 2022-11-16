<?php include('Resources/config/constants.php');?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Resources/css/main-style.css">
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
                    <?php
                    if(isset($_SESSION['user']))
                    {
                        ?>
                        <ul>
                            <li><a href="<?php echo SITEURL;?>logout.php">Log Out</a></li>
                        </ul>
                        <?php
                    }else{
                        ?>
                        <ul>
                            <li><a href="<?php echo SITEURL;?>signin.php">Sign In</a></li>
                            <li><a href="<?php echo SITEURL;?>signup.php">Sign Up</a></li>
                        </ul>
                        <?php
                    }
                    ?>
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
                    <li><a href="#">Home</a></li>
                    <?php
                    if(isset($_SESSION['user']))
                    {
                        ?>
                        
                        <li><a href="profile.php">Profile</a></li>
                        
                        <?php
                    }
                    ?>
                   
                    <li><a href="services.php">Services</a></li>
                    <li><a href="canteen.php">Canteen</a></li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>
        <!-- navigation session end here -->
        <!-- slider session starts here -->
        <div class="slider">    
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="image first">
                    <img id="first" src="Resources/img/sliderImages/1.jpg" alt="image1"  class="img-responsive">
                </div>
                <div class="image">
                    <img src="Resources/img/sliderImages/2.jpg" alt="image2" class="img-responsive">
                </div>
                <div class="image">
                    <img src="Resources/img/sliderImages/3.jpg" alt="image3" class="img-responsive">
                </div>
                <div class="image">
                    <img src="Resources/img/sliderImages/4.jpg" alt="image4" class="img-responsive">
                </div>

                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>

                <div class="navigation-manual">
                    <label for="radio1" class="manual-btn"></label>
                    <label for="radio2" class="manual-btn"></label>
                    <label for="radio3" class="manual-btn"></label>
                    <label for="radio4" class="manual-btn"></label>
                </div>
            
                <script type="text/javascript">
                    var counter=1;
                    setInterval(function(){
                        document.getElementById('radio' +counter).checked=true;
                        counter++;
                        if(counter>4){
                            counter=1
                        }
                    }, 5000);
                </script>
            </div>
        </div>
        <!-- slider session end here -->
        
        <!-- notice board session start here -->
        <div class="noticeboard">
            <div class="align-center">
                <h3 style="margin:2%">Digital Notice Board</h3>                    
                
            </div>
        </div>
        <!-- noticeboard session end here -->
        
        <!-- Services session start here -->
        
        <!-- Services session end here -->
      
        <div class="categories">
            <!-- <div class="container"> -->
                <h1 class="heading align-center">SERVICES</h1>
                
                <div class="category-box" >
                   <?php
                   //get the table from database
                   //SQL querry
                   $sql="SELECT * FROM service WHERE active='Yes' LIMIT 3";
                  //Execute the querry
                   $res=mysqli_query($conn,$sql);
                   //count rows from the table
                   $count=mysqli_num_rows($res);
                   //check rows are available
                   if($count>0){
                    //rows available
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['serviceId'];
                            $serviceName=$row['serviceName'];
                            $imageName=$row['imgName'];

                            ?>
                            <a href="">
                                <div class="box-3">
                                    <?php
                                    if($imageName=="")
                                    {
                                        //image not available
                                        echo "<div class='error'> Image not available</div>";
                                    }
                                    else{
                                        //image availble
                                        
                                        ?>
                                        <img src="<?php echo SITEURL;?>Resources/img/services/<?php echo $imageName; ?>" alt="Service" class="img-responsive">
                                        <?php
                                    }
                                    ?>
                                    <div class="box3-title"><?php echo $serviceName;?></div>  
                                </div>    
                                       
                            </a>
                            <?php
                        }
                   }else{
                    //no rows available
                    echo "<div class='error'>No services add</div>";
                   }
                   ?>
                    
                    
                    
                </div>   
            <!-- </div> -->
        </div>

        <!-- footer session start here -->
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

        
    
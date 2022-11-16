<?php 
    include('Resources/config/constants.php');
    //include('functions.php');

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="Resources/css/style-form2.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <title>HostelManagementSystem</title>
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
                    
                    <li><a href="services.php">Services</a></li>
                    <li><a href="canteen.php">Canteen</a></li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                </ul>
            </div>
        </nav>


        <section class="content">
            <!-- <h1 class="heading align-center">Sign up</h1> -->
            <div class="container">
                <div class="form-box">
                    <form action="includes/signup.inc.php" method="post">
                        <h1 class="heading align-center">Sign up</h1>
                        <p class="frmtitle">Please fill this form to register with us</p>
                        <hr/>
                        <br>
                        <label for="fname">First Name</label>
                        <input type="text" placeholder="First Name" name="firstName" required>
                        <label for="lname">Last Name</label>
                        <input type="text" placeholder="Last Name" name="lastName" required>
                        <label for="birthday">Birth Date</label>
                        <input type="date" placeholder="Birth Day" name="dob" required></br>
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="M">Male &nbsp;
                        <input type="radio" name="gender" value="F">Female</br>
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" required></br>
                        <label for="city">City</label>
                        <input type="text" placeholder="City" name="city" required></br>
                        <label for="district">District</label>
                        <input type="text" placeholder="District" name="district" required></br>
                        <label for="postalCode">Postal Code :</label>
                        <input type="text" placeholder="Postal Code" name="postalCode" required></br>
                        <label for="phoneNo">Contact No</label>
                        <input type="text" placeholder="phoneNo" name="phoneNo" required></br>
                        <label for="password">Password</label>
                        <input type="password" placeholder="Enter password" name="password" required>
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" placeholder="Enter password again" name="confirmPasword" required>
                        <hr>
                        <input type="submit" name="submit" value="Sign Up" class="btn">
                    </form>
                </div>
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

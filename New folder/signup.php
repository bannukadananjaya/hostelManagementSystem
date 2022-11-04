<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Resources/css/style.css">
    <link rel="stylesheet" href="Resources/css/style-form2.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <title>iNSPIRE dISCOVRY</title>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
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
                    <form action="insert.php" method="post">
                        <h1 class="heading align-center">Sign up</h1>
                        <p class="frmtitle">Please fill this form to register with us</p>
                        <hr/>
                        <br>
                        <label for="fname">First Name</label>
                        <input type="text" placeholder="First Name" name="firstName" required>
                        <label for="lname">Last Name</label>
                        <input type="text" placeholder="Last Name" name="lastName" required>
                        <label for="birthday">Birth Date</label>
                        <input type="date" placeholder="Birth Day" name="bod" required></br>
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="M">Male &nbsp;
                        <input type="radio" name="gender" value="F">Female</br>
                        <label for="email">Email</label>
                        <input type="email" placeholder="Email" name="email" required></br>
                        <label for="phoneNo">Contact No</label>
                        <input type="number" placeholder="Contact No" name="phoneNo" required></br>
                        <label for="address">Address</label>
                        <textarea name="adress" rows="4" cols="25" placeholder="Address"></textarea></br>
                        <label for="password">Password</label>
                        <input type="password" placeholder="Enter password" name="pasword" required>
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" placeholder="Enter password again" name="confirmPasword" required>
                        <hr>
                        <input type="submit" name="submit" value="Update Member" class="btn">
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
<?php
//process values of the form and sava it in database
//check whether the submit butn is cliked or not

if(isset($_POST['submit'])){
    //btn cliked
    //1.get data frm the form
    $Id=$_POST['memberId'];
    $firstName= $_POST['firstName'];
    $lastName= $_POST['lastName'];
    $BOD= $_POST['bod'];
    $gender=$_POST['gender'];
    $email= $_POST['email'];
    $phoneNo=$_POST['phoneNo'];
    $address=$_POST['adress'];
    $password= $_POST['pasword'];

    //2.run SQL Query to save data into database
    $sql="INSERT INTO tbl_memebers SET
        firstName='$firstName',
        lastname='$lastName',
        bod='$BOD',
        gender='$gender',
        email='$email',
        phoneNo='$phoneNo',
        adress='$address',
        pasword='$password'
        ";

        
        
    //3.execute query and save data in datbase
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    
    if($res==true){
        //data inserted
        $_SESSION['add']="<div class='error'>Student Added Successfully</div>";
        //redirected to previous page
        header("location:".SITEURL.'Resources/admin/add-member.php');

    }else{
        //fail to insert data 
        $_SESSION['add']="<div class='error'>Failed to Add Student, Try again later";
        //redirect to previous page
        header("loaction:".SITEURL.'Resources/admin/add-member.php');
    }
}
?>
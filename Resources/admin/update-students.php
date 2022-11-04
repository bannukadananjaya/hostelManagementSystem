<?php 
include('../config/constants.php');
include('login-check.php');
?>

<html>
    <head>
        <title>
            Add Student
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
                        <li><a href="manage-services.php">Admin</a></li>
                        <li><a href="manage-students.php">Students</a></li>
                        <li><a href="manage-hostels.php">Hostels</a></li>
                        <li><a href="manage-roooms.php">Rooms</a></li>
                    </ul>
                </div>
            </section>
            <hr>

<?php
    //1.Get the ID of the selected Admin
    $id=$_GET['id'];
    // $current_image=$_GET['image_name'];

    //2.Create sql query to get the details
    $sql="SELECT * FROM students WHERE studentId=$id";

    //Execute the Query
    $res=mysqli_query($conn, $sql);

    //Check whether the query is executd or not
    if($res==true){
        //Check whether data is available
        $count=mysqli_num_rows($res);

        if($count==1){
            //Get details
            $row=mysqli_fetch_assoc($res);
            
            $firstName= $row['firstName'];
            $lastName= $row['lastName'];
            $BOD= $row['dob'];
            $gender=$row['gender'];
            $email= $row['email'];
            $city=$row['city'];
            $street=$row['street'];
            $postalCode=$row['postalCode'];
            $phoneNo=$row['phoneNo'];
            
            $password= $row['pasword'];
        }
        else{
            //Redirect to Manage Admn page
            $_SESSION['empty']="<div class='error'>No Data to Display</div>";
            header('location:'.SITEURL.'Resources/admin/manage-member.php');
        }
    }
?>
<section class="content">
    <div class="form-box">
        
        <br>
        <form action="#" method="POST" enctype="multipart/form-data">
            <h1 class="heading">Update Student Info </h1>
            <br>
            <hr/>
            <br>
            <label for="fname">First Name</label>
            <input type="text" placeholder="First Name" name="firstName" value="<?php echo $firstName;?>" required>
            <label for="lname">Last Name</label>
            <input type="text" placeholder="Last Name" name="lastName" value="<?php echo $lastName;?>" required>
            <label for="birthday">Birth Date</label>
            <input type="date" placeholder="Birth Day" name="dob" value="<?php echo $BOD;?>" required></br>
            <label for="gender">Gender</label>
            <input <?php if($gender=="M"){echo "checked";}?> type="radio" name="gender" value="M">Male &nbsp;
            <input <?php if($gender=="F"){echo "checked";}?> type="radio" name="gender" value="F">Female</br>
            <label for="email">Email</label>
            <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>" required></br>
            <label for="city">City</label>
            <input type="text" placeholder="City" name="city" value="<?php echo $city;?>" required></br>
            <label for="street">Street</label>
            <input type="text" placeholder="Street" name="street" value="<?php echo $street;?>" required></br>
            <label for="postalCode">Postal Code :</label>
            <input type="text" placeholder="Postal Code" name="postalCode" value="<?php echo $postalCode ;?>" required></br>
            <label for="phoneNo">Contact No</label>
            <input type="text" placeholder="phoneNo" name="phoneNo" value="<?php echo $phoneNo ;?>"  required></br>
            
            <label for="password">Password :</label>
           
            <input type="password" placeholder="Enter password" name="pasword" value="<?php echo $password;?>" required></br>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" placeholder="Enter password again" name="confirmPasword" required>
            <hr>
           
        
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Member" class="btn">
            
        </form>

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

<?php
    //check whether the submit button is clicked
    if(isset($_POST['submit'])){
        //echo "clicked";
        
        //1.Get the data from the form
        
        // $Id=$_POST['memberId'];
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $city=$_POST['city'];
        $street=$_POST['street'];
        $postalCode=$_POST['postalCode'];
        $phoneNo=$_POST['phoneNo'];
        $password=$_POST['pasword'];

        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        else{
            //set the default value
            $gender="M";
        }

        //2.run SQL Query to save data into database            
        $sql ="UPDATE students SET
        firstName='$firstName',
        lastname='$lastName',
        dob='$dob',
        gender='$gender',
        email='$email',
        city='$city',
        street='$street',
        postalCode='$postalCode',
        phoneNo='$phoneNo',
        pasword='$password'
        WHERE studentId=$id";
        

        //for radio btn checked or not

        

        //execute the query
        $res=mysqli_query($conn,$sql) or die(mysqli_error());

        //4.redirected to manage categotry page
        if($res==true){
            
            //query executed and admin updated
            $_SESSION['update']="<div class='success'>Update the details Successfully</div>";
            header('location:'.SITEURL.'Resources/admin/manage-students.php');
            exit();
        }
        else{ 
            $_SESSION['update']="<div class='error'>Update Failed</div>";
            header('location:'.SITEURL.'Resources/admin/manage-students.php');
            exit();
        }
            
    }
?>

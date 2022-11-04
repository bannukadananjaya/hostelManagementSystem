<?php include('../config/constants.php');
       include('login-check.php');    

?>

<html>
    <head>
        <title>
            Add Admin
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

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="" method="POST">
                <h1 class="heading">Add Admin</h1>
                <?php 
                    if(isset($_SESSION['submit']))//checking whether the session is set or not
                    {
                        echo $_SESSION['add'];//Display the session msg if SET
                        unset ($_SESSION['add']);
                    }
                ?>
                <br>
                <hr/>
                <br>
                <label for="Firstname">First Name :</label>
                <input type="text" name="firstName" placeholder="First Name"><br>
                <label for="lastname">Last Name :</label>
                <input type="text" name="lastName" placeholder="Last Name"><br>
                <label for="username">User Name :</label>
                <input type="text" name="userName" placeholder="User Name"><br>
                <label for="gender">gender :</label>
                <input type="radio" name="gender" value="M">Male &nbsp;
                <input type="radio" name="gender" value="F">Female</br>
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" required></br>
                <label for="phoneNo">Contact No</label>
                <input type="text" placeholder="Contact No" name="phoneNo" required></br>
                <label for="password">Password :</label>
                <input type="password" name="password" required><br>
                <input type="submit" value="Add Admin" name="submit" class="btn">
            </form>
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


<?php
//process the value from and save it in Database
//check weather the submit button is clicked or not

if(isset($_POST['submit'])){
    //Button Clicked
    //echo "Button Clicked"
    //Get teh data from the form

    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $userName=$_POST['userName'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phoneNo=$_POST['phoneNo'];
    $password=$_POST['password'];
    
    
    //for radio btn checked or not

    if(isset($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    else{
        //set the default value
        $gender="M";
    }

    //2.SQL Query to save data into database

    $sql ="INSERT INTO admin SET
        firstName='$firstName',
        lastname='$lastName',
        userName='$userName',
        gender='$gender',
        email='$email',
        phoneNo='$phoneNo',
        pasword='$password'
        ";

    //3.Execute Query and Save Date in Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true){
        // Data Inserted
        $_SESSION['add']= "<div class='success'>Admin Added Successfully</div>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-admin.php');
    }
    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Admin, Try again Later</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/add-admin.php');
    }

}

?>
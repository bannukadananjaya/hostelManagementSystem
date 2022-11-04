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

    //2.Create sql query to get the details
    $sql="SELECT * FROM admin WHERE adminId=$id";

    //Execute the Query
    $res=mysqli_query($conn, $sql);

    //Check whether the query is executd or not
    if($res==true){
        //Check whether data is available
        $count=mysqli_num_rows($res);

        if($count==1){
            //Get details
            $row=mysqli_fetch_assoc($res);

            $firstName=$row['firstName'];
            $lastName=$row['lastName'];
            $userName=$row['userName'];
            $gender=$row['gender'];
            $email=$row['email'];
            $phoneNo=$row['phoneNo'];
            $password=$row['pasword'];
            
        }
        else{
            //Redirect to Manage Admn page
            header('location:'.SITEURL.'Resources/admin/manage-admin.php');
        }
    }
?>
<section class="content">
    <div class="form-box">
        
        <br>
        <form action="" method="POST">
            <h1 class="heading">Update Admin Info </h1>
            <br>
            <hr/>
            <br>
            <label for="firstName">First Name :</label>
            <input type="text" name="firstName" value="<?php echo $firstName?>"><br>
            <label for="lastName">Last Name :</label>
            <input type="text" name="lastName" value="<?php echo $lastName?>"><br>
            <label for="userName">User Name :</label>
            <input type="text" name="userName" value="<?php echo $userName?> " required><br>
            <label for="gender">Gender</label>
            <input <?php if($gender=="M"){echo "checked";}?> type="radio" name="gender" value="M">Male &nbsp;
            <input <?php if($gender=="F"){echo "checked";}?> type="radio" name="gender" value="F">Female</br>
            <label for="email">Email</label>
            <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>" required></br>
            <label for="phoneNo">Contact No</label>
            <input type="text" placeholder="Contact No" name="phoneNo" value="<?php echo $phoneNo;?>" required></br>
            <label for="password">Password :</label>
            <input type="password" name="password" value="<?php echo $password;?>" required><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Admin" class="btn">
            
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
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $userName=$POST['userName'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $phoneNo=$_POST['phoneNo'];
        $password=$_POST['password'];

        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        else{
            //set the default value
            $gender="M";
        }
    
        //2.Check whether user exist with that password
        $sql="UPDATE admin SET 
        firstName='$firstName',
        lastname='$lastName',
        userName='$userName',
        gender='$gender',
        email='$email',
        phoneNo='$phoneNo',
        pasword='$password'
        WHERE AdminId=$id";

        //execute the query
        $res=mysqli_query($conn,$sql);

        if($res==true){
            
            //query executed and admin updated
            $_SESSION['update']="<div class='success'>Update the details Successfully</div>";
            header('location:'.SITEURL.'Resources/admin/manage-admin.php');

        }
        else{
            $_SESSION['update-failed']="<div class='error'>Update Failed</div>";
            header('location:'.SITEURL.'Resources/admin/manage-admin.php');
        }
            
    }
?>
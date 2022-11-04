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
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
?>
<section class="content">
    <div class="container">
        
        <br>
        <form action="" method="POST">
            <h1>Change password</h1>
            <br>
            
            <hr/>
            <br>
            <label for="current_password">Current password:</label>
            <input type="password" name="currentPassword" placeholder="Current Password"><br>
            <label for="new_password">New password :</label>
            <input type="password" name="newPassword" placeholder="New Password"><br>
            <label for="new_password">Confirm password :</label>
            <input type="password" name="confirmPassword" placeholder="Confirm Password"><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Change Password" name="submit" class="btn">
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
        $id=$_POST['id'];
        $current_password=$_POST['currentPassword'];
        $new_password=$_POST['newPassword'];
        $confirm_password=$_POST['confirmPassword'];

        //2.Check whether user exist with that password
        $sql="SELECT * FROM admin WHERE adminId=$id AND pasword='$current_password'";

        //execute the query
        $res=mysqli_query($conn,$sql);

        if($res==true){
            $count=mysqli_num_rows($res);

            if($count==1){
                //echo "user found";
                //Check whether new password and confirm password is matched
                if($new_password==$confirm_password){
                    //update the password
                    $sql2= "UPDATE admin SET pasword='$newPassword' WHERE adminId=$id";
                            
                    //Execute the Query
                    $res2=mysqli_query($conn,$sql2);

                    if($res2==true){
                        //display success message
                        $_SESSION['change-psw']="<div class='success'>Password Changed Successfully</div>";
                        //Redirect the user
                        header('location:'.SITEURL.'Resources/admin/manage-admin.php');
                    }
                    else{
                        //display error message
                        $_SESSION['not-change-psw']="<div class='error'>Fail to Change Password</div>";
                        //Redirect the user
                        header('location:'.SITEURL.'Resources/admin/manage-admin.php');
                    }

                }
                else{
                    $_SESSION['psw-not-match']="<div class='error'>Confirm Password Did not Match</div>";
                    //Redirect the user
                    header('location:'.SITEURL.'Resources/admin/manage-admin.php');
                }
            }
            else{
                //user not found
                $_SESSION['user-not-found']="<div class='error'>User not Found</div>";
                //Redirect the user
                header('location:'.SITEURL.'Resources/admin/manage-admin.php?id=<?php echo $id; ?>');
            }
        }

        //3.Check the new password and confirm password is matched


        //4.Change the password
    }
?>
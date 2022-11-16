<?php include('../config/constants.php')?>

<html>
    <head>
        <title>Hostel Management System</title>\
        <link rel="stylesheet" href="../css/admin-login.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="header">
                <div class="topbar">
                    <div class="topbar-logo">
                        <img src="../img/logo.png" alt="" class="img-responsive">
                    </div>
                    <div class="topbar-title">
                        <h1 class="align-center">Hostel Management System</h1>
                    </div>
                </div>
            </div>
            <div class="login">
                <h1 class="heading align-center">Log in</h1>
                <form action="#" method="POST">
                    <br>
                    <?php
                    if(isset($_SESSION['login-fail'])){
                        echo $_SESSION['login-fail'];
                        unset ($_SESSION['login-fail']);
                    }
                    if(isset($_SESSION['login-error'])){
                        echo $_SESSION['login-error'];
                        unset ($_SESSION['login-error']);
                    }

                    ?>
                    <br>
                    <label for="userName" id="userName">User Name :</label>
                    <input type="text" name="userName">
                    <label for="password">Password :</label>
                    <input type="password" name="password">
                    <center>
                        <input type="submit" name="submit" class="btn">
                    </center>
                </form>
                
            </div>
            <div class="creater-line">
                <p class="align-center">Created by <a href="#">Banuka Dananjaya</a></p>
            </div>
        </div>
    </body>
</html>

<?php
if(isset($_POST['submit'])){

    //process for login
    //1.Get data from LoginForm
   
    $user_name=$_POST['userName'];
    $password=$_POST['password'];
    

    //2.Check whether user name and password exist pr not
    $sql="SELECT * FROM admin WHERE userName='$user_name' AND pasword='$password'";
    
    //3.execute the sql query
    $res= mysqli_query($conn,$sql);

    //4.count rows to check user exist
    $count=mysqli_num_rows($res);

    if($count==1){
        //user available and login success
        $_SESSION['login-success']="<div class='success'>Login Successful</div>";
        $_SESSION['user']=$user_name;//to check user is login or not
        //redirect to dashboard page
        header('location:'.SITEURL.'Resources/admin/');
        exit();
    }
    else{
        //user not available and login fail
        $_SESSION['login-fail']="<div class='error'>Login Failed</div>";
        //redirect to dlogin page
        header('location:'.SITEURL.'Resources/admin/login.php');
        exit();
    }
}

?>
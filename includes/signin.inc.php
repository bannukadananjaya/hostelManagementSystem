
<?php
if(isset($_POST['submit'])){

 include_once('../Resources/config/constants.php');
//    echo "login Successful";
//process for login
//1.Get data from LoginForm

$user_name=$_POST['firstName'];
$password=$_POST['pasword'];


//2.Check whether user name and password exist pr not
$sql="SELECT * FROM student WHERE firstName='$user_name' AND pasword='$password'";

//3.execute the sql query
$res= mysqli_query($conn,$sql);
//$row=mysqli_fetch_assoc($res);
//4.count rows to check user exist
$count=mysqli_num_rows($res);

if($count==1){
    //user available and login success
    //$userId=$row['studentId'];
    //echo "login Successful";
    $_SESSION['login-success']="<div class='success'>Login Successful</div>";
    $_SESSION['user']=$user_name; //to check user is login or not
   // $_SESSION['userId']=$userId;
    //redirect to dashboard page
    header("location:".SITEURL."index.php");
    exit();
}
    
else{
    //user not available and login fail
    $_SESSION['login-fail']="<div class='error'>Login Failed</div>";
    //redirect to dlogin page
    header("loaction:".SITEURL.'index.php');
    exit();
}
}

?>

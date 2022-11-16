<?php
//process the value from and save it in Database
//check weather the submit button is clicked or not
include_once('../../config/constants.php');
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
        lastName='$lastName',
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
        exit();
    }
    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Admin, Try again Later</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/add-admin.php');
       exit();
    }

}

?>
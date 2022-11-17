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
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $district=$_POST['district'];
    $postalCode=$_POST['postalCode'];
    $phoneNo=$_POST['phoneNo'];
    $roomId=$_POST['roomId'];
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

    $sql ="INSERT INTO student SET
        firstName='$firstName',
        lastname='$lastName',
        dob='$dob',
        gender='$gender',
        email='$email',
        city='$city',
        district='$district',
        postalCode='$postalCode',
        phoneNo='$phoneNo',
        roomId='$roomId',
        pasword='$password'
        ";

    //3.Execute Query and Save Date in Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true){
        // Data Inserted
        $_SESSION['add']= "<div class='success'>Student Added Successfully</div>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-students.php');
        exit();
    }
    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Student</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/manage-students.php');
       exit();
    }

}

?>
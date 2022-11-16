<?php
//process values of the form and sava it in database
//check whether the submit butn is cliked or not
include_once('../Resources/config/constants.php');
if(isset($_POST['submit'])){
    //btn cliked
    //1.get data frm the form
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $dob=$_POST['dob'];

    $email=$_POST['email'];
    $city=$_POST['city'];
    $district=$_POST['district'];
    $postalCode=$_POST['postalCode'];
    $phoneNo=$_POST['phoneNo'];
    $password=$_POST['password'];

    if(isset($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    else{
        //set the default value
        $gender="M";
    }
    //2.run SQL Query to save data into database
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
        pasword='$password'
        ";

        
    //3.execute query and save data in datbase
    $res=mysqli_query($conn,$sql) or die(mysqli_error());
    
    if($res==true){
        //data inserted
        $_SESSION['add']="<div class='success'>Student Added Successfully</div>";
        //redirected to previous page
        header("location:".SITEURL.'index.php');
        exit();


    }else{
        //fail to insert data 
        $_SESSION['add']="<div class='error'>Failed to Add Student";
        //redirect to previous page
        header("loaction:".SITEURL.'index.php');
        exit();
    }


 
}
?>
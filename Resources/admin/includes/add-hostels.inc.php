<?php
//process the value from and save it in Database
//check weather the submit button is clicked or not
include_once('../../config/constants.php');
if(isset($_POST['submit'])){
    //Button Clicked
    //echo "Button Clicked"
    //Get teh data from the form

    

    $hostelName=$_POST['hostelName'];
    $hostelType=$_POST['hostelType'];
    $location=$_POST['location'];
    
    
    //2.SQL Query to save data into database

    $sql ="INSERT INTO hostel SET
        hostelName='$hostelName',
        type='$hostelType',
        location='$location'
        ";

    //3.Execute Query and Save Date in Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true){
        // Data Inserted
        $_SESSION['add']= "<div class='success'>Hostel Added Successfully</div>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-hostels.php');
        exit();
    }
    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Hostel</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/manage-hostels.php');
       exit();
    }

}

?>
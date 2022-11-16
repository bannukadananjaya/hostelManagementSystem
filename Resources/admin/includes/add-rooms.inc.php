<?php
//process the value from and save it in Database
//check weather the submit button is clicked or not
include_once('../../config/constants.php');
if(isset($_POST['submit'])){
    //Button Clicked
    //echo "Button Clicked"
    //Get teh data from the form

    

    $roomStatus=$_POST['roomStatus'];
    $occupancy=$_POST['occupancy'];
    $description=$_POST['description'];
    
    
    //2.SQL Query to save data into database

    $sql ="INSERT INTO room SET
        roomStatus='$roomStatus',
        occupancy='$occupancy',
        description='$description'
        ";

    //3.Execute Query and Save Date in Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true){
        // Data Inserted
        $_SESSION['add']= "<div class='success'>Room Added Successfully</div>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-rooms.php');
        exit();
    }
    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Room</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/manage-rooms.php');
       exit();
    }

}

?>
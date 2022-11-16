<?php

//Include constants.php file here
    include('../config/constants.php');
//1.get the ID of Admin to be deleted
    $id=$_GET['id'];

//2.Create SQL Query to Delete catagory
//delete data from database
    $sql="DELETE FROM hostel WHERE hostelId=$id";

//Execute the Query
    $res=mysqli_query($conn,$sql);

//Check whether the query executed successfully or not
    if($res==true)
    {
        //Querrry executed successfully and admin deleted
        $_SESSION['delete']= "<dev class='success'>Hostel Deleted Successfully</dev>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-hostels.php');
        exit();
    }
    else{
        //Querry exected unsuccesfully
        $_SESSION['delete']="<dev class='error'>Hostel Deletion Not Successful</dev>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-hostels.php');
        exit();
    }
//3.Redirect to Manage Admin page with message (success/error)

?>
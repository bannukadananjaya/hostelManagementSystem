<?php

//Include constants.php file here
    include_once('../config/constants.php');
//1.get the ID of Admin to be deleted
    $id=$_GET['id'];

//2.Create SQL Query to Delete Admin
    $sql="DELETE FROM employee WHERE empId=$id";

//Execute the Query
    $res=mysqli_query($conn,$sql);

//Check whether the query executed successfully or not
    if($res==true)
    {
        //Querrry executed successfully and admin deleted
        $_SESSION['delete']= "<dev class='success'>Admin Deleted Successfully</dev>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-employee.php');
    }
    else{
        //Querry exected unsuccesfully
        $_SESSION['delete']="<dev class='error'>Admin Deletion Not Complete</dev>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-employee.php');
    }
//3.Redirect to Manage Admin page with message (success/error)

?>
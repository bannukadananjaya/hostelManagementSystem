<?php
//process the value from and save it in Database
//check weather the submit button is clicked or not
include_once('../../config/constants.php');
if(isset($_POST['submit'])){
    //Button Clicked
    //echo "Button Clicked"
    //Get teh data from the form

    $serviceName= $_POST['serviceName'];
    
    //for radio btn checked or not

    
    if(isset($_POST['active'])){
        $active=$_POST['active'];
    }
    else{
        //set the default value
        $active="No";
    }
    $description= $_POST['description'];
    //Check whether image is selected or not and set the vallue for imiage name accordingly
    // print_r($_FILES['image']);

    // die();//Break the code

    if(isset($_FILES['image']['name'])){
        //upload image
        //to upload img need img name, source path and destination path
        $imageName=$_FILES['image']['name'];
        
        // upload image if image is selected
        if($imageName!=""){

            //Auto rename our image
            $ext=end(explode('.',$imageName));
            //rename the image
            $imageName="service_".rand(000,999).'.'.$ext;

            $source_path=$_FILES['image']['tmp_name'];
            $destination_path="../../img/services/".$imageName;
            
            
            //upload the image
            $upload=move_uploaded_file($source_path, $destination_path);

            //check whether the image uploaded or not
            if($upload==false){
                //set message
                $_SESSION['upload']="<div class='error'>Failed to Upload Image</div>";
                header('location:'.SITEURL.'Resources/admin/add-services.php');

                //stop the process
                die();
            }
        }
    }
    else{
        //dont upload the image  and set the image name value as blank
        $imageName="";
    }
    //2.SQL Query to save data into database

    $sql = "INSERT INTO service SET
        serviceName='$serviceName',
        imgName='$imageName',
        
        active='$active',
        description='$description'
        ";
    ;

    //3.Execute Query and Save Date in Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true){
        // Data Inserted
        $_SESSION['add']= "<div class='success'>Service Added Successfully</div>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-services.php');
        exit();
    }

    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Service</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/manage-service.php');
       exit();
    }

}

?>
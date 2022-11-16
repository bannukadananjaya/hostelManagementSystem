<?php
include_once('partials/header.php');
?>


<?php
    //1.Get the ID of the selected Admin
    $id=$_GET['id'];

    //2.Create sql query to get the details
    $sql="SELECT * FROM hostel WHERE hostelId=$id";

    //Execute the Query
    $res=mysqli_query($conn, $sql);

    //Check whether the query is executd or not
    if($res==true){
        //Check whether data is available
        $count=mysqli_num_rows($res);

        if($count==1){
            //Get details
            $row=mysqli_fetch_assoc($res);

            $hostelName=$row['hostelName'];
            $type=$row['type'];
            $location=$row['location'];

            
        }
        else{
            //Redirect to Manage Admn page
            header('location:'.SITEURL.'Resources/admin/manage-hostels.php');
            exit();
        }
    }
?>
<section class="content">
    <div class="form-box">
        
        <br>
        <form action="includes/add-hostels.inc.php" method="POST">
            <h1 class="heading">Update Hostel Info </h1>
            <br>
            <hr/>
            <br>
            
            
            <label for="hostelName">Hostel Name</label>
            <input type="text" name="hostelName" value="<?php echo $hostelName;?>" required></br>
            <label for="type">Type</label>
            <input type="text" name="type" value="<?php echo $type;?>" required></br>
            <label for="description">Location</label>
            <input type="text" name="location" value="<?php echo $location;?>" required></br>
            

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Hostel" class="btn">
            
        </form>

    </div>    
</section>

<?php
include_once('partials/footer.php');
?>
<?php
include_once('partials/header.php');
?>


<?php
    //1.Get the ID of the selected Admin
    $id=$_GET['id'];

    //2.Create sql query to get the details
    $sql="SELECT * FROM room WHERE roomId=$id";

    //Execute the Query
    $res=mysqli_query($conn, $sql);

    //Check whether the query is executd or not
    if($res==true){
        //Check whether data is available
        $count=mysqli_num_rows($res);

        if($count==1){
            //Get details
            $row=mysqli_fetch_assoc($res);

            $status=$row['roomStatus'];
            $occupancy=$row['occupancy'];
            $description=$row['description'];

            
        }
        else{
            //Redirect to Manage Admn page
            header('location:'.SITEURL.'Resources/admin/manage-rooms.php');
            exit();
        }
    }
?>
<section class="content">
    <div class="form-box">
        
        <br>
        <form action="includes/add-rooms.inc.php" method="POST">
            <h1 class="heading">Update Room Info </h1>
            <br>
            <hr/>
            <br>
            
            
            <label for="roomStatus">Room Status</label>
            <input <?php if($status=="Free"){echo "checked";}?> type="radio" name="status" value="Free">Free &nbsp;
            <input <?php if($status=="Occupied"){echo "checked";}?> type="radio" name="status" value="Occupied">Occupied</br>
            <label for="occupancy">Occupancy</label>
            <input type="text" name="occupancy" value="<?php echo $occupancy;?>" required></br>
            <label for="description">Description</label>
            <input type="text" name="description" value="<?php echo $description;?>" required></br>
            

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Room" class="btn">
            
        </form>

    </div>    
</section>

<?php
include_once('partials/footer.php');
?>
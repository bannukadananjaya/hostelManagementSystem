<?php
include_once('partials/header.php');
?>


<section class="content">
    <div class="container">
        <h1>Manage Rooms</h1>
        
        
         <br>
         <?php 
            if(isset($_SESSION['add']))//checking whether the session is set or not
            {
                echo $_SESSION['add'];//Display the session msg if SET
                unset ($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))//checking whether the session is set or not
            {
                echo $_SESSION['upload'];//Display the session msg if SET
                unset ($_SESSION['upload']);
            }
            if(isset($_SESSION['delete']))//checking whether the session is set or not
            {
                echo $_SESSION['delete'];//Display the session msg if SET
                unset ($_SESSION['delete']);
            }
            if(isset($_SESSION['empty']))//checking whether the session is set or not
            {
                echo $_SESSION['empty'];//Display the session msg if SET
                unset ($_SESSION['empty']);
            }
            if(isset ($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            if(isset($_SESSION['fail-remove']))
            {
                echo $_SESSION['fail-remove'];
                unset($_SESSION['fail-remove']);
            }
        ?>
        
        <br><br/>
        <a href="<?php echo SITEURL; ?>Resources/admin/add-rooms.php" class="btn-primary">Add Room</a>

        <table class="tbl-ful">
            <tr>
                <th>Room ID</th>
                <th>Room Status</th>
               
                <th>Occupancy</th>
            
                <th>Description</th>
                <th>Action</th>
            </tr>


            <?php
            //Query to get all admins
            $sql = 'select * from room';
            //Execute the Query
            $res = mysqli_query($conn,$sql);

            //Check whether we have data in database or not
            if($res== true)
            {
                $count = mysqli_num_rows($res);
                
                //Check the num of rows
                if($count>0){
                    //we have data in table
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //use while loop yo display all the admin
                        //get individual data
                        $id = $rows['roomId'];
                        $roomStatus=$rows['roomStatus'];
                        
                        $occupancy=$rows['occupancy'];
                       
                        $description=$rows['description'];                        
                        //Display data
                        ?>
                        
                        <tr>
                        <td><?php echo $id ?></td>
                        <td>
                        <?php 
                        if($roomStatus=='Free'){
                            echo "<div class='success'>Free</div>"; 
                        }else{
                            echo "<div class='error'>Occupied</div>";     
                        }
                        ?>
                        </td>
                        <td><?php echo $occupancy; ?></td>
                       
                        
                        
                        <td><?php echo $description; ?></td>
                        
                        <td>
                            <a href="<?php echo SITEURL; ?>Resources/admin/update-rooms.php?id=<?php echo $id; ?>" class="btn-secondary">Edit Room</a>  
                            <a href="<?php echo SITEURL; ?>Resources/admin/delete-rooms.php?id=<?php echo $id; ?>" class="btn-quantiary">Delete Room</a> 
                        </td>
                        </tr>

                        
                        
                        <?php
                    }
                }
                else{
                    //we donot have data in table
                    //display msg inside table
                    ?>
                    <tr>
                        <td colspan="8"><div class="error">No Rooms Added</div></td>
                    </tr>

                    <?php
                }
            }
            
            ?>


            
        </table>
    </div>
</section>


<?php
include_once('partials/footer.php');
?>
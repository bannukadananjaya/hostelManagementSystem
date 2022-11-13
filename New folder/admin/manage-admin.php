<?php
include_once'partials/header.php';
?>
<section class="content">
    <div class="container">
        <h1>Manage Admin</h1>
        <br/>

        <?php
            if(isset($_SESSION['add']))//checking whether the session is set or not
            {
                echo $_SESSION['add'];//Display the session msg if SET
                unset ($_SESSION['add']);
            }
            elseif(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }
            elseif(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
            elseif(isset($_SESSION['change'])){
                echo $_SESSION['change'];
                unset ($_SESSION['change']);
            }
            elseif(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset ($_SESSION['user-not-found']);
            }
            elseif(isset($_SESSION['psw-not-match'])){
                echo $_SESSION['psw-not-match'];
                unset ($_SESSION['psw-not-match']);
            }
            elseif(isset($_SESSION['change-psw'])){
                echo $_SESSION['change-psw'];
                unset ($_SESSION['change-psw']);
            }
            elseif(isset($_SESSION['not-change-psw'])){
                echo $_SESSION['not-change-psw'];
                unset ($_SESSION['not-change-psw']);
            }
        
        ?>
        <br/><br/>
        <!-- Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <table class="tbl-ful">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Actions</th>
            </tr>
<?php
include_once'partials/footer.php';
?>

 <?php
    //Query to get all admins
    $sql = "SELECT * from admin";
    //Execute the Query
    $res = mysqli_query($conn,$sql);

    //Check whether we have data in database or not
    if($res== TRUE)
    {
        $count = mysqli_num_rows($res);
       
        //Check the num of rows
        if($count>0){
            //we have data in table
            while($rows=mysqli_fetch_assoc($res))
            {
                //use while loop yo display all the admin
                //get individual data
                $id = $rows['adminId'];
                $first_name=$rows['firstName'];
                $last_name=$rows['lastName'];
                $user_name=$rows['userName'];
                $gender=$rows['gender'];
                $email=$rows['email'];
                $phoneNo=$rows['phoneNo'];

                //Display data
                ?>
                
                <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $first_name; ?></td>
                <td><?php echo $last_name; ?></td>
                <td><?php echo $user_name; ?></td>
                <td><?php echo $gender; ?></td>
                <td><?php echo $email; ?></td>
                <td><?php echo $phoneNo; ?></td>
                <td>
                    <a href="<?php echo SITEURL; ?>Resources/admin/change-password.php?id=<?php echo $id; ?>" class="btn-thirdinary">Change Password</a>
                    <a href="<?php echo SITEURL; ?>Resources/admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Edit Admin</a>  
                    <a href="<?php echo SITEURL; ?>Resources/admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-quantiary">Delete Admin</a> 
                </td>
                </tr>

                
                
                <?php
            }
        }
        else{
            //Donot have data in table
            ?>
            <tr>
                <td colspan="6"><div class="error">No Admin Add</div></td>
            </tr>

            <?php

        }
    }
    
    ?>


    
</table>

</div>
</section>


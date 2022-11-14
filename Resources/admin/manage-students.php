<?php
include_once('partials/header.php');
?>

<section class="content">
    <div class="container">
        <h1>Manage Students</h1>
         <!-- Add Admin -->
        
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
        <a href="<?php echo SITEURL; ?>Resources/admin/add-students.php" class="btn-primary">Add Student</a>

        <table class="tbl-ful">
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
               
                <th>DOB</th>
                <th>Gender</th>
                <th>Email</th>
                <th>City</th>
                <th>District</th>
                <th>Postal Code</th>
                <th>Phone No</th>
                <th>Action</th>
            </tr>


            <?php
            //Query to get all admins
            $sql = 'select * from student';
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
                        $id = $rows['studentId'];
                        $first_name=$rows['firstName'];
                        $last_name=$rows['lastName'];
                        $dob=$rows['dob'];
                        $gender=$rows['gender'];
                        $email=$rows['email'];
                       
                        $city=$rows['city'];
                        $district=$rows['district'];
                        $postalCode=$rows['postalCode'];
                        $phoneNo=$rows['phoneNo'];                        
                        //Display data
                        ?>
                        
                        <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $first_name.' '.$last_name; ?></td>
                       
                        <td><?php echo $dob; ?></td>
                        <td><?php echo $gender; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $city; ?></td>
                        <td><?php echo $district; ?></td>
                        <td><?php echo $postalCode; ?></td>
                        <td><?php echo $phoneNo; ?></td>
                        
                        <td>
                            <a href="<?php echo SITEURL; ?>Resources/admin/update-students.php?id=<?php echo $id; ?>" class="btn-secondary">Edit Student</a>  
                            <a href="<?php echo SITEURL; ?>Resources/admin/delete-students.php?id=<?php echo $id; ?>" class="btn-quantiary">Delete Student</a> 
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
                        <td colspan="8"><div class="error">No Students Added</div></td>
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
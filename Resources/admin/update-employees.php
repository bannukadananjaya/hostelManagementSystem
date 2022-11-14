<?php
include_once'partials/header.php';
?>

<?php
    //1.Get the ID of the selected Admin
    $id=$_GET['id'];

    //2.Create sql query to get the details
    $sql="SELECT * FROM employee WHERE empId=$id";

    //Execute the Query
    $res=mysqli_query($conn, $sql);

    //Check whether the query is executd or not
    if($res==true){
        //Check whether data is available
        $count=mysqli_num_rows($res);

        if($count==1){
            //Get details
            $row=mysqli_fetch_assoc($res);

            $firstName=$row['firstName'];
            $lastName=$row['lastName'];
           
            $designation=$row['designation'];
            $dob=$row['dob'];
            $gender=$row['gender'];
            $email=$row['email'];
            $address=$row['address'];
            
            $phoneNo=$row['phoneNo'];

            
        }
        else{
            //Redirect to Manage Admn page
            header('location:'.SITEURL.'Resources/admin/manage-employees.php');
        }
    }
?>
<section class="content">
    <div class="form-box">
        
        <br>
        <form action="" method="POST">
            <h1 class="heading">Update Student Info </h1>
            <br>
            <hr/>
            <br>
            <label for="firstName">First Name :</label>
            <input type="text" name="firstName" value="<?php echo $firstName?>"><br>
            <label for="lastName">Last Name :</label>
            <input type="text" name="lastName" value="<?php echo $lastName?>"><br>
            <label for="designation">Designation :</label>
            <input type="text" name="designtion" placeholder="Designation"><br>
            <label for="dob">Date of Birth :</label>
            <input type="date" name="bod" value="<?php echo $dob?> " required><br>
            <label for="gender">Gender</label>
            <input <?php if($gender=="M"){echo "checked";}?> type="radio" name="gender" value="M">Male &nbsp;
            <input <?php if($gender=="F"){echo "checked";}?> type="radio" name="gender" value="F">Female</br>
            <label for="email">Email</label>
            <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>" required></br>
            <label for="city">City</label>
            <label for="address">Address</label>
            <input type="text" placeholder="Address" name="address" required></br>
            <label for="phoneNo">Contact No</label>
            <input type="text" placeholder="Contact No" name="phoneNo" value="<?php echo $phoneNo;?>" required></br>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Employee" class="btn">
            
        </form>

    </div>    
</section>

<?php
include_once('partials/footer.php');
?>

<?php
    //check whether the submit button is clicked
    if(isset($_POST['submit'])){
        //echo "clicked";

        //1.Get the data from the form
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        
        $phoneNo=$_POST['phoneNo'];
       

        if(isset($_POST['gender'])){
            $gender=$_POST['gender'];
        }
        else{
            //set the default value
            $gender="M";
        }
    
        //2.Check whether user exist with that password
        $sql="UPDATE employee SET 
        firstName='$firstName',
        lastname='$lastName',
        designation='$designation',
        dob='$dob',
        gender='$gender',
        email='$email',
        address='$address',
        phoneNo='$phoneNo'
        WHERE empId=$id";

        //execute the query
        $res=mysqli_query($conn,$sql);

        if($res==true){
            
            //query executed and admin updated
            $_SESSION['update']="<div class='success'>Update the details Successfully</div>";
            header('location:'.SITEURL.'Resources/admin/manage-employees.php');

        }
        else{
            $_SESSION['update-failed']="<div class='error'>Update Failed</div>";
            header('location:'.SITEURL.'Resources/admin/manage-employees.php');
        }
            
    }
?>

<?php
include_once('partials/header.php');
?>

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="" method="POST" enctype="multipart/form-data">
                <h1 class="heading">Add Student</h1>
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
                ?>
                <br>
                <hr/>
                <br>
                <label for="Firstname">First Name :</label>
                <input type="text" name="firstName" placeholder="First Name"><br>
                <label for="lastname">Last Name :</label>
                <input type="text" name="lastName" placeholder="Last Name"><br>
                <label for="dob">DOB :</label>
                <input type="date" name="dob" placeholder="Date of Birth"><br>
                <label for="gender">gender :</label>
                <input type="radio" name="gender" value="M">Male &nbsp;
                <input type="radio" name="gender" value="F">Female</br>
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" required></br>
                
                <label for="city">City</label>
                <input type="text" placeholder="City" name="city" required></br>
                <label for="street">District</label>
                <input type="text" placeholder="District" name="district" required></br>
                <label for="postalCode">Postal Code :</label>
                <input type="text" placeholder="Postal Code" name="postalCode" required></br>
                <label for="phoneNo">Contact No</label>
                <input type="text" placeholder="phoneNo" name="phoneNo" required></br>
                
                <label for="password">Password :</label>
                <input type="password" name="password" required><br>
                <input type="submit" value="Add Admin" name="submit" class="btn">
            </form>
        </div>
    </div>
</section> 

<?php
include_once'partials/footer.php';
?>

<?php
//process the value from and save it in Database
//check weather the submit button is clicked or not

if(isset($_POST['submit'])){
    //Button Clicked
    //echo "Button Clicked"
    //Get teh data from the form

    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $district=$_POST['district'];
    $postalCode=$_POST['postalCode'];
    $phoneNo=$_POST['phoneNo'];
    $password=$_POST['password'];
    //for radio btn checked or not

    if(isset($_POST['gender'])){
        $gender=$_POST['gender'];
    }
    else{
        //set the default value
        $gender="M";
    }
    
    //2.SQL Query to save data into database

    $sql ="INSERT INTO student SET
        firstName='$firstName',
        lastname='$lastName',
        dob='$dob',
        gender='$gender',
        email='$email',
        city='$city',
        district='$district',
        postalCode='$postalCode',
        phoneNo='$phoneNo',
        pasword='$password'
        ";

    //3.Execute Query and Save Date in Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true){
        // Data Inserted
        $_SESSION['add']= "<div class='success'>Student Added Successfully</div>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-students.php');
    }
    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Student</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/manage-students.php');
    }

}

?>
<?php
include_once'partials/header.php';
?>

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="" method="POST">
                <h1 class="heading">Add Admin</h1>
                <?php 
                    if(isset($_SESSION['submit']))//checking whether the session is set or not
                    {
                        echo $_SESSION['add'];//Display the session msg if SET
                        unset ($_SESSION['add']);
                    }
                ?>
                <br>
                <hr/>
                <br>
                <label for="Firstname">First Name :</label>
                <input type="text" name="firstName" placeholder="First Name"><br>
                <label for="lastname">Last Name :</label>
                <input type="text" name="lastName" placeholder="Last Name"><br>
                <label for="username">User Name :</label>
                <input type="text" name="userName" placeholder="User Name"><br>
                <label for="gender">gender :</label>
                <input type="radio" name="gender" value="M">Male &nbsp;
                <input type="radio" name="gender" value="F">Female</br>
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" required></br>
                <label for="phoneNo">Contact No</label>
                <input type="text" placeholder="Contact No" name="phoneNo" required></br>
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
    $userName=$_POST['userName'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
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

    $sql ="INSERT INTO admin SET
        firstName='$firstName',
        lastName='$lastName',
        userName='$userName',
        gender='$gender',
        email='$email',
        phoneNo='$phoneNo',
        pasword='$password'
        ";

    //3.Execute Query and Save Date in Database

    $res = mysqli_query($conn,$sql) or die(mysqli_error());

    if($res==true){
        // Data Inserted
        $_SESSION['add']= "<div class='success'>Admin Added Successfully</div>";
        //Redirect page
        header("location:".SITEURL.'Resources/admin/manage-admin.php');
    }
    else
    {
       //Faile to Insert Data
       $_SESSION['add']= "<div class='error'>Failed to Add Admin, Try again Later</div>";
       //Redirect page
       header("location:".SITEURL.'Resources/admin/add-admin.php');
    }

}

?>
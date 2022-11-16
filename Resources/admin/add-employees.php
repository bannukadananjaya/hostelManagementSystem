<?php
include_once('partials/header.php');
?>

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="includes/add-employees.inc.php" method="POST" enctype="multipart/form-data">
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
                <label for="designation">Designation :</label>
                <input type="text" name="designtion" placeholder="Designation"><br>
                <label for="dob">DOB :</label>
                <input type="date" name="dob" placeholder="Date of Birth"><br>
                <label for="gender">gender :</label>
                <input type="radio" name="gender" value="M">Male &nbsp;
                <input type="radio" name="gender" value="F">Female</br>
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email" required></br>
                
                <label for="address">Address</label>
                <input type="text" placeholder="Address" name="address" required></br>
               
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


<?php
include_once'partials/header.php';
?>

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="includes/add-admin.inc.php" method="POST">
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


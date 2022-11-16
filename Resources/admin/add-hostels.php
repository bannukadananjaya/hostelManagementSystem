<?php
include_once('partials/header.php');
?>

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="includes/add-hostels.inc.php" method="POST" enctype="multipart/form-data">
                <h1 class="heading">Add Hostel</h1>
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

                <label for="name">Hostel Name :</label>
                <input type="text" name="hostelName" placeholder="Hostel Name"><br>
                <label for="hostelType">Hostel Type :</label>
                <input type="text" name="hostelType" placeholder="Hostel Type"><br>
                <label for="location">Location :</label>
                <input type="text" name="location" placeholder="Location"><br>
                <input type="submit" value="Add Hostel" name="submit" class="btn">
            </form>
        </div>
    </div>
</section> 

<?php
include_once('partials/footer.php');
?>
<?php
include_once('partials/header.php');
?>

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="includes/add-rooms.inc.php" method="POST" enctype="multipart/form-data">
                <h1 class="heading">Add Room</h1>
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

                
                <label for="">Room Status :</label>
                <input type="radio" name="status" value="Free">Free&nbsp;
                <input type="radio" name="status" value="Occupied">Occupied</br>
                
                <label for="occupancy">Occupancy :</label>
                <input type="text" name="occupancy" placeholder="No of Students can Occupied"><br>
                <label for="description">Description :</label>
                <input type="text" name="description" placeholder="Description"><br>
                <input type="submit" value="Add Room" name="submit" class="btn">
            </form>
        </div>
    </div>
</section> 

<?php
include_once('partials/footer.php');
?>
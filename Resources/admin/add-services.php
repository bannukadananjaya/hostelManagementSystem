<?php
include_once('partials/header.php');
?>

<section class="content">
    <div class="container">
        
        <div class="form-box">
            <form action="includes/add-service.inc.php" method="POST" enctype="multipart/form-data">
                <h1 class="heading">Add Service</h1>
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
                <label for="serviceName">Service Name :</label>
                <input type="text" name="serviceName" placeholder="service Name"><br>
                <label for="image">Select Image :</label>
                <input type="file" name="image"><br/><br/>
                <label for="active">Active :</label>
                <input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No">No<br>
                <label for="description">Description :</label>
                <input type="text" name="description" placeholder="Description"><br>
                
                <input type="submit" value="Add Service" name="submit" class="btn">
            </form>
        </div>
    </div>
</section> 

<?php
include_once('partials/footer.php');
?>


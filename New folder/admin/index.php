<?php
include_once'partials/header.php';
?>


<section class="content">
    <div class="container">
        
            <h1>Dash Board</h1>
            <br>
            <?php
                if(isset($_SESSION['login-success'])){
                    echo $_SESSION['login-success'];
                    unset ($_SESSION['login-success']);
                }
            ?>
            <br>
            <div class="dashboard-col">
                <div class="col-4">
                
                <div class="col-4">
                    <h3 class="align-center">
                    <?php 
                    $sql2="SELECT studentId FROM student";
                    $res=mysqli_query($conn,$sql2);
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    <br/>
                    Students</h3>
                </div>
                <div class="col-4">
                    <h3 class="align-center">
                    <?php 
                    $sql2="SELECT hostelId FROM hostel";
                    $res=mysqli_query($conn,$sql2);
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    <br/>Hostels</h3>
                </div>
               
                <div class="col-4">
                    <h3 class="align-center">
                    <?php 
                    $sql2="SELECT roomId FROM room";
                    $res=mysqli_query($conn,$sql2);
                    $count=mysqli_num_rows($res);
                    echo $count;
                    ?>
                    <br/>Rooms</h3>
                </div>
            </div>
       
    </div>
</section>

<?php
include_once'partials/footer.php';
?>
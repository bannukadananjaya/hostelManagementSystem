<?php include('../config/constants.php');
      include('login-check.php');   

?>

<html>
    <head>
        <title>
            manage Rooms
        </title>
        <link rel="stylesheet" href="../css/style-form2.css">
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <div class="wrapper">
        <header>
            <div class="container">    
                <div class="topbar">
                    <div class="topbar-logo">
                        <a href="index.php"><img src="../img/logo.png" alt="logo" class="img-responsive"></a>
                    </div>
                    <div class="topbar-title ">
                        <h1 class="align-center">Hostel Management System</h1>
                        <!-- <h2 class="align-center">Books are a uniquely portable magic.</h2> -->
                    </div>
                    <div class="logout">
                        <a href="logout.php"><img src="../img/icons/logout.png" alt="logout" class="img-responsive"></a>
                    </div>
                </div>
            </div>
        </header>
        <section class="navigation" >
            <div class="container" >
                <ul class="align-center">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-services.php">Admin</a></li>
                    <li><a href="manage-students.php">Students</a></li>
                    <li><a href="manage-hostels.php">Hostels</a></li>
                    <li><a href="manage-rooms.php">Rooms</a></li>
                </ul>
            </div>
        </section>
        <hr>

<section class="content">
    <div class="container">
        <h1>Manage Hostels</h1>
        <br/>

        <?php
            if(isset($_SESSION['add']))//checking whether the session is set or not
            {
                echo $_SESSION['add'];//Display the session msg if SET
                unset ($_SESSION['add']);
            }
            elseif(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset ($_SESSION['delete']);
            }
            elseif(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset ($_SESSION['update']);
            }
            elseif(isset($_SESSION['change'])){
                echo $_SESSION['change'];
                unset ($_SESSION['change']);
            }
            elseif(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found'];
                unset ($_SESSION['user-not-found']);
            }
            elseif(isset($_SESSION['psw-not-match'])){
                echo $_SESSION['psw-not-match'];
                unset ($_SESSION['psw-not-match']);
            }
            elseif(isset($_SESSION['change-psw'])){
                echo $_SESSION['change-psw'];
                unset ($_SESSION['change-psw']);
            }
            elseif(isset($_SESSION['not-change-psw'])){
                echo $_SESSION['not-change-psw'];
                unset ($_SESSION['not-change-psw']);
            }
        
        ?>
        <br/><br/>
        <!-- Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <table class="tbl-ful">
            <tr>
                <th>Room ID</th>
                <th>Room Status</th>
                <th>Room Occupancy</th>
                <th>Room Description</th>
                <th>Hostel ID</th>
                <th>Students IDs</th>
                <th>Actions</th>
                
            </tr>


            <?php
            //Query to get all admins
            $sql = "SELECT * from rooms";
            //Execute the Query
            $res = mysqli_query($conn,$sql);

            //Check whether we have data in database or not
            if($res== TRUE)
            {
                $count = mysqli_num_rows($res);
                $sn=1;
                //Check the num of rows
                if($count>0){
                    //we have data in table
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //use while loop yo display all the admin
                        //get individual data
                        $id = $rows['roomId'];
                        $room_status=$rows['roomStatus'];
                        $room_occupancy=$rows['roomOccupancy'];
                        $room_description=$rows['roomDescription'];
                        $hostel_id=$rows['hostelId'];
                        $student_id=$rows['student_id'];
                        
                        //Display data
                        ?>
                        
                        <tr>
                        <!-- <td><?php echo $sn++; ?></td> -->
                        <td><?php echo $id; ?></td>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  
                        <td><?php echo $room_status; ?></td>
                        <td><?php echo $room_occupancy; ?></td>
                        <td><?php echo $room_description; ?></td>
                        <td><?php echo $hostel_id ; ?></td>
                        <td><?php echo $student_id ; ?></td>
                        <td>
                            
                            <a href="<?php echo SITEURL; ?>Resources/admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Edit room</a>  
                        </td>
                        </tr>

                        
                        
                        <?php
                    }
                }
                else{
                    //we donot have data in table
                    ?>
                    <tr>
                        <td colspan="6"><div class="error">No Admin Add</div></td>
                    </tr>

                    <?php

                }
            }
            
            ?>


            
        </table>
        
    </div>
</section>
<section class="footer">
                <div class="container align-center">
                    <p>All right reserved, Food House. Developed by <a href="#">Banuka Dananjaya</a></p>
                </div>
            </section>

        </div>
    </body>
</html>

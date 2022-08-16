<!DOCTYPE html>
<html lang="en">
<body>
<?php
//Starting Session
session_start();
?>
<?php
//Checking which user is logged
$daycare=$people=$userlogged="";
if(isset($_SESSION["daycare-name"]) ){
    $daycare=$_SESSION['daycare-name'];
    
}
if(isset($_SESSION["user-name"]) ){
    $people=$_SESSION['user-name'];
    
}
if($daycare!="")
{
 $userlogged=$daycare;
}
if($people!="")
{
 $userlogged=$people;
}
?>
<?php
//configuring with database
require_once "../config.php";
//Searching out the latest booking id of user
$email=$_SESSION['user-email'];
$query=$mysqli->prepare("SELECT MAX(booking_id) FROM booking_info  WHERE bemail=?  ");
$query->bind_param("s",$email);
$query->execute();
$result=$query->get_result();
$query->close();
$row = $result->fetch_array(MYSQLI_NUM);


?>
<!--------------Showing last booking id------------------->
<p>Your Last Booking Id is <?php echo $row[0]?></p>
<?php
//Getting All booking status of user.
$query=$mysqli->prepare("SELECT booking_id,demail,confirmed FROM booking_info WHERE bemail=?");
$query->bind_param("s",$_SESSION['user-email']);
$query->execute();
$result_prev=$query->get_result();
$query->close();
//Showing all bookings
while($row_prev = $result_prev->fetch_assoc()) 
{
echo '<br>';
$query=$mysqli->prepare("SELECT dname,dnumber FROM daycare_info WHERE demail=?");
$query->bind_param("s",$row_prev['demail']);
$query->execute();
$result=$query->get_result();
$row = $result->fetch_assoc();
$query->close();
?>


<!--styling the table-->
 <div class="home-sec">
            <div class="container ">
                <div class="row all-info">
                    <div class="col-lg-4">
                        <div class="row  profile">
                            <div class="col-lg-12">
                                <div class="info-img">
                                    <img src="../images/company-logo-removebg-preview.png" alt="" srcset="">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
    
                            <div class="col-lg-12 field">
                                <div class="row">
                                    <p class="root">Your Last booking ID is :<?php echo $row[0]?></p>
                                    <div class="col-lg-3  root">Booking ID</div>
                                    <div class="col-lg-9 info"><?php echo $row_prev['booking_id']; ?></div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-12 field">
                                <div class="row">
                                    <div class="col-lg-3  root">Day Care Center Name</div>
                                    <div class="col-lg-9 info"><?php echo $row['dname']; ?></div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-12 field">
                                <div class="row">
                                    <div class="col-lg-3 root">Day Care Email Address</div>
                                    <div class="col-lg-9 info"><?php echo $row_prev['demail'];?></div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-12 field">
                                <div class="row">
                                    <div class="col-lg-3 root">Phone Number </div>
                                    <div class="col-lg-9 info"><?php echo $row['dnumber'];?></div>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <button class="form-btn"> <?php echo $row_prev['confirmed'];?></button>
                            </div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 ">
                                <button class="form-btn"> Pending</button>
                            </div>
                        </div>
                    </div>

<!--ending it-->
<?php
//Show boking id
// echo $row_prev['booking_id'];
// echo '<br>';
// //Show daycare name
// echo $row['dname'];
// echo '<br>';
// //Show daycare email
// echo $row_prev['demail'];
// echo '<br>';
// //Show daycare number
// echo $row['dnumber'];
// echo '<br>';
// //Show daycare confirmed
// echo $row_prev['confirmed'];
// echo '<br>';
// }


?>
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
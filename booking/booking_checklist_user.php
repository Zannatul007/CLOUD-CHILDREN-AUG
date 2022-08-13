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
//Show boking id
echo $row_prev['booking_id'];
echo '<br>';
//Show daycare name
echo $row['dname'];
echo '<br>';
//Show daycare email
echo $row_prev['demail'];
echo '<br>';
//Show daycare number
echo $row['dnumber'];
echo '<br>';
//Show daycare confirmed
echo $row_prev['confirmed'];
echo '<br>';
}


?>
</body>
</html>
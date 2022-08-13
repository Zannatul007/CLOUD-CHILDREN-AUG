<!DOCTYPE html>
<html lang="en">
<body>
<?php
session_start();
?>
<?php
$daycare=$people=$userlogged="";
if(isset($_SESSION["daycare-name"]) ){
    $daycare=$_SESSION['daycare-name'];
    
}
if(isset($_SESSION["user-name"]) ){
    $people=$_SESSION['user-name'];
    
}
//$daycare=$_SESSION['daycare-name'];
//$people=$_SESSION['user-name'];
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
require_once "../config.php";
$booking_id=$_SESSION['booking_id'];
$query=$mysqli->prepare("SELECT firstname,bemail,number,adress,category,specialneed,confirmed FROM booking_info WHERE booking_id=?");
$query->bind_param("i",$booking_id);
$query->execute();
$result_prev=$query->get_result();
$query->close();
$row_prev = $result_prev->fetch_assoc();
echo "firstname";
echo '<br>';
echo $row_prev['firstname'];
echo '<br>';
//
echo "bemail";
echo '<br>';
echo $row_prev['bemail'];
echo '<br>';
//
echo "number";
echo '<br>';
echo $row_prev['number'];
echo '<br>';
//
echo "adress";
echo '<br>';
echo $row_prev['adress'];
echo '<br>';
//
echo "category";
echo '<br>';
echo $row_prev['category'];
echo '<br>';
//
echo "specialneed";
echo '<br>';
echo $row_prev['specialneed'];
echo '<br>';
//
echo "confirmed";
echo '<br>';
echo $row_prev['confirmed'];
echo '<br>';


?>
<a href="booking_checklist_daycare.php">booking checklist</a>
</body>
</html>
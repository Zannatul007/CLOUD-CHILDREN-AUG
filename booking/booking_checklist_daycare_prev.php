<!DOCTYPE html>
<html lang="en">
<body>
<?php
//Starting Session
session_start();
?>
<?php
//logged-User Checking
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
//Configuring with database
require_once "../config.php";
?>

<?php

$booking_id=array();
$k=-1;
echo "Not Confirmed Bookings.";
echo '<br>';
$confirm="No";
echo '<br>';
$query=$mysqli->prepare("SELECT booking_id FROM booking_info WHERE demail=? AND confirmed=?");
$query->bind_param("ss",$_SESSION['daycare-email'],$confirm);
$query->execute();
$result_prev=$query->get_result();
$query->close();
//Showing the details of unconfirmed bookings
while($row_prev = $result_prev->fetch_assoc()) 
{
 $k++; 
 $booking_id[$k]=$row_prev['booking_id'];
 echo $row_prev['booking_id'];
 echo '<br>';
 $o=(string)$row_prev['booking_id'].'_'."details";
 ?>


 <!---------------------See Details of bookings----------------->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                
<button class="btn-block btn-sm btn filter_status" type="submit"  name="<?php echo $o;?>">See Details</button>    
<br>
<?php
$o=(string)$row_prev['booking_id'].'_'."confirm";
?>
<!---------------------Confirming the unconfirmed bookings----------------->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                
<button class="btn-block btn-sm btn filter_status" type="submit"  name="<?php echo $o;?>">Confirm</button>    
<br>

<?php
//Showing the the details of confirmed bookings

}
echo '<br>';
echo "Confirmed Bookings.";
echo '<br>';
$confirm="Yes";
$query=$mysqli->prepare("SELECT booking_id FROM booking_info WHERE demail=? AND confirmed=?");
$query->bind_param("ss",$_SESSION['daycare-email'],$confirm);
$query->execute();
$result_prev=$query->get_result();
$query->close();
while($row_prev = $result_prev->fetch_assoc()) 
{
 $k++; 
 $booking_id[$k]=$row_prev['booking_id'];
 echo $row_prev['booking_id'];
 echo '<br>';
 $o=(string)$row_prev['booking_id'].'_'."details";
 ?>
 <!-------------------------See details of booking---------------------->
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                
 <button class="btn-block btn-sm btn filter_status" type="submit"  name="<?php echo $o;?>">See Details</button>    


<br>
<?php
$o=(string)$row_prev['booking_id'].'_'."unconfirm";
?>
<!-------------------------Unconfirming the confirmed bookings---------------------->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                
<button class="btn-block btn-sm btn filter_status" type="submit"  name="<?php echo $o;?>">Deny Confirm</button>    
</form>
<br>
<?php
}
//Going to booking details page if button is pressed
for($i=0;$i<sizeof($booking_id);$i++)
{
    if(isset($_POST[(string)$booking_id[$i]."_"."details"]))
    {
      $_SESSION['booking_id']=$booking_id[$i];
      echo '<script>window.location.href = "booking_details.php"</script>';
    }
}
//Confirming bookings when button is pressed
for($i=0;$i<sizeof($booking_id);$i++)
{
    if(isset($_POST[(string)$booking_id[$i]."_"."confirm"]))
    {   $confirm="Yes";
        $query=$mysqli->prepare("UPDATE  booking_info SET confirmed=?  WHERE booking_id=?");
        $query->bind_param("si",$confirm,$booking_id[$i]);
        $query->execute();
        
        $query->close();

    }
}
//UnConfirming bookings when button is pressed
for($i=0;$i<sizeof($booking_id);$i++)
{
    if(isset($_POST[(string)$booking_id[$i]."_"."unconfirm"]))
    {   $confirm="No";
        $query=$mysqli->prepare("UPDATE  booking_info SET confirmed=?  WHERE booking_id=?");
        $query->bind_param("si",$confirm,$booking_id[$i]);
        $query->execute();
        
        $query->close();

    }
}
?>

</body>
</html>
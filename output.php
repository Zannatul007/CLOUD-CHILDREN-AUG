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

echo $_SESSION['file'];
?>

</body>
</html>
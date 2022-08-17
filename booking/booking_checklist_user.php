<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--Customize css link-->
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/footer.css">


    <!--Swiper cdn-->
    <link rel=" stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/swiper.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!--comapny logo font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap"
        rel="stylesheet">

    <title>Booking Checklist User</title>
</head>


<body>
        <header class="header container-fluid">
        <section class="header-in fixed-top">
            <div class="header-1">
                <div id="company-logo"><img src="../images/company-logo-removebg-preview.png" alt="">
                    <a href="#"> Cloud
                        Children </a>
                </div>
                <li class="user-drop nav-item dropdown ">
                    <a class="link nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user" id="login-btn"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="user-dropdown">
                        <li><a class="dropdown-item" href="">Profile</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="">My booking</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="">Sign
                                out</a></li>

                    </ul>
                </li>
            </div>

            <!--navigation Bar-->

            <nav class="header-2 navigation-bar navbar navbar-expand-lg">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="font-weight: 900"><img src="images/menu-burger.png"
                            style="height: 2rem;" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto  ms-auto my-2 my-lg-0 navbar-nav-scroll"
                        style="--bs-scroll-height: 100px;">
                        <li><a href="#home" class="nav-link">Home</a></li>
                        <li><a href="#about" class="nav-link">About Us</a></li>
                        <li><a href="#services" class="nav-link">Services</a></li>

                        <li class="nav-item dropdown">
                            <a class="link nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Child-Care Categories
                            </a>
                            <ul class="dropdown-menu" id="dropmenu" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" href="#">Toddler</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Pre-School</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">School-Age</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Special-Child</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Foreigner-Child</a></li>
                            </ul>
                        </li>


                        <li><a href="#parenting-blogs" class="nav-link">Parenting-Guides</a></li>
                    </ul>

                </div>

            </nav>


        </section>
    </header>
    <!--ending navigation-->
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
<!DOCTYPE html>
<html lang="en">
<?php
session_start();

?>
<?php
$daycare = $people = $userlogged = "";
if (isset($_SESSION["daycare-name"])) {
    $daycare = $_SESSION['daycare-name'];
}
if (isset($_SESSION["user-name"])) {
    $people = $_SESSION['user-name'];
}

if ($daycare != "") {
    $userlogged = $daycare;
}
if ($people != "") {
    $userlogged = $people;
}
?>
<?php
            //Connecting to database
            require_once "../config.php";

            $booking_id=$_SESSION['booking_id'];
            $query=$mysqli->prepare("SELECT firstname,bemail,number,adress,category,specialneed,confirmed FROM booking_info WHERE booking_id=?");
            $query->bind_param("i",$booking_id);
            $query->execute();
            $result_prev=$query->get_result();
            $query->close();
            $row_prev = $result_prev->fetch_assoc();
            ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--Customize css link-->
    <link rel="stylesheet" href="../css/edit_profile.css">
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

    <title>Your Profile</title>
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
                        <li><a class="dropdown-item" href=""><?php echo $userlogged?></a></li>
                        <hr>
                        <li><a class="dropdown-item" href="">Edit Profile</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="../booking/booking_checklist_user.php">My booking</a></li>
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

    <main>
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
                            <div class="col-lg-12">
                                <ul>
                                    <li class="info-edit"><a href="">Profile</a>

                                        <hr>
                                    </li>
                                    <li class="info-edit">
                                        <a href="../booking/booking_checklist_user.php">Booking list
                                            <hr>
                                        </a>
                                    </li>
                                    <!-- <li class="info-edit"><a href="">Settings and security
                                            <hr>
                                        </a></li> -->
                                </ul>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3  root">Name of the person who made booking</div>
                                <div class="col-lg-9 info"><?php echo $row_prev['firstname']?></div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Email</div>
                                <div class="col-lg-9 info"><?php echo $row_prev['bemail']?></div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Number</div>
                                <div class="col-lg-9 info"><?php echo $row_prev['number']?></div>
                                <hr>
                            </div>
                        </div>
                        

                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Address</div>
                                <div class="col-lg-9 info"><?php echo $row_prev['adress']?></div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Category</div>
                                <div class="col-lg-9 info"><?php echo $row_prev['category']?></div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Special Need</div>
                                <div class="col-lg-9 info"><?php echo $row_prev['specialneed']?></div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Confirmation Status</div>
                                <div class="col-lg-9 info"><?php echo $row_prev['confirmed']?></div>
                                <hr>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </main>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
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

$email = $_SESSION['user-email'];
$query = $mysqli->prepare("SELECT firstname,lastname,nationality FROM user_information WHERE uemail=?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_assoc();
$query->close();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--Customize css link-->
    <link rel="stylesheet" href="../css/edit_profile.css">
    <link rel="stylesheet" href="../css/style_new.css">
    <link rel="stylesheet" href="../css/footer.css">


    <!--Swiper cdn-->
    <link rel=" stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/swiper.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--comapny logo font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">

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
                <div class="ms-auto p-1 user-name-top h4 text-success border border-2 border-success rounded">
                    <?php echo $userlogged ?>
                </div>
                <li class="user-drop nav-item dropdown ">
                    <a class="link nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user" id="login-btn"></i>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="user-dropdown">

                        <li><a class="dropdown-item" href="user-regi-login/user_edit_profile.php"><i class="fa-solid fa-user"></i> My Profile</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="booking/bookig_checklist_user.php"><i class="fa-solid fa-tags"></i> My booking</a></li>
                        <hr>
                        <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Sign
                                out</a></li>

                    </ul>
                </li>
            </div>


            <!--navigation Bar-->

            <nav class="header-2 navigation-bar navbar navbar-expand-lg">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="font-weight: 900"><img src="images/menu-burger.png" style="height: 2rem;" alt=""></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto  ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li><a href="../index_user.php" class="nav-link">Home</a></li>

                        <li><a href="daycare_categorywise/daycare_categorywise.php" class="nav-link">Available Daycares</a></li>
                        <li><a href="../parenting_blogs/blogs_home.html" class="nav-link" target="_blank">Parenting-Guides</a></li>
                        </li>




                        <!-- <li class="nav-item dropdown">
                            <a class="link nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                        </li> -->



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
                                    <li class="info-edit"><a href=""><i class="fa-solid fa-user"></i> Profile</a>

                                        <hr>
                                    </li>
                                    <li class="info-edit">
                                        <a href="../booking/booking_checklist_user.php"><i class="fa-solid fa-tags"></i> Booking list
                                            <hr>
                                        </a>
                                    </li>
                                    <li class="info-edit"><a href="user-edit.php"><i class="fa-solid fa-gear"></i> Settings and security
                                            <hr>
                                        </a></li>
                                </ul>


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3  root">First Name</div>
                                <div class="col-lg-9 info"><?php echo $row['firstname'] ?></div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Last Name</div>
                                <div class="col-lg-9 info"><?php echo $row['lastname'] ?></div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root">Email Address</div>
                                <div class="col-lg-9 info"><?php echo $_SESSION['user-email'] ?></div>
                                <hr>
                            </div>
                        </div>


                        <div class="col-lg-12 field">
                            <div class="row">
                                <div class="col-lg-3 root"> Nationality </div>
                                <div class="col-lg-9 info"><?php echo $row['nationality'] ?></div>
                                <hr>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </main>
    <footer class="footer-basic ">
        <div class="row d-flex">
            <div class="col-2 company-name">Children Cloud</div>
            <div class="col-1">
                <ul>
                    <li class="list-head">Customers</li>
                    <li class="cust">Day care center</li>
                    <li class="cust">Public</li>
                </ul>
            </div>
            <div class="col-2">
                <ul>
                    <li class="list-head">Quick Links</li>
                    <li><a class="footer-link" href="#about">
                            Home</a>
                    </li>
                    <li>
                        <a href="" class="footer-link"></a>
                    </li>
                    <li>
                        <a class="footer-link" href="parenting_blogs/blogs_home.html">Parenting Blog</a>
                    </li>
                    <li>
                        <a href="daycare_categorywise\daycare_categorywise.php" class="footer-link">Day Care
                            Categories</a>
                    </li>

                </ul>
            </div>
            <div class="col-2">
                <ul>
                    <li class="list-head">Contributor</li>
                    <li><a class="footer-link" href="https://www.linkedin.com/in/nidita-roy-0537b31b0/"></i>Nidita
                            Roy</a>
                    </li>
                    <li><a class="footer-link" href="https://www.linkedin.com/in/zannatul-fardaush-tripty-8481241b2/">Zannatul Fardaush
                            Tripty</a></li>
                    <li><a class="footer-link" href="https://www.linkedin.com/in/rowshon-akter-roshni-a547461a6/">Rowshon
                            Akter Roshni</a>
                    </li>

                </ul>
            </div>
            <div class="col-3">
                <div class="list-head">Contact Info
                    <ul>
                        <li class="footer-link"><span><i class="fa-solid fa-envelope"></i>
                                u1804018@student.cuet.ac.bd</span>
                        </li>
                        <li class="footer-link"><i class="fa-solid fa-envelope"></i> u1804030@student.cuet.ac.bd
                        </li>
                        <li class="footer-link"><i class="fa-solid fa-envelope"></i> u1804003@student.cuet.ac.bd
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-2">
                <div class="list-head">Follow Us</div>

                <div class="row row-cols-lg-3 row-cols-3 row-cols-md-3">
                    <div class="col"><i class="footer-link fa-brands fa-facebook-square"></i></div>
                    <div class="col"><i class="footer-link fa-solid fa-paper-plane"></i></div>
                    <div class="col"><i class="footer-link fa-brands fa-instagram-square"></i></div>


                </div>
            </div>

        </div>

    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>
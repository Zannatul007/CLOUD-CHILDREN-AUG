<!DOCTYPE html>
<html lang="en">
<?php
//Starting Session
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--Customize css link-->
    <link rel="stylesheet" href="../css/style_new.css">
    <link rel="stylesheet" href="../css/form.css">


    <!--Swiper cdn-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/footer.css">

    <link rel="stylesheet" href="../css/swiper.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!--comapny logo font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">

    <title>Day Care Registration</title>
</head>

<body>
    <?php
    //Checking which is logged
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
    //Configuring with database
    require_once "../config.php";
    $email = $_SESSION['user-email'];
    $_SESSION['user-email'] = $email;
    $daycare_email = $_SESSION['daycare-email'];
    $category = $_SESSION['category'];


    $query = $mysqli->prepare("SELECT payment,necessary_info FROM category WHERE demail=? AND dcategory=?");
    $query->bind_param("ss", $daycare_email, $category);
    $query->execute();
    $result = $query->get_result();
    $row_cat = $result->fetch_assoc();
    $query->close();


    $query = $mysqli->prepare("SELECT dname,dadress,district,zipcode,starttime,endtime,food_nutrition,medication_doctor,sanitary_hygiene,transportation,entertainment FROM daycare_info WHERE demail=?");
    $query->bind_param("s", $daycare_email);
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();
    $query->close();
    ?>

    <header class="header header-in ">

        <div class="header-1">
            <div id="company-logo"><img src="../images/company-logo-removebg-preview.png" alt="">
                <a href="#"> Cloud
                    Children </a>
            </div>
            <div class="icons">
                <div id="login-btn" class="fas fa-user"></div>
            </div>
        </div>

        <!--navigation Bar-->

        <nav class="header-2 navigation-bar navbar navbar-expand-lg">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto  ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#about" class="nav-link">About Us</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li>

                    <li class="nav-item dropdown">
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
                    </li>


                    <li><a href="#parenting-blogs" class="nav-link">Parenting-Guides</a></li>
                </ul>

            </div>

        </nav>

    </header>

    <div class="home-sec container-fluid">
        <div class="row">
            <div class="col-lg-3 cat-details">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="cat-img">
                            <img class=" z-depth-3 img-thumbnail" src="../images/b_new_born.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="star-rating">
                            <span>
                                <i class="fa-light fa-star-sharp"></i>
                            </span>
                            <span>
                                <i class="fa-light fa-star-sharp"></i>
                            </span>
                            <span>
                                <i class="fa-light fa-star-sharp"></i>
                            </span>
                            <span>
                                <i class="fa-light fa-star-sharp"></i>
                            </span>
                            <span>
                                <i class="fa-light fa-star-sharp"></i>
                            </span>
                            <span>
                                <i class="fa-light fa-star-sharp"></i>
                            </span>



                        </div>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <span>
                            <i class="fa-light fa-star-sharp"></i>
                        </span>
                        <span>
                            <i class="fa-light fa-star-sharp"></i>
                        </span>
                        <span>
                            <i class="fa-light fa-star-sharp"></i>
                        </span>
                        <span>
                            <i class="fa-light fa-star-sharp"></i>
                        </span>
                        <span>
                            <i class="fa-light fa-star-sharp"></i>
                        </span>
                        <span>
                            <i class="fa-light fa-star-sharp"></i>
                        </span>
                    </div>
                    <div class="cat-details-info name col-lg-12">

                        <?php
                        echo $row["dname"];
                        ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <span>District : </span>
                        <?php
                        echo $row["district"];
                        ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <span>Address : </span>
                        <?php
                        echo $row["dadress"];
                        ?>
                        <span>,<?php
                                echo $row["zipcode"];
                                ?></span>
                        <hr>
                    </div>

                    <div class="cat-details-info col-lg-12">
                        <span>Hours : </span>
                        <span><?php
                                echo $row["starttime"];
                                ?></span>
                        <span><?php
                                echo $row["starttime"];
                                ?></span>
                        <hr>
                    </div>
                    <div class="cat-details-info col=lg-12">
                        <span>Phone</span>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <span>Email</span>
                        <hr>
                    </div>


                </div>
            </div>
            <div class="col-lg-6">
                <div class="cat-facilities">
                    <h3>Day Care Facilities</h3>
                    <div class="accordion " id="accordionExample">
                        <div class="accordion-item facilities-detail">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Food & nutrition
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php
                                    echo $row["food_nutrition"];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item facilities-detail">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Medication & doctor
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <?php
                                    echo $row["medication_doctor"];
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item facilities-detail">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Sanitary and Hygiene
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php echo $row["sanitary_hygiene"]; ?>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item facilities-detail">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                    Transportation facilities
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php echo $row["transportation"]; ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item facilities-detail">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                    Entertainment Facilities
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <?php echo $row["entertainment"]; ?>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12 give-rating">
                        <h2>Rate your Day Care Center</h2>

                        <div class="rating">
                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>


                        <div class="buttons px-4 mt-0">

                            <button class="rating-submit">Submit</button>

                        </div>
                    </div>
                    <div class="col-lg-12 give-comments">
                        <h2>Day Care Reviews</h2>
                        <?php
                        if (isset($_POST["submit"])) {
                            $comment = $_POST["comment"];
                            $query = $mysqli->prepare("INSERT INTO comment(comments,username,demail) VALUES (?,?,?)");
                            $query->bind_param("sss", $comment, $_SESSION['user-name'], $daycare_email);
                            $query->execute();
                            $query->close();
                        }
                        $query = $mysqli->prepare("SELECT username,comments FROM comment WHERE demail=?");
                        $query->bind_param("s", $daycare_email);
                        $query->execute();
                        $result = $query->get_result();
                        $query->close();
                        ?>

                        <section class="comment-sec bg-white container">
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                //echo "username";
                                // echo '<br>';
                                echo $row['username'];
                                //echo "comment";
                                echo '<br>';
                                echo $row['comments'];
                                echo '<hr>';
                            }

                            ?>

                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                comment: <input type="text" name="comment"><br>

                                <input style="text-align :center;" class="buttons rating-submit " type="submit" name="submit" value="Do Comment!">
                            </form>


                            <button class="text-white" style="text-align :center;"><a style="text-decoration:none; color:white;" href="../booking/booking_daycare.php">Book Now</a></button>
                        </section>
                    </div>
                    <div class="col-lg-12">
                        <div class="button book-btn">
                            <a href="../booking/booking_daycare.php">BOOK NOW</a>
                        </div>

                    </div>

                </div>





            </div>
        </div>



    </div>

    <footer class="footer-basic ">
        <div class="row row-cols-lg-5 row-cols-md-3 row-cols-2">
            <div class="col company-name">Children Cloud</div>
            <div class="col">
                <ul>
                    <li class="list-head">Customers</li>
                    <li class="cust">Day care center</li>
                    <li class="cust">Public</li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li class="list-head">Services</li>
                    <li><a class="footer-link" href="#about">
                            Home</a>
                    </li>
                    <li>
                        <a class="footer-link" href="parenting_blogs/blogs_home.html">Parenting Blog</a>
                    </li>

                </ul>
            </div>
            <div class="col">
                <ul>
                    <li class="list-head">Further Information</li>
                    <li><a class="footer-link" href="../terms_condition.html">Terms and condition</a>
                    </li>
                    <li><a class="footer-link" href="../privacy_policy.html">Privacy policy</a></li>
                    <li><a class="footer-link" href="contact_us.html">Contact Us</a></li>

                </ul>
            </div>
            <div class="col">
                <div class="list-head">Follow Us</div>

                <div class="row row-cols-lg-3 row-cols-3 row-cols-md-3">
                    <div class="col"><i class="fa-brands fa-facebook-square"></i></div>
                    <div class="col"><i class="fa-solid fa-paper-plane"></i></div>
                    <div class="col"><i class="fa-brands fa-instagram-square"></i></div>


                </div>
            </div>

        </div>

    </footer>




    <script src="../js/customize.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>
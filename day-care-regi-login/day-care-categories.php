<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--Customize css link-->
    <!-- <link rel="stylesheet" href="../css/style_new.css"> -->
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/form.css">


    <!--Swiper cdn-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../css/swiper.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--comapny logo font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">

    <title>Day Care Registration</title>
</head>

<body>

    <header class="header header-in container-fluid">

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


                    <li><a href="../parenting_blogs/blogs_home.html" class="nav-link" target="_blank">Parenting-Guides</a></li>
                </ul>

            </div>

        </nav>

    </header>
    <!-- Ending navigation bar -->
    <br>
    <main>
        <div class="form-sec outer-box container">

            <div class="row d-flex align-items-center">
                <div class="inner-content col-lg-6 p-3">

                    <!-- <img id="form-img" src="images/form/form-todd.jpg" alt=""> -->
                    <div class="container thumbnail">
                        <h1>Welcome to Children-cloud!!</h1>
                        <p>
                            Parenting Guide,Daycare, Preschool,School-age,Special-childcare everything in one place for
                            new
                            and young parents.
                        </p>
                    </div>

                </div>
                <!---------------------Showing Contents-------------------------------->
                <!---------------------Validating ------------------------------------>
                <?php
                $email = $_SESSION['email'];
                $toodler = $preschool = $schoolage = $special = $foreigner = "";
                $toodlername = $preschoolname = $schoolagename = $specialname = $foreignername = "";
                $toodlerErr = $preschoolErr = $schoolageErr = $specialErr = $foreignerErr = "";
                $toodlerpay = $preschoolpay = $schoolagepay = $specialpay = $foreignerpay = "";
                $toodlerpayErr = $preschoolpayErr = $schoolagepayErr = $specialpayErr = $foreignerpayErr = "";
                require_once "../config.php";
                $flagtoodler = $flagpreschool = $flagschoolage = $flagspecial = $flagforeigner = 1;
                if (isset($_POST["register"])) {
                    if (empty($_POST["toodler"])) {
                        $toodlerErr = "Fill in atleast one section and section payment!";
                        $flagtoodler = 0;
                    } else {
                        $toodler = $_POST["toodler"];
                        $toodlername = "toodler";
                        $toodlerErr = $toodler;
                    }
                    if (empty($_POST["toodlerpay"])) {
                        $toodlerpayErr = "Fill in atleast one section and section payment!";
                        $flagtoodler = 0;
                    } else {
                        $toodlerpay = $_POST["toodlerpay"];
                        $toodlerpayErr = $toodlerpay;
                    }
                    //
                    if (empty($_POST["preschool"])) {
                        $preschoolErr = "Fill in atleast one section and section payment!";
                        $flagpreschool = 0;
                    } else {
                        $preschool = $_POST["preschool"];
                        $preschoolname = "preschool";
                        $preschoolErr = $preschool;
                    }
                    if (empty($_POST["preschoolpay"])) {
                        $preschoolpayErr = "Fill in atleast one section and section payment!";
                        $flagpreschool = 0;
                    } else {
                        $preschoolpay = $_POST["preschoolpay"];
                        $preschoolpayErr = $preschoolpay;
                    }
                    ////
                    if (empty($_POST["schoolage"])) {
                        $schoolageErr = "Fill in atleast one section and section payment!";
                        $flagschoolage = 0;
                    } else {
                        $schoolage = $_POST["schoolage"];
                        $schoolagename = "schoolage";
                        $schoolageErr = $schoolage;
                    }
                    if (empty($_POST["schoolagepay"])) {
                        $schoolagepayErr = "Fill in atleast one section and section payment!";
                        $flagschoolage = 0;
                    } else {
                        $schoolagepay = $_POST["schoolagepay"];
                        $schoolagepayErr = $schoolagepay;
                    }
                    //
                    if (empty($_POST["special"])) {
                        $specialErr = "Fill in atleast one section and section payment!";
                        $flagspecial = 0;
                    } else {
                        $special = $_POST["special"];
                        $specialname = "special";
                        $specialErr = $special;
                    }
                    if (empty($_POST["specialpay"])) {
                        $specialpayErr = "Fill in atleast one section and section payment!";
                        $flagspecial = 0;
                    } else {
                        $specialpay = $_POST["specialpay"];
                        $specialpayErr = $specialpay;
                    }
                    ///
                    if (empty($_POST["foreigner"])) {
                        $foreignerErr = "Fill in atleast one section and section payment!";
                        $flagforeigner = 0;
                    } else {
                        $foreigner = $_POST["foreigner"];
                        $foreignername = "foreigner";
                        $foreignerErr = $foreigner;
                    }
                    if (empty($_POST["foreignerpay"])) {
                        $foreignerpayErr = "Fill in atleast one section and section payment!";
                        $flagforeigner = 0;
                    } else {
                        $foreignerpay = $_POST["foreignerpay"];
                        $foreignerpayErr = $foreignerpay;
                    }
                    if ($flagforeigner == 1 || $flagpreschool == 1 || $flagschoolage == 1 || $flagspecial == 1 || $flagtoodler) {
                        if ($flagtoodler == 1 && $toodler != "Fill in atleast one section and section payment!") {

                            $query = $mysqli->prepare("INSERT INTO category(dcategory,demail,payment,necessary_info) VALUES (?,?,?,?)");

                            $query->bind_param("ssss", $toodlername, $email, $toodlerpay, $toodler);
                            $query->execute();
                            $query->close();
                        }
                        //
                        if ($flagpreschool == 1 && $preschool != "Fill in atleast one section and section payment!") {

                            $query = $mysqli->prepare("INSERT INTO category(dcategory,demail,payment,necessary_info) VALUES (?,?,?,?)");

                            $query->bind_param("ssss", $preschoolname, $email, $preschoolpay, $preschool);
                            $query->execute();
                            $query->close();
                        }
                        //
                        if ($flagschoolage == 1 && $schoolage != "Fill in atleast one section and section payment!") {

                            $query = $mysqli->prepare("INSERT INTO category(dcategory,demail,payment,necessary_info) VALUES (?,?,?,?)");

                            $query->bind_param("ssss", $schoolagename, $email, $schoolagepay, $schoolage);
                            $query->execute();
                            $query->close();
                        }
                        //
                        if ($flagspecial == 1 && $special != "Fill in atleast one section and section payment!") {

                            $query = $mysqli->prepare("INSERT INTO category(dcategory,demail,payment,necessary_info) VALUES (?,?,?,?)");

                            $query->bind_param("ssss", $specialname, $email, $specialpay, $special);
                            $query->execute();
                        }
                        //
                        if ($flagforeigner == 1 && $foreigner != "Fill in atleast one section and section payment!") {

                            $query = $mysqli->prepare("INSERT INTO category(dcategory,demail,payment,necessary_info) VALUES (?,?,?,?)");

                            $query->bind_param("ssss", $foreignername, $email, $foreignerpay, $foreigner);
                            $query->execute();
                            $query->close();
                        }
                        echo '<script>window.location.href = "daycare-login.php"</script>';
                    }
                }

                ?>
                <!-------------------Form Begin------------------------------------->
                <form class="daycare-form col-lg-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="container mt-5 mb-5">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <h1>
                                Categories
                            </h1>
                            <small style="color:red;font-size:12px;">*Please fillup these required fields
                                with
                                the proper
                                information about your
                                daycare which will be shown on our website</small>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Toddler
                                    </button>

                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <h6>Special Care for Infants.</h6>
                                        <textarea name="toodler" value="<?php echo $toodlerErr; ?>" id="foreigner-teaching" cols="30" rows="10"><?php echo $toodlerErr; ?></textarea>
                                        <h6>Payment Per hour</h6>
                                        <textarea name="toodlerpay" value="<?php echo $toodlerpayErr; ?>" id="payment-per-hour-school" cols="30" rows="10"><?php echo $toodlerpayErr; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Pre-School
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <h6>Schooling & Teaching</h6>
                                        <textarea name="preschool" value="<?php echo $preschoolErr; ?>" id="schooling-teaching" cols="30" rows="10"><?php echo $preschoolErr; ?></textarea>
                                        <h6>Payment Per hour</h6>
                                        <textarea name="preschoolpay" value="<?php echo $preschoolpayErr; ?>" id="payment-per-hour-preschool" cols="30" rows="10"><?php echo $preschoolpayErr; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        School-Age
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <h6>Advance Teaching(Tution, Homework and Library Facilities)</h6>
                                        <textarea name="schoolage" value="<?php echo $schoolageErr; ?>" id="advance-teaching" cols="30" rows="10"><?php echo $schoolageErr; ?></textarea>
                                        <h6>Payment Per hour</h6>
                                        <textarea name="schoolagepay" value="<?php echo $schoolagepayErr; ?>" id="payment-per-hour-school" cols="30" rows="10"><?php echo $schoolagepayErr; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        Special-Child
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <h6>Special Need(Autism,Language delays,Cognitive delays,Social
                                            disorder,Physical
                                            disabilities)
                                        </h6>
                                        <textarea name="special" value="<?php echo $specialErr; ?>" id="speical-teaching" cols="30" rows="10"><?php echo $specialErr; ?></textarea>
                                        <h6>Payment Per hour</h6>
                                        <textarea name="specialpay" value="<?php echo $specialpayErr; ?>" id="payment-per-hour-school" cols="30" rows="10"><?php echo $specialpayErr; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                        Foreigner-Child
                                    </button>
                                </h2>
                                <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <h6>Learning and entertainment in English language</h6>
                                        <textarea name="foreigner" value="<?php echo $foreignerErr; ?>" id="foreigner-teaching" cols="30" rows="10"><?php echo $foreignerErr; ?></textarea>
                                        <h6>Payment Per hour</h6>
                                        <textarea name="foreignerpay" value="<?php echo $foreignerpayErr; ?>" id="payment-per-hour-school" cols="30" rows="10"><?php echo $foreignerpayErr; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <input type="submit" name="register" value="Sign Up" class="form-btn  w-100">
                            </div>
                        </div>
                    </div>

                </form>

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

</html>
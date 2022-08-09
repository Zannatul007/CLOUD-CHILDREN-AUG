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
    <link rel="stylesheet" href="../css/form.css">


    <!--Swiper cdn-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
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


                    <li><a href="#parenting-blogs" class="nav-link">Parenting-Guides</a></li>
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
                <!--------------------Showing Contents------------------->
                <!----------Validating Elements------------------------>
                <?php
                $email = $_SESSION['email'];
                $food = $medication = $sanitary = $transportation = $entertainment = "";
                $foodErr = $medicationErr = $sanitaryErr = $transportationErr = $entertainmentErr = "";
                require_once "../config.php";
                if (isset($_POST["register"])) {
                    if (empty($_POST["food"])) {
                        $foodErr = "Fill this Field!";
                    } else {
                        $food = $_POST["food"];
                        $foodErr = $food;
                    }
                    if (empty($_POST["medication"])) {
                        $medicationErr = "Fill this Field!";
                    } else {
                        $medication = $_POST["medication"];
                        $medicationErr = $medication;
                    }
                    if (empty($_POST["sanitary"])) {
                        $sanitaryErr = "Fill this Field!";
                    } else {
                        $sanitary = $_POST["sanitary"];
                        $sanitaryErr = $sanitary;
                    }
                    if (empty($_POST["transportation"])) {
                        $transportationErr = "Fill this Field!";
                    } else {
                        $transportation = $_POST["transportation"];
                        $transportationErr = $transportation;
                    }
                    if (empty($_POST["entertainment"])) {
                        $entertainmentErr = "Fill this Field!";
                    } else {
                        $entertainment = $_POST["entertainment"];
                        $entertainmentErr = $entertainment;
                    }


                    if ($foodErr != "Fill this Field!" && $medicationErr != "Fill this Field!" && $entertainmentErr != "Fill this Field!" && $transportationErr != "Fill this Field!" && $sanitaryErr != "Fill this Field!") {
                        $query = $mysqli->prepare("UPDATE daycare_info SET food_nutrition=? , medication_doctor=? , sanitary_hygiene=? , transportation=? , entertainment=?  WHERE demail= ?  ");

                        $query->bind_param("ssssss", $food, $medication, $sanitary, $transportation, $entertainment, $email);
                        if ($query->execute()) {
                            $_SESSION['email'] = $email;
                            echo '<script>window.location.href = "day-care-categories.php"</script>';
                        }
                    }
                }



                ?>
                <!---------------Form Start------------------>

                <form class="daycare-form col-lg-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="container mt-5 mb-5">
                        <div class="small-font accordion accordion-flush" id="accordionFlushExample1">
                            <h1>
                                Facilities
                            </h1>
                            <small style="color:red;font-size:12px;">*Please fillup these required fields
                                with
                                the proper
                                information about your
                                daycare which will be shown on our website</small>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-food">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-food-collapse" aria-expanded="false" aria-controls="flush-food-collapse">
                                        Food & Nutrition
                                    </button>

                                </h2>
                                <div id="flush-food-collapse" class="accordion-collapse collapse" aria-labelledby="flush-food" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="food" value="<?php echo $food; ?>" id="payment-food" cols="30" rows="10"><?php echo $foodErr; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-medi">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-medi-collapse" aria-expanded="false" aria-controls="flush-medi-collapse">
                                        Medication,Treatment & Doctor
                                    </button>

                                </h2>
                                <div id="flush-medi-collapse" class="accordion-collapse collapse" aria-labelledby="flush-medi" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="medication" value="<?php echo $medication; ?>" cols="30" rows="10"><?php echo $medicationErr; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-hygiene">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-hygiene-collapse" aria-expanded="false" aria-controls="flush-hygiene-collapse">
                                        Sanitary Kit & Hygiene
                                    </button>

                                </h2>
                                <div id="flush-hygiene-collapse" class="accordion-collapse collapse" aria-labelledby="flush-hygiene" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="sanitary" value="<?php echo $sanitary; ?>" id="payment-sanitary" cols="30" rows="10"><?php echo $sanitaryErr; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-transport">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-transport-collapse" aria-expanded="false" aria-controls="flush-transport-collapse">
                                        Transportation
                                    </button>

                                </h2>
                                <div id="flush-transport-collapse" class="accordion-collapse collapse" aria-labelledby="flush-transport" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="transportation" value="<?php echo $transportation; ?>" id="payment-transportation" cols="30" rows="10"><?php echo $transportationErr; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-entertainment">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-entertainment-collapse" aria-expanded="false" aria-controls="flush-entertainment-collapse">
                                        Entertainment
                                    </button>

                                </h2>
                                <div id="flush-entertainment-collapse" class="accordion-collapse collapse" aria-labelledby="flush-entertainment" data-bs-parent="#accordionFlushExample1">
                                    <div class="accordion-body">

                                        <textarea name="entertainment" value="<?php echo $entertainment; ?>" id="payment-entertainment" cols="30" rows="10"><?php echo $entertainmentErr; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <input type="submit" name="register" value="NEXT" class="form-btn w-100">
                        </div>
                    </div>

                </form>

            </div>
        </div>




        <script src="../js/bootstrap.bundle.min.js"></script>
    </main>
</body>

</html>
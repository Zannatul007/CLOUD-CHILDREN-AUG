<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<?php
$daycare = $people = $userlogged = "";
$daycare = $_SESSION['daycare-name'];
$people = $_SESSION['user-name'];
if ($daycare != "") {
    $userlogged = $daycare;
}
if ($people != "") {
    $userlogged = $people;
}
?>

<?php
/*
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    echo '<script>window.location.href = "../index.html"</script>';
    exit;
}
*/
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap Link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/footer.css">

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
                <!--------------------------Showing Contents---------------------->
                <!----------------------Form Validaion----------------------------->
                <?php
                $email = $password = $l = "";
                $emailErr = $passwordErr = "";
                require_once "../config.php";
                if (isset($_POST["login"])) {
                    if (empty($_POST["email"])) {
                        $emailErr = "Please give email!";
                    } else {
                        $email = $_POST["email"];
                        $emailErr = "";
                    }

                    if (empty($_POST["password"])) {
                        $passwordErr = "Please give password!";
                    } else {
                        $password = $_POST["password"];
                        $passwordErr = "";
                    }
                    if ($emailErr == "" && $passwordErr == "") {


                        $query = $mysqli->prepare("SELECT dpassword FROM daycare_info WHERE demail=?");
                        $query->bind_param("s", $email);
                        $query->execute();
                        $result = $query->get_result();
                        $query->close();
                        if ($result->num_rows == 0) {
                            $emailErr = "This email is not registered!";
                        } else {
                            $row = $result->fetch_array(MYSQLI_NUM);
                            $hashed_pass = $row[0];

                            if (password_verify($password, $hashed_pass)) {
                                $query = $mysqli->prepare("SELECT dname FROM daycare_info WHERE demail=?");
                                $query->bind_param("s", $email);
                                $query->execute();
                                $result = $query->get_result();
                                $query->close();
                                $row = $result->fetch_array(MYSQLI_NUM);

                                $daycare_name = $row[0];
                                $_SESSION["loggedin"] = true;
                                $_SESSION['daycare-email'] = $email;
                                $_SESSION["daycare-name"] = $daycare_name;
                                echo '<script>window.location.href = "../booking/booking_checklist_daycare.php"</script>';
                            } else {
                                $passwordErr = "Password is incorrect!";
                            }
                        }
                    }
                }


                ?>

                <!----------------------------Form Start--------------------------->

                <form class="daycare-login-form col-lg-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row d-flex">
                        <p class="h3 mb-3">Log in as a DayCare Center</p>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floating-day-email" placeholder="Daycare Email Address">
                                <label for="floating-day-email">DayCare Email Address</label><span style="color:red;font-size:1rem ;">*<?php echo $emailErr; ?></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3"><input type="password" class="form-control" name="password" id="floating-day-pass" placeholder="Password">
                                <label for="floating-day-pass">Password</label><span style="color:red;font-size:1rem ;">*<?php echo $passwordErr; ?></span>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="submit" name="login" value="Login" class="form-btn  w-100">
                        </div>
                        <div class="col-lg-12 mt-3" style="text-align:center">
                            <h6>Don't have an account?
                                <a href="../day-care-regi-login/daycare-regi-new.html"> Create One</a>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>






    </main>
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
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
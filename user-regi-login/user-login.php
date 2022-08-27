<!DOCTYPE html>
<html lang="en">
<?php
session_start();
/* 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    echo '<script>window.location.href = "../index.html"</script>';
    exit;
}
*/
?>
<?php
$daycare = $people = $userlogged = "";
if (isset($_SESSION["daycare-name"])) {
    $daycare = $_SESSION['daycare-name'];
}
if (isset($_SESSION["user-name"])) {
    $people = $_SESSION['user-name'];
}
//$daycare=$_SESSION['daycare-name'];
//$people=$_SESSION['user-name'];
if ($daycare != "") {
    $userlogged = $daycare;
}
if ($people != "") {
    $userlogged = $people;
}
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
    <link rel="stylesheet" href="../css/footer.css">


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
                    <li><a href="../index_user.php" class="nav-link">Home</a></li>
                    <!-- <li><a href="#about" class="nav-link">About Us</a></li>
                    <li><a href="#services" class="nav-link">Services</a></li> -->
                    <li><a href="daycare_categorywise/daycare_categorywise.php" class="nav-link">Available Daycares</a></li>
                    <li><a href="../parenting_blogs/blogs_home.html" target="_blenk" class="nav-link">Parenting-Guides</a></li>
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
                <!------------------------Showing Contents----------------->
                <!-------------------------Validation------------------------------->
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


                        $query = $mysqli->prepare("SELECT upassword FROM user_information WHERE uemail=?");
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
                                $query = $mysqli->prepare("SELECT firstname FROM user_information WHERE uemail=?");
                                $query->bind_param("s", $email);
                                $query->execute();
                                $result = $query->get_result();
                                $query->close();
                                $row = $result->fetch_array(MYSQLI_NUM);
                                $user_name = $row[0];


                                $_SESSION['user-email'] = $email;
                                $_SESSION['user-name'] = $user_name;
                                $_SESSION["loggedin"] = true;
                                $_SESSION['user-logged-in'] = true;

                                echo '<script>window.location.href = "../index_user.php"</script>';
                                // echo '<script>window.location.href = "../daycare_categorywise/daycare_categorywise.php"</script>';

                            } else {
                                $passwordErr = "Password is incorrect!";
                                $l = "Not Successful!";
                            }
                        }
                    }
                }


                ?>


                <!-----------------------Form Begin---------------------->

                <form class="user-login-form col-lg-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row d-flex">
                        <p class="h3 mb-3">Login as an user</p>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floating-user-email" placeholder="user Email Address" required>
                                <label for="floating-user-email">Email Address</label><span style="color:red;font-size:1rem ;">*<?php echo $emailErr; ?></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3"><input type="password" class="form-control" name="password" id="floating-user-pass" placeholder="Password" required>
                                <label for="floating-user-pass"> Password</label><span style="color:red;font-size:1rem ;">*<?php echo $passwordErr; ?></span>

                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <input type="submit" name="login" value="Login" class="form-btn  w-100">
                        </div>
                        <div class="col-lg-12 mt-3" style="text-align:center">
                            <h6>Don't have an account?
                                <a href="../user-regi-login/user-regi.php"> Create One</a>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
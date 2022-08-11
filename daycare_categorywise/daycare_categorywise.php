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
    <link rel="stylesheet" href="../css/swiper.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!--comapny logo font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">

    <title>Day Care Categories</title>
</head>

<?php
//Checking which user is loggedin
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


<body>

    <!-- navigation bar -->
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




    <!------------------------Showing Contents----------------->
    <!-----------------Booking for Toodler Section------------->
    <br>
    <h1 class="bg-primary p-3 text-white" id="toddler">Toddler-section</h1>
    <?php

    $l = "";
    $k = -1; //email array index
    $email = array();
    //Configuring with database
    require_once "../config.php";

    //Query For Toodler
    $query = $mysqli->prepare("SELECT demail FROM category WHERE dcategory=?");
    $cat = "toodler";
    $query->bind_param("s", $cat);
    $query->execute();

    $result = $query->get_result();
    $query->close();


    while ($row = $result->fetch_assoc()) {

        $k++;
        $email[$k] = $row["demail"];
        //For see details button
        $o = (string)$k . "_" . "toodler";
        $query = $mysqli->prepare("SELECT payment FROM category WHERE dcategory=? AND demail=?");
        $cat = "toodler";
        $query->bind_param("ss", $cat, $row["demail"]);
        $email_ = $row["demail"];
        $query->execute();
        $result_1 = $query->get_result();
        $row_1 = $result_1->fetch_assoc();
        $query->close();

        $query = $mysqli->prepare("SELECT dname,dadress,district FROM daycare_info WHERE demail=?");
        $query->bind_param("s", $email_);
        $query->execute();
        $result_2 = $query->get_result();
        $row_2 = $result_2->fetch_assoc();
        $query->close();

        //Card Design
        //Showing Daycare Name
    ?>

        <!--Section: News of the day-->
        <div class="row cols-lg-3">
            <div class="col">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cat-img">
                            <img src="../images/blogs/mother_baby.jpg" alt="">
                        </div>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php
                        echo $row_2["dname"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo "toddler"; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_1["payment"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_2['district']; ?>
                        <hr>
                    </div>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <button class="btn btn-primary btn-block btn-sm btn filter_status" type="submit" name="<?php echo $o; ?>">Book Now!</button>

                </form>
            </div>
        </div>





        // <?php
        }
        //echo $row_2["dname"];
        //Showing category
        //echo "toodler";
        //echo '<br>';
        //echo '<br>';
        //Showing Pament
        //echo '<br>';
        //echo $row_1["payment"];
        //echo '<br>';
        //Showing Daycare Adress
        //echo $row_2["dadress"];
        //echo '<br>';
        //Showing district
        //echo $row_2['district'];
        //echo '<br>';

            ?>

    <!---------------------See Details of DayCare----------------------------->


    <br>
    <br>

    <h1 class="bg-primary text-white p-3" id="preschool">Preschool Section</h1>
    <?php
    //Preschool Section

    $query = $mysqli->prepare("SELECT demail FROM category WHERE dcategory=?");
    $cat = "preschool";
    $query->bind_param("s", $cat);
    $query->execute();

    $result = $query->get_result();
    $query->close();


    while ($row = $result->fetch_assoc()) {

        $k++;
        $email[$k] = $row["demail"];
        $o = (string)$k . "_" . "preschool";
        $query = $mysqli->prepare("SELECT payment FROM category WHERE dcategory=? AND demail=?");
        $cat = "preschool";
        $query->bind_param("ss", $cat, $row["demail"]);
        $email_ = $row["demail"];
        $query->execute();
        $result_1 = $query->get_result();
        $row_1 = $result_1->fetch_assoc();
        $query->close();

        $query = $mysqli->prepare("SELECT dname,dadress,district FROM daycare_info WHERE demail=?");
        $query->bind_param("s", $email_);
        $query->execute();
        $result_2 = $query->get_result();
        $row_2 = $result_2->fetch_assoc();
        $query->close();
    ?>

        <div class="row cols-lg-3">
            <div class="col">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cat-img">
                            <img src="../images/blogs/mother_baby.jpg" alt="">
                        </div>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php
                        echo $row_2["dname"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo "Pre-school"; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_1["payment"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_2['district']; ?>
                        <hr>
                    </div>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <button class="btn btn-primary btn-block btn-sm btn filter_status" type="submit" name="<?php echo $o; ?>">Book Now!</button>

                </form>
            </div>
        </div>








    <?php

    }


    ?>
    <br>
    <h1 class="bg-primary p-3 text-white" id="schoolage">School Age</h1>
    <?php
    //School Age Section
    $query = $mysqli->prepare("SELECT demail FROM category WHERE dcategory=?");
    $cat = "schoolage";
    $query->bind_param("s", $cat);
    $query->execute();

    $result = $query->get_result();
    $query->close();


    while ($row = $result->fetch_assoc()) {

        $k++;
        $email[$k] = $row["demail"];
        $o = (string)$k . "_" . "schoolage";
        $query = $mysqli->prepare("SELECT payment FROM category WHERE dcategory=? AND demail=?");
        $cat = "schoolage";
        $query->bind_param("ss", $cat, $row["demail"]);
        $email_ = $row["demail"];
        $query->execute();
        $result_1 = $query->get_result();
        $row_1 = $result_1->fetch_assoc();
        $query->close();

        $query = $mysqli->prepare("SELECT dname,dadress,district FROM daycare_info WHERE demail=?");
        $query->bind_param("s", $email_);
        $query->execute();
        $result_2 = $query->get_result();
        $row_2 = $result_2->fetch_assoc();
        $query->close();
    ?>

        <div class="row cols-lg-3">
            <div class="col">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cat-img">
                            <img src="../images/blogs/mother_baby.jpg" alt="">
                        </div>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php
                        echo $row_2["dname"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo "School-Age"; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_1["payment"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_2['district']; ?>
                        <hr>
                    </div>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <button class="btn btn-primary btn-block btn-sm btn filter_status" type="submit" name="<?php echo $o; ?>">Book Now!</button>

                </form>
            </div>
        </div>




        <!----------------------------------See Day Care Details-------------->
        <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <button class="btn-block btn-sm btn filter_status" type="submit" name="<?php echo $o; ?>">Book Now!</button>

        </form> -->
        <br>
    <?php

    }


    ?>
    <br>
    <br>
    <h1 class="bg-primary text-white p-3" id="special">Special Child</h1>
    <?php
    //Special Child Section
    $query = $mysqli->prepare("SELECT demail FROM category WHERE dcategory=?");
    $cat = "special";
    $query->bind_param("s", $cat);
    $query->execute();
    $result = $query->get_result();
    $query->close();


    while ($row = $result->fetch_assoc()) {

        $k++;
        $email[$k] = $row["demail"];
        $o = (string)$k . "_" . "special";
        $query = $mysqli->prepare("SELECT payment FROM category WHERE dcategory=? AND demail=?");
        $cat = "special";
        $query->bind_param("ss", $cat, $row["demail"]);
        $email_ = $row["demail"];
        $query->execute();
        $result_1 = $query->get_result();
        $row_1 = $result_1->fetch_assoc();
        $query->close();

        $query = $mysqli->prepare("SELECT dname,dadress,district FROM daycare_info WHERE demail=?");
        $query->bind_param("s", $email_);
        $query->execute();
        $result_2 = $query->get_result();
        $row_2 = $result_2->fetch_assoc();
        $query->close();
    ?>

        <div class="row cols-lg-3">
            <div class="col">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cat-img">
                            <img src="../images/blogs/mother_baby.jpg" alt="">
                        </div>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php
                        echo $row_2["dname"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo "Special-Child"; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_1["payment"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_2['district']; ?>
                        <hr>
                    </div>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <button class="btn btn-primary btn-block btn-sm btn filter_status" type="submit" name="<?php echo $o; ?>">Book Now!</button>

                </form>
            </div>
        </div>

        <!-------------------------Show Day Care Details--------------------------------->

        <br>
    <?php

    }


    ?>

    <br>
    <br>
    <h1 class="bg-primary text-white p-3" id="foreigner">Foreigner Child</h1>
    <?php
    //Foreigner Section
    $query = $mysqli->prepare("SELECT demail FROM category WHERE dcategory=?");
    $cat = "foreigner";
    $query->bind_param("s", $cat);
    $query->execute();
    $result = $query->get_result();
    $query->close();

    //$row = $result->fetch_array(MYSQLI_NUM);
    while ($row = $result->fetch_assoc()) {
        //echo "email: " . $row["demail"]. " - payment: " . $row["payment"]. "- necessary_info " . $row["necessary_info"]. "<br>";
        $k++;
        $email[$k] = $row["demail"];
        $o = (string)$k . "_" . "foreigner";
        $query = $mysqli->prepare("SELECT payment FROM category WHERE dcategory=? AND demail=?");
        $cat = "foreigner";
        $query->bind_param("ss", $cat, $row["demail"]);
        $email_ = $row["demail"];
        $query->execute();
        $result_1 = $query->get_result();
        $row_1 = $result_1->fetch_assoc();
        $query->close();

        $query = $mysqli->prepare("SELECT dname,dadress,district FROM daycare_info WHERE demail=?");
        $query->bind_param("s", $email_);
        $query->execute();
        $result_2 = $query->get_result();
        $row_2 = $result_2->fetch_assoc();
        $query->close();


    ?>

        <!--------------------------------Showing Day Care Details--------------->

        <div class="row cols-lg-3">
            <div class="col">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cat-img">
                            <img src="../images/blogs/mother_baby.jpg" alt="">
                        </div>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php
                        echo $row_2["dname"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo "Foreign-Child"; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_1["payment"]; ?>
                        <hr>
                    </div>
                    <div class="cat-details-info col-lg-12">
                        <?php echo $row_2['district']; ?>
                        <hr>
                    </div>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <button class="btn btn-primary btn-block btn-sm btn filter_status" type="submit" name="<?php echo $o; ?>">Book Now!</button>

                </form>
            </div>
        </div>

        <br>
    <?php

    }


    //Going to Daycare Page if submitted

    for ($d = 0; $d < sizeof($email); $d++) {
        //Toodler
        if (isset($_POST[(string)$d . "_" . "toodler"])) {

            $daycare_email = $email[$d];
            $_SESSION['daycare-email'] = $daycare_email;
            $_SESSION['category'] = "toodler";

            echo '<script>window.location.href = "daycarepage.php"</script>';
        }
        //Preschool
        if (isset($_POST[(string)$d . "_" . "preschool"])) {

            $daycare_email = $email[$d];
            $_SESSION['daycare-email'] = $daycare_email;
            $_SESSION['category'] = "preschool";

            echo '<script>window.location.href = "daycarepage.php"</script>';
        }
        //Schoolage

        if (isset($_POST[(string)$d . "_" . "schoolage"])) {

            $daycare_email = $email[$d];
            $_SESSION['daycare-email'] = $daycare_email;
            $_SESSION['category'] = "schoolage";


            echo '<script>window.location.href = "daycarepage.php"</script>';
        }
        //Special
        if (isset($_POST[(string)$d . "_" . "special"])) {

            $daycare_email = $email[$d];
            $_SESSION['daycare-email'] = $daycare_email;
            $_SESSION['category'] = "special";


            echo '<script>window.location.href = "daycarepage.php"</script>';
        }

        //Foreigner
        if (isset($_POST[(string)$d . "_" . "foreigner"])) {

            $daycare_email = $email[$d];
            $_SESSION['daycare-email'] = $daycare_email;
            $_SESSION['category'] = "foreigner";


            echo '<script>window.location.href = "daycarepage.php"</script>';
        }
    }
    ?>
    </div>
    </div>


    <script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
//Starting Session
session_start();
?>
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../customize-styles/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../customize-styles/regi-form.css">
    <script src="https://kit.fontawesome.com/bc867c7232.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,400&display=swap" rel="stylesheet">

    <title>User login form </title>
</head>

<body>

    <!-- navigation bar -->
    <div class="container mb-5">
        <nav class="navbar fixed-top navbar-expand-lg">

            <a class="link navbar-brand" href="#">Children-cloud</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="link nav-link active" aria-current="page" href="../index.html">Home</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="link nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="link nav-link" href="#services">Services</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="link nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Child-Care Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

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
                    <li class="nav-item">
                        <a class="link nav-link" href="">Parenting-Guide</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="user-dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="user-dropdown">
                            <li><a class="dropdown-item" href="../login-page.html">Log In</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="../register-page.html">Register</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
    </div>
    <!-- Ending navigation bar -->
    <!-- <div class="outer-box container mt-5 mb-5">

        <div class="row d-flex  align-items-center">
            <div class=" col-lg-6 p-3">

                <!-- =<img id="form-img" src="images/form/form-todd.jpg" alt=""> 
                <div class="container thumbnail">
                    <h1>Welcome to Children-cloud!!</h1>
                    <p>
                        Parenting Guide,user, Preschool,School-age,Special-childcare everything in one place for
                        new
                        and young parents.
                    </p>
                </div>

            </div>
        </div>
    </div> -->
    <!------------------------Showing Contents----------------->
    <!-----------------Booking for Toodler Section------------->
    <div class="container toddler-sec">
        <h1 class="bg-primary text-white p-3 center">Toddler-section</h1>
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

            //Card Design
            //Showing Daycare Name
        ?>

            <!--Section: News of the day-->
            <section class="container my-5 " style="height:15rem;background-color:aliceblue">
                <div class="row gx-5">
                    <div class="col-md-6 mb-4">
                        <div class="bg-image hover-overlay ripple shadow-2-strong rounded-5" data-mdb-ripple-color="light">
                            <img src="https://mdbcdn.b-cdn.net/img/new/slides/080.webp" class="img-thumbnail" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">

                        <h4><strong><?php
                                    echo '<br>';
                                    echo $row_2["dname"];
                                    echo '<br>'; ?></strong></h4>
                        <p class="categoryWise">
                            <?php
                            echo $row_2['district'];
                            echo '<br>';
                            ?>

                        </p>
                        <p class="categoryWise"> <?php
                                                    echo "schoolage";
                                                    echo '<br>'; ?>
                        </p>

                        <p class="categoryWise">
                            <?php
                            echo $row_1["payment"];
                            echo '<br>';
                            ?>
                        </p>

                        <p class="categoryWise">
                            <?php
                            echo $row_2["dadress"];
                            echo '<br>';
                            ?>
                        </p>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <button class="btn btn-primary btn-block btn-sm btn filter_status" type="submit" name="<?php echo $o; ?>">Book Now!</button>

                        </form>
                    </div>
                </div>
            </section>

    </div>
<?php
        }
?>





<!---------------------See Details of DayCare----------------------------->





//Going to Daycare Page if submitted
<?php
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



<script src="../js/bootstrap.bundle.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

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

    <!--new login form-->
    <main>
        <section class="form-sec container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-img">

                    </div>
                </div>
                <!------------------------Showing Contents------------------------------>
                <!---------------------Validating Info----------------------------------->

                <?php
                $name = $email = $number = $password = $confirmpassword = $adress = $district = $zipcode = $starttime = $starttimespec = $endtime = $endtimespec = $start = $end = "";
                $nameErr = $emailErr = $passwordErr = $confirmpasswordErr = $adressErr = $districtErr = $zipcodeErr = $starttimeErr = $starttimespecErr = $endtimeErr = $endtimespecErr = "";
                require_once "../config.php";
                if (isset($_POST["register"])) {
                    if (empty($_POST["name"])) {
                        $nameErr = "Name must be given!";
                    } else {
                        $name = $_POST["name"];
                        $nameErr = "";
                    }
                    if (empty($_POST["zipcode"])) {
                        $zipcodeErr = "Zipcode must be given!";
                    } else {
                        $zipcode = $_POST["name"];
                        $zipcodeErr = "";
                    }
                    if (empty($_POST["number"])) {
                        $number = " ";
                    } else {
                        $number = $_POST["number"];
                        $number = (string)$number;
                    }

                    if (empty($_POST["starttime"])) {
                        $starttimeErr = "Starttime must be given!";
                    } else {
                        $starttime = $_POST["starttime"];
                        $starttimeErr = "";
                    }
                    if (empty($_POST["starttimespec"])) {
                        $starttimespecErr = "AM/PM??!";
                    } else {
                        $starttimespec = $_POST["starttimespec"];
                        $starttimespecErr = "";
                    }
                    if (empty($_POST["endtime"])) {
                        $endtimeErr = "Endtime must be given!";
                    } else {
                        $endtime = $_POST["endtime"];
                        $endtimeErr = "";
                    }
                    if (empty($_POST["endtimespec"])) {
                        $endtimespecErr = "AM/PM??!";
                    } else {
                        $endtimespec = $_POST["endtimespec"];
                        $endtimespecErr = "";
                    }

                    if ($starttimeErr == $starttimespecErr && $endtimeErr == $endtimespecErr && $endtimeErr == "" && $starttimeErr == "") {
                        $start = (string)$starttime . " " . $starttimespec;
                    }
                    if ($endtimeErr == $endtimespecErr && $endtimeErr == "") {
                        $end = (string)$endtime . " " . $endtimespec;
                    }





                    if (empty($_POST["district"])) {
                        $districtErr = "District must be given!";
                    } else {
                        $district = $_POST["district"];
                        $districtErr = "";
                    }

                    if (empty($_POST["email"])) {
                        $emailErr = "Email should be given!";
                    } else {
                        $email = $_POST["email"];
                        $query = $mysqli->prepare("SELECT *FROM daycare_info WHERE demail=?");
                        $query->bind_param("s", $email);
                        $query->execute();
                        if ($query->get_result()->num_rows > 0) {
                            $emailErr = "This email is already in use!";
                        } else {
                            $query->close();
                            $emailErr = "";
                        }
                    }
                    if (empty($_POST["password"])) {
                        $passwordErr = "Password should be given!";
                    } else {
                        $password = $_POST["password"];
                    }
                    if (empty($_POST["confirmpassword"])) {
                        $confirmpasswordErr = "Password confirmation is necessary!";
                    } else {
                        $confirmpassword = $_POST["confirmpassword"];
                    }
                    if ($password != $confirmpassword) {
                        $confirmpasswordErr = "Password hasn't been matched!";
                    } else {
                        $passwordhash = password_hash($password, PASSWORD_BCRYPT);
                        $passwordErr = "";
                        $confirmpasswordErr = "";
                    }


                    if ($starttimespecErr == $starttimeErr && $starttimeErr == "" && $endtimespecErr == $endtimeErr && $endtimeErr == "" && $nameErr == $emailErr && $emailErr == $passwordErr && $passwordErr == $confirmpasswordErr && $confirmpasswordErr == $districtErr && $districtErr == $zipcodeErr && $zipcodeErr == "") {
                        $query = $mysqli->prepare("INSERT INTO daycare_info(dname,demail,dnumber,dpassword,dadress,district,zipcode,starttime,endtime) VALUES (?,?,?,?,?,?,?,?,?)");
                        $query->bind_param("ssssssdss", $name, $email, $number, $passwordhash, $adress, $district, $zipcode, $start, $end);
                        $result = $query->execute();
                        if ($result) {
                            echo '<p class="container" style="text-align:center"><b style="color:green">Your registration was successful!</b></p>';
                            //going to login page
                            //session_start();
                            //$_SESSION['email'] = $email;

                            header("location: day-care-facilities.php");
                        } else {
                            echo '<p class="container" style="text-align:center" ><b style="color:red">OPPS!!!<b/>Something went wrong!</p>';
                        }
                    }
                }


                ?>


                <!----------------End of Validating Info---------------------------->

                <form class=" daycare-form col-lg-8 pt-5 pb-5" action="<?php echo htmlspecialchars($_SERVER["
                    PHP_SELF"]); ?>" method="post">
                    <div class="row d-flex">
                        <p class="h3 mb-3">Create Account as a Day-Care Center</p>
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">

                                <input type="text" class="form-control" name="name" id="floating-name" placeholder="Daycare Name" value="<?php echo $name; ?>" required>

                                <label for="floating-name"><span style="color:red;font-size:1rem ;">*
                                        <?php echo $nameErr; ?>
                                    </span>
                                    DayCare Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" name="email" id="floating-email" placeholder="Daycare Email Address" value="<?php echo $email; ?>" required>
                                <label for="floating-email"><span style="color:red;font-size:1rem ;">*
                                        <?php echo $emailErr; ?>
                                    </span> DayCare
                                    Email Address</label>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="number" id="floating-number" placeholder="Daycare Phone Number" value="<?php echo $number; ?>" required>
                                <label for="floating-number"><span style="color:red;font-size:1rem ;">*</span>
                                    DayCare
                                    Phone Number</label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3"><input type="password" class="form-control" name="password" id="floating-password" placeholder="Password" value="<?php echo $password; ?>" required>
                                <label for="floating-password"><span style="color:red;font-size:1rem ;">*
                                        <?php echo $passwordErr; ?>
                                    </span>
                                    Password</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3"><input type="password" class="form-control" name="confirmpassword" id="floating-confirmpassword" placeholder="Confirm Password" value="<?php echo $confirmpassword; ?>" required>
                                <label for="floating-confirmpassword"><span style="color:red;font-size:1rem ;">*
                                        <?php echo $confirmpasswordErr; ?>
                                    </span>Confirm
                                    Password</label>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-floating mb-3"><input type="text" class="form-control" name="adress" id="floating-adress" placeholder="Enter a location" value="<?php echo $adress; ?>">
                                <label for="floating-adress">Street Address</label>
                            </div>
                        </div>
                        <!-- Districts dropdown -->
                        <div class="col-lg-12">
                            <select id="input-district" class="form-select p-3" name="district" value="<?php echo $district; ?>" required>
                                <option value=""><span style="color:red;font-size:1rem ;">*
                                        <?php echo $districtErr; ?>
                                    </span> Select District
                                </option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Faridpur">Faridpur</option>
                                <option value="Gazipur">Gazipur</option>
                                <option value="Gopalganj">Gopalganj</option>
                                <option value="Jamalpur">Jamalpur</option>
                                <option value="Kishoreganj">Kishoreganj</option>
                                <option value="Madaripur">Madaripur</option>
                                <option value="Manikganj">Manikganj</option>
                                <option value="Munshiganj">Munshiganj</option>
                                <option value="Mymensingh">Mymensingh</option>
                                <option value="Narayanganj">Narayanganj</option>
                                <option value="Narsingdi">Narsingdi</option>
                                <option value="Netrokona">Netrokona</option>
                                <option value="Rajbari">Rajbari</option>
                                <option value="Shariatpur">Shariatpur</option>
                                <option value="Sherpur">Sherpur</option>
                                <option value="Tangail">Tangail</option>
                                <option value="Bogra">Bogra</option>
                                <option value="Joypurhat">Joypurhat</option>
                                <option value="Naogaon">Naogaon</option>
                                <option value="Natore">Natore</option>
                                <option value="Nawabganj">Nawabganj</option>
                                <option value="Pabna">Pabna</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Sirajgonj">Sirajgonj</option>
                                <option value="Dinajpur">Dinajpur</option>
                                <option value="Gaibandha">Gaibandha</option>
                                <option value="Kurigram">Kurigram</option>
                                <option value="Lalmonirhat">Lalmonirhat</option>
                                <option value="Nilphamari">Nilphamari</option>
                                <option value="Panchagarh">Panchagarh</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Thakurgaon">Thakurgaon</option>
                                <option value="Barguna">Barguna</option>
                                <option value="Barishal">Barishal</option>
                                <option value="Bhola">Bhola</option>
                                <option value="Jhalokati">Jhalokati</option>
                                <option value="Patuakhali">Patuakhali</option>
                                <option value="Pirojpur">Pirojpur</option>
                                <option value="Bandarban">Bandarban</option>
                                <option value="Brahmanbaria">Brahmanbaria</option>
                                <option value="Chandpur">Chandpur</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Comilla">Comilla</option>
                                <option value="Coxsbazar">Cox's bazaz</option>
                                <option value="Feni">Feni</option>
                                <option value="Khagrachari">Khagrachari</option>
                                <option value="Lakshmipur">Lakshmipur</option>
                                <option value="Noakhali">Noakhali</option>
                                <option value="Rangamati">Rangamati</option>
                                <option value="Habiganj">Habiganj</option>
                                <option value="Maulvibazar">Maulvibazar</option>
                                <option value="Sunamganj">Sunamganj</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Bagerhat">Bagerhat</option>
                                <option value="Chuadanga">Chuadanga</option>
                                <option value="Jessore">Jessore</option>
                                <option value="Jhenaidah">Jhenaidah</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Kushtia">Kushtia</option>
                                <option value="Magura">Magura</option>
                                <option value="Meherpur">Meherpur</option>
                                <option value="Narail">Narail</option>
                                <option value="Satkhira">Satkhira</option>

                            </select>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3"><input type="text" class="form-control" name="zipcode" id="floating-zipcode" placeholder="ZipCode" value="<?php echo $zipcode; ?>" required>
                                <label for="floating-zipcode"><span style="color:red;font-size:1rem ;">*
                                        <?php echo $zipcodeErr; ?>
                                    </span>
                                    ZipCode</label>
                            </div>
                        </div>
                        <br>

                        <!-- Start Time & End Time -->
                        <div class="col-lg-6">
                            <div class="form-floating  mb-3">
                                <input class="form-control" type="number" name="starttime" id="starttime" placeholder="Enter start time" value="<?php echo $starttime; ?>">
                                <label for="starttime"><span style="color:red;font-size:1rem ;">*
                                        <?php echo $starttimeErr; ?>
                                    </span>Start-time</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="starttimespec" id="start-time-am" value="AM">
                                <label class="form-check-label" for="start-time-am">AM</label>
                            </div>
                            <div class="form-check">

                                <input class="form-check-input" type="radio" name="starttimespec" id="start-time-pm" value="PM">
                                <label class="form-check-label" for="start-time-pm">PM </label>

                            </div>
                            <span style="color:red;font-size:1rem ;">*
                                <?php echo $starttimespecErr; ?>
                            </span>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3"><input class="form-control" type="number" name="endtime" id="end-time" placeholder="Enter end time" value="<?php echo $endtime; ?>">
                                <label for="end-time"><span style="color:red;font-size:1rem ;">*
                                        <?php echo $endtimeErr; ?>
                                    </span>End-time</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="endtimespec" id="end-time-am" value="AM">
                                <label class="form-check-label" for="end-time-am">
                                    AM
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="endtimespec" id="end-time-pm" value="PM" checked>
                                <label class="form-check-label" for="end-time-pm">
                                    PM
                                </label>
                            </div>
                            <span style="color:red;font-size:1rem ;">*
                                <?php echo $endtimespecErr; ?>
                            </span>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <input type="submit" class="btn btn-primary w-100" name="register" value="NEXT">


                        </div>
                    </div>
                </form>


            </div>




        </section>
    </main>


    <!--endiing new login form-->




    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
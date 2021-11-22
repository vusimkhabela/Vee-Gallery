<?php

include("function.php");
include("connect.php");
session_start();



if (logged_in()) {
    header("location:login.php");
} else if (isset($_COOKIE['name'])) {


    $email = $_COOKIE['name'];

    $info = mysqli_query($conn, "SELECT firstname, lastname, gender, num, country, profilepicture, hobby, tagline FROM register WHERE email='$email'");
    $retrieve = mysqli_fetch_array($info);
    // print_r($retrieve);


    $firstname = $retrieve['firstname'];
    $lastname = $retrieve['lastname'];
    $radio = isset($retrieve['gender']);
    $num = $retrieve['num'];
    $country = $retrieve['country'];
    $profilepicture = $retrieve['profilepicture'];
    $checkbox1 = isset($retrieve['hobby']);
    $tagline = $retrieve['tagline'];

?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />


        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />

        <title>Vee Gallery</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- CSS Files -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/maruti-style.css" />
        <link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />

        <!-- Fonts and Icons -->
        <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/themify-icons.css" rel="stylesheet">
    </head>


    <body>

        <nav class="navbar">
            <ul class="navbar-nav">
                <li class="dropdown" id="menu-messages">
                    <a href="index.php" data-toggle="dropdown" class="dropdown-toggle">
                        <span class="text" class="btn">Home</span>
                        <ul class="dropdown-menu">
                            <li><a href="editprofile.php" class="btn" title="" href="#">MyPersonalSpace!</a></li>
                        </ul>
                </li>
                <li>
                    <a class="btn" href="search.html">Search</a>
                </li>
                <li class="dropdown" id="menu-messages">
                    <a href="editprofile.php" data-toggle="dropdown" class="dropdown-toggle">
                        <span class="text">Profile</span>
                        <ul class="dropdown-menu">
                            <li><a class="btn" title="" href="editprofile.php">Edit Profile</a></li>
                            <li><a class="btn" title="" href="upload.html">Upload</a></li>
                            <li><a class="btn" title="" href="#">Metadata Management</a></li>
                        </ul>
                </li>
                <li>
                    <a class="btn" href="#">Contact</a>
                </li>
                <li>
                    <a class="btn" href="logout.php">Log out</a>
                </li>
            </ul>
        </nav>

        <div class="wizard-content" data-color="orange">
            <div class="wizard-header text-center">
                <h1 class="wizard-title">Personal Space</h1>
                <h3 class="wizard-title">What would you like to upload?</h3>
                <p class="category">Acceptable format: jpg, png, jpeg, raw</p>

                <p class="category">
                    <?php echo $email; ?>
                </p>

            </div>
        </div>

        <div class="container">

            <div class="col-sm-3">
                <hr />
                <div class="widget-box">
                    <header>
                        <div class="user">
                            <img src='<?php
                                        if ($profilepicture == null) {
                                            echo "assets/img/default-avatar.jpg";
                                        } else {
                                            echo "uploads/profilepictures/" . $profilepicture;
                                        } ?>' alt="Profile Picture">
                            <h3 class="name"><?php echo ucfirst($firstname) . " " . ucfirst($lastname); ?></h3>
                            <p class="post"><?php echo $tagline; ?></p>
                        </div>

                        <nav class="navbar-user">
                            <ul>
                                <li><a href="#bio">About</a></li>
                                <li><a href="#picturesuploaded">Pictures</a></li>
                                <li><a href="#education">Albums</a></li>
                                <li><a href="#chats">Chats</a></li>
                            </ul>
                        </nav>

                        <nav class="navbar">
                            <li class="btn"><a href="#bio">Facebook</a></li>
                            <li class="btn"><a href="#picturesuploaded">Twitter</a></li>
                            <li class="btn"><a href="#education">Instagram</a></li>
                            <li class="btn"><a href="#chats">Google+</a></li>
                        </nav>
                    </header>
                </div>
                <hr />

                <div class="col-sm-7">
                    <div class="row">
                        <h5>No account? <a href>Sign up</a></h5>
                        Tersms of popnsdjcbsghdv shdvchsjdb vhsdv askhdcbhas ck h ashc sj ijasbc sdchva scahs cabscg ascagsvcha scka ashjbcahjdvcbksbcjksbd vkbsdklvnsljvn;ksdmvccz

                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <hr />
                <div class="widget-box">
                    <h3 class="widget-title"> <span>MY</span> DETAILS</h3>
                    <h6><a href="index.html"><button class="btn">Edit<i class=" "></i> </button></a>
                        <div class="info">
                            <h5> <span> Name : </span><?php echo ucfirst($firstname); ?> </h5>
                            <h5> <span> Surname : </span><?php echo ucfirst($lastname); ?></h5>
                            <h5> <span> Gender : </span> <?php echo ucfirst($gender); ?> </h5>
                            <h5> <span> Hobbies : </span><?php echo $hobby; ?></h5>
                            <h5> <span> Country : </span><?php echo ucfirst($country); ?></h5>
                        </div>
                        <form name="editprofile" method="POST" enctype="multipart/form-data">
                            <div class="tab-pane" id="about">
                                <div class="row">
                                    <div name="changedetails" class="col-sm-5">
                                        <div class="info">
                                            <h5> Name : <input name="firstname" type="text" class="form-control" value='<?php echo $firstname; ?>'></h5>
                                            <h5> Surname : <input name="lastname" type="text" class="form-control" value='<?php echo $lastname; ?>'></h5>
                                            <h5> Contacts : <input name="num" type="number" class="form-control" id="tel" value='<?php echo $number; ?>'></h5>
                                            <h5> Country : <select name="country" class="form-control" value='<?php echo $country; ?>'>
                                                    <option value="Afghanistan"> Afghanistan </option>
                                                    <option value="Albania"> Albania </option>
                                                    <option value="Algeria"> Algeria </option>
                                                    <option value="American Samoa"> American Samoa </option>
                                                    <option value="Andorra"> Andorra </option>
                                                    <option value="Angola"> Angola </option>
                                                    <option value="Anguilla"> Anguilla </option>
                                                    <option value="Antarctica"> Antarctica </option>
                                                    <option value="...">...</option>
                                                </select>
                                            </h5>
                                            <a href="#"><button class="btn"> Edit Password <i class="fas fa-download"></i> </button></a>
                                            <a href="#"><button class="btn"> Save <i class="fas fa-download"></i> </button></a>
                                        </div>
                                    </div>
                                    <div name=changepassword class="col-sm-5">
                                        <h5 class="info-text"> Change your password </h5>
                                        <div class="info">
                                            <h6 class="info-text">Enter Old password </h6>
                                            <input type="password" id="pass" name="pass" class="form-control" placeholder="**********" required>
                                            <br />
                                        </div>
                                        <h5 class="info-text"> New password </h5>
                                        <div class="info">
                                            <h6 class="info-text"> Enter New password </h6>
                                            <input type="password" name="cpass" class="form-control" placeholder="New Password" required>
                                            <div class="password-policies">
                                                <div class="length">
                                                    8 Characters
                                                </div>
                                                <div class="number">
                                                    Contains Number
                                                </div>
                                                <div class="uppercase">
                                                    Contains Uppercase
                                                </div>
                                                <div class="special">
                                                    Contains Special Characters
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="info-text"> Repeat New password </h6>
                                        <div class="form">
                                            <input type="password" name="cpass" class="form-control" placeholder="Old Password" required>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </form>

                        <section class="picturesuploaded" id="picturesuploaded">
                            <h3 class="heading"> MY <span>PICTURES</span></h3>
                            <div class="photo-gallery">
                                <div class="pic molo">
                                    <a href="#" class="item">
                                        <img src="paper-1.jpeg">
                                    </a>
                                </div>
                                <div class="pic family">
                                    <a href="#" class="item">
                                        <img src="assets/img/wizard-list-place.png">
                                    </a>
                                </div>
                                <div class="pic travels">
                                    <a href="#" class="item">
                                        <img src="assets/img/wizard-create-profile.png">
                                    </a>
                                </div>
                                <div class="pic molo">
                                    <a href="#" class="item">
                                        <img src="paper-1.jpeg">
                                    </a>
                                </div>
                                <div class="pic family">
                                    <a href="#" class="item">
                                        <img src="assets/img/wizard-list-place.png">
                                    </a>
                                </div>
                                <div class="pic travels">
                                    <a href="#" class="item">
                                        <img src="assets/img/wizard-create-profile.png">
                                    </a>
                                </div>
                                <a href="index.html"><button class="btn"> View more <i class="fas fa-download"></i> </button></a>
                                <a href="upload.php"><button class="btn"> Upload <i class="fas fa-download"></i> </button></a>
                            </div>
                        </section>

                        <div class="widget-title">
                            <span class="icon"><i class="icon-file"></i></span>
                            <h5>Latest News</h5>
                        </div>
                </div>
            </div>
            <hr />
        </div>

        <div class="footer">
            <div class="container text-center">
                Made with <i class="fa fa-heart heart"></i> by <a href="https://www.creative-tim.com">Creative Tim</a>. Free download <a href="https://www.creative-tim.com/product/paper-bootstrap-wizard">here.</a>
            </div>
        </div>
        </div>

    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="assets/js/demo.js" type="text/javascript"></script>
    <script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

    <!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
    <script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

    </html>
<?php

}

?>
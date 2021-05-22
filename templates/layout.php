<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../images/logo.jpg" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">


    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                    <p class="mb-0 phone pl-md-2">
                        <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> +00 1234 567</a>
                        <a href="#"><span class="fa fa-paper-plane mr-1"></span> youremail@email.com</a>
                    </p>
                </div>
                <div class="col-md-6 d-flex justify-content-md-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">Claybrook Zoo <span class="flaticon-pawprint-1 mr-2"> <img src="../images/logo.jpg" style="width: 50px; margin-top: -10px; margin-left:-330px;height: 80px;"></span></a>
            <!-- <a href="index.php"><img src="../images/logo.jpg" style="width: 50px; margin-top: -10px; margin-left:-330px;height: 80px;"></a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="gallery" class="nav-link">Gallery</a></li>
                    <!-- <li class="nav-item"><a href="events" class="nav-link">Events</a></li> -->
                    <!-- <li class="nav-item"><a href="vet.html" class="nav-link">Sponsors</a></li> -->
                    <!-- <li class="nav-item"><a href="gallery" class="nav-link">Gallery</a></li> -->
                    <!-- <li class="nav-item"><a href="ticket" class="nav-link">Tickets</a></li> -->
                     <!--keep other links like this -->
                    <!-- <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li> -->
                    <!-- <li class="nav-item"><a href="login" class="nav-link">Login</a></li> -->
                    <!-- <li class="nav-item"><a href="register" class="nav-link">Register</a></li> -->

                      <div class="dropdown" style="margin-top: 28px;">
                      <button class="btn btn-bg-light btn-sm dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Animals
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <ul>
                            <?php
                                require '../db/dbconnect.php';
                                $categories = $pdo->prepare("SELECT id,name,display FROM classification_tbl where archive='1'");
                                $categories->execute();
                                foreach ($categories as $category) {
                                echo '<li style="list-style:none;"class="nav-item active"><a  href=display-animals?id='.$category['id'].'>'.$category['name'].'</a></li>';   
                                    }
                                                
                                        ?>
                        </ul>
                      </div>
                    </div>
<!-- new -->
        <?php 
                if(isset($_SESSION['sessionType'])){?>
                        <?php if($_SESSION['sessionType']=="visitor"){ ?>
                            
                          <!-- <li><a href="#">Admins</a></li>  -->
                          <!-- <li class="nav-item"><a href="tickets">Buy Tickets</a></li> -->
                          <li class="nav-item"><a href="events" class="nav-link">Events</a></li>
                          <li class="nav-item"><a href="vacancies" class="nav-link">Vacancy</a></li>
                          <!-- <li class="nav-item"><a href="vet.html" class="nav-link">Sponsors</a></li> -->
                          <!-- <li class="nav-item"><a href="gallery" class="nav-link">Gallery</a></li> -->
                          

                          <li class="nav-item"><a href="book-ticket" class="nav-link">E- Ticket</a></li>
                          <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
                          <!--keep other links like this -->
                            
                          <!-- <li class="nav-item"><a href="logout" class="nav-link">Logout</a></li> -->

                    <?php } ?>    
                        

                       <?php if($_SESSION['sessionType']=="sponsor"){?>
                          <li class="nav-item"><a href="events" class="nav-link">Events</a></li>
                          <!-- <li class="nav-item"><a href="sponsor-animal" class="nav-link">Sponsor Animal</a></li> -->
                          <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>


<!-- dropdown -->

                                



                                   <div class="dropdown" style="margin-top: 28px;">
                      <button class="btn btn-bg-light btn-sm dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sponsors
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <ul>
                          <a class="dropdown-item" href="sponsor-registration">Sponsor Registration Form</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="sponsor-animal">Sponsor Animal</a>
                        </ul>
                      </div>
                    </div>




                              
                    <?php } ?>
                             <!-- <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li> -->

                              <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="index.php"> <?php if(empty($_SESSION)){?> 
                        <?php }
                        else{
                        echo "Welcome: ".$_SESSION['sessionUname'] ; 
                                    }?></a>
                        <a class="dropdown-item" href="edit-details">Edit</a>
                        <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
                        <div class="dropdown-divider">
                            
                        </div>
                        <a class="dropdown-item" href="logout.php">Logout</a>

                    </div>
                </li>
            </ul>

                    <?php } 
                        else{
                            
                    ?>

                            <li class="nav-item"><a href="events" class="nav-link">Events</a></li>
                            <li class="nav-item"><a href="vacancies" class="nav-link">Vacancy</a></li>
                            <!-- <li class="nav-item"><a href="vet.html" class="nav-link">Sponsors</a></li> -->
                            <!-- <li class="nav-item"><a href="gallery" class="nav-link">Gallery</a></li> -->
                            <!-- <li class="nav-item"><a href="ticket" class="nav-link">Tickets</a></li> -->
                             <!--keep other links like this -->
                            <!-- <li class="nav-item"><a href="login" class="nav-link">Login</a></li> -->
                            <!-- <li class="nav-item"><a href="register" class="nav-link">Register</a></li> -->
                            <div class="btn-group">
                                  <button  class="btn btn-bg-light btn-sm dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Login/Register
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item" href="login"> Login</a>
                                    <a class="dropdown-item" href="visitor-registration"> Registration</a>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <!-- <a class="dropdown-item" href="sponsor-registration">Sponsor Registration</a> -->
                                  </div>
                                    
                    <?php } ?>


<!--  -->


                    <!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
                </ul>
                  
                    </div>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    <?php echo $content; ?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Claybrook</h2>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Media Links</h2>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                    <!-- <h2 class="footer-heading">Latest News</h2>
                    <div class="block-21 mb-4 d-flex">
                        <a class="img mr-4 rounded" style="background-image: url(../images/image_1.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="block-21 mb-4 d-flex">
                        <a class="img mr-4 rounded" style="background-image: url(../images/image_2.jpg);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                            </div>
                        </div>
                    </div> -->



                </div>
                <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                    <h2 class="footer-heading">Quick Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="py-2 d-block">Home</a></li>
                        <li><a href="events" class="py-2 d-block">Events</a></li>
                        <li><a href="#" class="py-2 d-block">Sponsors</a></li>
                        <li><a href="#" class="py-2 d-block">Gallary</a></li>
                        <li><a href="#" class="py-2 d-block">Contact</a></li>
                        <li><a href="#" class="py-2 d-block">Login</a></li>
                    <li>
<div class="miniclip-game-embed" data-game-name="monkey-kick" data-theme="5" data-width="800" data-height="800" data-language="en"><a href="https://www.miniclip.com/games/monkey-kick/" target="https://www.miniclip.com/games/monkey-kick/">Play Monkey Kick</a></div>
<p style="text-align:center;">

</p></a></li>

                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <h2 class="footer-heading">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">

                    <p class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> | Claybrook Zoo
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>




    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


    <script src="../js/jquery.min.js"></script>
    <script src="../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../js/popper.min.../js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/jquery.waypoints.min.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/jquery.animateNumber.min.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="../js/jquery.timepicker.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/../js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="../js/google-map.js"></script>
    <script src="../js/main.js"></script>



</body>

</html>
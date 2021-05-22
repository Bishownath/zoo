<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $title; ?></title>
        <link href="../../images/logo.jpg" rel="icon">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>


    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a href="admin-homepage"><img src="../../images/logo.jpg" style="width: 50px auto; height: 50px;"></a>
            <a class="navbar-brand" href="admin-homepage">Claybrook Zoo</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    
                </div>
            </form>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->



            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link" href="admin-homepage"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a>

<!-- php code section -->
<?php 
                if(isset($_SESSION['sessionType'])){?>
                        <?php if($_SESSION['sessionType']=="admin"){ ?>


                                <!-- side navigation -->
                                <!-- animals nav -->
                            <div class="sb-sidenav-menu-heading">Animals</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnimals" aria-expanded="false" aria-controls="collapseAnimals"><div class="sb-nav-link-icon"><i class="fas fa-paw"></i></div>
                                 Animals
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            
                            <div class="collapse" id="collapseAnimals" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-animals">Add Animals</a>
                                    <a class="nav-link" href="view-animals">View Animals</a>
                                    <a class="nav-link" href="manage-animals">Manage Animals</a>
                                    <a class="nav-link" href="add-aow">Add Animal of the Week</a>
                                    <a class="nav-link" href="view-aow">View Animal of the Week</a>
                                    <a class="nav-link" href="manage-aow">Manage Animal of the Week</a>
                                    <a class="nav-link" href="add-animalWatchlist">Add Animal to Watchlist</a>
                                    <a class="nav-link" href="view-animalWatchlist">View Animal Watchlist</a>
                                    <a class="nav-link" href="manage-animalWatchlist">Manage Animal Watchlist</a>
                                </nav>
                            </div>
<!-- end animal nav -->

<!-- start staff nav -->    
                            <div class="sb-sidenav-menu-heading">Staff</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStaff" aria-expanded="false" aria-controls="collapseStaff"/>
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Staff
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseStaff" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-staff">Add Staff</a>
                                    <a class="nav-link" href="view-staff">View Staff</a>
                                    <a class="nav-link" href="manage-staff">Manage Staff</a>
                                    <!-- <a class="nav-link" href="add-aow">Add Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="manage-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>
                        
<!-- end staff nav -->

                            <!-- <div class="sb-sidenav-menu-heading">Addons</div> -->
                            <!-- <a class="nav-link" href="charts.html"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Charts</a> -->
                            <!-- <a class="nav-link" href="tables.html"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                </a> -->

<!-- Classification -->
                    <div class="sb-sidenav-menu-heading">Classification</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseClassification" aria-expanded="false" aria-controls="collapseClassification">
                                <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                                Classification
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseClassification" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-classification">Add Classification</a>
                                    <a class="nav-link" href="manage-classification">Manage Classification</a>
                                    <!-- <a class="nav-link" href="add-aow">Add Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="manage-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>


<!-- end classification -->


<!-- Start event -->
                      <div class="sb-sidenav-menu-heading">Events</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents" aria-expanded="false" aria-controls="collapseEvents">
                                <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
                                Events
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseEvents" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                               <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-events">Add Events</a>
                                    <a class="nav-link" href="view-events">View Events</a>
                                    <a class="nav-link" href="manage-events">Manage Events</a>
                                    <!-- <a class="nav-link" href="add-aow">Add Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="view-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>



<!-- end event -->

<!-- start vacancy -->
 <div class="sb-sidenav-menu-heading">Vacancy</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsevacancy" aria-expanded="false" aria-controls="collapsevacancy"/>
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Vacancy
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapsevacancy" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-vacancy">Add Vacancy</a>
                                    <a class="nav-link" href="view-vacancy">View Vacancy</a>
                                    <a class="nav-link" href="manage-vacancy">Manage Vacancy</a>
                                    <a class="nav-link" href="vacancy-request">View Vacancy Request</a>
                                    <!-- <a class="nav-link" href="manage-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>

                            <!-- end vacancy -->


<!-- Start ticket -->
                      <div class="sb-sidenav-menu-heading">Ticket</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTickets" aria-expanded="false" aria-controls="collapseTickets">
                                <div class="sb-nav-link-icon"><i class="fas fa-ticket-alt"></i></div>
                                Ticket
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseTickets" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                               <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view-ticket">View Ticket</a>
                                    <!-- <a class="nav-link" href="manage-events">Manage Events</a> -->
                                    <!-- <a class="nav-link" href="add-aow">Add Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="view-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>



<!-- end ticket -->


<!-- Start  -->
                      <div class="sb-sidenav-menu-heading">Gallery</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGallery" aria-expanded="false" aria-controls="collapseGallery">
                                <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                                Gallery
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseGallery" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                               <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-animalImage">Add Image/Video</a>
                                    <a class="nav-link" href="view-animalImage">View Image/Video</a>
                                    <a class="nav-link" href="manage-animalImage">Manage Gallery</a>
                                    <!-- <a class="nav-link" href="add-aow">Add Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="view-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>



<!-- end -->



<!-- Location start -->
                         <div class="sb-sidenav-menu-heading">Location</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocation" aria-expanded="false" aria-controls="collapseLocation">
                                <div class="sb-nav-link-icon"><i class="fas fa-location-arrow"></i></div>
                                Location
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseLocation" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-location">Add Location</a>
                                    <a class="nav-link" href="view-location">View Location</a>
                                    <a class="nav-link" href="manage-location">Manage Location</a>
                                    <!-- <a class="nav-link" href="add-aow">Add Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="view-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>





<!-- end location -->



<!-- sponsorship -->

     <div class="sb-sidenav-menu-heading">Sponsorship</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSponsor" aria-expanded="false" aria-controls="collapseSponsor">
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card"></i></div>
                                Sponsorship
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseSponsor" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="view-sponsorship">View Sponsorship</a>
                                    
                                </nav>
                            </div>
<!--  end sponsorship-->


<!-- queries -->
     <div class="sb-sidenav-menu-heading">Queries</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuery" aria-expanded="false" aria-controls="collapseQuery">
                                <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                                Queries
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseQuery" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav">
                                    <!-- <a class="nav-link" href="add-events">Add Events</a> -->
                                    <a class="nav-link" href="manage-queries">Manage Queries</a>
                                    <!-- <a class="nav-link" href="add-aow">Add Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="view-aow">View Animal of the Week</a> -->
                                    <!-- <a class="nav-link" href="">Add Animal to Watchlist</a> -->
                                    <!-- <a class="nav-link" href="">View Animal Watchlist</a> -->
                                </nav>
                            </div>

<!-- end queries -->
<?php } ?>   
<!--  -->
     <?php if($_SESSION['sessionType']=="manager"){?>
         <div class="sb-sidenav-menu-heading">Animals</div>
                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuery" aria-expanded="false" aria-controls="collapseQuery">
                                <div class="sb-nav-link-icon"><i class="fas fa-paw"></i></div>
                                Animals
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseQuery" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                                    <a class="nav-link" href="add-animals">Add Animals</a>
                                    <a class="nav-link" href="view-animals">View Animals</a>
                                    <a class="nav-link" href="manage-animals">Manage Animals</a>
                                    <a class="nav-link" href="add-aow">Add Animal of the Week</a>
                                    <a class="nav-link" href="view-aow">View Animal of the Week</a>
                                    <a class="nav-link" href="manage-aow">Manage Animal of the Week</a>
                                    <a class="nav-link" href="add-animalWatchlist">Add Animal Watchlist</a>
                                    <a class="nav-link" href="view-animalWatchlist">View Animal Watchlist</a>
                                    <a class="nav-link" href="manage-animalWatchlist">Manage Animal Watchlist</a>
                                    <a class="nav-link" href="add-animalImage">Add Image</a>
                                    <a class="nav-link" href="manage-animalImage">Manage Image</a>

                              
                    <?php } ?>





                    <!-- zoo keeper -->

                    <?php if($_SESSION['sessionType']=="zookeeper"){?>
                        <!-- <a class="nav-link" href="add-animals">Add Animals</a> -->
                                   <div class="sb-sidenav-menu-heading">Animals</div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuery" aria-expanded="false" aria-controls="collapseQuery">
                                <div class="sb-nav-link-icon"><i class="fas fa-paw"></i></div>
                                Animals
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                                <div class="collapse" id="collapseQuery" aria-labelledby="headingThree" data-parent="#sidenavAccordion">
                                    <a class="nav-link" href="view-animals">View Animals</a>
                                    <a class="nav-link" href="view-aow">View Animal of the Week</a>
                                    <a class="nav-link" href="view-animalWatchlist">View Animal Watchlist</a>
                                    <a class="nav-link" href="view-animalImage">View Image</a>
                              

                    <?php } ?>         

                    <?php } 
                        else{
                            echo "hey";
                            
                    ?>
                    <!-- <li class="nav-item"><a href="events" class="nav-link">Events</a></li> -->

                     <?php } ?>


                     <!-- check check  -->

<!--  -->


                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"> </div>
                        
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <?php echo $content; ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?php echo date('Y'); ?> | Claybrook Zoo  </div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>

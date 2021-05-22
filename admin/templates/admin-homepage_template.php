<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"> Welcome <?php if(empty($_SESSION)){?> 
                        <?php }
                        else{
                        echo $_SESSION['sessionUname'] ; 
                                    }?></li>
        </ol>
        <div class="row">



            <!-- php code section -->
<?php 
                if(isset($_SESSION['sessionType'])){?>
                        <?php if($_SESSION['sessionType']=="admin"){ ?>




            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-paw"></i> Animals</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-animals">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-users"></i> Staff</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-staff">View Staff</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-star"></i> Classification</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-classification">View Classification</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-envelope"></i> Queries</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-queries">View Queries</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>

<!--  -->
<?php } ?>   



<!-- manager -->
<?php if($_SESSION['sessionType']=="manager"){?>

<div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-paw"></i> Animals</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-animals">View Animal</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>



            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-font"></i> Animal of the Week</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-aow">View Animal of the Week</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>


              <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-life-ring"></i> Animal Watchlist</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Animal Watchlist</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>



              <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-image"></i> Gallery</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-animalImage">View Image</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>


<?php } ?>  
<!--  -->

<!-- zookeeper -->
<?php if($_SESSION['sessionType']=="zookeeper"){?>

<div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-paw"></i> Animals</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-animals">Animal Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>


<div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-font"></i> Animal of the Week</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-aow">Weekly Featured Animal</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>




<div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-life-ring"></i> Animal Watchlist</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-animalWatchlist">Animal Watchlist</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>






<div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><i class="fas fa-image"></i> Gallery</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="view-animalImage">Animal Image</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>


<?php } ?>  


 <?php } 
                        else{
                            header("Location: admin-login");
                            
                    ?>
                    <!-- <li class="nav-item"><a href="events" class="nav-link">Events</a></li> -->

                     <?php } ?>





        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>


<?php 
                if(isset($_SESSION['sessionType'])){?>
                        <?php if($_SESSION['sessionType']=="admin") { ?>


                              <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Staff Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


<?php 
                                                require '../../db/dbconnect.php';
                                                $staffs = $pdo->prepare('SELECT * FROM admin_tbl'); 
                                                $staffs->execute(); 
                                                $staff = $staffs->fetchAll();

                                            if($staffs->rowCount()>0){
                                                
                                            echo '<thead>';
                                                echo '<tr>';
                                                echo'<th>#</th>';
                                                echo'<th>Firstname</th>';
                                                echo'<th>Lastname</th>';
                                                echo'<th>Email</th>';
                                                echo'<th>Username</th>';
                                                // echo'<th>Visibility</th>';
                                                echo'<th>Type</th>';
                                                echo'</tr>';
                                            echo '</thead>';


                                            echo '<tfoot>';
                                                echo '<tr>';
                                                echo'<th>#</th>';
                                                echo'<th>Firstname</th>';
                                                echo'<th>Lastname</th>';
                                                echo'<th>Email</th>';
                                                echo'<th>Username</th>';
                                                // echo'<th>Visibility</th>';
                                                echo'<th>Type</th>';

                                                echo'</tr>';
                                            echo '</tfoot>';
     


                                            foreach ($staff as $staffs) {
                                                
                                                    echo '<tr>';
                                                    echo '<td>' . $staffs['uid'] . '</td>' ;
                                                    echo '<td>' . $staffs['firstname'] . '</td>' ;
                                                    echo '<td>' . $staffs['lastname'] . '</td>' ;
                                                    echo '<td>' . $staffs['email'] . '</td>';
                                                    echo '<td>' . $staffs['username'] . '</td>';
                                                    // echo '<td>' . $staffs['visible'] . '</td>';
                                                    echo '<td>' . $staffs['type'] . '</td>';
                                                    

                                            }
                                                    echo '</tr>';
                                                
                                                echo '</table>';




                                            
                                                }
                                            else{
                                                echo "No Data Found";
                                            }
                                        
                                             ?>
                                         
                                    </table>
                                </div>
                            </div>
                        </div>

                          <?php } ?>  

                           <?php } 
                      ?>

                      
                            


<!-- manager -->
<?php 
                if(isset($_SESSION['sessionType'])){?>
                        <?php if($_SESSION['sessionType']=="manager") { ?>


                              <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Animal Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <!-- search for animals -->
                      <?php 
                                                require '../../db/dbconnect.php';
                                                $animals = $pdo->prepare("SELECT * FROM animals_tbl where archive= '1'"); 
                                                $animals->execute(); 
                                                $animal = $animals->fetchAll();

                                            if($animals->rowCount()>0){
                                                
                                            echo '<thead>';
                                                echo '<tr>';
                                                echo'<th>#</th>';
                                                echo'<th>Name</th>';
                                                echo'<th>Gender</th>';
                                                echo'<th>Size</th>';
                                                echo'<th>D.O.B</th>';
                                                echo'<th>Species</th>';
                                                echo'<th>Habitat</th>';
                                                echo'<th>Image</th>';
                                                
                                                echo'</tr>';
                                            echo '</thead>';


                                            echo '<tfoot>';
                                                echo '<tr>';
                                                echo'<th>#</th>';
                                                echo'<th>Name</th>';
                                                echo'<th>Gender</th>';
                                                echo'<th>Size</th>';
                                                echo'<th>D.O.B</th>';
                                                echo'<th>Species</th>';
                                                echo'<th>Habitat</th>';
                                                echo'<th>Image</th>';

                                                echo'</tr>';
                                            echo '</tfoot>';
     


                                            foreach ($animal as $animals) {
                                                
                                                    echo '<tr>';
                                                    echo '<td>' . $animals['id'] . '</td>' ;
                                                    echo '<td>' . $animals['name'] . '</td>' ;
                                                    echo '<td>' . $animals['gender'] . '</td>' ;
                                                    echo '<td>' . $animals['size'] . '</td>';
                                                    echo '<td>' . $animals['dob'] . '</td>';
                                                    echo '<td>' . $animals['species'] . '</td>';
                                                    echo '<td>' . $animals['habitat'] . '</td>';
                                                    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="80" height="80" ""/></td>';                                                    

                                            }
                                                    echo '</tr>';
                                                
                                                echo '</table>';


                                            
                                                }
                                            else{
                                                echo "No Animals Data Found";
                                            }
                                        
                                             ?>
                                         
                                    </table>
                                </div>
                            </div>
                        </div>
                           <?php } ?>  
                           <?php } 
                         
                      ?>

                      <!--  -->



<!-- zookeeper -->

<?php 
                if(isset($_SESSION['sessionType'])){?>
                        <?php if($_SESSION['sessionType']=="zookeeper") { ?>


                              <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Animal Data</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <!-- search for animals -->
                      <?php 
                                                require '../../db/dbconnect.php';
                                                $animals = $pdo->prepare("SELECT * FROM animals_tbl where archive= '1'"); 
                                                $animals->execute(); 
                                                $animal = $animals->fetchAll();

                                            if($animals->rowCount()>0){
                                                
                                            echo '<thead>';
                                                echo '<tr>';
                                                echo'<th>#</th>';
                                                echo'<th>Name</th>';
                                                echo'<th>Gender</th>';
                                                echo'<th>Size</th>';
                                                echo'<th>D.O.B</th>';
                                                echo'<th>Species</th>';
                                                echo'<th>Habitat</th>';
                                                echo'<th>Image</th>';
                                                
                                                echo'</tr>';
                                            echo '</thead>';


                                            echo '<tfoot>';
                                                echo '<tr>';
                                                echo'<th>#</th>';
                                                echo'<th>Name</th>';
                                                echo'<th>Gender</th>';
                                                echo'<th>Size</th>';
                                                echo'<th>D.O.B</th>';
                                                echo'<th>Species</th>';
                                                echo'<th>Habitat</th>';
                                                echo'<th>Image</th>';

                                                echo'</tr>';
                                            echo '</tfoot>';
     


                                            foreach ($animal as $animals) {
                                                
                                                    echo '<tr>';
                                                    echo '<td>' . $animals['id'] . '</td>' ;
                                                    echo '<td>' . $animals['name'] . '</td>' ;
                                                    echo '<td>' . $animals['gender'] . '</td>' ;
                                                    echo '<td>' . $animals['size'] . '</td>';
                                                    echo '<td>' . $animals['dob'] . '</td>';
                                                    echo '<td>' . $animals['species'] . '</td>';
                                                    echo '<td>' . $animals['habitat'] . '</td>';
                                                    echo '<td> <img src="'."../../images/" . $animals['image'] . '" width="80" height="80" ""/></td>';                                                    

                                            }
                                                    echo '</tr>';
                                                
                                                echo '</table>';


                                            
                                                }
                                            else{
                                                echo "No Animals Data Found";
                                            }
                                        
                                             ?>
                                         
                                    </table>
                                </div>
                            </div>
                        </div>
                           <?php } ?>  
                           <?php } 
                         
                      ?>

                      <!--  -->
                     
    </div>
</main>
 <!-- mistake -->
<?php 
    require "../db/dbconnect.php";

    if(isset($_POST['vacancyApply'])){         
        $stmt= $pdo->prepare("INSERT INTO vacancy (fullname, address,contact,type, starting_date, ending_date, vname)
         VALUES (:fullname,:address,:contact,:type, :starting_date, :ending_date,:vname)");  
           // require "../db/dbconnect.php";

$criteria =[
    'fullname'=>$_POST['fullname'],
    'address'=>$_POST['address'],
    'contact'=>$_POST['contact'],
    'type'=>$_POST['type'],
    'starting_date'=>$_POST['starting_date'],
    'ending_date'=>$_POST['ending_date'],
    'vname'=>$_POST['vname']
];

if($stmt->execute($criteria)){

        echo '<div class="alert alert-primary" role="alert"  style="width:600px; margin-left:450px;;text-align:center;">
                        Vacancy has been applied successfully !
                </div>';

}
else {
    echo '<div class="alert alert-primary" role="alert"  style="width:600px; margin-left:450px;;text-align:center;">
                    Vacancy has been applied successful !
            </div>'; 
}
}

 ?>




 <div id="layoutAuthentication_content" style="background-image:url(../../images/login-zoo.jpg); " >

                <main>
                    <div class="container col">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" >

                                    <div class="card-header bg-light">
                                        <h3 class="text-center font-weight-bold my-10">Apply Vacancy</h3>
                                        <!-- <img class="rounded mx-auto d-block" src="../images/logo.jpg" width="100px" height="150px;"> -->
                                        
                                    </div>
                                    <div class="card-body">

                                        <form method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputPost">Full Name</label><input class="form-control py-4" id="inputName" type="text" name="fullname" placeholder="Enter your full name " required="" /></div>


                                            <div class="form-group"><label class="small mb-1" for="inputAddress">Address</label><input class="form-control py-4" id="inputName" type="text" name="address" placeholder="Northamptonshire - 239" required="" /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputPhone">Contact Number</label><input class="form-control py-4" id="inputName" type="text" name="contact" placeholder=" +1 123456789" required="" /></div>



                                            <div class="form-group"><label class="small mb-1" for="inputType">Type</label>
                                            <select type="text" name="type"  class="form-control"   required><br>
                                                <option value="temporary">Temporary</option> 
                                                <option value="permanent">Permanent</option> 
                                            </select>
                                            </div>


                                            <!--  -->
                                            <div class="form-group"><label class="small mb-1" for="inputStartDate">Start Date</label><input class="form-control py-4" id="inputStartDate" type="date" name="starting_date" placeholder="Agreement start date" required="" /></div>


                                            <div class="form-group"><label class="small mb-1" for="inputEndDate">End Date</label><input class="form-control py-4" id="inputEndDate" type="date" name="ending_date" placeholder="Agreement end date"  required="" /></div>


                                            <div class="form-group"><label class="small mb-1" for="inputJobPosition">Job Position</label>
                                            <select type="text" name="vname"  class="form-control" value="<?php  if(isset( $_POST["hiddenVName"])){  echo $_POST["hiddenVName"]; }?>"  required><br> 
                                                <option value="">Select Job Type</option>    
                                            <?php 
                                                $vacant = $pdo->prepare('SELECT * FROM apply_vacancy where archive="1"');
                                                $vacant->execute();
                                                $listVacancy=$vacant->fetchAll(); 
                                                foreach ($listVacancy as $list_vacancy) {?> 

                                                    <option value="<?php echo $list_vacancy['id']?>"><?php echo $list_vacancy['name']?></option> 
                                             <?php   }

                                            ?>
                                            </select>
                                            </div>





                                            <div class="form-group">
                                                <!-- <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div> -->
                                            </div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input class="btn btn-success rounded mx-auto d-block" type="submit" name="vacancyApply" value="Apply"></div>

                                                 <p class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <!-- Have already an account ? <a href="sponsor-login">Login here</a> -->
                                                </p>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="register">Need an account? Sign up!</a></div>
                                        <div class="small"><a href="../index.php">Go Back!</a></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>


<style type="text/css">
    #layoutAuthentication_content{
        width: 100%;
        height: 100%;

    }               
</style>

<section class="ftco-section">
</section>

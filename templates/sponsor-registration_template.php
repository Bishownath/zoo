 <!-- mistake -->
<?php 
    require "../db/dbconnect.php";

    if(isset($_POST['sponsorRequest'])){         
        $stmt= $pdo->prepare("INSERT INTO sponsor_tbl (company_name,phone,company_address,existing_customer, start_date, end_date, band, price, aid)
         VALUES (:company_name,:phone,:company_address,:existing_customer, :start_date, :end_date, :band, :price, :aid)");  
           // require "../db/dbconnect.php";

$criteria =[
    'company_name'=>$_POST['company_name'],
    'phone'=>$_POST['phone'],
    'company_address'=>$_POST['company_address'],
    'existing_customer'=>$_POST['existing_customer'],
    'start_date'=>$_POST['start_date'],
    'end_date'=>$_POST['end_date'],
    'band'=>$_POST['band'],
    'price'=>$_POST['price'],
    'aid'=>$_POST['aid']
];

if($stmt->execute($criteria)){

        echo '<div class="alert alert-primary" role="alert"  style="width:600px; margin-left:450px;;text-align:center;">
                        Sponsor request form submitted successfully !
                </div>';

}
else {
    echo '<div class="alert alert-primary" role="alert"  style="width:600px; margin-left:450px;;text-align:center;">
                    Sponsor request form submitted is not successful !
            </div>'; 
}
}

 ?>




 <div id="layoutAuthentication_content" style="background-image:url(../../images/login-zoo.jpg); " >

                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" >

                                    <div class="card-header bg-light">
                                        <h3 class="text-center font-weight-bold my-4">Sponsorship Form</h3>
                                        <img class="rounded mx-auto d-block" src="../images/logo.jpg" width="100px" height="150px;">
                                        
                                    </div>
                                    <div class="card-body">

                                        <form method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputName">Company Name</label><input class="form-control py-4" id="inputName" type="text" name="company_name" placeholder="Enter company name " required="" /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputNumber">Contact Number</label><input class="form-control py-4" id="inputNumber" type="number" name="phone" placeholder="+1-12345679" required="" /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputAddress">Company Address</label><textarea class="form-control py-4" id="inputAddress" type="text" name="company_address" placeholder="Enter company address" required=""></textarea></div>


                                            <div class="form-group"><label class="small mb-1" for="inputCustomer">Exisiting Customer?</label>
                                            <select type="text" name="existing_customer"  class="form-control"   required><br>
                                                <option value="yes">Yes</option> 
                                                <option value="no">No</option> 
                                            </select>
                                            </div>


                                            <!--  -->
                                            <div class="form-group"><label class="small mb-1" for="inputStartDate">Start Date</label><input class="form-control py-4" id="inputStartDate" type="date" name="start_date" placeholder="Agreement start date" required="" /></div>


                                            <div class="form-group"><label class="small mb-1" for="inputEndDate">End Date</label><input class="form-control py-4" id="inputEndDate" type="date" name="end_date" placeholder="Agreement end date"  required="" /></div>


                                            <div class="form-group"><label class="small mb-1" for="inputBand">Band</label>
                                            <select type="text" name="band"  class="form-control"   required><br>
                                                <option value="a">A</option> 
                                                <option value="b">B</option> 
                                                <option value="c">C</option> 
                                            </select></div>
                                            <!--  -->

                                            <div class="form-group"><label class="small mb-1" for="inputPrice">Price</label><input class="form-control py-4" id="inputPrice" type="number" name="price" placeholder="$$$" required="" /></div>



                                            <div class="form-group"><label class="small mb-1" for="inputSponsorAnimal">Sponsor animal</label>
                                            <select type="text" name="aid"  class="form-control" value="<?php  if(isset( $_POST["hiddenAID"])){  echo $_POST["hiddenAID"]; }?>"  required><br> 
                                            <?php 
                                                $animal_cat = $pdo->prepare('SELECT * FROM animals_tbl');
                                                $animal_cat->execute();
                                                $listAnimal=$animal_cat->fetchAll(); 
                                                foreach ($listAnimal as $list_animal) {?> 

                                                    <option value="<?php echo $list_animal['id']?>"><?php echo $list_animal['name']?></option> 
                                             <?php   }

                                            ?>
                                            </select>
                                            </div>





                                            <div class="form-group">
                                                <!-- <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div> -->
                                            </div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input class="btn btn-success rounded mx-auto d-block" type="submit" name="sponsorRequest"></div>

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

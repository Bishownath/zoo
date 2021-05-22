

<!-- php code -->
<?php 
    require "../db/dbconnect.php";

    if(isset($_POST['register'])){         
        $stmt= $pdo->prepare("INSERT INTO user_tbl (firstname,lastname,email,address,username,password,type)
         VALUES (:firstname,:lastname,:email,:address,:username,:password, :type)");  
           // require "../db/dbconnect.php";

if($stmt->execute(['firstname'=>$_POST['firstname'],'lastname'=>$_POST['lastname'],'email'=>$_POST['email'],'address'=> $_POST['address'],'username'=>$_POST['username'],'password'=>$_POST['password'] ,'type'=>$_POST['type'] ])) {

        echo '<div class="alert alert-primary" role="alert" style="width:600px; margin-left:450px;;text-align:center;">
                        Registration successful !
                </div>';

}
else {
    echo '<div class="alert alert-primary" role="alert"">
                    Registration not successfull !
            </div>'; 
}
}
            //     // header('Location:manage_staff');
            //     echo '<div class="alert alert-primary" role="alert"">
            //         Visitor registration successfully !
            // </div>'; 
            // }   
     


 ?>


 <div id="layoutAuthentication_content" style="background-image:url(../../images/login-zoo.jpg); " >

                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" >

                                    <div class="card-header bg-light">
                                        <h2 class="text-center font-weight-bold my-4"> Register Your Account</h2>
                                        <img class="rounded mx-auto d-block" src="../images/logo.jpg" width="100px" height="150px;">
                                        
                                    </div>
                                    <div class="card-body">

                                        <form method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputFirstname">Firstname</label>
                                            <input class="form-control py-4" id="inputFirstname" type="text" name="firstname" placeholder="Enter firstname " required /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputLastname">Lastname</label>
                                            <input class="form-control py-4" id="inputLastname" type="text" name="lastname" placeholder="Enter lastname " required /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputEmail">Email</label>
                                            <input class="form-control py-4" id="inputEmail" type="email" name="email" placeholder="Enter email" required/></div>

                                             <div class="form-group"><label class="small mb-1" for="inputAddress">Address</label>
                                            <input class="form-control py-4" id="inputAddress" type="text" name="address" placeholder="Enter address" required /></div>

                                            <div class="form-group"><label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control py-4" id="inputUsername" type="text" name="username" placeholder="Enter username " required /></div>

                                           

                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" required /></div>




                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Select Type</label>
                                            <select type="text" name="type"  class="form-control" value="<?php  if(isset( $_POST["hiddenType"])){  echo $_POST["hiddenType"]; }?>"  required><br>
                                                <option value="visitor">Visitor</option> 
                                                <option value="sponsor">Sponsor</option> 
                                            </select>
                                            </div>

                                            <!-- <div class="form-group"><label class="small mb-1" for="inputPassword">Repeat Password</label><input class="form-control py-4" id="inputPassword" type="password" placeholder="Repeat password" required="" /></div> -->

                                            <div class="form-group">
                                                <!-- <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div> -->
                                            </div>

                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input class="btn btn-success rounded mx-auto d-block" type="submit" value="Register" name="register"></div>

                                                 <p class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    Already have an account ? <a href="login">Login here</a>
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



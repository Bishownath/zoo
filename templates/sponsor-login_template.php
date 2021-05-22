<?php

 if(isset($_POST['soobashLogin'])){
    include "../db/dbconnect.php";
    $stmt= $pdo->prepare('SELECT * FROM sponsor_tbl WHERE email= :email and password= :password');
    $criteria= [
        'email'=> $_POST['email'],
        'password'=>$_POST['password'],

    ];

    $stmt->execute($criteria);
    if($stmt-> rowCount() > 0){
        $row= $stmt->fetch();
        $_SESSION['sessionUID']= $row['id']; 
        $_SESSION['sessionEmail']= $row['email'];
        $_SESSION['sessionType'] = $row['type'];
        header('Location: index.php');
        // header("Location: ../pages/admin/dashboard.php")
        // // echo "hey";
        //  echo "<script type='text/javascript'>"; 
        // echo "alert('Noice');"; 
        // echo "</script>";
        ?>
<?php
    }

    else{
      echo '<div class="alert alert-primary" role="alert" style="width:600px; margin-left:450px;;text-align:center;">
                        Wrong Email ID and Password !
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
                                        <h2 class="text-center font-weight-bold my-4">Login</h2>
                                        <img class="rounded mx-auto d-block" src="../images/logo.jpg" width="100px" height="150px;">
                                        
                                    </div>
                                    <div class="card-body">

                                        <form method="POST">
                                            
                                            <div class="form-group"><label class="small mb-1">Email</label>
                                            <input class="form-control py-4" name="email" type="text" placeholder="Enter Email" required/></div>

                                            <div class="form-group"><label class="small mb-1" >Password</label>
                                            <input class="form-control py-4" name="password" type="password" placeholder="Enter Password" required /></div>
                                            <div class="form-group">
                                            
                                                <!-- <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div> -->

                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            	<!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                            	<input class="btn btn-success rounded mx-auto d-block" type="submit" name="soobashLogin"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login">Visitor Login</a></div>
                                        <div class="small"><a href="index.php">Go Back!</a></div>
                                    </div>
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




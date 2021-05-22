<!-- <h1>Login</h1>
<form>
    <label for="">Email: </label>
    <input type="email" name="email"><br><br>
    <label for="">Password: </label>
    <input type="password" name="password" id=""><br><br>
    <input type="submit" value="submit" name="submit">
</form>

 -->


 <div id="layoutAuthentication_content" style="background-image:url(../../images/login-zoo.jpg); " >

                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5" >

                                    <div class="card-header bg-light">
                                        <h2 class="text-center font-weight-bold my-4">Login</h2>
                                        <img class="rounded mx-auto d-block" src="../../images/logo.jpg" width="100px" height="150px;">
                                        
                                    </div>
                                    <div class="card-body">

                                        <form method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputUsername" >Username</label><input class="form-control py-4"  name="username" type="text" placeholder="Enter username " required /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4"  name="password" type="password" placeholder="Enter password" required /></div>
                                            <div class="form-group">
                                                <!-- <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div> -->
                                            </div>

                                             
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <select type="text" name="type"  class="form-control" value=""  required><br>
                                                    <option value="admin">Admin</option> 
                                                    <option value="manager">Manager</option> 
                                                    <option value="zookeeper">Zoo-keeper</option> 
                                                </select>

                                            </div>


                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input class="btn btn-success rounded mx-auto d-block" type="submit" name="sooLogin"></div>
                                        </form>
                                    </div>
                                    <!-- <div class="card-footer text-center">
                                        <div class="small"><a href="register">Need an account? Sign up!</a></div>
                                        <div class="small"><a href="manager-login">Manager Login?</a></div>
                                        <div class="small"><a href="zookeeper-login">Zookeeper Login?</a></div>
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



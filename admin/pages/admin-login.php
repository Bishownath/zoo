 <link href="../../images/logo.jpg" rel="icon">
<?php


    // if(!isset($_SESSION['sooLogin'])){
    //     header("Location:index.php");
    // }



 if(isset($_POST['sooLogin'])){
    include_once "../../db/dbconnect.php";
    $stmt= $pdo->prepare('SELECT * FROM admin_tbl WHERE username= :username AND password= :password and type= :type');
    $criteria= [
        'username'=> $_POST['username'],
        'password'=>$_POST['password'],
        'type'=> $_POST['type']
    ];

    $stmt->execute($criteria);
    if($stmt-> rowCount() > 0){
        $row= $stmt->fetch();
        $_SESSION['sessionUID']= $row['uid']; 
        $_SESSION['sessionUname']= $row['username'];
        $_SESSION['sessionType'] = $row['type'];
        header('Location: admin-homepage');


        // header("Location: ../pages/admin/dashboard.php")
        // // echo "hey";
        //  echo "<script type='text/javascript'>"; 
        // echo "alert('Noice');"; 
        // echo "</script>";
    
}
    else{
      echo '<div class="alert alert-primary" role="alert" style="width:600px; margin-left:450px;;text-align:center;">
                        Wrong Username and Password !
                </div>';

    }
}







    $title = "Login";
    $content = loadTemplate('../templates/admin-login_template.php', []);
?>




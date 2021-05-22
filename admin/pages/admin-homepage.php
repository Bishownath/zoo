<?php
    // if(!isset($_SESSION['logged_in_user_id'])){
    //     header("Location:admin-login");
    // }

    $title = "Dashboard";
    $content = loadTemplate('../templates/admin-homepage_template.php', []);
?>
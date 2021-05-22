<?php

session_start(); 
session_unset(); 
session_destroy();

header("Location:./index.php"); 
ob_end_flush();   
require 'index.php';
require "../templates/footer.php";


?>
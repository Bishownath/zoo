<?php
session_start();
require_once '../../db/dbconnect.php';
require_once '../../functions/load_template.php';
// require_once '../../classes/table.php';

if (isset($_GET['page'])) {
	require_once '../pages/' . $_GET['page'] . '.php';
} else {
	$_GET['page']='admin-homepage';
	require_once '../pages/admin-homepage.php';
}

$criteria = [
	'title' => $title,
	'content' => $content
];
if (isset($_GET['page']) && $_GET['page'] != 'admin-login') {
	echo loadTemplate("../templates/admin-layout.php", $criteria);
} else {
	echo loadTemplate("../templates/login_layout.php", $criteria);
}

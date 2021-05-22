<?php
	session_start();
	// require_once '../db/dbconnect.php';
	require_once '../functions/load_template.php';
	// require_once '../classes/table.php';

	if(isset($_GET['page'])){
		require_once '../pages/'.$_GET['page'].'.php';
	}
	else{
		require_once '../pages/home.php';
	}
	
	$criteria=[
		'title'=>$title,
		'content'=>$content
	];
	echo loadTemplate('../templates/layout.php', $criteria);
?>



<?php
include("../models/admin.php");

	$admin = new Admin();

	$comns = new Commons();


	if($admin->adminLogin($_POST) !=null){
		
		$id = $admin->adminLogin($_POST);

		$_SESSION['userId'] = $id;

		$_SESSION['role'] = "admin";

		$comns->redirect(BASE_URL);

	}else{


		echo "<script>alert('username Or password incorrect')</script>";

		$comns->redirect(BASE_URL);
	}


?>
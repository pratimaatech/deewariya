<?php

include("../models/admin.php");

$param = $_POST;

if(isset($param['action']) && $param['action']=='update_profile'){

	$data = new Commons();
	
	$settings = new Config();

	if(isset($_POST['feild']))
	{
		if($field_name == "password" &&  $field_value==null){

		}else{

			foreach($_POST['feild'] as $field_name => $field_value) {
			    $str[] = "`{$field_name}` = '".$data->mysql_real_escape_str($field_value)."'";
			}
		}
	}

	if(isset($_FILES) && $_FILES!=null)
	{
		$picon = null;

		if(isset($_POST['prev_image']))
		{
			$picon=$_POST['prev_image'];
		}

		$table = "admin";

		if(isset($_FILES['image']) && $_FILES['image']['name']!=null)
		{



	   		$pict=$url.'images/'.$table.'/'.$picon;
			
			@unlink($pict);
			
			$FILE=$_FILES['image'];
			
			$path=$url.'images/'.$table.'/';

			if (!file_exists($path)) { mkdir($path, 0777, true); }

	    	$upload_file = $data->upload_file($settings->validType(),$path,$FILE,$data->generateUnique(8));

			$icon=$upload_file[1];

		}else{

			$icon = $picon;

		}

		array_push($str, "image = '{$icon}'");
	}else{

		$icon ='';
	}



	if($data->UPDATE($table,$str,$param['id']))
	{

		$_SESSION['message']='<p class="text-green mb-0">Information Updated '.$table.'!</p>';

		$data->redirect(BASE_URL."?page=profile");

	}


}

?>
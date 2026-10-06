<?php
include("commons.php");

Class Admin {

	
	Public function adminLogin($param){

		

		$data = new Commons();
		
		

		$fetch=$data->fetch($data->query("select * from admin where id=1"));


		if($param['username']!=null && $param['password']!=null)
 		{
 			
		 	if($param['username']==$fetch['username'] && $param['password']==$fetch['password'])

			{
				return $fetch['id'];

			}else{

				return false;

			}

 		}else{

 			return false;

 		}

	}

	Public function userLogin($param){

		

		$data = new Commons();
		
		

		$fetch=$data->fetch($data->query("select * from employee where username='".$param['username']."'"));


		if($param['username']!=null && $param['password']!=null)
 		{
 			
		 	if($param['username']==$fetch['username'] && $param['password']==$data->decryptCode($fetch['password']))
			{
				return $fetch['id'];

			}else{

				return false;

			}

 		}else{

 			return false;

 		}

	}

	

}

?>
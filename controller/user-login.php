<?php
require_once('class/query.class.php');
require_once('model/query.mdl.php');

$gen_mdl = new gen();
if (isset($_POST['login'])) 
{
	$usr_name=$_POST['usrname'];
	$pass=$_POST['pswd'];

	if ($usr_name!='' || $pass!='') 
	{
		$request = new genQueries();
		$request->setUsername($usr_name);
		$request->setPassword($pass);
		

		$user_details = $gen_mdl->userLogin($request);
		// print_r($user_details);
		header('location:user/index.php?status=1');
	}
	else
	{
		echo "fill all fields";

	}
		
	
}

?>
<?php
require_once('class/query.class.php');
require_once('database/database.php');

class gen extends databaseDetails
{


	function userLogin($request)
	{
		$usr = $request->getUsername();
		$pswd = $request->getPassword();
		$check = "SELECT * FROM `user` WHERE `u_username`='$usr' AND `u_password`='$pswd'";
		$result = mysqli_query($this->con,$check);
		if ($result) {
			$row=mysqli_fetch_array($result);
			
				$_SESSION['user_id']=$row['u_id'];
			

			return $row;
		}
	}

}
?>
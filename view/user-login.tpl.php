<?php

if (isset($_SESSION['user_id']))
{
	header('location:user/index.php');
	
}
else

?>
<!DOCTYPE html>
<html>
<head>
	<title>User login - Todo list</title>
	<link rel="stylesheet" type="text/css" href="public/user_style.css">
	<link rel="stylesheet" type="text/css" href="public/packages/bootstrap/css/bootstrap.min.css">


</head>
<body class="grey-bg">
	<div class="menu-bar">
		<a href="index.php?page=page">back to home</a>
		<!-- <a href="index.php?page=register">Register as User</a> -->
	</div>
  	<div class="wrapper">
	    <form class="form-signin" method="post" action="">       
	      <h2 class="form-signin-heading text-center"> User login here</h2>
	      <input type="text" class="form-control" name="usrname" placeholder="enter username" required="" autofocus="" />
	      <input type="password" class="form-control" name="pswd" placeholder="Password" required=""/>      
	      <!-- <label class="checkbox">
	        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
	      </label> -->
	      <input type="submit" name="login"  value="Login here" class="btn btn-lg btn-primary btn-block" >
	    </form>
  	</div>
</body>
</html>

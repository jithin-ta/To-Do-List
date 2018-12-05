<?php

if (isset($_SESSION['user_id']))
{
	header('location:user/index.php');
	
}
else

?><!DOCTYPE html>
<html>
<head>
	<title>Home - Todo list</title>
	<link rel="stylesheet" type="text/css" href="public/style.css">
</head>
<body>
	<div class="menu-bar">
		<!-- <a href="index.php?page=register">User registration</a> -->
		<a href="index.php?page=user-login">Login</a>
	</div>
	<div class="container">
		<h1 class="text-uppercase">welcome</h1>
	</div>
</body>
</html>
</style>
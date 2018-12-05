<?php
	session_start();
	ob_start();
if (!isset($_GET['page']))
{
	$page="page";
}
else
{
	$page=$_GET['page'];
}
$appPath="controller/".$page.".php";
$template="view/".$page.".tpl.php";

if (!file_exists($appPath))
{
	echo "File does not exists";
}
if (!file_exists($template))
{
	echo "File does not exists";
}
else
	require_once('database/database.php');
// require_once( 'config/adminhelper.php');
// require_once('config/config.php');



require_once($appPath);
require_once($template);

?>
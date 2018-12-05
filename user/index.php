<?php
	session_start();
	ob_start();
	$basicPath = dirname($_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF']);
if (!isset($_GET['page']))
{
	$page="home";
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
	require_once($basicPath.'/../database/database.php');
// require_once( 'config/adminhelper.php');
// require_once('config/config.php');



require_once($appPath);
require_once($template);

?>
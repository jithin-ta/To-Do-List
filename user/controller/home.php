<?php

require_once('class/user_query.class.php');
require_once('model/user_query.mdl.php');

$usr_model = new userMdl();
$request = new userQueries();

$user_id = $_SESSION['user_id'];
$request->setId($user_id);
$user = $usr_model->userDetials($request);
$userTasks = $usr_model->userTasks($request);
$users = $usr_model->listUsers($request);


// create task
if (isset($_POST['create'])) {
	$task = $_POST['task'];
	$usr = $_POST['user'];
	if (isset($_POST['urgent']))
	{
		$need = $_POST['urgent'];
	}
	else
	{
		$need = 0;
	}
		$request->setId($usr);
		$request->setTask($task);
		$request->setUrgent($need);

		$usr_model->newTask($request);
		header('location:index.php');
}

// remove task
if (isset($_GET['remove_task'])) {
	$task = $_GET['remove_task'];
	$request->setTask($task);
	$usr_model->removeTask($request);
	?>
	<p class="text-danger text-center">task removed successful</p>
	<?php
}

if (isset($_GET['update_status']) ||  isset($_GET['task_id'])) 
{
	$status = $_GET['update_status'];
	$task = $_GET['task_id'];
	$request->setTask($task);
	$request->setStatus($status);
	$request->setId($user_id);
	$usr_model->updateStatus($request);

	header('location:index.php');
}



if (isset($_GET['edit_task']))
{
	$task_id = $_GET['edit_task'];
	$request->setTask($task_id);
	$task = $usr_model->taskDetails($request);

}


if (isset($_POST['update_task'])) 
{
	$task_id = $_POST['task_id'];
	$task = $_POST['task'];
	$usr = $_POST['user'];
	if (isset($_POST['urgent']))
	{
		$need = $_POST['urgent'];
	}
	else
	{
		$need = 0;
	}
		$request->setId($usr);
		$request->setTask($task);
		$request->setTaskId($task_id);
		$request->setUrgent($need);

		$usr_model->updateTask($request);
		header('location:index.php');
}

?>
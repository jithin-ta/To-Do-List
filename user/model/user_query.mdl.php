<?php
require_once('../class/query.class.php');
require_once('../database/database.php');

class userMdl extends databaseDetails
{
	function listUsers($request)
	{

		$all_users="SELECT * FROM `user`";
		$list=mysqli_query($this->con,$all_users);
		$user_list = array();
		while ($row = mysqli_fetch_array($list))
		{
			$user_list[] = $row;
		}
		return $user_list;
	}

	function userDetials($request)
	{
		$user_id = $request->getId();

		$user_details="SELECT * FROM `user` WHERE `u_id`='$user_id'";
		$details=mysqli_query($this->con,$user_details);
		$user_detail=mysqli_fetch_array($details);
		return $user_detail;
	}

	function userTasks($request)
	{
		$user_id = $request->getId();

		$user_details="SELECT * FROM `todo_list` WHERE `t_user`='$user_id'";
		$list=mysqli_query($this->con,$user_details);
		$tasks = array();
		while ($row = mysqli_fetch_array($list))
		{
			$tasks[] = $row;
		}
		return $tasks;
	}

	function newTask($request)
	{
		$usr = $request->getId();
		$task = $request->getTask();
		$urgent = $request->getUrgent();
		$status = 1;
		$date = date("Y-m-d h:m:i");

		$insert = "INSERT INTO `todo_list`(`t_task`,`t_user`,`t_urgent`,`t_status`,`t_created_at`, `t_updated_at`) VALUES('$task','$usr','$urgent','$status','$date','$date')";
		$result=mysqli_query($this->con,$insert);

		$id=mysqli_insert_id($this->con);
	}

	function removeTask($request)
	{
		$task_id = $request->getId();

		$user_details="DELETE FROM `todo_list` WHERE `t_id`='$task_id'";
		$list=mysqli_query($this->con,$user_details);
	}

	function updateStatus($request)
	{
		$task_id = $request->getTask();
		$task_status = $request->getStatus();
		$status = $task_status+1;
		$date = date("Y-m-d h:m:i");

		$update_status ="UPDATE `todo_list` SET `t_status`='$status', `t_updated_at`='$date'  WHERE `t_id`='$task_id'";
		$list=mysqli_query($this->con,$update_status);
	}

	function taskDetails($request)
	{
		$task_id = $request->getTask();

		$task_details="SELECT * FROM `todo_list` WHERE `t_id`='$task_id'";
		$details=mysqli_query($this->con,$task_details);
		$task_detail=mysqli_fetch_array($details);
		return $task_detail;
	}

	function updateTask($request)
	{
		$task_id = $request->getTaskId();
		$task = $request->getTask();
		$usr = $request->getId();
		$urgent = $request->getUrgent();
		$date = date("Y-m-d h:m:i");

		$update_status ="UPDATE `todo_list` SET `t_task`='$task', `t_user`='$usr', `t_urgent`='$urgent', `t_updated_at`='$date' WHERE `t_id`='$task_id'";
		$list=mysqli_query($this->con,$update_status);
	}
}
?>
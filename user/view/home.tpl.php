<?php
	if (isset($_SESSION['user_id']))
	{
		
?>



<!DOCTYPE html>
<html>
<head>
	<title>User-homepage - todo-list</title>
	<link rel="stylesheet" type="text/css" href="../public/packages/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../public/packages/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../public/packages/jquery/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../public/style.css">
</head>
<body>
	<div class="menu-bar">
		<a class="text-right" href="index.php?page=logout">Logout</a>
		<h6 class="text-right">welcome <?php echo $user['u_name']; ?></h6>
	</div>
	<div class="text-center">
		<div class="col-sm-6 margin-center" style="margin-top: 50px;">
			<div class="panel">
				<div class="panel-body">
					<?php if (isset($_GET['edit_task']))
					{
						?>
						
					<h3 class="text-left">Edit Task</h3>
					<br>
					<form class="form-inline" method="post" action="#">
						<label class="sr-only" for="edit-task">edit Task</label>
					  	<input type="text" class="form-control mb-2 mr-sm-2" id="new_task" name="task" placeholder="change task" value="<?php echo $task['t_task']; ?>" required="true">
					  	<select id="inputState" name="user" class="form-control form-control mb-2 mr-sm-2">
        					<?php
        					foreach ($users	 as $list_user)
							{
								if ($list_user['u_id'] == $task['t_user']) {
									?>
				        	    <option selected="true" value="<?php echo $list_user['u_id']; ?>"><?php echo $list_user['u_name']; ?></option> 
				        	    <?php
								}
								else{
								?>
				        	    <option value="<?php echo $list_user['u_id']; ?>"><?php echo $list_user['u_name']; ?></option>
				        	<?php 
			        				}
			        			}	 ?>
        				</select>
					  <div class="form-check mb-2 mr-sm-2">
					    <label class="form-check-label" for="inlineFormCheck">
					    	<?php 
					    		if ($task['t_urgent'] == 1) 
					    		{
					    		?>
					    		<input type="checkbox" name="urgent" checked="true" value="1" class="form-check-input">Mark as Urgent
					    		<?php
					    		}
					    		else
					    		{
					    			?>
					    			<input type="checkbox" name="urgent" value="1" class="form-check-input">Mark as Urgent
					    			<?php
					    		}
					    		?>
					    </label>
					  </div>
					  <input type="hidden" name="task_id" value="<?php echo $task['t_id']; ?>">
					  <input type="submit" class="btn btn-primary mb-2" name="update_task">
					</form>
					<br>
						<?php
					}
					else { ?>
					<h3 class="text-left">New Task</h3>
					<br>
					<form class="form-inline" method="post" action="#">
						<label class="sr-only" for="new-task">New Task</label>
					  	<input type="text" class="form-control mb-2 mr-sm-2" id="new_task" name="task" placeholder="create new task" required="true">
					  	<select id="inputState" name="user" class="form-control form-control mb-2 mr-sm-2">
        					<option value="">select a user</option>
        					<?php
        					foreach ($users	 as $list_user)
							{
								?>
				        	    <option value="<?php echo $list_user['u_id']; ?>"><?php echo $list_user['u_name']; ?></option>
				        	<?php } ?>
        				</select>
					  <div class="form-check mb-2 mr-sm-2">
					    <label class="form-check-label" for="inlineFormCheck">
					    	<input type="checkbox" name="urgent" value="1" class="form-check-input">Mark as Urgent
					    </label>
					  </div>

					  <input type="submit" class="btn btn-primary mb-2" name="create">
					</form>
					<br>
					<?php } ?>
						<h3 class="text-left" for="new-task">Your Tasks</h3>
						<br>

					<div class="task-list">
						
					    <div class="table-responsive">
							<table class="table table-hover	">
						        <thead>
						        	<tr>
						        		<th>Task</th>
						        		<th>status</th>
						        		<th>edit</th>
						        		<th>Remove</th>
						        	</tr>
						        </thead>
						        <tbody>
						        	<?php 
									$num = 1;

									foreach ($userTasks	 as $task)
									{
										?>
						            <tr>
						        	    <td class="text-left"><?php echo $task['t_task']; ?> <span class="small text-danger"><?php if ($task['t_urgent']==1){
						        	    	echo "urgent";
						        	    } ?></span></td>
						        	    <td>
						        	    	<?php 
						        	    	if ($task['t_status']==1) {
						        	    		echo "Pending";
						        	    		?>
						        	    		<a href="?update_status=<?php echo $task['t_status'];?>&&task_id=<?php echo $task['t_id'];?>">update</a>
						        	    		<?php
						        	    	}
						        	    	elseif ($task['t_status']==2) {
						        	    		echo "doing";
						        	    		?>
						        	    		<a href="?update_status=<?php echo $task['t_status'];?>&&task_id=<?php echo $task['t_id'];?>">update</a>
						        	    		<?php
						        	    	}
						        	    	elseif ($task['t_status']==3) {
						        	    		echo "completed";
						        	    		?>
						        	    		<?php
						        	    	}
						        	    	else
						        	    	{
						        	    		echo "error occured";
						        	    	}
						        	    	?>
						        	    	</td>
						            
						        	    <td><a href="?edit_task=<?php echo $task['t_id']; ?>">click here</a></td>
						        	    <td><a href="?remove_task=<?php echo $task['t_id']; ?>">remove</a></td>
					        	    </tr>
						        	<?php } ?>

					        	    
					        	    
					        	    
						        </tbody>
							</table>
					    </div>
					</div>
				</div>
				</div>
			</div><!-- col-sm-8 -->
	</div>
</body>
</html>


<?php 
} 
else{
	// echo "user doesn't exsists";
		header('location:../index.php');

}
?>
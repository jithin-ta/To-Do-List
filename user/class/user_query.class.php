<?php 
	
	/**
	 * 
	 */
	class userQueries
	{
		private $id;
		private $urgent;
		private $task;
		private $task_id;
		private $status;

		public function __construct()
		{
			# code...
		}

		public function setId($id)
		{
			$this->id=$id;
			
		}
		public function getId()
		{
			return $this->id;
		}

		public function setUrgent($urgent)
		{
			$this->urgent=$urgent;
			
		}
		public function getUrgent()
		{
			return $this->urgent;
		}

		public function setTask($task)
		{
			$this->task=$task;
			
		}
		public function getTask()
		{
			return $this->task;
		}

		public function setTaskId($task_id)
		{
			$this->task_id=$task_id;
			
		}
		public function getTaskId()
		{
			return $this->task_id;
		}

		public function setStatus($status)
		{
			$this->status=$status;
			
		}
		public function getStatus()
		{
			return $this->status;
		}

	}


?>
<?php 
	
	/**
	 * 
	 */
	class genQueries
	{
		private $username;
		private $pswd;

		public function __construct()
		{}


		public function setUsername($username)
		{
			$this->username=$username;
		}
		public function getUsername()
		{
			return $this->username;
		}



		public function setPassword($pswd)
		{
			$this->pswd=$pswd;
		}
		public function getPassword()
		{
			return $this->pswd;
		}
		
	}


?>
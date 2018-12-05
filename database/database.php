<?php 
class databaseDetails
{	
	public	$server_name="localhost";
	public  $username="root";
	public	$password="";
	public  $dbname="kingdom_todolist";
	Public  $con;

		function __construct()
		{
			$this->con = new MySQLi($this->server_name,$this->username,$this->password,$this->dbname);
			if ($this->con->connect_error)
			{
				die("connection failed:".$this->con->connect_error);
			}
			
		}
}

?>
<?php
//INTIAL CLASSES
require("vendor/autoload.php");
define("MOZNO_SECRET", "kSsGNjRrEFRkVKGu1/7edPM6HfYPwPjXV52yw7xi5TZfo+q5AvRfBD3mhzqokeVxODqna3R4n04VeqZ9UCBw");
define("MOZNO_ID", "oauthclient_00009DofzOpaWfvmDdWwqn");

class sitetools{
	
	protected $data;

	public function connect(){
		//with variables for easy changes
		$server = 'localhost';
		$dbName = 'monzo';
		//for PDO put into $dns variable for ease (PDO connects with DSN or Data Source name)
		$dsn = "mysql:host=".$server.";dbname=".$dbName;
		$user = 'monzo';
		$pass = ']^FSHN%h69n/Q_Yk\',-f8\33AW;^6j`m';
		//now set up connection to db with PDO
		$db = new PDO($dsn, $user, $pass);

		$this->data = $db;
		return $this->data;
	}


}
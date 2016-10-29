<?php
//INTIAL CLASSES
require("vendor/autoload.php");
define("MONZO_SECRET", "mgUm2sSfav9FmD5NOIGFsiS1rmPTRxCuFP6ca3c2gbU4l0zYneCmczBmeBlhoxJsZh5rEt0/gyjROTErLLt7");
define("MONZO_ID", "oauthclient_00009Dp3Co3QM7ZMuGvb97");

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
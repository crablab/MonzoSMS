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

	public function sendMessage($number, $message) {
		use Twilio\Rest\Client;
        // Step 2: set our AccountSid and AuthToken from https://twilio.com/console
        $AccountSid = "AC149806ac8c5e9869fd195c988df336ac";
        $AuthToken = "15f34be56dc28327a8a62cda38459bfe";

        // Step 3: instantiate a new Twilio Rest Client
        $client = new Client($AccountSid, $AuthToken);
        
        $sms = $client->account->messages->create(

            // the number we are sending to - Any phone number
            $number,

            array(
                // Step 6: Change the 'From' number below to be a valid Twilio number 
                // that you've purchased
                'from' => "+442030957318", 
                
                // the sms body
                'body' => $message
            )
        );

        // Display a confirmation message on the screen
        return;
    }


}
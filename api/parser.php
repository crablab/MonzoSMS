<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require("../sitetools.php");
$sitetools = new sitetools();
$db = $sitetools->connect();
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 29/10/2016
 * Time: 20:42
 */
//get the body
$json = file_get_contents('php://input');

function parse($json){
    $array = json_decode($json, true);
    $result = "You have spent " . abs($array['data']['amount'])/100 . $array['data']['currency'] . " at " . $array['data']['merchant']['name'] . ' ' . $array['data']['merchant']['emoji'];
    return $result;
}

$test = json_decode($json, true);
if($test['type'] == "transaction.created"){
    $out = parse($json);
    $id = $test['data']['account_id'];
    $rec = $db->prepare("SELECT * FROM `Users` WHERE `monzo_id` = :id");
    $rec->bindParam(":id", $id);
    $rec->execute();

    $phone = $rec->fetch(PDO::FETCH_ASSOC)['Phone_Number'];
    $sitetools->sendMessage($phone, $out);
}


?>
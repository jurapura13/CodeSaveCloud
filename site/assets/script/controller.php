<?php 
/**
 * Controller.PHP
 * 
 * Serves as a "traffic light". Waits for the frontend input and handles how the backend will deal with the data and what will be returned
 */
if(!isset($_POST) || $_POST["action"] || $_POST["action"] == ""){
    return 0;
}
$action = $_POST["action"];

require "ns/user.ns.php";

if($action == "CheckUsername"){
    $check = new User\RegisterUser();
    echo $check->CheckUsername(strtolower($_POST["username"]));
}


?>
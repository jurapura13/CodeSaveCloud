<?php 
/**
 * SIGNUP controller
 */
if(!isset($_POST)){
    return 0;
}
require "../ns/client.ns.php";

$action = $_POST["action"];
if($action == "CheckUsername"){
    $check = new Client\RegisterClient();
    echo $check->CheckUsername(strtolower($_POST["username"]));
}


?>
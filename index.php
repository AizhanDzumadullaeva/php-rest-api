<?php

require_once "config/database.php";
require_once "controllers/UserController.php";

$database = new Database();
$db = $database->connect();

$controller = new UserController($db);

$method = $_SERVER['REQUEST_METHOD'];
$path = $_GET['path'] ??'';

$data = json_decode(file_get_contents("php://input"),true);

if($method == "GET" && $path == "users"){
 
if(isset($_GET['id'])){
    $controller->show($_GET['id']);
}else {
    $controller->index();
}
}
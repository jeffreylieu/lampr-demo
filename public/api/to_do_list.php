<?php
header('Access-Control-Allow-Origin: *');


$output = [
    'success' => false
];

require_once('db_connect.php');



$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'];

switch($method){
    case 'GET':
        include_once("get/$action.php");
        break;
    case 'POST':
        include_once("post/$action.php");
        break;
    case 'PUT':
        $output['msg'] = 'Put Method used';
        break;
    case 'PATCH':
        $_PATCH = json_decode(file_get_contents('php://input'), true);
        include_once("patch/$action.php");
        break;
    case 'DELETE':
        $output['msg'] = 'Delete Method used';
        break;
    default:
        $output['error'] = "Unknown request Method: $method";
}

print json_encode($output);
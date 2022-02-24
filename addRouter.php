<?php
include $_SERVER['DOCUMENT_ROOT'] . "/functions.php";

$_GET['serials'] = str_replace("\r", "", $_GET['serials']);
$serialNumbers = explode( "\n", $_GET['serials'] );
$routerCode    = $_GET['routerCode'];
$connection    = new mysqli( "localhost", "root", "root", "test" );

$serialNumbers    = checkStoredSerialNumbers( $serialNumbers, $connection );
$errors['stored'] = $serialNumbers['stored'];
$serialNumbers    = $serialNumbers['new'];

$errors['wrong'] = storeSerialNumbers($serialNumbers, $routerCode, $connection);

header('Content-Type: application/json');
echo json_encode($errors);
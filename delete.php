<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('connection.php');
echo $_GET['id'];

$id = $_GET['id'];
$stmt = $conn->exec("delete from authorofbook where book_id = $id;");
$stmt = $conn->exec("delete from book where id = $id;");

header("Location: show.php");

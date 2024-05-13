<?php
session_start();
require 'function.php';
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
};

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <p>Hallo</p>
   
   <a href="logout.php">keluar</a>
</body>
</html>
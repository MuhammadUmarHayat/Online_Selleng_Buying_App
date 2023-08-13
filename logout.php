<?php 
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
<?php
include("header.php");
include("nav.php")?>
<main>
    <h1>
        Logout
    </h1>
   <p> You are successfully logged out. </p> 
</main>
   
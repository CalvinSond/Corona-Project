<?php
$servername = "localhost";
$databaseUsername = "root";
$databasePassword = "";
$databaseName= "coronaproject";

$connection = mysqli_connect($servername, $databaseUsername, $databasePassword, $databaseName);

if(!$connection){
    die("Connection failed: ".mysqli_connect_error());
}
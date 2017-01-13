<?php
session_start();
$dbhost = "localhost";
$dbname = "books";
$dbuser = "root";
$dbpass = "root";
connectToDB(); 

function connectToDB() {
  global $link, $dbhost, $dbuser, $dbpass, $dbname;
  $link = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($link->connect_error) {
    die("<h1>Connection failed: </h1>" . $link->connect_error);
}   
} 


?>
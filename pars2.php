<?php
include_once("config.php");
if (!(isset($_SESSION['login']))){
  header("Location: login.php");
  exit;
}

$g=$_GET["g"];
mysqli_set_charset($link, "utf8");
$sql = "INSERT INTO genres (name) VALUES ('".$g."');";
$result = mysqli_query($link, $sql);
header("Location: genres.php");
?>
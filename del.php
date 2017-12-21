<?php
include_once("config.php");
if (!(isset($_SESSION['login']))){
  header("Location: login.php");
  exit;
}

$id=$_GET["id"];
mysqli_set_charset($link, "utf8");
$sql = "DELETE FROM books WHERE id ='".$id."';";
$result = mysqli_query($link, $sql);
header("Location: index.php");
?>
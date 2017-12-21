<?php
include_once("config.php");
if (!(isset($_SESSION['login']))){
  header("Location: login.php");
  exit;
}

function ucfirst_bad($str){
  $str2="";
  $pos=strpos($str," ");
  while (!($pos === false)){
    $str2=$str2." ".ucfirst(substr($str,0,$pos));
    $str=substr($str,$pos+1);
    $pos=strpos($str," ");
  }
  if (strlen($str)>0) $str2=$str2." ".ucfirst($str);
  return substr($str2, 1);
}

function uctitle2($str){
  return mb_convert_case($str, MB_CASE_TITLE, "UTF-8");
}

function ucfirst2($str){
return mb_strtoupper(mb_substr($str, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($str, 1, mb_strlen($str), 'UTF-8');
}

  $a=$_GET["a"];
  $b=$_GET["b"];
  $g=$_GET["g"];
  $n=$_GET["n"];
  $closet=$_GET["closet"];
  $shelf=$_GET["shelf"];
  $_SESSION['closet']=$closet;
  $_SESSION['shelf']=$shelf;
  $user=$_SESSION['user'];
  $mas = array();
  //$a="123 дальше 321 дальше 999";
  //$b="дальше";
  $pos=strpos($a,$b);
  while (!($pos === false)){
      $mas[]=substr($a,0,$pos-1);
      $a=substr($a,$pos+strlen($b)+1);
      $pos=strpos($a,$b);
    }
  if (strlen($a)>0) $mas[]=$a;
  //var_dump($mas);
  for ($i=0;$i<count($mas);$i++)
  echo $mas[$i] ."\n";
echo $mas[$i] ."<br>";

mysqli_set_charset($link, "utf8");
//$autor=ucfirst2($mas[1]);
$sql = "INSERT INTO books (title, autor, year, genre, count, closet, shelf, user) VALUES ('".ucfirst2($mas[0])."','".uctitle2($mas[1])."','".$mas[2]."','".$g."','".$n."','".$closet."','".$shelf."','".$_SESSION['user']."');";
//$sql = "INSERT INTO books (title, autor, year, genre) VALUES ('".ucfirst($mas[0])."','".$autor."','".$mas[2]."','1');";
//echo $sql;
$result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "1";
//     while($row = mysqli_fetch_assoc($result)) {
//      echo "<td>".$row['id']. "</td><td>".$row['title']. "</td><td>".$row['autor']. "</td><td>".$row['year']. "</td><td>".$row['name']. "</td><td>".$row['count']. "</td><td>".$row['closet']. "</td><td>".$row['shelf']. "</td></tr>";
     }     
//     echo "</table>";
 //}
 else echo "0";
header("Location: in.php");
?>
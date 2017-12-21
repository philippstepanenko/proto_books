<link rel="stylesheet" href="style.css">
</style>
<?php
include_once("config.php");
include_once("show.php");
if (!(isset($_SESSION['login']))){
  header("Location: login.php");
  exit;
}
$menu->show();
?>
<a>Пользователь: <?php echo $_SESSION['login']; ?></a><br>
<a href="index.php">Просмотр БД</a><br>
<a href="in.php">Добавить книгу</a><br>
<a href="genres.php">Добавить жанр</a><br>
<a href="stat.php">Статистика</a><br>
<a href="out.php">Выйти</a><br><br>

<?php
mysqli_set_charset($link, "utf8");
$i=0;
$sql = "SELECT * FROM users";
$result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
      $mas[$i]=$row['id'];
      $i++;
     }
for($i=0;$i<count($mas);$i++){
  $sql = "SELECT u.login, count(b.user) as count FROM users u join books b on u.id=b.user where b.user='".$mas[$i]."'";
  echo $row[$mas[$i]];
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
      $login[$i]=$row['login'];
      $count[$i]=$row['count'];
     }
 }
}
// сортировка массивов
echo "<table><tr><td>Имя пользователя</td><td>Количество добавленных книг</td></tr>";
if((!empty($login))&&(!empty($count))){
  array_multisort($count, SORT_DESC, $login);
  for($i=0;$i<count($mas);$i++){
    echo "<tr><td>".$login[$i]."</td><td>".$count[$i]."</td></tr>";
  }
}
echo "</table>";
}
 else{
  echo "NULL";
 }
?>
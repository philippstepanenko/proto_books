<link rel="stylesheet" href="style.css">
<?php
include_once("config.php");
if (!(isset($_SESSION['login']))){
	header("Location: login.php");
	exit;
}
?>
<a>Пользователь: <?php echo $_SESSION['login']; ?></a><br>
<a href="test.php">Просмотр БД</a><br>
<a href="in.php">Добавить книгу</a><br>
<a href="genres.php">Добавить жанр</a><br>
<a href="stat.php">Статистика</a><br>
<a href="out.php">Выйти</a><br><br>

<?php
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM genres";
$result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  	 echo "<table><tr><td>ID</td><td>Название жанра</td></tr>";
     while($row = mysqli_fetch_assoc($result)) {
     	echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td></tr>";
     }     
     echo "</table>";
 }
 else{
 	echo "NULL";
 }
?>
<div><a class="pre">Input genre:  </a><input id="g" type="text"></div>
<input type="button" id="bt" onclick="go()" value="Добавить">

<script>
function go () {
var g = document.getElementById('g').value;
window.location="pars2.php?g="+g;
}
</script>
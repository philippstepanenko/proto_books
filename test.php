<link rel="stylesheet" href="style.css">
<?php include_once("config.php");
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
//$sql = "SELECT b.id,b.title, b.autor, b.year, b.count, b.closet, b.shelf, g.name FROM books b JOIN genres g on b.genre=g.id ORDER BY b.id ASC";
$sql = "SELECT b.id,b.title, b.autor, b.year, b.count, b.closet, b.shelf, g.name, u.login FROM users u JOIN books b JOIN genres g on u.id=b.user and b.genre=g.id ORDER BY b.id ASC";
$result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  	 echo "<table><tr><td>ID</td><td>Название</td><td>Автор</td><td>Год</td><td>Жанр</td><td width='5'>Количество</td><td>Номер шкафа</td><td>Номер полки</td><td>Добавил</td></tr>";
     while($row = mysqli_fetch_assoc($result)) {
     	//echo "<td>".$row['id']. "</td><td>".$row['title']. "</td><td>".$row['autor']. "</td><td>".$row['year']. "</td><td>".$row['name']. "</td><td>".$row['count']. "</td><td>".$row['closet']. "</td><td>".$row['shelf']. "</td></tr>";
        echo "<td><input type='text' id='".$row['id']."_id' value='".$row['id']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_title' value='".$row['title']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_autor' value='".$row['autor']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_year' value='".$row['year']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_name' value='".$row['name']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_count' value='".$row['count']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_closet' value='".$row['closet']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_shelf' value='".$row['shelf']."'></td>";
        echo "<td><input type='text' id='".$row['id']."_user' value='".$row['login']."'></td>";
     	echo "</tr>";
     }     
     echo "</table>";
 }
 else{
 	echo "NULL";
 }
//echo "<br><a href='http://yandex.ru'>Внести изменения</a>";
?>

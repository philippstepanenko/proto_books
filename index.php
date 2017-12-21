<link rel="stylesheet" href="style.css">
<?php
include_once("config.php");
include_once("show.php");
if (!(isset($_SESSION['login']))){
	header("Location: login.php");
	exit;
}
?>
<?php
$menu->show();
mysqli_set_charset($link, "utf8");
//$sql = "SELECT b.id,b.title, b.autor, b.year, b.count, b.closet, b.shelf, g.name FROM books b JOIN genres g on b.genre=g.id ORDER BY b.id ASC";
$sql = "SELECT b.id,b.title, b.autor, b.year, b.count, b.closet, b.shelf, g.name, u.login FROM users u JOIN books b JOIN genres g on u.id=b.user and b.genre=g.id ORDER BY b.id ASC";
$result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  	 echo "<table><tr><td>ID</td><td>Название</td><td>Автор</td><td>Год</td><td>Жанр</td><td width='5'>Количество</td><td>Номер шкафа</td><td>Номер полки</td><td>Добавил</td><td>Действие</td></tr>";
     while($row = mysqli_fetch_assoc($result)) {
     	//echo "<td>".$row['id']. "</td><td>".$row['title']. "</td><td>".$row['autor']. "</td><td>".$row['year']. "</td><td>".$row['name']. "</td><td>".$row['count']. "</td><td>".$row['closet']. "</td><td>".$row['shelf']. "</td></tr>";
        echo "<td><input type='text' id='".$row['id']."_id' value='".$row['id']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_title' value='".$row['title']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_author' value='".$row['autor']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_year' value='".$row['year']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_name' value='".$row['name']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_count' value='".$row['count']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_closet' value='".$row['closet']."'></td>";
     	echo "<td><input type='text' id='".$row['id']."_shelf' value='".$row['shelf']."'></td>";
        echo "<td><input type='text' id='".$row['id']."_user' value='".$row['login']."'></td>";
        echo "<td><input type='button' id='".$row['id']."' onClick = 'del(this)' value='Удалить'></td>";
     	echo "</tr>";
     }     
     echo "</table>";
 }
 else{
 	echo "NULL";
 }
?>
<script>
function del(obj){
    window.location = "del.php?id="+obj.id;
}    
</script>
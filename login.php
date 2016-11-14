<?php
include_once("config.php");
if (isset($_SESSION['login'])&&isset($_SESSION['pass'])){
	mysqli_set_charset($link, "utf8");
	$sql = "SELECT * FROM users WHERE login='".$_SESSION['login']."' and pass='".$_SESSION['pass']."';";
		$result = mysqli_query($link, $sql);
  	if (mysqli_num_rows($result) > 0) {
  		while($row = mysqli_fetch_assoc($result)) {
  		$_SESSION["user"]=$row['id'];
  		}
  	 	header("Location: test.php");
  	 	exit;
 }
 else{
 	echo "Неверный логин/пароль!"."\n";
 }
}

if(isset($_POST["login"])&&isset($_POST["pass"])){
		$_SESSION["login"]=$_POST["login"];
		$_SESSION["pass"]=$_POST["pass"];
		header("Location: login.php");
		exit;
}
?>
<a href="index.html">Перейти на главную страницу</a><br><br>
<form method="post" action="login.php"> 
		<input type="text" name="login" size="50" maxlength="20" value=""><br>
		<input type="password" name="pass" size="50" maxlength="20" value=""><br>
    <input type="submit" name="btnAddArticle" value="Войти">
</form>

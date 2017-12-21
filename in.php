<link rel="stylesheet" href="style.css">
<?php
include_once("config.php");
include_once("show.php");
if (!(isset($_SESSION['login']))){
  header("Location: login.php");
  exit;
}
if (!(isset($_SESSION['shelf']))&&!(isset($_SESSION['closet']))){
    $_SESSION['closet']=0;
    $_SESSION['shelf']=0;
}
$menu->show();
?>
<a>Пользователь: <?php echo $_SESSION['login']; ?></a><br>
<a href="index.php">Просмотр БД</a><br>
<a href="in.php">Добавить книгу</a><br>
<a href="genres.php">Добавить жанр</a><br>
<a href="stat.php">Статистика</a><br>
<a href="out.php">Выйти</a><br><br>

<div><a>Input string: </a><input id="a" type="text"><input type="button" onclick="rec()" value="Распознать"></div>
<div><a>Input substr: </a><input id="b" type="text" value="дальше"></div>
<div><a>Count books:  </a><input id="n" type="text" value="1"></div>

<?php
mysqli_set_charset($link, "utf8");
$sql = "SELECT * FROM genres ORDER BY name ASC";
$result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
     echo "<div><a>Select genre: </a><select id='g' name='genres'>";
     while($row = mysqli_fetch_assoc($result)) {
      echo "<option value='".$row['id']."'>".$row['name']."</option>";
     }     
     echo "</select></div>";
 }
 //else{
  //echo "NULL";
 //}
echo "<div><a>Input closet: </a><input id='closet' type='text' value='".$_SESSION['closet']."'></div>";
echo "<div><a>Input shelf:  </a><input id='shelf' type='text' value='".$_SESSION['shelf']."'></div>";
?>
<input type="button" id="bt" onclick="go()" value="Добавить">

<script>
function go () {
var a = document.getElementById('a').value;
var b = document.getElementById('b').value;
var n = document.getElementById('n').value;
var g = document.getElementById('g').value;
var closet = document.getElementById('closet').value;
var shelf = document.getElementById('shelf').value;
window.location="add_b.php?a="+a+"&b="+b+"&g="+g+"&n="+n+"&closet="+closet+"&shelf="+shelf;
}
function rec(){
// Создаем распознаватель
var recognizer = new webkitSpeechRecognition();
// Ставим опцию, чтобы распознавание началось ещё до того, как пользователь закончит говорить
recognizer.interimResults = true;
// Какой язык будем распознавать?
recognizer.lang = 'ru-Ru';
// Используем колбек для обработки результатов
recognizer.onresult = function (event) {
  var result = event.results[event.resultIndex];
  if (result.isFinal) {
    //if (result[0].transcript!="конец"){
      //alert('Вы сказали: ' + result[0].transcript);
      var out =  document.getElementById('a');
      out.value=result[0].transcript;
    //  rec();
    //}
  } else {
    console.log('Промежуточный результат: ', result[0].transcript);
  }
};
// Начинаем слушать микрофон и распознавать голос
recognizer.start(); 
}
</script>
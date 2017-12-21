<?php
class Menu
{
	public $json = '[
	{
	"name": "Просмотр книг",
	"url": "index.php"
	},
	{
	"name": "Добавить книгу",
	"url": "in.php"
	},
	{
	"name": "Добавить жанр",
	"url": "genres.php"
	},
	{
	"name": "Статистика",
	"url": "stat.php"
	},
	{
	"name": "Выйти",
	"url": "out.php"
	}
]';
	public function show() {
	$obj=json_decode($this->json,true);
		echo "<a>Пользователь: ".$_SESSION['login']."</a><br>";
		foreach ($obj as &$val) {
    	echo "<a href='". $val["url"] ."'>".$val["name"]."</a><br>";
		}
		echo "<br>";
	}
}
$menu = new Menu();
?>
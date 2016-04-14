<?
	include("modules/news.php");
	$news = index_page();
	
	include("modules/menu.php");
	$menu = menu();
	
	include("modules/templates.php");
	
	include("templates/$template/index.html");
?>
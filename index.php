<?
	if($_GET['blog'])
		$blog = $_GET['blog'];
	if(!$blog)
	{
		include("modules/news.php");
		$news = index_page();
	}
	
	include("modules/menu.php");
	$menu = menu();
	
	include("config.php");
	include("templates/$template/index.html");
?>
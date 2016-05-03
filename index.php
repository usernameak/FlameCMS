<?
	include("config.php");
	
	if($_GET['blog'])$blog = $_GET['blog'];
	
	include("modules/blog.php");
	include("modules/parser.php");
	if(!$blog)
	{
		$news = index_page();
	}elseif($blog)
	{
		$news = blog($blog);
	}
	$news = bbcode($news);
	
	include("modules/menu.php");
	$menu = menu();
	
	$page_content = $news;
	include("templates/$template/main.html");
?>
<?
	include("config.php");
	
	if($_GET['blog'])$blog = $_GET['blog'];
	
	include("modules/blog.php");
	if(!$blog)
	{
		$news = index_page();
	}elseif($blog)
	{
		$news = blog($blog);
	}
	
	include("modules/menu.php");
	$menu = menu();
	
	$page_content = $news;
	include("templates/$template/main.html");
?>
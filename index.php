<?
	include("config.php");
	
	if($_GET['blog'])$blog = $_GET['blog'];
	
	if(!$blog)
	{
		include("modules/news.php");
		$news = index_page();
	}
	
	if($blog)
	{
		include("modules/blog.php");
		$txt = blog($blog);
	}
	
	include("modules/menu.php");
	$menu = menu();
	
	if(!empty($_GET['page']))
	{
		$page_content = $gallery;
		include("templates/$template/main.html");
	}
	
	if(!empty($_GET['tpage']))
	{
		include("modules/pages.php");
		
		$page_id = $_GET['tpage'];
		$page = gettpage($page_id);
		$page_title = $page[0];
		$page_content = $page[1];
		
		include("templates/$template/main.html");
	}
	else
	{
		$page_title;
		$page_content = $news;
		include("templates/$template/main.html");
	}
?>
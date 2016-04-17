<?
	include("config.php");
	
	include("modules/news.php");
	$news = index_page();
	
	include("modules/menu.php");
	$menu = menu();
	
	include("modules/gallery.php");
	$gallery = gal();
	
	if(!empty($_GET['page']))
	{
		$page_content = $gallery;
		include("templates/$template/page.html");
	}
	
	if(!empty($_GET['tpage']))
	{
		include("modules/pages.php");
		
		$page_id = $_GET['tpage'];
		$page = gettpage($page_id);
		$page_title = $page[0];
		$page_content = $page[1];
		

		include("templates/$template/page.html");
	}
	else
	{
	$page_title;
	$page_content = $news;
	include("templates/$template/page.html");
	}
?>
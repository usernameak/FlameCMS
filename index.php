<?
	include("config.php");
	
	include("modules/news.php");
	$news = index_page();
	
	include("modules/menu.php");
	$menu = menu();
	
	if(!empty($_GET['page']))
	{
		if(isset($_GET['page']))
		{
			$menu = menu();
			include("modules/pages.php");
		}
		
		$page_id = $_GET['page'];
		$page_content = getpage($page_id);

		include("templates/$template/page.html");
	}
	else
	{
	include("templates/$template/main.html");
	}
?>
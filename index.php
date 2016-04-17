<?
	include("config.php");
	
	include("modules/news.php");
	$news = index_page();
	
	include("modules/menu.php");
	$menu = menu();
	
	include("modules/gallery.php");
	$gallery = gal();
	
	if(isset($_GET['page']) && $_GET['page'] == 'gal')
	{
		$page_content = $gallery;
		include("templates/$template/page.html");
	}
	
	if(!empty($_GET['page']) || $_GET['page'] != 'main'|| $_GET['page'] != 'admin' || $_GET['page'] != 'gal')
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
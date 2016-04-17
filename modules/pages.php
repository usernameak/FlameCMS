<?
	$tpage_id = 1;
	
	function gettpage($id)
	{
		include("config.php");
		
		if(isset($_GET['tpage']))
		{
			$tpage = file("resourses/pages/$id.txt");
		}
		
		$txt = $tpage[1];
		
		for($j = 2; $j < count($tpage); $j ++)
		{
			$txt .= "$tpage[$j] ";
		}
		
		$txt = bbcode1($txt);
		
		$page_content = file_get_contents("templates/$template/content.html");
		$page_content = str_replace("[title]", $tpage[0], $page_content);
		$page_content = str_replace("[text]", $txt, $page_content);
		
		return array($tpage[0], $page_content);
	}
	
	function bbcode1($text) 
	{
		include("config.php");
		$search = $str_search;
		$replace = $str_replace;
		return preg_replace($str_search, $str_replace, $text);
	}
	
	function getpage($title, $id, $menu, $content)
	{
		if(isset($_GET['page']))
		{
			include("config.php");
			include("templates/$template/page.html");
		}
	}
?>
<?
	$tpage_id = 1;
	
	function gettpage($id)
	{
		global $template;
		
		if(isset($_GET['tpage']))
		{
			$tpage = file("resourses/pages/$id.txt");
		}
		
		$title = array_shift($tpage);

		$txt = implode(" ", $tpage);
		
		$txt = bbcode1($txt);
		
		$page_content = file_get_contents("templates/$template/content.html");
		$page_content = str_replace("[title]", $tpage[0], $page_content);
		$page_content = str_replace("[text]", $txt, $page_content);
		
		return array($tpage[0], $page_content);
	}
	
	function bbcode1($text) 
	{
		global $str_search, $str_replace;
		$search = $str_search;
		$replace = $str_replace;
		return preg_replace($str_search, $str_replace, $text);
	}
	
	function getpage($title, $id, $menu, $content)
	{
		global $template;
		if(isset($_GET['page']))
		{
			include("templates/$template/page.html");
		}
	}
?>
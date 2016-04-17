<?
	$page_id = 1;
	
	function getpage($id)
	{
		include("config.php");
		
		if(isset($_GET['page']) && $_GET['page'] == 'gal')
		{
			$page = file("resourses/pages/$id.txt");
		}
		
		$txt = $page[1];
		
		for($j = 2; $j < count($page); $j ++)
		{
			$txt .= "$page[$j] ";	
		}
		
		$txt = bbcode1($txt);
		
		$page_content = file_get_contents("templates/$template/content.html");
		$page_content = str_replace("[title]", $page[0], $page_content);
		$page_content = str_replace("[text]", $txt, $page_content);
		
		return $page_content;
	}
	
	function bbcode1($text) 
	{
		include("config.php");
		$search = $str_search;
		$replace = $str_replace;
		return preg_replace($str_search, $str_replace, $text);
	}
?>
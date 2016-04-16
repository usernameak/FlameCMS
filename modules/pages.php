<?
	$page_id = 1;
	
	function getpage($id)
	{
		include("config.php");
		
		$page = file("resourses/pages/$id.txt");
		
		$txt = $page[1];
		$txt = bbcode1($txt);
		
		$page_content = file_get_contents("templates/$template/content.html");
		$page_content = str_replace("[title]", $page[0], $page_content);
		$page_content = str_replace("[text]", $txt, $page_content);
		
		return $page_content;
	}
	
	function bbcode1($text) 
	{
			$str_search = array(
				"#\[br\]#is",
				"#\[b\](.+?)\[\/b\]#is",
				"#\[i\](.+?)\[\/i\]#is",
				"#\[s\](.+?)\[\/s\]#is",
				"#\[u\](.+?)\[\/u\]#is",
				"#\[url=(.+?)\](.+?)\[\/url\]#is",
				"#\[img\](.+?)\[\/img\]#is",
				"#\[size=(.+?)\](.+?)\[\/size\]#is",
				"#\[color=(.+?)\](.+?)\[\/color\]#is",
				"#\[h(1|2|3|4|5|6)\](.+?)\[\/h(1|2|3|4|5|6)\]#is"
			);
			
			$str_replace = array(
				'<br>',
				'<bold>\\1</bold>',
				'<i>\\1</i>',
				'<s>\\1</s>',
				'<span style="text-decoration:underline">\\1</span>',
				'<a href="\\1">\\2</a>',
				'<img src="\\1">',
				'<span style="font-size:\\1pt">\\2</span>',
				'<span style="color:\\1">\\2</span>',
				'<h\\1>\\2</h\\3>'
			);
			return preg_replace($str_search, $str_replace, $text);
	}
?>
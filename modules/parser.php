<?
	function bbcode($text) {
		$str_search = array(
			"#\[br\]#is",
			"#\[line\]#is",
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
			'<hr align="center" width="95%" color="#BBB"/>',
			'<b>\\1</b>',
			'<i>\\1</i>',
			'<s>\\1</s>',
			'<span style="text-decoration:underline">\\1</span>',
			'<a href="\\1">\\2</a>',
			'<img src="\\1">',
			'<span style="font-size:\\1pt">\\2</span>',
			'<span style="color:\\1">\\2</span>',
			'<h\\1>\\2</h\\3>',
		);
		
		return preg_replace($str_search, $str_replace, $text);
	}
?>
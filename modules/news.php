<?
	function index_page()
	{
		include("config.php");
		$sm_read = file_get_contents("templates/$template/news.html");

		for($i = 1; file_exists("resourses/news/".$i.".txt"); $i ++)
		{
			$file_f = file("resourses/news/".$i.".txt");
			$title[$i - 1] = $file_f[0];
			$date_b[$i - 1] = $file_f[1];
			
			for($j = 2; $j < count($file_f); $j ++)
			{
				$txt[$i - 1] .= "\n $file_f[$j] ";	
			}
			
			preg_match_all("/\[b\](.*?)\[\/b\]/",$txt[$i - 1],$t);

			$txt[$i - 1] = bbcod($txt[$i - 1]);
			
			$author[$i - 1] = "Neongames";
			
			$edd_tamp = $sm_read;
			$edd_tamp = str_replace("[text]", $txt[$i - 1], $edd_tamp);
			$edd_tamp = str_replace("[title]", $title[$i - 1], $edd_tamp);
			$edd_tamp = str_replace("[author]", $author[$i - 1], $edd_tamp);
			$edd_tamp = str_replace("[date_b]", $date_b[$i - 1], $edd_tamp);

			$news .= $edd_tamp;
		}
		
		return $news;
	}
	
	function bbcod($text) 
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
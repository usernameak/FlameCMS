<?
	function index_page()
	{
		include("config.php");
		$sm_read = file_get_contents("templates/$template/news.html");

		for($i = count(glob('resourses/news/*.*')); $i > 0; $i --)
		{
			$file_f = file("resourses/news/".$i.".txt");
			$title[$i] = $file_f[0];
			$date_b[$i] = $file_f[1];
			$tags[$i] = $file_f[2];
			$cats[$i] = $file_f[3];
			
			for($j = 4; $j < count($file_f); $j ++)
			{
				$txt[$i] .= "\n $file_f[$j] ";	
			}
			
			preg_match_all("/\[b\](.*?)\[\/b\]/",$txt[$i - 1],$t);

			$txt[$i] = bbcodd($txt[$i]);
			
			$author[$i] = "Neongames";
			
			$edd_tamp = $sm_read;
			$edd_tamp = str_replace("[_text]", $txt[$i], $edd_tamp);
			$edd_tamp = str_replace("[_title]", $title[$i], $edd_tamp);
			$edd_tamp = str_replace("[_cat]", $cats[$i], $edd_tamp);
			$edd_tamp = str_replace("[_tags]", $tags[$i], $edd_tamp);
			$edd_tamp = str_replace("[_author]", $author[$i], $edd_tamp);
			$edd_tamp = str_replace("[_date_b]", $date_b[$i], $edd_tamp);

			$news .= $edd_tamp;
		}
		
		return $news;
	}
	
	function bbcodd($text) 
	{
			include("config.php");
			$search = $str_search;
			$replace = $str_replace;
			return preg_replace($str_search, $str_replace, $text);
	}
?>
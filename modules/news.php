<?
	function index_page()
	{
		include("config.php");
		$sm_read = file_get_contents("templates/$template/news.html");

		for($i = count(glob('resourses/news/*.*')); $i > 0; $i --)
		{
			$file_f = explode("\n", file_get_contents("resourses/news/".$i.".txt"));
			$title[$i] = $file_f[0];
			$date_b[$i] = $file_f[1];
			
			$img = $file_f[4];
			if(preg_match("/nul/", $img))
				$img = "templates/$template/img/noimage.png";
			$article_photo[$i] = "<img src=\"$img\" width=\"175px\" height=\"100px\"/>";
			
			
			for($j = 5; $j < count($file_f); $j ++)
			{
				$txt[$i] .= $file_f[$j];	
			}
			
			//BBCODES
			$txt[$i] = bbcodd($txt[$i]);
			//!BBCODES
			
			//BREAD
			$bc = "$page_title > " . $file_f[2];
			$sub = $file_f[3];
			
			if(!preg_match("/nul/", $sub))
				$bc .= " > " . $sub;

			$cats[$i] = $bc;
			//!BREAD
			
			$author[$i] = "Neongames";
			
			$edd_tamp = $sm_read;
			$edd_tamp = str_replace("{content}", $txt[$i], $edd_tamp);
			$edd_tamp = str_replace("{img}", $article_photo[$i], $edd_tamp);
			$edd_tamp = str_replace("{title}", $title[$i], $edd_tamp);
			$edd_tamp = str_replace("{cats}", $cats[$i], $edd_tamp);
			$edd_tamp = str_replace("{author}", $author[$i], $edd_tamp);
			$edd_tamp = str_replace("{date}", $date_b[$i], $edd_tamp);

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
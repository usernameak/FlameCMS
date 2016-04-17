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
			$desc[$i] = $file_f[2];
			
			
			for($j = 6; $j < count($file_f); $j ++)
			{
				$txt[$i] .= $file_f[$j];	
			}
			

			$txt[$i] = bbcodd($txt[$i]);
			
			$cat_t = file_get_contents("templates/$template/breadcrumbs.html");
			$catm = str_replace("[_cat]", "Главная", $cat_t);
			$cat_1 = str_replace("[_cat]", $file_f[3], $cat_t);
			$sub = $file_f[4];
			$subs = $file_f[5];
			
			
			if(preg_match("nul", $sub))
			{
				$cat_2 = str_replace("[_cat]", $sub, $cat_t);
			}
			else
			{
				$cat_2 = str_replace("[_cat]", "", $cat_t);
			}
			
			if(preg_match("nul", $subs))
			{
				$cat_3 = str_replace("[_cat]", $subs, $cat_t);
			}
			else
			{
				$cat_3 = str_replace("[_cat]", "", $cat_t);
			}
			
			$cats[$i] = $catm.$cat_1.$cat_2.$cat_3;
			
			$author[$i] = "Neongames";
			
			$edd_tamp = $sm_read;
			$edd_tamp = str_replace("[_text]", $txt[$i], $edd_tamp);
			$edd_tamp = str_replace("[_title]", $title[$i], $edd_tamp);
			$edd_tamp = str_replace("[_cat]", $cats[$i], $edd_tamp);
			$edd_tamp = str_replace("[_desc]", $desc[$i], $edd_tamp);
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
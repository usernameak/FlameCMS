﻿<?
	function index_page()
	{
		global $template;
		$sm_read = file_get_contents("templates/$template/news.html");
		$data = mysql_query("SELECT * FROM `blog`");
		
		for($i = 1; ($sql_f = mysql_fetch_assoc($data)) != false; $i++) {
			$title = $sql_f["title"];
			$date_b = $sql_f["date"];
			
			$txt = explode("[end]",$sql_f["content"]);
			
			//BBCODES
			$txt[0] = bbcodd($txt[0]);
			//!BBCODES
			
			//BREAD
			$bc = "$page_title > " . $sql_f["cat"];
			
			if($sub = $sql_f["subcat"]) {
				$bc .= " > " . $sub;
			}

			$cats = $bc;
			//!BREAD
			
			//IMAGE
			if(($img = $sql_f["image"]) == NULL) {
				$img = "templates/$template/img/noimage.png";
			}
			$article_photo = "<img src=\"$img\" width=\"250px\" height=\"150px\" />";
			//!IMAGE
			
			$author = $sql_f["author"];
			
			$edd_tamp = $sm_read;
			$edd_tamp = str_replace("{id}", $sql_f["id"], $edd_tamp);
			$edd_tamp = str_replace("{content}", $txt[0], $edd_tamp);
			$edd_tamp = str_replace("{img}", $article_photo, $edd_tamp);
			$edd_tamp = str_replace("{title}", $title, $edd_tamp);
			$edd_tamp = str_replace("{cats}", $cats, $edd_tamp);
			$edd_tamp = str_replace("{author}", $author, $edd_tamp);
			$edd_tamp = str_replace("{date}", $date_b, $edd_tamp);

			$news .= $edd_tamp;
		}
		
		return $news;
	}
	
	function bbcodd($text) 
	{
			global $str_search, $str_replace;
			$search = $str_search;
			$replace = $str_replace;
			return preg_replace($str_search, $str_replace, $text);
	}
?>
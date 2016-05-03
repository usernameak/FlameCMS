<?
	function blog($blog)
	{
		global $template;
		$sm_read = file_get_contents("templates/$template/news.html");
		
		$res = mysql_query("SELECT * FROM `blog`");
		$row = mysql_fetch_assoc($res);
		
		$txt = str_replace("[end]", "", $row['content']);
				
		$edd_tamp = $sm_read;
		
		$edd_tamp = str_replace("{img}", image($row), $edd_tamp);
		$edd_tamp = str_replace("{cats}", cats($row), $edd_tamp);
		$edd_tamp = str_replace("{id}", $row["id"], $edd_tamp);
		$edd_tamp = str_replace("{title}", $row["title"], $edd_tamp);
		$edd_tamp = str_replace("{content}", $txt, $edd_tamp);
		$edd_tamp = str_replace("{date}", $row["date"], $edd_tamp);
		$edd_tamp = str_replace("{author}", $row["author"], $edd_tamp);
		
		return $edd_tamp;
	}
	
	function index_page()
	{
		global $template;		
		$sm_read = file_get_contents("templates/$template/news.html");
		$edd_tamp = $sm_read;
		
		$res = mysql_query("SELECT * FROM `blog`");
		
		$txt = explode("[end]", $row["content"]);
		
		while($row = mysql_fetch_assoc($res)) {
			
			$edd_tamp = str_replace("{img}", image($row), $edd_tamp);
			$edd_tamp = str_replace("{cats}", cats($row), $edd_tamp);
			$edd_tamp = str_replace("{id}", $row['id'], $edd_tamp);
			$edd_tamp = str_replace("{title}", $row['title'], $edd_tamp);
			$edd_tamp = str_replace("{content}", $txt[0], $edd_tamp);
			$edd_tamp = str_replace("{date}", $row['date'], $edd_tamp);
			$edd_tamp = str_replace("{author}", $row['author'], $edd_tamp);
		}		
		
		return $edd_tamp;
	}
	
	function image($row) {
		if(($img = $row["image"]) == NULL) {
			$img = "templates/$template/img/noimage.png";
		}
		
		return $img;
	}
	
	function cats($row) {
		$bc = "$page_title > " . $row["cat"];
		
		if($sub = $row["subcat"]) {
			$bc .= " > " . $sub;
		}
		$cats = $bc;
		
		return $cats;
	}
	
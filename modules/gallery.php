<?
	function gal()
	{
		include("config.php");
		$sm_read = file_get_contents("templates/$template/gallery.html");
		
		$replace = "<ul class=\"gallery-pictures\">";
		$count_r = count(glob("templates/$template/img/gal/*.*"));
		
		for($i = 1; $i < $count_r; $i ++)
		{
			$imgs = file("templates/$template/img/gal/$i.png");
			$replace .= "<li class=\"gallery-picture\"><img src=\"$imgs[$i]\" alt=\"img$i\"></li>";
		}
		$replace .= "</ul>";
		
		$sm_read = str_replace("[_picts]", $replace, $sm_read);
		$dots_replace = "<div class=\"gallery-pagination\">";
		
		for($i = 0; $i < $count_r; $i ++)
		{
			$dots_replace .= "<button class=\"gallery-pagination-dot\"></button>";
		}
		
		$dots_replace .= "</div>";
		$sm_read = str_replace("[_pages]", $dots_replace, $sm_read);
		$gallery = $sm_read;
		
		return $galery;
	}
?>
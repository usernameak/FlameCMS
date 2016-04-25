<?
function menu()
{	
	global $template;
	$sql_array = mysql_query("SELECT * FROM `menu`");
	
	for($i = 0; $kek = mysql_fetch_assoc($sql_array); $i++) {
		$href[$i] = $kek["url"];
		$link[$i] = $kek["text"];
	}
	
	$sm_read = file_get_contents("templates/$template/menu.html");
	
	for($i = 0; isset($href[$i]); $i++)
	{
		$edd_tamp = $sm_read;
		$edd_tamp = str_replace("[_href]", $href[$i], $edd_tamp);
		$edd_tamp = str_replace("[_link]", $link[$i], $edd_tamp);
		
		$menu .= $edd_tamp;
	}
	
	return $menu;
}
?>
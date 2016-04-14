<?
function menu()
{
	$href[0] = "#";
	$link[0] = "Главная";
	$href[1] = "#";
	$link[1] = "Лол";
	
	include("modules/templates.php");
	$sm_read = file_get_contents("templates/".$template."/menu.html");
	
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
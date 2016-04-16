<?
function menu()
{	
	$file_array =  file("resourses/menu.txt");
	$num_str = count($file_array); 
	
	for($i = 0; $i < $num_str; $i ++)
	{
		$kek = explode("|", $file_array[$i]);
		$href[$i] = $kek[0];
		$link[$i] = $kek[1];
	}
	
	include("config.php");
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
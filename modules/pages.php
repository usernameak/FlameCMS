<?
	$page_id = 1;
	
	function getpage($id)
	{
		include("config.php");
		
		$page = file("resourses/pages/$id.txt");
		
		$page_content = file_get_contents("templates/$template/content.html");
		$page_content = str_replace("[title]", $page[0], $page_content);
		$page_content = str_replace("[text]", $page[1], $page_content);
		
		return $page_content;
	}
?>
<?	
	$dir = opendir('/templates/');
	
	$i = 0;
	while($file = readdir($dir)) 
	{
		if (is_dir('/templates/'.$file) && $file != '.' && $file != '..') 
		{
			$templates[$i] = $file;
			$i ++;
		}
	}
?>
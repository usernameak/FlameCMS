<?
	function index_page()
	{
		
		include("config.php");
		$sm_read = file_get_contents("templates/$template/news.html");

		for($i = 1; file_exists("resourses/news/".$i.".txt"); $i ++)
		{
			$file_f = file("resourses/news/".$i.".txt");
			$title[$i - 1] = $file_f[0];
			$date_b[$i - 1] = $file_f[1];
			
			for($j = 2; $j < count($file_f); $j ++)
			{
				$txt[$i - 1] .= "\n $file_f[$j] ";	
			}
			
			$author[$i - 1] = "Neongames";
			
			$edd_tamp = $sm_read;
			$edd_tamp = str_replace("[text]", $txt[$i - 1], $edd_tamp);
			$edd_tamp = str_replace("[title]", $title[$i - 1], $edd_tamp);
			$edd_tamp = str_replace("[author]", $author[$i - 1], $edd_tamp);
			$edd_tamp = str_replace("[date_b]", $date_b[$i - 1], $edd_tamp);

			$news .= $edd_tamp;
		}
		
		return $news;
	}
?>
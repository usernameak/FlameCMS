<?
	function index_page()
	{
		for($i = 1; file_exists("resourses/news/".$i.".txt"); $i ++)
		{
			$file_f = file("resourses/news/".$i.".txt");
			$title[$i - 1] = $file_f[0];
			$date_b[$i - 1] = $file_f[1];
			$txt[$i - 1] = $file_f[2];	
		}
		
		include("modules/templates.php");
		$sm_read = file_get_contents("templates/$template/news.html");

		for($i = 0; isset($txt[$i]); $i++)//Выводим цикл где меняем индексы на информацию из переменных
		{
			$edd_tamp = $sm_read;
			$edd_tamp = str_replace("[text]", $txt[$i], $edd_tamp);
			$edd_tamp = str_replace("[title]", $title[$i], $edd_tamp);
			$edd_tamp = str_replace("[author]", $author[$i], $edd_tamp);
			$edd_tamp = str_replace("[date_b]", $date_b[$i], $edd_tamp);

			$news .= $edd_tamp;
		}
		
		return $news;
	}
?>
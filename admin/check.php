<?php
	$pass = "fa820cc1ad39a4e99283e9fa555035ec"; // test001 (md5)
	function check_cookie($toidx = false) 
	{
		global $pass;
		if(md5($_COOKIE["appass"]) == $pass) 
		{
			if(!$toidx) 
			{
				header("Location: /admin/panel.php");
			}
		} else if($toidx) {
			header("Location: /admin/");
			die();
		}
	}
	if($_GET["test"] == "1") {
		if(md5($_POST["pass"]) == $pass) {
			setcookie("appass", $_POST["pass"], time()+60*60*24*365, "/");
		}
		header("Location: /admin/panel.php");
	} else if($_GET["quit"] == "1") {
		setcookie("appass", "", -1, "/");
		header("Location: /admin/");
	}
?>
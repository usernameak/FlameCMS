<?php
	$pass = "fa820cc1ad39a4e99283e9fa555035ec"; // test001 (md5)
	function check_cookie($toidx = false) {
		if(md5($_COOKIE["appass"]) == $pass) {
			if(!$toidx) {
				header("Location: /admin/panel.php");
			}
		} else if($toidx) {
			header("Location: /admin/");
			die();
		}
	}
	
?>
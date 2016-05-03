<?
	
	$jsonconfig = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/config.json"), true);

	//////////////////////////////////////////////////////////////////////////////////

	$db_name = $jsonconfig["db"]["name"];
	$db_host = $jsonconfig["db"]["host"];
	$db_user = $jsonconfig["db"]["user"];
	$db_pass = $jsonconfig["db"]["pass"];
	
	$db = @mysql_connect($db_host, $db_user, $db_pass);
	if(!$db) {
		include($_SERVER['DOCUMENT_ROOT'] . "/mysqlerror.php");
		die();
	}
	mysql_set_charset('utf8_bin');
	mysql_select_db($db_name);
	
	//////////////////////////////////////////////////////////////////////////////////

	$template_data = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `name` = 'template'"));
	$template = trim($template_data["value"]);
	$templates = array_map(basename, glob($_SERVER["DOCUMENT_ROOT"]."/templates/*", GLOB_ONLYDIR));

	//////////////////////////////////////////////////////////////////////////////////
	
	$sitename_data = mysql_fetch_assoc(mysql_query("SELECT * FROM `settings` WHERE `name` = 'sitename'"));
	$site_name = $sitename_data["value"];
	$page_title = $site_name;
	$site_url = sprintf
	(
			"%s://%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME']
	);
	$engine_version = "1.5";
?>
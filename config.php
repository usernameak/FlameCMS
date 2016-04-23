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
	$template = $template_data["value"];
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
	//////////////////////////////////////////////////////////////////////////////////
	$str_search = array(
		"#\[br\]#is",
		"#\[line\]#is",
		"#\[b\](.+?)\[\/b\]#is",
		"#\[i\](.+?)\[\/i\]#is",
		"#\[s\](.+?)\[\/s\]#is",
		"#\[u\](.+?)\[\/u\]#is",
		"#\[url=(.+?)\](.+?)\[\/url\]#is",
		"#\[img\](.+?)\[\/img\]#is",
		"#\[size=(.+?)\](.+?)\[\/size\]#is",
		"#\[color=(.+?)\](.+?)\[\/color\]#is",
		"#\[h(1|2|3|4|5|6)\](.+?)\[\/h(1|2|3|4|5|6)\]#is"	
	);
	
	$str_replace = array(
		'<br>',
		'<hr align="center" width="95%" color="#BBB"/>',
		'<b>\\1</b>',
		'<i>\\1</i>',
		'<s>\\1</s>',
		'<span style="text-decoration:underline">\\1</span>',
		'<a href="\\1">\\2</a>',
		'<img src="\\1">',
		'<span style="font-size:\\1pt">\\2</span>',
		'<span style="color:\\1">\\2</span>',
		'<h\\1>\\2</h\\3>',
	);
	//////////////////////////////////////////////////////////////////////////////////////
?>
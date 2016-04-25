<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/check.php");
	check_cookie(true);

	include($_SERVER["DOCUMENT_ROOT"]."/config.php");

	mysql_query("UPDATE `settings` SET `value`='".addslashes($_POST['site_name'])."' WHERE `name`='sitename'");
	mysql_query("UPDATE `settings` SET `value`='".addslashes($_POST['template'])."' WHERE `name`='template'");
?>
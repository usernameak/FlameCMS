<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/check.php");
	check_cookie(true);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel - Flame CMS</title>
	<!--<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />-->
	<link rel="stylesheet" href="/admin/css/main.css" type="text/css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
</head>
<body>
	<aside>
		<div class="ap-menuitem" data-panefile="/admin/panes/settings.php">Общие настройки</div>
	</aside>
	<main class="indeterminate-main">
		Select a panel from the left menu
	</main>
	<script type="text/javascript" src="/admin/main.js"></script>
</body>
</html>
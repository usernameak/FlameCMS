<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/check.php");
	check_cookie(true);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel - Flame CMS</title>
	<link rel="stylesheet" href="/admin/css/main.css" type="text/css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="http://malsup.github.com/min/jquery.form.min.js"></script>
	<meta name="theme-color" content="#1d1d1d">
	<meta name="msapplication-TileColor" content="#1d1d1d">
	<meta name="msapplication-navbutton-color" content="#1d1d1d">
	<meta name="apple-mobile-web-app-status-bar-style" content="#1d1d1d">
</head>
<body>
	<aside>
		<div id="ap-menu">
			<div class="ap-menuitem" data-panefile="/admin/panes/settings.php">Общие настройки</div>
		</div>
		<div id="ap-optbar">
			<a href="/admin/check.php?quit=1">
				<svg height="40" width="40" viewbox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" id="logout-btn" preserveAspectRatio="xMidYMid slice">
					<path d="M640 768H384V192L128 64h512v192h64V0H0v832l384 192V832h320V512h-64V768zM1024 384L768 192v128H512v128h256v128L1024 384z" fill="#F2F1EF"></path>
				</svg>
			</a>
		</div>
	</aside>
	<main class="indeterminate-main">
		Выберите раздел из левого меню
	</main>
	<script type="text/javascript" src="/admin/main.js"></script>
</body>
</html>
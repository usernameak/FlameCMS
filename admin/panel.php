<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/check.php");
	check_cookie(true);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin panel - Flame CMS</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
	<div class="buttons" style="color: #000;">
		<div class="str">
		<hr>
			<div class="button"><a href="/admin/edit.php?req=main"><img src="/admin/img/mained.png" width="48px" height="48px" alt="Main"/></a><br><p>Основные</p></div>
			<div class="button"><a href="/admin/edit.php?req=news"><img src="/admin/img/edit.png" width="48px" height="48px" alt="Main"/></a><br><p>Статьи</p></div>
		<hr>
		</div>
		<div class="button"><a href="/admin/check.php?quit=1"><img src="/admin/img/exit.png" width="48px" height="48px" alt="Logout"/>Log Out</a></div>
	</div>
</body>
</html>
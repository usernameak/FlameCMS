<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/check.php")
	check_cookie();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Admin panel - Flame CMS</title>
</head>
<body>
	<h1>Admin panel - Restricted Area</h1>
	<form method="POST" action="/admin/check.php?test=1">
		<div>Password: <input type="password" name="pass"></div>
		<div><input type="submit" value="Login"></div>
	</form>
	<hr>
	<p><em>Flame CMS v0.1a</em></p>
</body>
</html>
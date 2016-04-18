<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/check.php");
	check_cookie();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Admin panel - Flame CMS</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
	
	<header>
		<h1>Admin panel - Restricted Area</h1>
	</header>
	
	<div id="login">
		
        <form method="POST" action="/admin/check.php?test=1">
            <fieldset class="clearfix">
                <p>
				<input type="password" name="pass" placeholder="Password">
				<span><img src="/admin/img/lock.png" width="48px" height="48px"/></span></p>
                <div><input type="submit" value="Login"></div>
            </fieldset>
        </form>
    </div>
	
	<hr>
	<footer>
		<p><em>Flame CMS v0.1a</em></p>
	</footer>
</body>
</html>
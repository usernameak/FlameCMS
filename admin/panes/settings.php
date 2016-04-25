<?php
	require_once($_SERVER["DOCUMENT_ROOT"]."/admin/check.php");
	check_cookie(true);

	include($_SERVER["DOCUMENT_ROOT"]."/config.php");
?>
<form id="settings-form" action="/admin/int/settings-save.php" method="POST">
<div id="settings-list">
<div id="settings-item"><label>Имя сайта: </label><input name="site_name" value="<?=htmlspecialchars($site_name)?>"></div>
<div id="settings-item"><label>Шаблон сайта: </label><div class="select-container"><select name="template">
	<?php
		echo(implode("", array_map(function($tname) {
			global $template;
			return "<option ".(($template==$tname) ? "selected" : "")." value=\"$tname\">$tname</option>";
		}, $templates)));
	?>
</select></div></div>
</div>
</form>
<div id="save-button-cont">
	<div id="save-button" onclick="settings_save()">Сохранить изменения</div>
	<div id="save-state"></div>
</div>
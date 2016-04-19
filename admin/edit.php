<?
	function getTemplatesList()
	{
		include_once($_SERVER["DOCUMENT_ROOT"] . "/config.php");
		
		for($i = 0; $i < count($templates); $i ++)
		{
			$templats .= "<option value=\"$i\">$templates[$i]</option>";
		}
		
		return $templats;
	}
	$templats = getTemplatesList();
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="/admin/css/edit.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
			<form class="form-horizontal" width="500px" style="margin 0px auto;">
				<fieldset>

				<!-- Form Name -->
				<legend align="center">��������� �����</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="sitename">��� �����.</label>  
				  <div class="col-md-4">
				  <input id="sitename" name="sitename" type="text" placeholder="Flame CMS" class="form-control input-md">
				  <span class="help-block">�������� ������ �����. ��������� ����</span>  
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="siteurl">URL-����� �����</label>  
				  <div class="col-md-4">
				  <input id="siteurl" name="siteurl" type="text" placeholder="" class="form-control input-md">
				  <span class="help-block">http://flamegames.ru/</span>  
				  </div>
				</div>

				<!-- Select Basic -->
				<div class="form-group">
					<label class="col-md-4 control-label" for="template">�������� ������ �����:</label>
					<div class="col-md-4">
						<select id="template" name="template" class="form-control">
							<?=$templats?>
						</select>
					</div>
				</div>

				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="submit"></label>
				  <div class="col-md-4">
					<button id="submit" name="submit" class="btn btn-success">���������</button>
				  </div>
				</div>

				</fieldset>
				</form>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
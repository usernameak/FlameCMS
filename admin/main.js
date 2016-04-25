$('.ap-menuitem').on("click", function() {
	$.ajax($(this).data("panefile")).done(function(data) {
		$("main").removeClass("indeterminate-main error-main").html(data);
	}).fail(function() {
		$("main").removeClass("indeterminate-main").addClass("error-main").html("Ошибка при загрузке раздела");
	})
})
function settings_save() {
	$("#save-state").addClass("save-state-wait").removeClass("save-state-error save-state-ok").html("Сохранение...");
	$('#settings-form').ajaxSubmit({
		error: function() {
			$("#save-state").addClass("save-state-error").removeClass("save-state-ok save-state-wait").html("Ошибка");
		},
		success: function() {
			$("#save-state").addClass("save-state-ok").removeClass("save-state-error save-state-wait").html("Изменения сохранены!");
		}
	})
}
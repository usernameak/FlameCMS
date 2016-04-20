$('.ap-menuitem').on("click", function() {
	$.ajax($(this).data("panefile")).done(function(data) {
		$("main").removeClass("indeterminate-main error-main").html(data);
	}).fail(function() {
		$("main").removeClass("indeterminate-main").addClass("error-main").html("Ошибка при загрузке раздела");
	})
})
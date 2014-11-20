$(document).ready(function(){

	$("#nav-but").click(function(e){

		$(".header").show();
		e.stopPropagation();
	});

	$(document).click(function(){

		$(".header").hide();
	});
});


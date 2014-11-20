$(document).ready(function(){

	$("#nav-but").click(function(e){

		$(".header").show();
		e.stopPropagation();
	});

	$(document).click(function(){
		//if menu is shown
		$(".header").hide();
	
		

		//if menu is not shown
		 //dont hide
	});
});


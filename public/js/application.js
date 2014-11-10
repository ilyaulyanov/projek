$(document).ready(function() {

    // your stuff here
    // ...
	    //changing input on doubletap
	$(function () {   
		$('.project_stage').dblclick(function(){
			var link = $(this).next();
			$(this).prop("readonly",false).removeClass('no-pointer');
			if($(link).is('div')){
				console.log('yes');
			}else{
				$(this).after('<div class="project_name_save" id="project_stage_1_save">Save</div>');
			}
				//save button for input
				$('.project_name_save').click(function(){
					var link = $(this).prev();
					link.attr("readonly", true);
					$(this).remove();
					console.log(this);
				});
		}).find('.project_stage').addClass('no-pointer');
	});

	$('#project_add_stage').click(function(){

	});

});
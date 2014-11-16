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

//object constructor for stages & tasks
function prObj(stage,tasks){
		this.stage = stage,
		this.tasks = tasks
}	

//object constructor for resulting data object
function dataObj(name,description,prObj){
	this.name = name,
	this.description = description,
	this.prObj = prObj
}


Zepto(function($){
		
		$('#project_create_continue').click(function(){
			//TODO LIST

			/*
			*
			* REMOVE ALL DIVS INSIDE FORM
			*
			*/
			$( "form div" ).remove();

			//find stages inside form
		    var found_stages = $('form').find('.project_stage');

		    //converting into jquery elements
			var jelm = [];
			for (var i = 0; i < found_stages.length; i++) {
				jelm[i] = $(found_stages[i]);
			};
			//getting an array of objects from form
			var objArr = [];
			for (var i = 0; i < jelm.length; i++) {
				objArr.push(formTasksArray(jelm[i]));
			};
			/* below is a fix for objects */
			var objLength = objArr.length;
			objArr[objLength-1].tasks.pop();
			//console.log(objArr);
			//create object for ajax
			var data = formDataObj(objArr);
			//send it
			//console.log(data);
			postDataFromForm(data);
		}) 	


		/**
	    * Prepare an object for ajax
	    * Creates an object our of form data
	    * @return object
	    */
		function formDataObj(objArr){
			var name = $('#project_name').val();
			var description = $('#project_description').val();
			return resObj = new dataObj(name, description, objArr);
		}

		/**
	    * Parse stages and tasks
	    * Creates an object out of stages / tasks
	    * @return object
	    */
		function formTasksArray(task){  //this = project_stage input
			var tasks = [];
			var stage_name = $(task).val();
		    $(task).nextAll().each(function(){
		        if( $(this).is('.project_stage')) return false;   
		        //console.log($(this)[0])
		        var val = $($(this)[0]).val();
		        tasks.push(val);
		        
		    });
		    //console.log(tasks);

		    var theTree = new prObj(stage_name, tasks);
		    return theTree;
		};




	function postDataFromForm(obj){
		//just in case
		$.param(obj);
		console.log(obj);
		
		//ajax request to create project
		var request = $.ajax({
	        type: "post",
	        url: url+"project/createSave",
	        data: obj
	    });

	}
})
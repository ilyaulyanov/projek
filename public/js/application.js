
$(document).ready(function() {

$('.ui-loader').addClass('hidden');
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

	var stageEl = document.getElementsByClassName('project_stage');
	$(stageEl).hammer({ }).bind("panend", 
		function($this){
			swipeDel(this);
			});

	var taskEl = document.getElementsByClassName('project_task');
	$(taskEl).hammer({ }).bind("panend", 
		function($this){
			swipeDel(this);
			});

	
	//$('body').hammer({ }).bind('tap', function(){$('.btn_delete').hide();});

	$('#btn_stage_add').click(function(){
		//creating stage input
		var newStage = document.createElement("input");
		newStage.setAttribute("type","text");
		newStage.setAttribute("name", "projectStage[]");
		newStage.setAttribute("class", "project_stage");
		newStage.setAttribute("value","New Stage");
		newStage.setAttribute("readonly", "true");
		newStage.setAttribute("required", "true");
		$(newStage).hammer({ }).bind("panend", 
		function($this){
			swipeDel(this);
			});
		$("#btn_stage_add").before( newStage );
		
		//creating new task for stage
		$("#btn_stage_add").before( newTask() );
		

		//creating a new task button
		var newTaskBtn = document.createElement("div");
		newTaskBtn.setAttribute("class", "new_task_btn");
		var newTaskBtnText = document.createTextNode("+ Add a task");
		newTaskBtn.appendChild(newTaskBtnText);
		newTaskBtn.addEventListener("click", function(){AddTask(this);}, false);
		$('#btn_stage_add').before(newTaskBtn);

		$('#btn_stage_add').before('<hr/>');
	});
	

	//Adding a new task
	function AddTask(obj){
		$(obj).before(newTask());
	}
	

	//new task input function
	function newTask(){
		var newTask = document.createElement("input");
		newTask.setAttribute("type","text");
		newTask.setAttribute("name", "projectTask[]");
		newTask.setAttribute("class", "project_task");
		newTask.setAttribute("value","New Task");
		newTask.setAttribute("readonly", "true");
		newTask.setAttribute("required", "true");
		$(newTask).hammer({ }).bind("panend", 
		function($this){
			swipeDel(this);
			});
		return newTask;
	}

	//swipe to delete for tasks/stages
	function swipeDel(obj){
		var binded = obj;
		var deleteBtn = document.createElement("div");
		deleteBtn.setAttribute("class","btn_delete");
		var delTaskBtnText = document.createTextNode("Delete");
		deleteBtn.appendChild(delTaskBtnText);
		$(deleteBtn).hammer({ }).bind("tap", function($this, binded){deleteSource(this, obj)});
		$(obj).before(deleteBtn);
	}

	//source - pressed button
	//obj - object to delete
	function deleteSource(source, obj){
		console.log(source);
		console.log(obj);
		//checking if we are deleting a stage or a task
		if($(obj).hasClass('project_stage')){
			$( obj)
			  .nextUntil( "hr" ).addBack().next()
			    .remove();
			$(obj).remove();
			$(source).remove();
		}else{
			$(obj).remove();
			$(source).remove();
		}
		
	}
	




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
	this.tree = prObj
}


$(document).ready(function($){
		
		$('#project_create_continue').click(function(){
			//TODO LIST

			/*
			*
			* REMOVE ALL DIVS INSIDE FORM
			*
			*/
			$( "form div" ).remove();
			//$('.action-button').remove();
			//find stages inside form
		    var found_stages = $('form').find('.project_stage');

			var objArr = [];
			//converting into jquery elements
			//getting an array of objects from form
			for (var i = 0; i < found_stages.length; i++) {
				objArr.push(formTasksArray($(found_stages[i])));
			};
			/* removing last input in the list*/
			var objLength = objArr.length;
			objArr[objLength-1].tasks.pop();
			objArr[objLength-1].tasks.pop();
			//create object for ajax
			var data = formDataObj(objArr);
			//send it
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
		        var val = $($(this)[0]).val();
		        tasks.push(val);
		        
		    });
		    return resObj = new prObj(stage_name, tasks);
		  	};




	function postDataFromForm(obj){
		//just in case
		//$.param(obj);
		//JSON.stringify(obj);
		console.log(obj);
		
		//ajax request to create project
		var request = $.ajax({
	        type: "post",
	        url: url+"project/createSave",
	        data: obj,
	        dataType: 'json',
	        success: function(resp){
	        	console.log(resp);
	        	if (resp.error) {
			        
		       		$('form').hide();
		        	$('#project-message').removeClass('hidden').html('An active project has been detected. Please make sure you finish it before starting a new one.<br/> <a href="'+url+'dashboard">Go to my dashboard<a>');
	        	console.log('suc');
			    }else{
		        	$('form').hide();
	        		$('#project-message').removeClass('hidden').html('Congratulations! Your project has been created. <br/> <a href="'+url+'dashboard">Go to my dashboard<a>');
			    }

	        	
	        }
	        	
	    });

	}
	
});


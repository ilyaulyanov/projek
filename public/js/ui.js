/* UI stuff for pages */

$(document).ready(function(){
/*
	$('a').on('click',function(){
		$('.range-slider').foundation('slider','set_value', 50);
		$('div>range-slider-handle').foundation('reflow');
		console.log($('.range-slider').attr('data-slider'));
	})
*/
	$('.exit-off-canvas').on('click', function(){
		$(document).foundation('reflow');
	})

	//$('div>range-slider-handle').foundation('reflow');
	var handle = document.getElementsByClassName('range-slider-handle');
	for (var i = 0; i < handle.length; i++) {
		assignManager(handle[i]);
	};

	function assignManager(handle){
		var handleEl = handle;
		var mc = new Hammer.Manager(handleEl);
		mc.add( new Hammer.Pan({ direction: Hammer.DIRECTION_ALL, threshold:0}));
		mc.add( new Hammer.Tap({ event: 'tap', taps: 1}));
		mc.add( new Hammer.Press({ event: 'pressup'}))

		mc.on("panend", function(ev, $this){handlePan(ev, this);});
		mc.on("tap", handleTaps);
		mc.on('pressup', function(ev){handlePressUp(ev);});
	}
	function handlePan(e, obj){
		var obj = e.target;
		saveTask(obj);
	}

	function handlePressUp(){
		console.log('pressup');
	}
	

	function handleTaps(){
		console.log('yaya');
	}

	//obj = slider
	function saveTaskBtn(obj){
		var slider = obj;

		//make current range slider active
		$(obj).parent().addClass('task-active');

		//disable other range-sliders
		$('.range-slider:not(.task-active, .task-complete)').animate({ opacity: 0.5 }, 500).addClass("disabled");
		var saveBtn = document.createElement('div');
		saveBtn.setAttribute("class","btn_save_task");
		var saveBtnText = document.createTextNode("Save");
		saveBtn.appendChild(saveBtnText);
		//attach tap handler to the button
		$(saveBtn).hammer({ }).bind("tap", function($this){
			saveTask(this,slider)});
		var found = $(obj).closest('.content');
		if($('.btn_save_task').length > 0){
			return false;
		}else{
			$(found).prepend(saveBtn);
			$(saveBtn).animate({right:'+=2em'},300);
		}
	}
	
	//obj - button
	//slider - this range-slider
	function saveTask(slider){
		var value = $(slider).attr("aria-valuenow");
		//console.log();
		var str = $(slider).parent().data("options").substr(39);
		
		var idStr = str.substr(0, str.length-2);
		//task done
		if(value == 100){
			$(slider).closest('.content').css('background', "#87D37C").css("opacity","0.3");
			$(slider).parent().addClass('task-complete');
		}else{
			$(slider).closest('.content').css('background', "#E4F1FE").css("opacity","1");

		}
		$('.range-slider:not(.task-complete)').animate({ opacity: 1 }, 500).removeClass("disabled");
		$(slider).parent().removeClass("task-active");
		$(slider).foundation('reflow');

		var taskData = {
			taskId : idStr,
			taskCompletion : value 
		}
		$.param(taskData);
		console.log(taskData);
		//ajax request to update task
		var request = $.ajax({
	        type: "post",
	        url: url+"project/taskSave",
	        data: taskData,
	        dataType: 'html',
	        success: function(resp){
	        	console.log('success');
	        	var stage_request = $.ajax({
			        type: "get",
			        url: url+"project/getProgress",
			        data: taskData,
			        dataType: 'json',
			        success: function(resp){
		        	//console.log(resp); 
		        	updateMeter(resp.average)
		        }
		   		});
	        	/*
	        	if (resp.error) {
		       		console.log('yayaya');
	        	console.log('suc');
			    }else{
		        	console.log('ff');
			    }*/
	        }
	        	
	    });
	}

	function updateMeter(array){
		console.log(array.average);
		console.log(array.stage_id);
		$('#meter-stage-'+array.stage_id).animate({ width: array.average+"%"},300);
		$('#display-stage-'+array.stage_id).html(Math.round(array.average));
	}


})


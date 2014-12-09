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
			var par = $(slider).closest('.content');
			$(par).css('background', "#f9f9f9");
			$(par).find('div.small-2').children().animate({opacity:0},200);
			$(par).find('div.small-2').prepend("<i class='fi-check icon-task-complete'></i>");
			
			$(slider).parent().addClass('task-complete');
		}else{
			//$(slider).closest('.content').css('background', "#E4F1FE").css("opacity","1");
			
			$(slider).closest('.content').css('background', "#E4F1FE");
			var par = $(slider).closest('.content');
			$(par).find('div.small-2').children('.icon-task-complete').remove();
			$(par).find('div.small-2').children().animate({opacity:1},200);

			$(slider).parent().removeClass('task-complete');

		}
		$('.range-slider:not(.task-complete)').animate({ opacity: 1 }, 500).removeClass("disabled");
		$(slider).parent().removeClass("task-active");
		$(slider).foundation('reflow');

		var taskData = {
			taskId : idStr,
			taskCompletion : value 
		}
		$.param(taskData);
		//console.log(taskData);
		//ajax request to update task
		var request = $.ajax({
	        type: "post",
	        url: url+"project/taskSave",
	        data: taskData,
	        dataType: 'html',
	        success: function(resp){
	        	//console.log(resp);
	        	var stage_request = $.ajax({
			        type: "get",
			        url: url+"project/getProgress",
			        data: taskData,
			        dataType: 'json',
			        success: function(resp){
		        	//console.log(resp); 
		        	updateMeter(resp.average,taskData);
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

	//array - task average for that stage + stage id
	//Spooky witchery below
	function updateMeter(array,taskData){
		console.log(taskData);
		$('#meter-stage-'+array.stage_id).animate({ width: array.average+"%"},300);
		$('#display-stage-'+array.stage_id).html(Math.round(array.average));
		if(taskData.taskCompletion == 100){
			//console.log('yayaya');
			var done = $('#display-task-done-stage-'+array.stage_id);
			var total = $('#display-task-total-stage-'+array.stage_id);
			var doneInt = parseInt($(done).html());
			$(done).html(++doneInt);
		}else{
			var done = $('#display-task-done-stage-'+array.stage_id);
			var doneInt = parseInt($(done).html());
			if(doneInt>0){
				$(done).html(--doneInt);
			}else{
				$(done).html('0');
			}
		}
		console.log(array);
		if(array.average==100){
			$('#stage-'+array.stage_id).addClass('task-complete');
		}else{
			$('#stage-'+array.stage_id).removeClass('task-complete');
		}
	}


})


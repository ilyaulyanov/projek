/* UI stuff for pages */

$(document).ready(function(){
/*
	$('a').on('click',function(){
		$('.range-slider').foundation('slider','set_value', 50);
		$('div>range-slider-handle').foundation('reflow');
		console.log($('.range-slider').attr('data-slider'));
	})
*/


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
		var value = $(obj).attr("aria-valuenow");
		console.log(obj);
		console.log(value);
		saveTask(obj,value);
	}

	function handlePressUp(){
		console.log('pressup');
	}
	

	function handleTaps(){
		console.log('yaya');
	}

	function saveTask(obj,value){
		var saveBtn = document.createElement('div');
		saveBtn.setAttribute("class","btn_save_task");
		var saveBtnText = document.createTextNode("Save");
		saveBtn.appendChild(saveBtnText);
		var found = $(obj).closest('.content');
		console.log(found[0]);
		
			if($('.btn_save_task').length > 0){
				return false;
			}else{
				$(found).prepend(saveBtn);
			}
		
		//console.log(find_btn[0]);
		
		


		

	}
	


})


/* UI stuff for pages */

$(document).ready(function(){
/*
	$('a').on('click',function(){
		$('.range-slider').foundation('slider','set_value', 50);
		$('div>range-slider-handle').foundation('reflow');
		console.log($('.range-slider').attr('data-slider'));
	})
*/

	$('[data-slider]').on('change.fndtn.slider', function(){
  // do something when the value changes
});

})


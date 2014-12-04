$(document).ready(function(){

	$("#firstBtn").click(function(){

         $("#firstStep").hide();
         $("#secondStep").show();
         //console.log("Next was clicked");
	});
	$("#secondBtn").click(function(){

         $("#secondStep").hide();
         $("#firstStep").show();
         //console.log("Previous was clicked");
	});

});
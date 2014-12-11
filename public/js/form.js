$(document).ready(function(){

	$("#firstBtn").click(function(){
      //console.log($('#project_name').val());
      checkFields();
         
         //console.log("Next was clicked");
	});
	$("#secondBtn").click(function(){

         $("#secondStep").hide();
         $("#firstStep").show();
         //console.log("Previous was clicked");
	});

   function checkFields(){
      if($('#project_name').val()==''){
         if($('small').length > 0){
            
         }else{
            $('#project_name').before("<small class='error'>Please make your project more personal and type in its name.</small>");
         }
         
      }else{
         if($('#project_description').val() ==''){
            if($('small').length >0){

            }else{
            $('#project_description').before("<small class='error'>It would be nice of you to include a small description for your project. Just so you don't forget.</small>");
            }
         }else{
            $("#firstStep").hide();
         $("#secondStep").show();
         }
         
      }
      
   }

});
$(document).ready(function() 
{
    	$(".map_name").mouseup(function()  {setColor(".map_name"); });
//   	$("#S2").mousemove(function()  {setColor("#S2") });
 
 
});
function setColor(id)
{
//	 var val = $(id + "  option:selected").val();
	  $(id).css('background-color', 'red');
}
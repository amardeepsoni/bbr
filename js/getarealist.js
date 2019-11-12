$(document).ready(function(){
	var status = 1;
	
	if(status){
		
	$.ajax({
		type : 'POST',
		url : '../php/getarealist.php',
		data : 'status='+status,
		success: function(html){
			$('#listget tbody').html(html);
		}

	})
	}


});
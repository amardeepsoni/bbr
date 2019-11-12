$(document).ready(function(){
	$("#form").submit(function(){
		return false;
	});
	$("#logout").click(function(){

		var logout = $("#logout").val();

		$.ajax({
			method 	: 'POST',
			data 	: {logout:logout},
			url 	: '../php/logout.php',
			success : function(data){
					if(data == '1')
					{
						window.location.href = "../index.php";
					}
			}

		})



});
});
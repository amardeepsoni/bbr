$(document).ready(function(){
	$("#newwindow").show();
	$("#historywindow").hide();
	$("#lobwindow").hide();
	$("#profilewindow").hide();
	$("#settingwindow").hide();

	$("#history").click(function(){
		$("#historywindow").show();
		$("#newwindow").hide();
		$("#lobwindow").hide();
		$("#profilewindow").hide();
		$("#settingwindow").hide();
	});
	$("#new").click(function(){
		$("#historywindow").hide();
		$("#newwindow").show();
		$("#lobwindow").hide();
		$("#profilewindow").hide();
		$("#settingwindow").hide();
	});
	$("#lob").click(function(){
		$("#historywindow").hide();
		$("#newwindow").hide();
		$("#lobwindow").show();
		$("#profilewindow").hide();
		$("#settingwindow").hide();
	});
	$("#profile").click(function(){
		$("#historywindow").hide();
		$("#newwindow").hide();
		$("#lobwindow").hide();
		$("#profilewindow").show();
		$("#settingwindow").hide();
	});
	$("#setting").click(function(){
		$("#historywindow").hide();
		$("#newwindow").hide();
		$("#lobwindow").hide();
		$("#profilewindow").hide();
		$("#settingwindow").show();
	});

	//bill current date

	var date = new Date();

	var current_date = date.getDate()+"."+(date.getMonth()+1)+"."+date.getFullYear();

	$("#steautodate").val(current_date);
	
	//bill current date

	//addplace button 

	$("#addplacewin").click(function(){
		$("#formllist").addClass("formlistanimate");
	});

	$("#cancellist").click(function(){
		$("#formllist").removeClass("formlistanimate");
	});




    



});
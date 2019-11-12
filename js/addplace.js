$(document).ready(function(){ 
$("#formllist").submit(function(){
		return false;
	});
$("#successful").hide();
$("#errors").hide();

	


$("#statesame").on('change',function(){
	var statesame =	$("#statesame").val();
	
	if (statesame) {

		if (statesame == '1') {
			$("#bstateto").prop('disabled', true);
			$("#statecodeto").prop('disabled', true);
		}else{
			$("#bstateto").prop('disabled', false);
			$("#statecodeto").prop('disabled', false);
		}
		
	}
});



	//add place

$("#adstate_area").click(function(){

	var bstatesfrm 		= 	$("#bstatefrm").val();
	var statecodefrm 	=	$("#statecodefrm").val();
	var ownergstin 		= 	$("#ownergstins").val();
	var prefx			=	$("#invprifix").val();
	var statesame 		=	$("#statesame").val();
	var bstateto 		=	$("#bstateto").val();
	var statecodeto 	=	$("#statecodeto").val();
	var gstinto 		=	$("#gstinto").val();
	var supplace 		=	$("#supplace").val();
	var nameofparty		=	$("#nameofparty").val();
	var supaddress 		=	$("#supaddress").val();
	
	$.ajax({
			type 	: 'GET',
			data 	: {
						bstatesfrm :bstatesfrm,
						statecodefrm:statecodefrm,
						ownergstin:ownergstin,
						prefx:prefx,
						bstateto:bstateto,
						statesame:statesame,
						statecodeto:statecodeto,
						gstinto:gstinto,
						supplace:supplace,
						nameofparty:nameofparty,
						supaddress:supaddress
					},
			url 	: '../php/addplace.php',
			success : function(data){
				if(data == '1') {
					$("#successful").show();
					myFunction();
					getPlace();
					$("#formllist").removeClass("formlistanimate");
				}else{
					$("#errors").show();
					myFunction();
				}

			}

		})
		clearInput();
 
	});
	

	//get place
	function getPlace(){
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
	}
	//get place

	function clearInput(){
		$("input").val("");
	}
	function myFunction() {
					setTimeout(function(){ $("#successful").hide();$("#errors").hide(); }, 1000); 
	}
});
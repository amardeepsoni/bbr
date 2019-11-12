$(document).ready(function(){
	

	$("#totalwithouttax").on("focus", function() {
    var sum = 0;
    	$("input[class *= 'mul']").each(function(){
        sum += parseInt($(this).val());
    	});
    $("#totalwithouttax").val(sum);

});
	
		  
	

	function gstsum() 
		{ 
		document.getElementById('calculate').disabled = true;
	$("#calculate").prop('disabled', true);
			var totalamt = document.getElementById('totalwithouttax').value;

	 var cgst = document.getElementById('cgst').value; 
	 var sgst = document.getElementById('sgst').value; 
	 var igst = document.getElementById('igst').value; 
	 
	 if (!isNaN(cgst) && !isNaN(sgst)){

		 var cgstamount = (parseInt(totalamt) * parseFloat(cgst))/100;
		 $('#cgstamt').val(Math.round(cgstamount));
		 var sgstamount = (parseInt(totalamt) * parseFloat(sgst))/100;
	    document.getElementById('sgstamt').value =	Math.round(sgstamount);
	 	 var totalgst = parseInt(totalamt) + cgstamount + sgstamount;

	    	if (!isNaN(totalgst)) { 
	    	
	    	document.getElementById('totalwithtax').value = Math.round(totalgst);	
	  		var finalvalue = document.getElementById('totalwithtax').value = Math.round(totalgst);	

			  	if (finalvalue) {
			  		$("#rupeeinword").val(convertNumberToWords(totalgst));
			  		$("#calculate").prop('disabled', false);
			
			  	}else{
			  			$("#calculate").prop('disabled', true);
			  	}
			}else{ document.getElementById('totalwithtax').value = '0';	
			}   
	}
	if (igst){
		
		 var igstamount = (parseInt(totalamt) * parseFloat(igst))/100;
		 document.getElementById('igstamt').value =	Math.round(igstamount);

		 var totalgst = parseInt(totalamt) + igstamount;
		   if (!isNaN(totalgst)) { 
	  	document.getElementById('totalwithtax').value = Math.round(totalgst);	

	  	var finalvalue = document.getElementById('totalwithtax').value

			  	if (finalvalue) {
			  			$("#rupeeinword").val(convertNumberToWords(finalvalue));
			  		$("#calculate").prop('disabled', false);
			
			  	}else{
			  			$("#calculate").prop('disabled', true);
			  	}
		}else{ document.getElementById('totalwithtax').value = '0';	
	 }   
	}
	
	}  
gstsum(); 

$("#igst").on('keydown keyup', function() { gstsum();  });
$("#cgst, #sgst").on('keydown keyup', function() { gstsum();  });

	
});
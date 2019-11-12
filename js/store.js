$(document).ready(function(){
	$("#calculate").click(function(){
			
			
				var inv = $("#invsr").val();
				var num = $("#invnum").val();
				if (inv !='' && num !='') {
				 var invdate 			= $("#steautodate").val();
				 var supdate 			= $("#spldate").val();
				 var suptill 			= $("#tillspldate").val();
				 var supplace 			= $("#placename").val();
				 var programname 		= $("#progname").val();
				 var ownerstate 		= $("#statename").val();
				 var owner_statcode 	= $("#statecode").val();
				 var reverse_ch 		= $("#reversech").val();
				 var ownergstin 		= $("#ownergstin").val();
				 var name_of_party 		= $("#namebill").val();
				 var add_party 			= $("#bpartyadd").val();
				 var party_gstin 		= $("#bpartygstin").val();
				 var party_state 		= $("#billstate").val();
				 var party_statecode 	=$("#supstatecode").val();
				 var rupeeinword = $("#rupeeinword").val();
				 var cgst = $("#cgst").val();
				var cgstamt = $("#cgstamt").val();
				 var sgst = $("#sgst").val();
				 var sgstamt = $("#sgstamt").val();	
				 var igst = $("#igst").val();
				 var igstamt = $("#igstamt").val();
				 var totalwithouttax = $("#totalwithouttax").val();
				 var totalwithtax = $("#totalwithtax").val();


      			 var item = [];      
      			  var qtys = []; 
      			   var rate = []; 
      			    var total = [];       
        			$('input[class ^= disc]').each(function(){
           			 	item.push($(this).val());
       				 });
        			
        			$('input[class ^= qty]').each(function(){
           			 	qtys.push($(this).val());
       				 });

					
					$('input[class ^= rate]').each(function(){
           			 	rate.push($(this).val());
       				 });

					$('input[class ^= mul]').each(function(){
           			 total.push($(this).val());
       				 });


			$.ajax({
			type 	: 'GET',
			data 	: {
						inv:inv,
						num:num,
						invdate:invdate, 	
						supdate:supdate,  			
						suptill:suptill, 			
						supplace:supplace, 			
						programname:programname, 		
						ownerstate:ownerstate, 		 
						owner_statcode:owner_statcode, 
						reverse_ch:reverse_ch, 		 
						ownergstin:ownergstin, 		
						name_of_party:name_of_party, 	
						add_party:add_party, 			 
						party_gstin:party_gstin, 		
						party_state:party_state, 		
						party_statecode:party_statecode,
						rupeeinword:rupeeinword,
						cgst:cgst, 
						cgstamt:cgstamt,
						sgst:sgst, 
						sgstamt:sgstamt,
						igst:igst, 
						igstamt:igstamt,
						totalwithouttax:totalwithouttax,
						totalwithtax:totalwithtax, 
						item:item,
						qtys:qtys,
						rate:rate,
						total:total
					},
			url 	: '../php/store.php',
			success : function(data){
			
					
						alert(data);
					}

		});

		}else{
			alert("data not found");
		}

	});
});
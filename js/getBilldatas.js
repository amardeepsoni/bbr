$(document).ready(function(){
	// option selection
		
	$('#billplace').on('change',function(){
        var stateID = $(this).val();
          if(stateID){
            $.ajax({
                type:'POST',
                url:'../php/getareas.php',
                data:'state_code='+stateID,
                success:function(html){
                    $('#billarea').html(html);
                 }
            }); 
        }else{
            $('#billarea').html('<option value="">Select country first</option>');
        }
    });

	$('#show').hide();
    $('#show2').hide();
    $('#billarea').on('change',function(){
        var areaID = $(this).val();
        if(areaID){
            $.ajax({
                type:'POST',
                url:'../php/getBilldatas.php',
                data:'area_id='+areaID,
                success:function(data){
                	if (data) {
                		$('#show').show();
                            $('#show2').show();
                		var obj = JSON.parse(data);      
                               		           		                      
                		document.getElementById('invsr').value = obj.invoice_prefix;

                        if (isNaN(parseInt(obj.LargestSr))) {
                            document.getElementById('invnum').value =  0;
                        }else{
                            document.getElementById('invnum').value = 1 + parseInt(obj.LargestSr);
                        }
                          
                		document.getElementById('placename').value = obj.place_name;
                		document.getElementById('statename').value = obj.state_name;
                		document.getElementById('statecode').value = obj.state_id;
                        document.getElementById('supstatecode').value = obj.supstate_code;
                        document.getElementById('ownergstin').value = obj.owner_gstin;
                		document.getElementById('namebill').value = obj.nameofparty;
                		document.getElementById('bpartyadd').value = obj.addressofparty;
                		document.getElementById('bpartygstin').value = obj.party_gstin;
						document.getElementById('billstate').value = obj.billing_state;

                        if (obj.samestatus == '1') {

                            $("#samestatgst").show();
                            $("#samestatgst2").show();
                            $("#cgst").show();
                            $("#cgstamt").show();
                            $("#sgst").show();
                            $("#sgstamt").show();  
                            $("#diffstatgst").hide();
                            $("#igst").hide();
                            $("#igstamt").hide();
                        }else{

                            $("#samestatgst").hide();
                            $("#samestatgst2").hide();
                            $("#cgst").hide();
                            $("#sgst").hide();  
                            $("#cgstamt").hide();
                            $("#sgstamt").hide(); 
                            $("#diffstatgst").show();
                            $("#igst").show();
                            $("#igstamt").show();

                        }
                	}
                 }
            }); 
        }
    });
    

});
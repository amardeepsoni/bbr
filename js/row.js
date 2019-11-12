$(document).ready(function() {


	var count = 1;
	$("#addrow").click(function(){
 		
		count++;

		var markup = "<tr><td style='10%' id='count'>"+count+"</td><td style='width: 60%'><input class='disc' style='width: 100%' type='text' id='a"+count+"' placeholder='Description'></td><td style='width: 10%'><input class='qty' style='width: 100%' type='number' id='b"+count+"' ></td><td style='width: 10%'><input class='rate' style='width: 100%' type='number' id='c"+count+"' ></td><td style='width: 10%'><input style='width: 100%' type='number' class='mul' id='d"+count+"' ></td><td style='width: 10%'><input type='checkbox' name='record'></td></tr>";
		var funct = "<script>function sum"+count+"() { var fist"+count+" = document.getElementById('b"+count+"').value; var sec"+count+" = document.getElementById('c"+count+"').value; var result"+count+" = parseInt(fist"+count+") * parseInt(sec"+count+"); if (!isNaN(result"+count+")) { document.getElementById('d"+count+"').value = result"+count+";	}else{ document.getElementById('d"+count+"').value = '0';	}   }  sum"+count+"(); $('#b"+count+", #c"+count+"').on('keydown keyup', function() { sum"+count+"();   }); </script>";

			$(".table-body tbody").append(markup);
			$(".table-body tbody").append(funct);
			var value =count;
			$("#countrow").val(value);
		});


	   $("#delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
            	if($(this).is(":checked")){
                    $(this).parents("tr").remove();
                }
            });
        });

});
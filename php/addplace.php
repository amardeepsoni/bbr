<?php
require_once 'connection.php';
	
if(empty($_GET["bstatesfrm "]) && empty($_GET["statecodefrm"]) && empty($_GET["ownergstin"]) && empty($_GET["prefx"]) && empty($_GET["bstateto"]) && empty($_GET["statesame"]) && empty($_GET["statecodeto"]) && empty($_GET["gstinto"]) && empty($_GET["supplace"]) && empty($_GET["nameofparty"]) && empty($_GET["supaddress"])){
	echo "0";


}else{
			# code...
		$bsf	= trim(htmlspecialchars($_GET["bstatesfrm"]));
		$scf	= trim(htmlspecialchars($_GET["statecodefrm"]));
		$og		= trim(htmlspecialchars($_GET["ownergstin"]));
		$pre	= trim($_GET["prefx"]);
		$ss		= trim($_GET["statesame"]);
		$bst	= trim(htmlspecialchars($_GET["bstateto"]));
		$sct	= trim(htmlspecialchars($_GET["statecodeto"]));
		$pg		= trim(htmlspecialchars($_GET["gstinto"]));
		$suplace= trim(htmlspecialchars($_GET["supplace"]));
		$nop	= trim(htmlspecialchars($_GET["nameofparty"]));
		$sad	= trim($_GET["supaddress"]);

		if($ss == '1'){



	$query = "INSERT INTO `billingplace`(`billing_state`, `place_name`, `nameofparty`, `addressofparty`, `state_code`, `supstate code`, `party_gstin`, `samestatus`) VALUES ('$bsf', '$suplace', '$nop', '$sad', '$scf','$scf','$pg', '$ss')";
	$query_workingplace = "INSERT INTO `working_state`(`state_id`, `state_name`, `owner_gstin`, `invoice_prefix`) VALUES ('$scf', '$bsf', '$og', '$pre')";

	if(mysqli_query($conn, $query)) {
		if (mysqli_query($conn, $query_workingplace)) {
			
			}
		echo '1';
		}

	}else{

	$query = "INSERT INTO `billingplace`(`billing_state`, `place_name`, `nameofparty`, `addressofparty`, `state_code`, `supstate code`, `party_gstin`, `samestatus`) VALUES ('$bst', '$suplace', '$nop', '$sad', '$scf','$sct','$pg', '$ss')";
	$query_workingplace = "INSERT INTO `working_state`(`state_id`, `state_name`, `owner_gstin`, `invoice_prefix`) VALUES ('$scf', '$bsf', '$og', '$pre')";

	if(mysqli_query($conn, $query)) {
		if (mysqli_query($conn, $query_workingplace)) {
			
			}
		echo '1';
		}
	}

}

?>

<?php require_once 'connection.php';
	
	if(isset($_POST["area_id"])){

		$areaid = $_POST["area_id"];

		$getarea_detail = $conn->query("SELECT `billing_state`, `place_name`, `nameofparty`, `addressofparty`, `state_code`, `supstate_code`, `party_gstin`, `samestatus` FROM `billingplace` WHERE place_id = $areaid");

		$getarea = $getarea_detail->fetch_assoc();

			$statecode = $getarea["state_code"];

			$getstatedetail = $conn->query("SELECT `state_id`, `state_name`, `owner_gstin`, `invoice_prefix` FROM `working_state` WHERE state_id = $statecode");

			$getstate_detail = $getstatedetail->fetch_assoc();

			$prefix = 	$getstate_detail["invoice_prefix"];

			$bill_sr = $conn->query("SELECT MAX(invnum) AS LargestSr FROM `bill_detail` WHERE invsrc = '$prefix'");

			$get_sr = $bill_sr->fetch_assoc();

			echo json_encode($getarea+$getstate_detail+$get_sr);

	}

?>

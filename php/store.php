<?php
require_once 'connection.php';
if (!empty($_GET["inv"]) && !empty($_GET["num"])) {
	$invsrc = $_GET["inv"];
	$num = $_GET["num"];
	$invdate = $_GET["invdate"];

	$supdate = $_GET["supdate"];
	$supplace = $_GET["supplace"];
	if (!empty($_GET["suptill"])) {
		$supdate = $supdate . " to " . $_GET["suptill"];
	}

	if (!empty($_GET["programname"])) {
		#
		$supplace = $supplace . "(" . $_GET["programname"] . ")";
	}
	$ownerstate = $_GET["ownerstate"];
	$owner_statcode = $_GET["owner_statcode"];
	$reverse_ch = $_GET["reverse_ch"];
	$ownergstin = $_GET["ownergstin"];
	$name_of_party = $_GET["name_of_party"];
	$add_party = $_GET["add_party"];
	$party_gstin = $_GET["party_gstin"];
	$party_state = $_GET["party_state"];
	$party_statecode = $_GET["party_statecode"];
	$rupeeinword = $_GET["rupeeinword"];
	$cgst = $cgstamt = $sgst = $sgstamt = $igst = $igstamt = "";

	if (!empty($_GET["cgst"]) && !empty($_GET["sgst"])) {
		$cgst = $_GET["cgst"];
		$cgstamt = $_GET["cgstamt"];
		$sgst = $_GET["sgst"];
		$sgstamt = $_GET["sgstamt"];
	}
	if (!empty($_GET["igst"])) {
		$igst = $_GET["igst"];
		$igstamt = $_GET["igstamt"];
	}

	$totalwithouttax = $_GET["totalwithouttax"];
	$totalwithtax = $_GET["totalwithtax"];
	
	$query_save = "INSERT INTO `bill_detail`(`invsrc`, `invnum`, `bill_inv_date`, `supply_date`, `supply_place`, `owner_state`, `owner_state_code`, `reverse_charge`, `owner_gstin`, `billing_persone_nm`, `billing_address`, `billing_gstin`, `billing_state`, `billing_state_code`, `total_amount_before_tax`, `cgst_percent`, `cgst_amt`, `sgst_percent`, `sgst_amt`, `igst_percent`, `igst_amt`, `total_amount_after_tax`, `ruppee_in_word`) VALUES ('$invsrc','$num','$invdate','$supdate','$supplace','$ownerstate','$owner_statcode','$reverse_ch','$ownergstin','$name_of_party','$add_party','$party_gstin','$party_state','$party_statecode','$totalwithouttax','$cgst','$cgstamt','$sgst','$sgstamt', '$igst','$igstamt','$totalwithtax','$rupeeinword')";
	$save_billdetail = mysqli_query($conn, $query_save);
	if ($save_billdetail) {
		# code...

		$inv_num = $invsrc . $num;
		$item = $_GET["item"];
		$qtys = $_GET["qtys"];
		$rate = $_GET["rate"];
		$total = $_GET["total"];

		$query = '';
		for ($count = 0; $count < count($item); $count++) {

			$item_name_clean = mysqli_real_escape_string($conn, $item[$count]);
			$item_qty_clean = mysqli_real_escape_string($conn, $qtys[$count]);
			$item_rate_clean = mysqli_real_escape_string($conn, $rate[$count]);
			$item_total_clean = mysqli_real_escape_string($conn, $total[$count]);
			if ($item_name_clean != '' && $item_qty_clean != '' && $item_rate_clean != '' && $item_total_clean != '') {
				$query .= 'INSERT INTO itemdetail(`inv_num`, `item_description`, `item_rate`, `item_quantity`, `total`) VALUES("' . $inv_num . '","' . $item_name_clean . '", "' . $item_qty_clean . '", "' . $item_rate_clean . '", "' . $item_total_clean . '");';
			}
		}
		if ($query != '') {
			if (mysqli_multi_query($conn, $query)) {
				echo 'Item Data Inserted';
			} else {
				echo 'Error';
			}
		} else {
			echo 'All Fields are Required';
		}

	} else {
		echo "data not completed";
	}
} else {
	echo "string";
}

?>
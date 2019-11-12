<?php
require_once 'connection.php';
if (isset($_POST["status"])) {
	# code...

	$querylist = $conn->query("SELECT `state_id`, `state_name`, `owner_gstin`, `invoice_prefix` FROM `working_state`");

	$rowscountlist = $querylist->num_rows;

	if ($rowscountlist > 0) {

		while ($listid = $querylist->fetch_assoc()) {
			$statecode = $listid["state_id"];
			$query_area_list = $conn->query("SELECT `place_id`, `billing_state`, `place_name`, `state_code`, `party_gstin` FROM `billingplace` WHERE `state_code` = $statecode ");
			$rowcountarea = $query_area_list->num_rows;
			if ($rowscountlist > 0) {

				while ($arealist = $query_area_list->fetch_assoc()) {

					echo "<tr><td>" . $listid["state_id"] . "</td><td>" . $listid["state_name"] . "</td><td>" . $listid["owner_gstin"] . "</td><td>" . $listid["invoice_prefix"] . "</td><td>" . $arealist["billing_state"] . "</td><td>" . $arealist["place_name"] . "</td><td>" . $arealist["party_gstin"] . "</td></tr>";
				}
				# code...
			}

		}

	}

} //main

?>

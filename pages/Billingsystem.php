<?php
session_start();
if (isset($_SESSION["username"])) {

	?>

<html lang="en">
<head>
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>
	<meta name="description" content="Hospitality">
  	<meta name="keywords" content="Housekeeping, catering, Guest House">
  	<meta name="author" content="Mr. Amardeep Soni">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../images/bbrlogo.png" type="image/png" sizes="16x16">
	<title>BBR| Billing System</title>
	<link rel="stylesheet" type="text/css" href="../style/billing.css">
	<link rel="stylesheet" type="text/css" href="../style/profile.css">
	<link rel="stylesheet" type="text/css" href="../style/notification.css">
	<link rel="stylesheet" href="../style/billingbox.css">
	<link rel="stylesheet" type="text/css" href="../style/history.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/all.js"></script>
	<script type="text/javascript" src="../js/logout.js"></script>
	<script type="text/javascript" src="../js/addplace.js"></script>
	<script type="text/javascript" src="../js/row.js"></script>
	<script type="text/javascript" src="../js/getarealist.js"></script>
	<script type="text/javascript" src="../js/getBilldatas.js"></script>
	<script type="text/javascript" src="../js/calculate.js"></script>
	<script type="text/javascript" src="../js/amttorupeeinword.js"></script>
	<script type="text/javascript" src="../js/store.js"></script>
	<script>
      localStorage.clear();
  	</script>
</head>
<body>
	<div class="btnheader">
		<button class="btn" id="new" ><i class="fa fa-file-text-o" style="font-size:24px"></i></button>
		<button class="btn" id="history"><i class='fas fa-history' style='font-size:24px'></i></button>
		<button class="btn" id="lob"><i class="fa fa-folder-open" style="font-size:24px"></i></button>
		<button class="btn" id="profile"><i class="fa fa-user-circle-o" style="font-size:24px"></i></button>
		<button class="btn" id="setting"><i class="fa fa-gear" style="font-size:24px"></i></button>
		<img src="../images/bbrlogo.png" style="position: absolute;left:50%;transform:translateX(-50%); width: 142px; height: 71px;">


		<button class="btn out" id="logout" value="logout"><?php
echo $_SESSION["username"];
	?> <i class="fa fa-sign-out" style="font-size:24px"></i></button>
	</div>

	<!-- for New bill -->
	<div id="newwindow" class="billcontainer">
		<div class="containeroption">
			<form action="" style="position:absolute; top:70px;width:100%; display: flex; flex-direction: row;">
	 <?php
//Include database configuration file
	include '../php/connection.php';

	//Get all state data
	$query_state = $conn->query("SELECT * FROM `working_state` ORDER BY state_name ASC");

	//Count total number of rows
	$rowCount = $query_state->num_rows;
	?>
	<select id="billplace" style="width: 150px; height: 30px;text-align: center;">
		<option value="" disabled selected>--Bill Place--</option>
				<?php
if ($rowCount > 0) {
		while ($row = $query_state->fetch_assoc()) {
			echo '<option value="' . $row['state_id'] . '">' . $row['state_name'] . '</option>';
		}
	} else {
		echo '<option value="">State not available</option>';
	}
	?>
				</select>
				<select name="" id="billarea" style="width: 150px; height: 30px;color:white;">
					<option value="">---Select State First---</option>
				</select>
			</form>
		</div>

		<div class="billingcontainer" id="show">

			<div class="box_left">

				<!-- owner detail -->
				<div style="width: 100%; height:250px; background: #ddd; ">
					<h1 style="width: 100%;background: #999; font-weight: bold;color:white;margin: 0;text-align: center;">Basant Bahar Restaurant</h1>
					<div class="formbox">
					<label for="">Invoice No. :</label>
					<input type="text" id="invsr"/><input type="text" id="invnum" placeholder="Invoice No...">
					</div>
					<div class="formbox">
					<label for="">Invoice Date :</label>
					<input type="text" id="steautodate" placeholder="DD.MM.YYYY">
					</div>
					<div class="formbox">
					<label for="">Supply Date :</label>
					<input type="text" id="spldate" placeholder="DD.MM.YYYY">To<input id="tillspldate" type="text" placeholder="DD.MM.YYYY">
					</div>
					<div class="formbox">
					<label for="">Supply Place :</label><br>
					<input type="text" id="placename" disabled><input type="text" id="progname" style="" placeholder="PROGRAM NAME (IF ANY)">
					</div>

					<div class="formbox">
					<label for="" style=" width: auto;">State :</label><input type="text" id="statename" placeholder="State" disabled>
					<label for="" style="width: auto;">Code :</label><input type="text" id="statecode" style="" placeholder="Code" disabled>

					</div>
					<div class="formbox">
					<label for="" style=" width: auto;">Reverse Charge.(Y/N)</label>
					<select id="reversech">
						<option value="yes">Yes</option>
						<option value="no" selected>No</option>
					</select>
					<label for="" style=" width: auto;">GSTIN :</label>
					<input type="text" id="ownergstin" style="" disabled>
					</div>
				</div>
				<!-- Bill to party -->
				<div style="width: 100%; height:250px; background: #ddd; margin-top: 5px;">
					<h1 style="width: 100%;background: #999; font-weight: bold;color:white;margin: 0;text-align: center;">Bill To Party</h1>
					<div class="formbox">
					<label for="">Name :</label>
					<input type="text" id="namebill" style="width: 60%;" disabled>
					</div>
					<div class="formbox">
					<label for="">Address :</label>
					<input type="text" id="bpartyadd" style="width: 60%;" disabled>
					</div>
					<div class="formbox">
					<label for="">GSTIN :</label>
					<input type="text" id="bpartygstin" style="width: 60%;" disabled>
					</div>
					<div class="formbox">
					<label for="">State :</label>
					<input type="text" id="billstate" disabled>
					<label for="">Code :</label>
					<input type="text" id="supstatecode" disabled>
					</div>

				</div>
				<label style="width: 100%;text-align: center;background: gray;color: #ddd;">:In Word:</label>
				<div class="formbox">
						<textarea id="rupeeinword" type="text" style="width: 99%;height: 60px;font-size: 15px;font-weight: bold;color: red;">
						</textarea>
					</div>
			</div>
			<div class="box_right" style="overflow-y: scroll;">

				<table class="table-body" border="0" cellspacing="2" cellpadding="0" style="position: relative; width: 90%; margin: auto; margin-top:10px;">
					 <thead>
					<tr style="background: #ff9900;">
						<th style="width: 10%;">SI No.</th>
						<th  style="width: 60%;">Service Description</th>
						<th style="width: 10%;">Quantity</th>
						<th style="width: 10%;">Rate</th>
						<th style="width: 10%;"> Total</th>
						<th style="width: 10%;"> </th>
					</tr>
					</thead>
					<tbody>
					<tr class="row">
						<td style="10%">
							1
						</td>
						<td style="width: 60%"><input id="a1" style="width: 100%" type="text" class="disc" placeholder="Description"></td>
						<td style="width: 10%"><input class="qty" type="number" id="b1" style="width: 100%" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"> </td>
						<td style="width: 10%"><input class="rate" type="number" id="c1" style="width: 100%" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"></td>
						<td style="width: 10%"><input type="number" id="d1" class="mul" style="width: 100%" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"></td>
						<td style="width: 10%"><input type="checkbox" name="record"></td>
					</tr>
					<script type="text/javascript">
					function sum1() { var fist1 = document.getElementById('b1').value; var sec1 = document.getElementById('c1').value; var result1 = parseInt(fist1) * parseInt(sec1); if (!isNaN(result1)) { document.getElementById('d1').value = result1;	}else{ document.getElementById('d1').value = '0';	}   }  sum1(); $('#b1, #c1').on('keydown keyup', function() { sum1();  });
					</script>

					</tbody>


				</table>
				<input type="number" id="countrow" style="opacity: 0;">
			</div>

		</div>


	<footer id="show2" style="display:; width: 100%;height: 50px;background: gray;position: absolute; bottom: 0;">
		<div style="">
			<label for="Totalwithouttax">Total Without Tax<b style="color: red;"></b></label><input id="totalwithouttax" style="width: 100px;height: 30px; background: black; color: white; font-weight: bold;padding: 5px;" placeholder="0" />


			<label id="samestatgst" for="CGST">CGST<b style="color: red;">*</b></label><input type="text" id="cgst" style="height: 30px;" /><input type="number" id="cgstamt" style="height: 30px;background: black; color: white;" value="0" disabled/>
			<label id="samestatgst2" for="SGST">SGST<b style="color: red;">*</b></label><input type="text" id="sgst" style="height: 30px;" /><input type="number" id="sgstamt" style="height: 30px;background: black; color: white;"  value="0" disabled />



			<label id="diffstatgst" for="IGST">IGST<b style="color: red;">*</b></label><input type="text" id="igst" style="height: 30px;" /><input type="text" id="igstamt" style="height: 30px;background: black; color: white;" value="0" disabled />

			<label for="Totalwithtax">Total With Tax<b style="color: red;"></b></label><input type="text" id="totalwithtax" style="width: 100px;height: 30px; background: black; color: white; font-weight: bold;padding: 5px;" placeholder="0" disabled/>

			<button id="delete-row" style="">Delete Row</button><button id="addrow">Add Row</button><button id="calculate">Save</button><button id="save&reset">Save &amp; Next</button>
		<div>
	</footer>
	</div>
	<!-- End new bill -->

	<div id="historywindow" class="billcontainer" style="background:#ddd;">

		<div class="historycontant">
			<h1 style="margin-top: 100px;text-align: center;">Bills</h1>
		</div>
		<div class="bills">

		</div>




	</div>
	<div id="lobwindow" class="billcontainer" style="background: #ddd ;"></div>
	<div id="profilewindow" class="billcontainer" style="background:#ddd ; position: relative;">
		<div class="profilecontainer"></div>
	</div>
	<div id="settingwindow" class="billcontainer" style="background: #ddd; overflow-y: scroll;position: relative">

			<div class="adplace" style="top: 50px;">
				<h2 style="width: 100%; text-align: center;color: #888;border: none;border-bottom: 3px solid #888">List Your Place</h2>
				<div style="width: 100%; text-align: center;"><button id="addplacewin" style="background: #ff8800; width: 7rem;border: none;box-shadow: 0 0 10px #000;padding: 10px;"><i id="rotatemap" class='fas fa-map-marked-alt' style='font-size:36px'></i></button></div>

				<!--message -->
				<div id="successful" class="success">Data Save Successfully</div>

				<!--message -->

				<table id="listget" class="placelist2" style="width: 90%; text-align: center" >
					<thead>
					<tr>
						<td>State Code</td><td>State Name</td><td>Owner GSTIN</td><td>Invoice Pre</td><td>Party State</td><td>Place</td><td>GSTIN</td>
					</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

			</div>
			<div class="adplace" style="top: 360px;">

			</div>


	<form id="formllist" class="formlist ">
					<h3 style="color: red;">All Fields are mandatory*</h3>
					<div id="errors" class="error">Something wrong</div>
					<div class="flexbox">
					<input type="text" id="bstatefrm" class="placelist"  placeholder="Enter Billing State(From)..."/>
					<input type="text" id="statecodefrm" class="placelist" placeholder="State Code"/>

					</div>
					<div class="flexbox">
					<input type="text" id="ownergstins" class="placelist" placeholder="Owner GST..."/>
					<input type="text" id="invprifix" class="placelist" placeholder="Invoice Prifix..."/>
					</div>
					<div class="flexbox">
					<select id="statesame" style="width: 50%; margin-right: 5px; background: #ddd; color: black; font-size: 18px;border: none;border-radius: 10px;" >
						<option value="" selected disabled>--Billing State Same--</option>
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
					<input type="text" id="bstateto" class="placelist" placeholder="Billing State(To)..."/>
					</div>
					<div class="flexbox">
					<input type="text" id="statecodeto" class="placelist" placeholder="State Code"/>
					<input type="text" id="gstinto" class="placelist" placeholder="Party GST.."/>
					</div>
					<div class="flexbox">
					<input type="text" id="supplace" class="placelist" placeholder="Supply Place.."/>
					<input type="text" id="nameofparty" class="placelist" placeholder="Party Name"/>
					</div>
					<div class="flexbox">
					<input type="text" id="supaddress" class="placelist" style="width: 100%;" placeholder="Supply Address..."/>

					</div>

					<div class="flexbox">
					<button id="adstate_area" style="" class="btnlist btnbgc-green hoversuc" >Save</button><button id="cancellist" style="" class="btnlist btnbgc-red hovererr" >Cancel</button>
					</div>
				</form>
	</div>
	<div style="background:linear-gradient(to right, #ffff99 0%, #ffcc00 100%); position: absolute; z-index:50;width: 300px; height: auto; bottom: 0;left: 5px;border-radius: 10px 10px 0 0; text-align: center;line-height: 30px;font-weight: bold;color:#aaa;">Developed By : Amar Soni</div>

</body>
</html>

<?php
} else {
	header('location:../index.php');
}

?>
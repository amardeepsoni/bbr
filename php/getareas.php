<?php
require_once 'connection.php';

if(isset($_POST["state_code"]) && !empty($_POST["state_code"])){
    //Get all state data
    $statecode = $_POST['state_code'];
    $query = $conn->query("SELECT * FROM billingplace WHERE state_code = '$statecode' ORDER BY place_name ASC");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    if ($rowCount) {
    	# code...
   
    //Display states list
    if($rowCount > 0){
        echo "<option value=''>Select Place</option>";
        while($row = $query->fetch_assoc()){ 
            echo "<option value='".$row['place_id']."'>".$row['place_name']."</option>";
        }
   	 }else{
        echo "<option value=''>Place not available</option>";
   	 }

     }
}
 else{
 	
     	echo "<option value=''>Error</option>";

     }

?>

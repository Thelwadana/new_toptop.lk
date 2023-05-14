<?php
	include_once 'connection.php';
	
	if ( isset($_GET['district_id']) ) {
        $pro_id = $_GET['district_id'];
		$sql = "SELECT * FROM locations WHERE district_id='".$pro_id."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
		
		while($row = $result->fetch_assoc()) {
			echo "<option value=".$row["Loc_id"].">".$row["location_name"]."</option>";
		}
		} else {
			echo '<option value="">Locations not found</option>';
		}
	} else {
		echo "<option>Error</option>";
	}

	
?>
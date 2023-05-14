<?php
	include_once 'connection.php';
?>
<script>
function SearchAd() {
	what_are_u_looking_for = document.getElementById("searchKeyWord").value;
    category= document.getElementById("cate").value;
    make = document.getElementById("make").value;
    loca= document.getElementById("location").value;
	price = document.getElementById("price").value;

	if ((what_are_u_looking_for=="") && (category ==0) && (make ==0) && (loca ==0) && (price ==0)){
		location.replace("ads.php")
	}else{
		if ((what_are_u_looking_for!="") && (category ==0) && (make ==0) && (loca ==0) && (price ==0)){
			location.replace("ads.php?search="+what_are_u_looking_for)
		}else{
			location.replace("ads.php?search="+what_are_u_looking_for+"&&categ="+category+"&&make="+make+"&&loc="+loca+"&&price="+price)
		}
	}
}
</script>

<form action="ads.php"  method="post">
	

	<!-- row one start -->
	      
	    <!-- Category Open Nirmal -->
		

				<select name="cate" id="cate"  class="form-control" >
				<?php
						//Get Locations
						$sql_category = "SELECT categoryid_main,category_name FROM category_main";
						$result_category = $conn->query($sql_category);
						if ($result_category->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Category</option>';
						while($row_category = $result_category->fetch_assoc()) {
							echo "<option>>".$row_category["category_name"]."</option>";
							
							$sql_get_make = "SELECT * FROM category_sub WHERE categoryid_main=".$row_category["categoryid_main"];
							$result_make = $conn->query($sql_get_make);
							if ($result_make->num_rows > 0) {
								while($row_make = $result_make->fetch_assoc()) {
									
									echo "<option value=".$row_make["categoryid_sub"].">".$row_make["sub_category_name"]."</option>";
								}
							}

						}
						} else {
							echo '<option>Locations not found</option>';
						}
					?>	
				</select>
										
	
		<!-- Category Close Nirmal -->

		<!-- Any Make Open Nirmal -->
		
			
				<select name="make" id="make"  class="form-control" >
				   <?php
						//Get Locations
						$sql = "SELECT make_id,make_name FROM make";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Any Make</option>';
						while($row = $result->fetch_assoc()) {
							echo "<option value=".$row["make_id"].">".$row["make_name"]."</option>";
						}
						} else {
							echo '<option value="">Makes not found</option>';
						}
					?>	
				</select>
									
	
		<!-- Any Make Close Nirmal -->

		<!-- Any Type Open Nirmal -->
	
			
				<select name="make" id="make"  class="form-control" >
				   <?php
						//Get Locations
						$sql = "SELECT make_id,make_name FROM make";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Any Type</option>';
						while($row = $result->fetch_assoc()) {
							echo "<option value=".$row["make_id"].">".$row["make_name"]."</option>";
						}
						} else {
							echo '<option value="">Makes not found</option>';
						}
					?>	
				</select>
											
	
		<!-- Any Type Close Nirmal -->
    
	<!-- row one close -->	

	<!-- row two start -->
	
	    <!-- what are you looking for here open Nirmal -->
	
			<input type="text" class="form-control" name="searchKeyWord" id="searchKeyWord" placeholder="what are you looking for here?" required>
		
		<!-- what are you looking for here close Nirmal -->


	    <!-- Location Open Nirmal -->
		
			
				<select name="location" id="location"  class="form-control" >
					<?php
						//Get Locations
						$sql = "SELECT Loc_id,location_name FROM locations";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Location</option>';
						while($row = $result->fetch_assoc()) {
							echo "<option value=".$row["Loc_id"].">".$row["location_name"]."</option>";
						}
						} else {
							echo '<option value="">Locations not found</option>';
						}
					?>															
				</select>
		
		
		<!-- Location Close Nirmal -->

		<!-- Prise Open Nirmal -->
	
			
				<select name="price" id="price"  class="form-control" >
				<option value="0">Price</option>
				<option value="1">less than 500000</option>
				<option value="2">500000 - 1 MILLION</option>
				<option value="3">1 MILLION - 2 MILLION</option>
				<option value="4">2 MILLION - 5 MILLION</option>
				<option value="5">>5 Million</option>
				
					<?php
					/*
						//Get Locations
						$sql = "SELECT Loc_id,location_name FROM locations";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Price</option>';
						while($row = $result->fetch_assoc()) {
							echo "<option value=".$row["Loc_id"].">".$row["location_name"]."</option>";
						}
						} else {
							echo '<option value="">Locations not found</option>';
						}
						*/
					?>	
												
				</select>
			
		
		<!-- Prise Close Nirmal -->

	<!-- row two close -->	
	
	<!--search start Nirmal -->

	        <button type="button" onclick="SearchAd()" class="btn btn-warning btn-block" >
				<span class="lnr lnr-magnifier"></span> Search
			</button>

	<!--search end Nirmal -->

</form>


<?php
	include_once 'connection.php';
?>
            <link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/ads.css">
			<link rel="stylesheet" href="css/style.css">
<script>
function SearchAd() {
	what_are_u_looking_for = document.getElementById("searchKeyWord").value;
    category= document.getElementById("cate").value;
    make = document.getElementById("make").value;
    loca= document.getElementById("location").value;
	price = document.getElementById("price").value;
	condition = document.getElementById("condition").value;

	if ((what_are_u_looking_for=="") && (category ==0) && (make ==0) && (loca ==0) && (price ==0)&&(condition ==0)){
		location.replace("ads.php")
	}else{
		if ((what_are_u_looking_for!="") && (category ==0) && (make ==0) && (loca ==0) && (price ==0)&&(condition ==0)){
			location.replace("ads.php?search="+what_are_u_looking_for)
		}else{
			location.replace("ads.php?search=" + encodeURIComponent(what_are_u_looking_for) + "&categ=" + encodeURIComponent(category) + "&make=" + encodeURIComponent(make) + "&loc=" + encodeURIComponent(loca) + "&price=" + encodeURIComponent(price) + "&condi=" + encodeURIComponent(condition));

		}
	}
}

function van_car() {
	van=1;
	car=2;
    location.replace("ads.php?one="+van+"&&two="+car);
	
}

function moto_scot() {
	moto=7;
	scot=8;
    location.replace("ads.php?one="+moto+"&&two="+scot);
	
}

function truk_bus() {
	truk=7;
	bus=8;
    location.replace("ads.php?one="+bus+"&&two="+truck);
	
}

function threew_tricy() {
	threew=9;
	tricy=10;
    location.replace("ads.php?one="+threew+"&&two="+tricy);
	
}
</script>
<form action="ads.php"  method="post" class="serach-form-area ">
	<div class="row justify-content-center form-wrap">

	<!-- row one start -->
	      
	    <!-- Category Open Nirmal -->
	    <div class="col-lg-4 form-cols">
			<div class="default-select" id="default-selects2">
				<select name="cate" id="cate">
				<?php
						//Get Locations
						$sql = "SELECT type_id,type_name FROM vehicle_type";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Any Type</option>';
						while($row = $result->fetch_assoc()) {
							echo "<option value=".$row["type_id"].">".$row["type_name"]."</option>";
						}
						} else {
							echo '<option value="">Type not found</option>';
						}
					?>	
				</select>
			</div>										
		</div>
		<!-- Category Close Nirmal -->

		<!-- Any Make Open Nirmal -->
		<div class="col-lg-4 form-cols">
			<div class="default-select" id="default-selects2">
				<select name="make" id="make">
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
			</div>										
		</div>
		<!-- Any Make Close Nirmal -->

		<!-- Any Type Open Nirmal -->
		<div class="col-lg-4 form-cols ">
			<input type="text" class="form-control" name="searchKeyWord" id="searchKeyWord" placeholder="what are you looking for here?" >
		</div>
		<!-- Any Type Close Nirmal -->
    
	<!-- row one close -->	

	<!-- row two start -->
	
	    <!-- Location Open Nirmal -->
		<div class="col-lg-4 form-cols pt-lg-3">
			<div class="default-select" id="default-selects">
				<select name="location" id="location">
				<?php
						//Get Locations
						$sql_district = "SELECT dis_id,districtName FROM districts";
						$result_district = $conn->query($sql_district);
						if ($result_district->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Location</option>';
						while($row_district = $result_district->fetch_assoc()) {
							echo "<option disabled>".$row_district["districtName"]."</option>";
							
							$sql = "SELECT Loc_id ,location_name FROM locations WHERE district_id=".$row_district["dis_id"];
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							// output data of each row    
								while($row = $result->fetch_assoc())  {
									
										echo "<option  value=".$row["Loc_id"].">&nbsp&nbsp&nbsp&nbsp".$row["location_name"]."</option>";
								}
							}

						}
						} else {
							echo '<option>Locations not found</option>';
						}
					?>														
				</select>
			</div>
		</div>
		<!-- Location Close Nirmal -->

	    <!-- Location Open Nirmal -->
		<div class="col-lg-4 form-cols pt-lg-3">
			<div class="default-select" id="default-selects">
				<select name="condition" id="condition">
					<?php
						//Get Locations
						$sql = "SELECT condition_id,condition_type FROM condition_table";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						// output data of each row
						echo '<option value="0">Condition</option>';
						while($row = $result->fetch_assoc()) {
							echo "<option  value=".$row["condition_id"].">".$row["condition_type"]."</option>";
						}
						} else {
							echo '<option value="">Condition type found</option>';
						}
					?>															
				</select>
			</div>
		</div>
		<!-- Location Close Nirmal -->

		<!-- Prise Open Nirmal -->
		<div class="col-lg-4 form-cols pt-lg-3">
			<div class="default-select" id="default-selects">
				<select name="price" id="price">
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
			</div>
		</div>
		<!-- Prise Close Nirmal -->

	<!-- row two close -->	
	
	<!--search start Nirmal -->
    </div>
	<div class="row justify-content-center">
		<div class="col-lg-4 form-cols">
					<button type="button" onclick="SearchAd()" class="btn btn-warning btn-block" id="searc" >
				<span class="lnr lnr-magnifier"></span> Search
			</button>
		</div>
	</div>
	<!--search end Nirmal -->

	<!--Google ad start Nirmal -->
	<!--<div class="row justify-content-center form-wrap  bg-light " id="add">
		<img src="img/ads.jpg" alt="">
	</div>
	<div class="row justify-content-center form-wrap  bg-light " id="g_add">
		<img src="img/ads.jpg" alt="">
	</div>-->
	<!--Google ad end Nirmal -->


	<!-- Start callto-action Area -->
	
               <!-- Start features Area -->
			
				<div class="container pt-5" id="d_search">
					<div class="row">
					<div class="col-lg-3 pb-lg-0"id="pad">
					        <form action="ads.php"  method="post">
					        <button style="background-color:#27b100;"type="button" onclick="moto_scot()" class="btn btn-warning  btn-lg btn-block"id="d_moter">
					       
				                   
								  <h6>MOTORCYCLES </h6>
								  <h6>AND</h6>
								  <H6>SCOOTERS</H6>
			               </button>
						
						   <button style="background-color:#27b100;" type="button" onclick="moto_scot()" class="btn btn-warning  btn-lg btn-block"id="moter">
					       
				                   
						   <h6 id="butn">MOTORCYCLES AND SCOOTERS</h6>
						   <h6></h6>
						   <H6></H6>
					       </button>
						   </form>
                    </div>


					<div class="col-lg-3 pb-lg-0"id="pad">
					        <form action="ads.php"  method="post">
					        <button style="background-color:#27b100;"type="button" onclick="van_car()" class="btn btn-warning  btn-lg btn-block"id="d_moter">
					       
				                   
								  <h6>CARS  </h6>
								  <h6>AND</h6>
								  <H6>VANS</H6>
			               </button>
						
						   <button style="background-color:#27b100;" type="button" onclick="van_car()" class="btn btn-warning  btn-lg btn-block"id="moter">
					       
				                   
						   <h6 id="butn">CARS AND VANS</h6>
						   <h6></h6>
						   <H6></H6>
					       </button>
						   </form>
                    </div>


					<div class="col-lg-3 pt-0 pb-0 "id="pad">
					<form action="ads.php"  method="post">
					<button style="background-color:#27b100;" type="button" onclick="threew_tricy()" class="btn btn-warning  btn-lg btn-block"id="d_moter">
					       
				                   
						   <h6>THREE WHEELS  </h6>
						   <h6>AND</h6>
						   <H6>TRICYCLES</H6>
					</button>
					<button style="background-color:#27b100;" type="button" onclick="threew_tricy()" class="btn btn-warning  btn-lg btn-block"id="moter">
					       
				                   
						   <h6 id="butn">THREE WHEELS AND TRICYCLES</h6>
						   <h6></h6>
						   <H6></H6>
					</button>
					</form>
                    </div>


					<div class="col-lg-3 pt-0 pb-0"id="pad">
					        <form action="ads.php"  method="post">
					        <button style="background-color:#27b100;" type="button" onclick="truk_bus()" class="btn btn-warning  btn-lg btn-block"id="d_moter">
					       
				                   
								  <h6>TRUKS  </h6>
								  <h6>AND</h6>
								  <H6>BUSES</H6>
			               </button>
						   <button style="background-color:#27b100;" type="button" onclick="truk_bus()" class="btn btn-warning  btn-lg btn-block"id="moter">
					       
				                   
								  <h6 id="butn">TRUKS AND BUSES</h6>
								  <h6></h6>
								  <H6></H6>
			               </button>
                            </div>
					       </form>
					
				</div>	
			

             <!-- End features Area -->	

<!-- End calto-action Area -->



	
	
</form>	


























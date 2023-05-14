	<?php

    include_once 'connection.php';
    session_start();

if(!isset($_SESSION['uname'])){
header('location:login.php');
}else{
    $email = $_SESSION['uname'];
    $sql = " SELECT * FROM sellers Where email_1='$email' or username='$email'";
    $detail = mysqli_fetch_assoc($conn->query($sql) );
    $Seller_id = $detail["seller_id"];
	$sname = $detail["seller_name"];

    $fullName="";
	$mobileNum="";
	$Province="";
	$District="";
	$City="";
	$Make="";
	$Condition="";
	$Type="";
	$Year ="";
	$Price = "";
	$Transmission = "";
	$Fuel = "";
	$Capacity = "";
	$Mileage ="";
	$Discription ="";
	
	
	
	$Title="";
	$Image1="";
	$Image2="";
	$Image3="";
	$Image4="";
	$Img1 ="";
	$Img2 ="";
	$Img3 ="";
	$Img4 ="";


	$fullname_error ="";
	$phone_error ="";
	$NameVali="";
	$PhoneVali="";

    include_once 'connection.php';
    
	if(isset($_POST[ 'submit'])){
	$Check="";	

    
	$fullName = $_POST["full_name"];
	$mobileNum = $_POST["mobile_num"];
	$District = $_POST["District"];
	$City = $_POST["location"];
	$Make = $_POST["make"];
	$Condition = $_POST["condition"];
	$Type = $_POST["type"];
	$Year = $_POST["year"];
	$Price = $_POST["price"];
	$Transmission = $_POST["transmission"];
	$Fuel = $_POST["fuel"];
	$Capacity = $_POST["capacity"];
	$Mileage = $_POST["mileage"];
	$Discription = $_POST["discription"];
	$Title = $_POST["title"];
	$Image1 = $_FILES['imageInput1']['tmp_name'];
	$Image2 = $_FILES['imageInput2']['tmp_name'];
    $Image3 = $_FILES['imageInput3']['tmp_name'];
    $Image4 = $_FILES['imageInput4']['tmp_name'];



	if (!preg_match("/^[a-zA-Z]{1,20} [a-zA-Z]{1,20}$/", $fullName) || empty($fullName)) {
	
		$fullname_error = "Please enter The Username contains only letters and is 40 characters or less";
		$NameVali=false;
	}else{ 
		$NameVali=true;
	}



	if (!preg_match("/^[0-9]{10}$/", $mobileNum) || empty($mobileNum)) {
		$phone_error = "Phone number must contain 10 digits";
		$PhoneVali=false;
	}else{ 
		$PhoneVali=true;
	}
    
	
	if($District>0 && $City>0 && $Make>0 && $Condition>0 && $Type>0 && $Transmission>0 && $Fuel>0 && $NameVali==true && $PhoneVali==true && !empty($Capacity)  && !empty($Mileage) && !empty($Title) && !empty($Discription)  && !empty($Image4)   && !empty($Image1)   && !empty($Image2)   && !empty($Image3)  && !empty($Year)  && !empty($Price)){
		$current_date = date('Y-m-d');
		$current_time = date('H:i:s');
		$viws=1;
		
		include_once 'connection.php';
		$Img1 = addslashes(file_get_contents($Image1));
		$Img2 = addslashes(file_get_contents($Image2));
		$Img3 = addslashes(file_get_contents($Image3));
		$Img4 = addslashes(file_get_contents($Image4));


		$query = "INSERT INTO posts (Sellerid,fullname, mobile_number, districtid, locationid, make_id, condition_id, type_id, vehicle_year, price, transmission, fuel_type, engine_capacity, mileage, Title, small_description, img1, img2, img3, img4,addeddate,addedtime,totalviews) 
                 VALUES ('$Seller_id','$fullName', '$mobileNum', '$District', '$City' ,'$Make','$Condition','$Type' ,'$Year' ,'$Price' ,'$Transmission','$Fuel','$Capacity','$Mileage' ,'$Title','$Discription' ,'$Img1','$Img2','$Img3','$Img4','$current_date','$current_time','$viws')";
		
		if(mysqli_query($conn, $query)){
			$Check="Registation Ok";
			header('Location:seller_dash.php');
		}else{
			$Check="Connection Error";
		}


	}else{
		$Check="Fill all Contact ,vehicle and images sectiones";
	}
	

	
	
    }
}
	?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
	
	    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>login</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/ads.css">
			<link rel="stylesheet" href="css/logins.css">
		</head>
		<script>
		let one1 = "<?php echo $fullName; ?>";
        console.log(one1);	
		let two = "<?php echo $mobileNum; ?>";
        console.log(two);
        let one = "<?php echo $District; ?>";
        console.log(one);
		let one2 = "<?php echo $City; ?>";
        console.log(one2);
		
		
		
		let five = "<?php echo $Make; ?>";
        console.log(five);
		let six = "<?php echo $Condition; ?>";
        console.log(six);
		let seven = "<?php echo $Type; ?>";
        console.log(seven);
		let eight = "<?php echo $Year; ?>";
        console.log(eight);
		let nine = "<?php echo $Price; ?>";
        console.log(nine);
		let ten = "<?php echo $Transmission; ?>";
        console.log(ten);
		let eleven = "<?php echo $Fuel; ?>";
        console.log(eleven);
		let twowel = "<?php echo $Capacity; ?>";
        console.log(twowel);
		let oneone = "<?php echo $Mileage; ?>";
        console.log(oneone);
		let oneone1 = "<?php echo $Title; ?>";
        console.log(oneone1);
		let twotwo = "<?php echo $Discription; ?>";
        console.log(twotwo);
		let treetree1 = "<?php echo $Img1; ?>";
        console.log(treetree1);
		let treetree2 = "<?php echo $Img2; ?>";
        console.log(treetree2);
		let treetree3 = "<?php echo $Img3; ?>";
        console.log(treetree3);
		let treetree4 = "<?php echo $Img4; ?>";
        console.log(treetree4);
		let treetree5 = "<?php echo $Check; ?>";
        alert(treetree5);

        </script>





		
	



    <body>
			<!--header dilshan-->
			<section class="" >
			<?php include_once 'sellernavigation.php' ?>
			</section>

			<!-- #header -->

			<!-- Start post Area -->
			<section class="post-area section-gap"  style="margin-top:5%;">
				<div class="container">
					<div class="col-lg-12 post-list1">
						<div class="row"><!-- title Strats by shehan perera -->
							
						
							
					

						</div><!-- title Ends by shehan perera-->

					<!-- form strats by shehan perera-->
					<form class="form p-3"   action="Vhiregister.php"  method="post"  enctype="multipart/form-data">
						<h4>Contact Info</h4><br>
							
							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="vehicle_typ"><span class="lable font-weight-bold">First Name and Last Name</span></label>
									<input type="text" name="full_name"class="form-control" id="full_name" placeholder="Full Name" value="<?php echo $fullName; ?>">
									<div id="message"><?php echo $fullname_error; ?></div>
								</div>
									<div class="form-group col-md-3">
									<label for="vehi_condition"><span class="lable font-weight-bold">Mobile Number</span></label>
								    <input type="mobile_num" name="mobile_num" class="form-control" id="mobile_num" placeholder="Mobile Number" value="<?php echo $mobileNum; ?>">
									<div id="message"><?php echo $phone_error; ?></div>
								</div>

								<div class="form-group col-md-3">
									<label for="Province"><span class="lable font-weight-bold">District</span></label>
									<select id="District" name="District" class="form-control">
                                     <?php
                                       // Get Locations
                                       $sql = "SELECT dis_id, districtName FROM districts";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                         echo '<option value="0">District</option>';
                                         
                                         while ($row = $result->fetch_assoc()) {
                                           $selected = ($District == $row['dis_id']) ? 'selected' : '';
                                           echo '<option value="' . $row['dis_id'] . '" ' . $selected . '>' . $row['districtName'] . '</option>';
                                         }
                                       } else {
                                         echo '<option value="">Locations not found</option>';
                                       }
                                     ?>     
                                   </select>

								</div>

								<div class="form-group col-md-3">
									<label for="District"><span class="lable font-weight-bold">Main City</span></label>
									<select id="location" name="location" class="form-control">
									<?php
						                 //Get Locations
										 if($City > 0){
											   $sql2 = "SELECT Loc_id,location_name FROM locations WHERE Loc_id LIKE'%$City%'";
											   $result2 = $conn->query($sql2);
											   $row2 = $result2->fetch_assoc();

						                       $result = $conn->query($sql);
						                       if ($result->num_rows > 0) {
						                       // output data of each row
											    echo "<option value=".$row2["Loc_id"].">".$row2["location_name"]."</option>";
											   }
											  
										 }else{
											echo '<option value="0">City</option>';
										   }
					                ?>		
									
									</select>
								</div>
                            </div>	
						<h4>Vehicle Info</h4><br>
							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="vehicle_typ"><span class="lable font-weight-bold">Vehicle Make</span></label>
									       <select  class="form-control" aria-label="Default select example" id="make" name="make">
												<?php
													//Get Locations
													$sql = "SELECT make_id,make_name FROM make";
													if($Make > 0){
														$sql2 = "SELECT make_id,make_name FROM make WHERE make_id LIKE'%$Make%'";
														$result2 = $conn->query($sql2);
														$row2 = $result2->fetch_assoc();
													}

													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														if($result2->num_rows > 0){
															echo "<option value=".$row2["make_id"].">".$row2["make_name"]."</option>";
															}else{
															echo '<option value="0">Any Make</option>';
															}
													   
													// output data of each row
													
													while($row = $result->fetch_assoc()) {
														echo "<option value=".$row["make_id"].">".$row["make_name"]."</option>";
													}
													} else {
														echo '<option value="">Makes not found</option>';
													}
												?>	
											</select>
									<span id="vehicle_typ" class="text-danger"></span></p>
								</div>
								<div class="form-group col-md-3">
									<label for="vehi_condition"><span class="lable font-weight-bold">Vehicle Condition</span></label>
									<select  class="form-control" aria-label="Default select example" id="condition" name="condition">
												<?php
													//Get Locations
													$sql = "SELECT condition_id,condition_type FROM condition_table";
													if($Condition > 0){
														$sql2 = "SELECT  condition_id,condition_type FROM condition_table WHERE condition_id LIKE'%$Condition%'";
                                                        $result2 = $conn->query($sql2);
													    $row2 = $result2->fetch_assoc();
													}

													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														if($result2->num_rows > 0){
															echo "<option value=".$row2["condition_id"].">".$row2["condition_type"]."</option>";
															}else{
															echo '<option value="0">condition</option>';
															}
													// output data of each row
													
													while($row = $result->fetch_assoc()) {
														echo "<option value=".$row["condition_id"].">".$row["condition_type"]."</option>";
													}
													} else {
														echo '<option value="">Makes not found</option>';
													}
												?>	
											</select>
									<span id="v_condition" class="text-danger"></span></p>
								</div>

								<div class="form-group col-md-3">
									<label for="vehi_model"><span class="lable font-weight-bold">Vehicle Type</span></label>
								    <select  class="form-control" aria-label="Default select example" id="type" name="type">
												<?php
													//Get Locations
													$sql = "SELECT type_id,type_name FROM vehicle_type";
													if($Type > 0){
													$sql2 = "SELECT type_id,type_name FROM vehicle_type WHERE type_id LIKE '%$Type%'";
													$result2 = $conn->query($sql2);
													$row2 = $result2->fetch_assoc();
													}

													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														if($result2->num_rows > 0){
															echo "<option value=".$row2["type_id"].">".$row2["type_name"]."</option>";
															}else{
																echo '<option value="0">Type</option>';
															}
													// output data of each row
													
													while($row = $result->fetch_assoc()) {
														echo "<option value=".$row["type_id"].">".$row["type_name"]."</option>";
													}
													} else {
														echo '<option value="">Makes not found</option>';
													}
												?>	
											</select>
									<span id="v_model" class="text-danger"></span></p>
								</div>

								<div class="form-group col-md-3">
									<label for="vehi_year"><span class="lable font-weight-bold">Manufactured Year</span></label>
								    <input type="number" name="year" class="form-control" id="year" placeholder="Manufactured Year" min="1000" max="9999" value="<?php echo $Year; ?>">
									<span id="v_year" class="text-danger"></span></p>
								</div>
							</div>

							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="vehi_price"><span class="lable font-weight-bold">Price (Rs)</span></label>
								    <input type="number" name="price" class="form-control" id="price" placeholder="Price (Rs)" value="<?php echo $Price; ?>">
									<span id="vehi_price" class="text-danger"></span></p>
								</div>

								<div class="form-group col-md-3">
                                    <label for="vehi_transmission"><span class="lable font-weight-bold">Vehicle Transmission</span></label>
								    <select id="v_transmission" name="transmission" class="form-control" id="transmission" >
									<?php
													//Get Locations
													$sql = "SELECT transmission_id,transmission_name FROM transmission";
													if($Transmission > 0){
														$sql2 = "SELECT transmission_id,transmission_name FROM transmission WHERE transmission_id LIKE '%$Transmission%'";
													$result2 = $conn->query($sql2);
													$row2 = $result2->fetch_assoc();
														}
													
													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														if($result2->num_rows > 0){
															echo "<option value=".$row2["transmission_id"].">".$row2["transmission_name"]."</option>";
															}else{
																echo '<option value="0">Transmission</option>';
															}
													// output data of each row
													
													while($row = $result->fetch_assoc()) {
														echo "<option value=".$row["transmission_id"].">".$row["transmission_name"]."</option>";
													}
													} else {
														echo '<option value="">Makes not found</option>';
													}
												?>	
									</select>
									<span id="vehi_price" class="text-danger"></span></p>
								</div>


								<div class="form-group col-md-3">
									<label for="vehi_fuel"><span class="lable font-weight-bold">Fuel Type</span></label>
									<select  class="form-control" aria-label="Default select example" id="fuel" name="fuel">
												<?php
													//Get Locations
													$sql = "SELECT fuel_type_id,fuel_type_name FROM fuel_type";
													if($Fuel > 0){
														$sql2 = "SELECT fuel_type_id,fuel_type_name FROM fuel_type WHERE fuel_type_id LIKE '%$Fuel%'";
														$result2 = $conn->query($sql2);
														$row2 = $result2->fetch_assoc();
														}
													
													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														if($result2->num_rows > 0){
															echo "<option value=".$row2["fuel_type_id"].">".$row2["fuel_type_name"]."</option>";
															}else{
																echo '<option value="0">Fule</option>';
															}
														
													// output data of each row
													echo '<option value="0">Fule</option>';
													while($row = $result->fetch_assoc()) {
														echo "<option value=".$row["fuel_type_id"].">".$row["fuel_type_name"]."</option>";
													}
													} else {
														echo '<option value="">Makes not found</option>';
													}
												?>	
											</select>
									<span id="v_fuel" class="text-danger"></span></p>

								</div>

								<div class="form-group col-md-3">
									<label for="vehi_e_capacity"><span class="lable font-weight-bold">Engine Capacity</span></label>
								    <input type="number" name="capacity" class="form-control" id="capacity" placeholder="Engine Capacity" value="<?php echo $Capacity; ?>">
									<span id="vehi_e_capacity" class="text-danger"></span></p>
								</div>
							</div>


							<div class="form-row ">
								<div class="form-group col-md-3">
									<label for="vehi_mileage"><span class="lable font-weight-bold">Mileage</span></label>
								    <input type="number" name="mileage" class="form-control" id="mileage" placeholder="Mileage(Km)" value="<?php echo $Mileage; ?>">
									<span id="vehi_mileage" class="text-danger"></span></p>
								</div>

								
							</div>

							<div class="form-row ">
								<div class="form-group col-md-12 pt-2">
									<label for="vehi_model"><span class="lable font-weight-bold">Title</span></label>
									<input type="text" name="title" class="form-control" id="title"  maxlength="70" placeholder="Title" value="<?php echo $Title; ?>">
									<span id="v_model" class="text-danger"></span></p>
								</div>
							</div>
								
						
							<div class="form-row ">
								<div class="form-group col-md-12 pt-2">
									<label for="vehi_model"><span class="lable font-weight-bold">Small Discription</span></label>
								    <textarea class="col-12" id="discription" name="discription" rows="4" maxlength="250"   ><?php echo $Discription; ?></textarea>
									<span id="v_model" class="text-danger"></span></p>
								</div>
							</div>
							


							<div class="form-row ">
							<div class="col-md-3">
                                 <input type="file" class="form-control"  name="imageInput1" accept=".jpg, .jpeg, .png" id="imageInput1" onchange="displayImage(1)">
                                 <br>
                                  <img id="displayedImage1" class="img-fluid" style="display: none;">
                            </div>
                            <div class="col-md-3">
                                  <input type="file" class="form-control"   name="imageInput2" accept=".jpg, .jpeg, .png" id="imageInput2" onchange="displayImage(2)">
                                  <br>
                                  <img id="displayedImage2" class="img-fluid" style="display: none;">
                            </div>
                            <div class="col-md-3">
                                   <input type="file" class="form-control"   name="imageInput3" accept=".jpg, .jpeg, .png" id="imageInput3" onchange="displayImage(3)">
                                   <br>
                                   <img id="displayedImage3" class="img-fluid" style="display: none;">
                            </div>
                            <div class="col-md-3">
                                  <input type="file" class="form-control"    name="imageInput4" accept=".jpg, .jpeg, .png" id="imageInput4" onchange="displayImage(4)">
                                  <br>
                                   <img id="displayedImage4" class="img-fluid" style="display: none;">
                            </div>
                            </div>
							
							
							<button type="submit" name="submit"  class="btn btn-primary">Submit</button>	
						 		
					</form><!-- form ends by shehan perera-->
					</div>	
				</div>	
			</section>
			<!-- End post Area -->


		

			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container pt-5">
					<div class="row">
					    <div class="col-lg-4  col-md-12">
							<div class="single-footer-widget ">
							<h1 class="text-light">TOPTOP.LK</h1>
								<ul class="footer-nav">
									<li><a href="#">About us</a></li>
									<li><a href="#">Terms of Service</a></li>
									<li><a href="#">Privacy Policy</a></li>
									
								</ul>
								
									
									
								
								
							</div>
						</div>		
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6 class="font-weight-bold text-success">Information</h6>
								<ul class="footer-nav">
									<li><a href="#">About us</a></li>
									<li><a href="#">Terms of Service</a></li>
									<li><a href="#">Privacy Policy</a></li>
									
								</ul>
							</div>
						</div>
						<div class="col-lg-3  col-md-12">
							<div class="single-footer-widget">
								<h6 class="font-weight-bold text-success">Help & Support</h6>
								<ul class="footer-nav">
									
									<li><a href="#">Contact Us</a></li>
									
									<li><a href="#">FAQ</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2  col-md-12">
							<div class="single-footer-widget">
								<h6 class="font-weight-bold text-success">Top List</h6>
								<ul class="footer-nav">
									
									<li><a href="#">Car</a></li>
									<li><a href="#">Motorcycle</a></li>
									<li><a href="#">three wheels</a></li>
									<li><a href="#">Van</a></li>
								</ul>
							</div>
						</div>
						
										
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with  by <a href="#" target="_blank">Flexycode</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							
						</div>
					</div>
				</div>
			</footer>
			<!-- End footer Area -->			
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
			<script>
		     $(document).ready(function(){
			   $("#District").on("change", function(){
				var districtId = $("#District").val();
				var getURL     = "location.php?district_id=" + districtId;
				$.get(getURL, function(data, status){
					$("#location").html(data);
				});
				});
			 });

			 function displayImage(id) {
              var input = document.getElementById("imageInput"+id);
              var image = document.getElementById("displayedImage"+id);
              var file = input.files[0];
              var fileName = file.name;
              var fileExt = fileName.substr(fileName.lastIndexOf('.')+1);
              var fileSize = file.size;
              if(fileExt === 'jpg' || fileExt === 'png' || fileExt === 'jpeg'){
                  if(fileSize <= 15*1024*1024){ // 15*1024*1024 bytes = 15MB
                      image.src = URL.createObjectURL(file);
                      image.style.display = "block";
                  }else{
                      alert("maximum file size is 15MB");
                  }
              }else{
                  alert("only jpg or png files are allowed");
              }
            }





			
	        </script>
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
						
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>		
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>




<?php
	include_once 'connection.php';
?>


<script>
	function adssec(){

		const xmlhttp = new XMLHttpRequest();
         xmlhttp.onload = function() {
		if(this.responseText=="have"){
	    document.getElementById("Uname").innerHTML="Alrady have";
		return false;
	     }
	     else{
             document.getElementById("show").innerHTML= "";
	     	return true;
	     }
	     }
         xmlhttp.open("GET", "filter.php?" );
         xmlhttp.send();
     
	     }


    function accsec(){

    }
</script>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width,user-scalable=1.0, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
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
		<title>Ads | Toptop.lk</title>

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
			 
            

	</head>
	
        <body>
			<!--header dilshan-->
			<header class="bg-dark"id="header" id="home" style="margin-bottom:10%;">
				<div class="container">
					<div class="row align-items-center justify-content-between d-flex">
						<div id="logo">
							<a href="index.html"><img src="img/WHITE_LOGO.png" alt="" title="" /></a>
						</div>
						<nav class="navbar-dark bg-dark"id="nav-menu-container">
							<ul class="nav-menu">
								<li class="menu-active"><a href="seller_dash.php">Hello Madusanka</a></li>
								
								
								<li><a class="ticker-btn" href="login.php">CONTACT US</a></li>
								<li><a class="ticker-btn" href="AccDetaillog.php">ACCOUNT SETTING</a></li>					          				          
							</ul>
						</nav><!-- #nav-menu-container -->		    		
					</div>
				</div>
			</header>
			<!-- #header -->
	
            <!-- Start post Area -->
			<section class="post-area section-gap" style="margin-top:40px;" >
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">

								<!-- filter Start Nirmal -->
                            	<form action="" name="fillter" method="post">
								<div class="pt-3">
								            <button type="button" class="btn btn-success btn-block" onclick="adssec()">STATISTIC</button><br>
											<button type="button" class="btn btn-success btn-block" onclick="adssec();">ADS SECTION</button><br>
											<button type="button" class="btn btn-success btn-block" onclick="window.location.href='Vhiregister.php';">ACCOUNT SECTION</button><br>
									</div>
	  								<h4 class="text-center pt-5">Filters</h4>
     								<!-- catogary selecter Strat Nirmal -->
    								<div class="">
      									<h6>CATEGORY</h6>
										<select class="form-select" aria-label="Default select example" id="category">
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
									</div>
									<!-- catagory selecter end Nirmal -->

									<!-- Make selecter Strat Nirmal -->
									<div class="pt-3">
										<h6>MAKES</h6>
											<select class="form-select" aria-label="Default select example" id="make">
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
									<!-- Make selecter end Nirmal -->

									<!-- location selecter Strat Nirmal -->
									<div class="pt-3">
										<h6>LOCATION</h6>
											<select class="form-select" aria-label="Default select example" id="location">
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
									</div>
								<!-- location selecter end Nirmal -->

								<!-- price selecter Strat Nirmal -->
									<div class="pt-3">
										<h6>PRICE</h6>
											<div class="sflt">
													<input class="htext" id="min" type="number" name="pricemmin" placeholder="Min Price " min="0" value="" style="width:80px;height:26px;"> -
													<input class="htext" id="max" type="number" name="pricemmax" placeholder="Max Price " min="0" value="" style="width:81px;height:26px;">
											</div>
									</div>
								<!-- price selecter end Nirmal -->

								<!-- filter submit start Nirmal -->
									<div class="pt-3">
											<button type="button" onclick="searchfill()" class="btn btn-success btn-block">Filter</button>
											
									</div>

		  						</form>

							<!-- google ads start Nirmal -->
								<div class=" ">
									<div class="single-slidebar d-sm-block d-sm-none ">
										<h4>Ad section</h4>
											<div class="active-relatedjob-carusel">
												<div class="single-rated">
													<img class="img-fluid" src="img/r1.jpg" alt="">
													<a href="single.html"><h4>Creative Art Designer</h4></a>
													<h6>Premium Labels Limited</h6>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
													</p>
													<h5>Job Nature: Full time</h5>
													<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
													<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
													<a href="#" class="btns text-uppercase">Apply job</a>
												</div>
												<div class="single-rated">
													<img class="img-fluid" src="img/r1.jpg" alt="">
													<a href="single.html"><h4>Creative Art Designer</h4></a>
													<h6>Premium Labels Limited</h6>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
													</p>
													<h5>Job Nature: Full time</h5>
													<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
													<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
													<a href="#" class="btns text-uppercase">Apply job</a>
												</div>
												<div class="single-rated">
													<img class="img-fluid" src="img/r1.jpg" alt="">
													<a href="single.html"><h4>Creative Art Designer</h4></a>
													<h6>Premium Labels Limited</h6>
													<p>
														Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.
													</p>
													<h5>Job Nature: Full time</h5>
													<p class="address"><span class="lnr lnr-map"></span> 56/8, Panthapath Dhanmondi Dhaka</p>
													<p class="address"><span class="lnr lnr-database"></span> 15k - 25k</p>
													<a href="#" class="btns text-uppercase">Apply job</a>
												</div>																		
											</div>
										</div>
									</div>
								<!-- google ads end Nirmal -->	
								</div>

							<!-- filter end Nirmal -->
						</div>

				<!-- start right side -->
						<div class="col-lg-8 post-list">
						<!--showing result dilshan -->	
						<div class="single-post d-flex flex-row mb-2">						
								<h4 style="margin-top:1rem">VIEWS</h4>
								<div class="d-grid gap-2"style="margin-left:2rem;margin-top:0.5rem" role="group" aria-label="Large button group">
									<button type="button" class="btn btn-outline-dark btn-sm">SEVEN DAYS</button>
									<button type="button" class="btn btn-outline-dark btn-sm">THREE DAYS</button>
									<button type="button" class="btn btn-outline-dark btn-sm">ONE DAY</button>
								</div>
								<button type="button" class="btn btn-outline-dark"style="margin-left:35%"><i class="fa fa-bars" aria-hidden="true"></i></button> 	
						</div>
						<div id="show">
                            <div class="single-post d-flex flex-row">
								
								<div class="col-4">
								        <div class="card">
                                         <img class="card-img-top" src="..." alt="Card image cap">
                                         <div class="card-body">
                                           <h5 class="card-title">TRAFIC</h5>
                                           <p class="card-text">1000</p>
                                           
                                         </div>
                                       </div>
								</div>
								<div class="col-4">
								        <div class="card">
                                         <img class="card-img-top" src="..." alt="Card image cap">
                                         <div class="card-body">
                                           <h5 class="card-title">NEW ACCOUNTS</h5>
                                           <p class="card-text">123</p>
                                           
                                         </div>
                                       </div>
								</div>
								<div class="col-4">
								        <div class="card">
                                         <img class="card-img-top" src="..." alt="Card image cap">
                                         <div class="card-body">
                                           <h5 class="card-title">NEW ADS</h5>
                                           <p class="card-text">500</p>
                                           
                                         </div>
                                       </div>
								</div>
								
								
						
                            </div>
							<div class="single-post d-flex flex-row">
								
								<div class="col-4">
								        <div class="card">
                                         <img class="card-img-top" src="..." alt="Card image cap">
                                         <div class="card-body">
                                           <h5 class="card-title">TOTAL ACCOUNTS</h5>
                                           <p class="card-text">12000</p>
                                          
                                         </div>
                                       </div>
								</div>
								<div class="col-4">
								        <div class="card">
                                         <img class="card-img-top" src="..." alt="Card image cap">
                                         <div class="card-body">
                                           <h5 class="card-title">TOTAL ADS</h5>
                                           <p class="card-text">50000</p>
                                           
                                         </div>
                                       </div>
								</div>
								
								
								
						
                            </div>


						</div>
					</section>
			<!-- End post Area -->
			
		
            
            <!-- start footer Area -->		
			<?php include_once 'footer.php' ?>	
			<!-- End footer Area -->		
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>		
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
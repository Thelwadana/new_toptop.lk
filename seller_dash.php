<?php
	include_once 'connection.php';
	session_start();

	if(!isset($_SESSION['uname'])){
	   header('location:login.php');
	}
	$email = $_SESSION['uname'];
	$sql = " SELECT * FROM sellers Where email_1='$email' or username='$email'";
	$detail = mysqli_fetch_assoc($conn->query($sql) );
	$php_var = $detail["seller_id"];
	$sname = $detail["seller_name"];
	echo "<script>var seller_id= '$php_var';</script>";


	
	?>
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
	<script>
function SearchAd() {
	what_are_u_looking_for = document.getElementById("searchKeyWord").value;
    category= document.getElementById("cate").value;
    make = document.getElementById("make").value;
    loca= document.getElementById("location").value;
	price = document.getElementById("price").value;

	if ((what_are_u_looking_for=="") && (category ==0) && (make ==0) && (loca ==0) && (price ==0)){
		location.replace("seller_dash.php")
	}else{
		if ((what_are_u_looking_for!="") && (category ==0) && (make ==0) && (loca ==0) && (price ==0)){
			location.replace("seller_dash.php?search="+ encodeURIComponent(what_are_u_looking_for))
		}else{
			location.replace("seller_dash.php?search="+ encodeURIComponent(what_are_u_looking_for) +"&categ="+ encodeURIComponent(category) +"&make="+ encodeURIComponent(make) +"&loc="+ encodeURIComponent(loca) +"&price="+ encodeURIComponent(price) )
		}
	}
}
</script>	
	
        <body>
			<!--header dilshan-->
			<section class="" >
			<?php include_once 'sellernavigation.php' ?>
			</section>

			<!-- #header -->
	
            <!-- Start post Area -->
			<section class="post-area section-gap" style="margin-top:40px;" >
				<div class="container">
					<div class="row justify-content-center d-flex">
						<div class="col-lg-4 sidebar">
						<div  class="mt-lg-0"id="">
  <div class="row">
    <div class="col-12"style="text-align: center;">
	  <button type="button" class="btn btn-success btn-block" onclick="window.location.href='Vhiregister.php';">POST YOUR AD</button><br>
      <button class="btn btn-success btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"style="padding-left: 40%;padding-right: 40%;" >
        FILTER
      </button>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
		<form action="ads.php"  method="post">
		

		<!-- row one start -->
			
			<!-- Category Open Nirmal -->
			
					<div class="pb-1">
					<select name="cate" id="cate"  class="form-control " >
					<?php
							//Get 
						
							$sql = "SELECT type_id,type_name FROM vehicle_type";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							// output data of each row
							if(isset($_GET['categ']) && $_GET['categ']!=0){
								$cate = $_GET['categ'];
								$sql2 = "SELECT type_id,type_name FROM vehicle_type WHERE type_id LIKE '%$cate%'";
								$result2 = $conn->query($sql2);
								$row2 = $result2->fetch_assoc();
								echo "<option value=".$row2["type_id"].">".$row2["type_name"]."</option>";
							}
							echo '<option value="0">Type</option>';
							while($row = $result->fetch_assoc()) {
								echo "<option value=".$row["type_id"].">".$row["type_name"]."</option>";
							}
							} else {
								echo '<option value="">Makes not found</option>';
							}
						?>	
					</select>
					</div>
											
		
			<!-- Category Close Nirmal -->

			<!-- Any Make Open Nirmal -->
			
				<div class="pb-1">
					<select name="make" id="make"  class="form-control" >
					<?php
							//Get Locations
							$sql = "SELECT make_id,make_name FROM make";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							if(isset($_GET['make']) && $_GET['make']!=0){
								$make = $_GET['make'];
								$sql2 = "SELECT make_id,make_name FROM make WHERE make_id LIKE '%$make%'";
								$result2 = $conn->query($sql2);
								$row2 = $result2->fetch_assoc();
								echo "<option value=".$row2["make_id"].">".$row2["make_name"]."</option>";
							}
								echo '<option value="0">Make</option>';
							while($row = $result->fetch_assoc()) {
								echo "<option value=".$row["make_id"].">".$row["make_name"]."</option>";
							}
							} else {
								echo '<option value="">Makes not found</option>';
							}
						?>	
					</select>
				</div>
										
		
			<!-- Any Make Close Nirmal -->

			<!-- Any Type Open Nirmal -->
		
							
		
			<!-- Any Type Close Nirmal -->
		
		<!-- row one close -->	

		<!-- row two start -->
		
			<!-- what are you looking for here open Nirmal -->
			<div class="pb-1">

				<?php
				if(isset($_GET['search']) && $_GET['search']!=""){
					$search_name = $_GET['search'];
					
				}else{
					$search_name='what are you looking for here?';
					
				}	
				?>
		
				<input type="text" class="form-control" name="searchKeyWord" id="searchKeyWord" placeholder="<?php echo $search_name; ?>" required>
			</div>
			<!-- what are you looking for here close Nirmal -->


			<!-- Location Open Nirmal -->
			<div class="pb-1">
				
					<select name="location" id="location"  class="form-control" >
				<?php
						//Get Locations
						$sql_district = "SELECT dis_id,districtName FROM districts";
						$result_district = $conn->query($sql_district);
						if ($result_district->num_rows > 0) {
							if(isset($_GET['loc']) && $_GET['loc']!=0){
								$loca = $_GET['loc'];
								$sql2 = "SELECT Loc_id,location_name FROM locations WHERE loc_id LIKE '%$loca%'";
								$result2 = $conn->query($sql2);
								$row2 = $result2->fetch_assoc();
								echo "<option value=".$row2["Loc_id"].">".$row2["location_name"]."</option>";
							}	
						// output data of each row
						echo "<option value='0'>Location</option>";
						while($row_district = $result_district->fetch_assoc()) {
							echo "<option disabled>".$row_district["districtName"]."</option>";
							
							$sql_Location = "SELECT * FROM Locations WHERE district_id=".$row_district["dis_id"];
							$result_Location = $conn->query($sql_Location);
							if ($result_Location->num_rows > 0) {
								while($row_Location = $result_Location->fetch_assoc()) {
									
									echo "<option value=".$row_Location["Loc_id"].">&nbsp&nbsp&nbsp&nbsp".$row_Location["location_name"]."</option>";
								}
							}

						}
						} else {
							echo '<option>Locations not found</option>';
						}
					?>														
				</select>
			
			</div>
			<!-- Location Close Nirmal -->

			<!-- Prise Open Nirmal -->
		
			<div class="pb-1">	
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
				
			</div>
			<!-- Prise Close Nirmal -->

		<!-- row two close -->	
		
		<!--search start Nirmal -->
			<div class="pb-1">
				<button type="button" onclick="SearchAd()" class="btn btn-warning btn-block" >
					<span class="lnr lnr-magnifier"></span> Search
				</button>
			</div>
		<!--search end Nirmal -->

	</form>

        </div>
      </div>
    </div>
  </div>
</div>
							


<div class="single-slidebar" id="d_det">
								

								<!-- filter Start Nirmal -->
							

								 

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
						
							<!-- showing result-->
							<div id="show">
							<?php
									$searchKey="";
									$make="";
									$cate="";
									$loc="";
									$price="";
								if(isset($_GET['p'])){
									$page_no=$_GET['p'];
								}else{
									$page_no=1;
								}
								$sqlcount=0;
								$query="SELECT COUNT(postid) AS total_rows FROM posts WHERE Sellerid LIKE '".$detail["seller_id"]."'";
								$sql = "SELECT * FROM posts WHERE Sellerid LIKE '".$detail["seller_id"]."'";
								
								if(isset($_GET['search']) && $_GET['search']!=""){
									$searchKey = $_GET['search'];
									
										$sql = $sql." AND Title LIKE '%$searchKey%'";
										$query=$query." AND Title LIKE '%$searchKey%'";
									
									$sqlcount+=1;
								}
								
								if(isset($_GET['make']) && $_GET['make']!=0){
									$make = $_GET['make'];
							
										$sql =$sql." AND make_id LIKE '%$make%'";
										$query=$query." AND make_id LIKE '%$make%'";
									
									$sqlcount+=1;
								}
	
								if(isset($_GET['categ']) && $_GET['categ']!=0){
									$cate = $_GET['categ'];
								
										$sql =$sql." AND type_id LIKE '%$cate%'";
										$query=$query." AND type_id LIKE '%$cate%'";
									
									$sqlcount+=1;
								}
	
								if(isset($_GET['loc']) && $_GET['loc']!=0){
									$loc = $_GET['loc'];
							
										$sql =$sql." AND locationid LIKE '%$loc%'";
										$query=$query." AND locationid LIKE '%$loc%'";
									
									$sqlcount+=1;
								}
	
								if(isset($_GET['price']) && $_GET['price']!=0){
									$price = $_GET['price'];
									if($price ==1){
										$selectprice = "0 AND 500000";
									}else if($price ==2){
										$selectprice = "500000 AND 999999";
									}else if($price ==3){
										$selectprice = "1000000 AND 1999999";
									}else if($price ==4){
										$selectprice = "2000000 AND 4999999";
									}else if($price ==5){
										$selectprice = "5000000 AND 9999999999";
									}
									
								
										$sql =$sql."AND price BETWEEN ". $selectprice;
										$query=$query."AND price BETWEEN ". $selectprice;
									
									$sqlcount+=1;
								}
								if ($sqlcount==0){
									$query="SELECT COUNT(postid) AS total_rows FROM posts WHERE Sellerid LIKE '".$detail["seller_id"]."'";
								    $sql = "SELECT * FROM posts WHERE Sellerid LIKE '".$detail["seller_id"]."'";
								}

								
								$result1 = $conn->query($query);
								$row1 = $result1->fetch_assoc();
								$total_rows=$row1['total_rows'];
								
	
								$rows_per_page=10;
								
								$start=($page_no-1)* $rows_per_page;
                                $sql =$sql."ORDER BY postid LIMIT {$start},{$rows_per_page}";
								//echo $sql;
	
								$first= "seller_dash.php?search={$searchKey}&&categ={$cate}&&make={$make}&&loc={$loc }&&price={$price}&&p=1";
	
								$last_page_no=ceil($total_rows/$rows_per_page);
								$last= "seller_dash.php?search={$searchKey}&&categ={$cate}&&make={$make}&&loc={$loc }&&price={$price}&&p={$last_page_no}";
	
								//NEXT
								if($page_no>=$last_page_no){
									$next= "";
								}else{
									$next_page_no=$page_no +1 ;
									$next= "seller_dash.php?search={$searchKey}&&categ={$cate}&&make={$make}&&loc={$loc }&&price={$price}&&p={$next_page_no}";
								}
	
								 //LAST
								 if($page_no<= 1){
									$prev= "";
								}else{
									$prev_page_no=$page_no -1 ;
									$prev="seller_dash.php?search={$searchKey}&&categ={$cate}&&make={$make}&&loc={$loc }&&price={$price}&&p={$prev_page_no}";
								}
	
							
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									//Get Other Informations
									$post_images = "SELECT img1 FROM posts Where postid='".$row["postid"]."'";	
									$result_images = $conn->query($post_images);
									if ($result_images->num_rows > 0) {
										// output data of each row
										while($row_image = $result_images->fetch_assoc()) {
											//$image = $row_image["image"];
											
											$image ='<img src="data:image/jpeg;base64,'.base64_encode($row_image["img1"]).'" width="125px"/>';
		
										}
										}


									$location = "SELECT location_name FROM locations Where loc_id='".$row["locationid"]."'";	
									$result_location = $conn->query($location);
									if ($result_location->num_rows > 0) {
										// output data of each row
										while($row_location = $result_location->fetch_assoc()) {
											//$image = $row_image["image"];
											
											$lastloc =$row_location['location_name'];
										}
									}
									//end
									
									
									$seller_name = "SELECT seller_name FROM sellers Where seller_id='".$row["Sellerid"]."'";	
									$result_seller = $conn->query($seller_name);
									if ($result_seller->num_rows > 0) {
										// output data of each row
										while($row_seller = $result_seller->fetch_assoc()) {
											//$image = $row_image["image"];
											
											$lastseller =$row_seller['seller_name'];
										}
									}
									//

									$sub_catsub = "SELECT sub_category_name FROM category_sub Where categoryid_sub='".$row["categoryid_sub"]."'";	
									$result_catsub = $conn->query($sub_catsub);
									if ($result_catsub->num_rows > 0) {
										// output data of each row
										while($row_catsub = $result_catsub->fetch_assoc()) {
											//$image = $row_image["image"];
											
											$lastcatsub =$row_catsub['sub_category_name'];
										}
									}
									
                                    
									echo 
									'<div id="d_det">
									<div class="single-post d-flex flex-row">
									<div class="thumb" style="width: 150px;">
									
										'.$image.'
									</div>
									<div class="details " style="width:100%; padding-left: 30px;">
									
										<br><div class="title d-flex flex-row justify-content-between">
										
											<div class="titles">
											
											<a href="postshow.php?id='.$row["postid"].'"><h4 style="margin-top:-1.5rem;">'.$row["Title"].'</h4></a>
												<h6> </h6>	
												<h5><span class="badge bg-success">'.$row["totalviews"].'Views</span></h5>
												
												<h5 class="vehicle_details" style="margin-top:1rem;">'.$row["small_description"].'</h5>
												<ul1 >       
                                                            <h4 class="over">Contact Information</h4>
														
																<li>
										
																	<span class="bol-text">Price :</span>
																	<span>Rs'.$row["price"].'</span>
																</li>
																<li>
																<span class="bol-text">Post date : </span>
																	<span>21/12/2023</span>
																</li>
																<li>
																<span class="bol-text">Location : </span>
																	<span>'.$lastloc.'<?php echo $row7["city_name"]; ?></span>
																</li>
																
																
									
															</ul>
												</div>
												
											
												
												<div class="d-grid gap-2 d-md-flex justify-content-md-end">

													<form method="POST" action="postshow.php?id='.$row["postid"].'">  
													<button type="submit" class="btn btn-success btn-sm mx-2">view</button><br>
													</form>

													<form method="POST" action="editpost.php?id='.$row["postid"].'">  
													<button type="submit" class="btn btn-success btn-sm mx-2">Edit</button><br>
													</form>
													
													<form method="POST" action="deletepost.php?id='.$row["postid"].'">  
													<button type="submit" class="btn btn-danger btn-sm mx-2">Delete</button><br>
													</form>
												</div>



												
										</div>
									</div>
								</div>

								<hr class="border border-primary border-3 opacity-75">
								</div>


								<div id="det">

												
												<div class="thumb" style="margin-right:-5px;margin-left:-5px; id="det">
													<div class="col-lg-12 post-list" style=" background-color: rgba(224, 224, 224, 0.4);padding-right:10px; padding-top:1%; padding-bottom:1%;">
														<h5><span class="badge bg-success"style="margin-top:10px;margin-left:300px;">New</span></h5>
														'.$image.'<a href="ad.php?id='.$row["postid"].'"><h4 style="margin-top: -99px;margin-left:130px;">'.$row["Title"].'</h4></a>
														
												
														<h5 style="margin-top:3%"><span class="badge "style="margin-top: 100px;font-size:1px;">.</span></h5>
														<p style="margin-top: -113px;margin-left:130px;padding-right:10px;"><i class="fa fa-clock-o"style="font-size: 11px"></i><span class="ud"style="font-size: 15px;margin-top: -1000px;margin-left:5px; font-size: 13px;">4 Weeks ago </span><br><i class="fa fa-user-o"style="font-size: 10px;"></i> <span class="uuu"style=margin-left:3px; font-size: 10px;margin-right:13px">'.$lastloc.'</span><br>  </p>
														<div style="margin-top:22px">
														<header for=""style="margin-left: 130px;margin-top: -20px;margin-bottom: -13px;"><i class="fa fa-tags"></i> sell</header>
														<header for=""style="margin-left: 175px;margin-top: -22px;margin-bottom: -13px;"><i class="fa fa-eye"></i>'.$row["totalviews"].' views</header>
														</div>
														<h4 style="margin-top:40px;">Rs'.$row["price"].'</h4>
														

														<div class="btn-group btn-group-sm" role="group" aria-label="Basic example" style="margin-left: 174px;">
														<form method="POST" action="postshow.php?id='.$row["postid"].'">
                                                        <button style="font-size:12px; background-color: #228b22; border:none;" type="submit" class="btn btn-secondary">View</button>
														</form>

														<form method="POST" action="editpost.php?id='.$row["postid"].'">
                                                        <button style="font-size:12px; background-color: #228b22; border:none;" type="submit" class="btn btn-secondary">Edit</button>
														</form>

														<form method="POST" action="deletepost.php?id='.$row["postid"].'">
                                                        <button style="font-size:12px; background-color: #801818; border:none;" type="submit" class="btn btn-secondary">Delete</button>
														</form>
                                                        </div>
												

												
													</div>
													<hr class="border border-primary border-3 opacity-75" style="margin-top:-45px;">
												</div>
												
								</div>	


								


							

								';
		
								}
								} else {
								echo "No results found.";
								}
								$conn->close();

								
								?>
							</div>	
                        


						
						</div>
			<div class="title d-flex flex-row justify-content-between" >
				<nav aria-label="Page navigation example" style="" >
				<ul class="pagination " style="align:center;"id="d_det">
					<li class="page-item"><a class="page-link" href="<?php echo $first;?>">First</a></li>
					<li class="page-item"><a class="page-link" href="<?php echo $prev;?>">Previous</a></li>
					<li class="page-item page-link"><?php echo $page_no;?></li>
					<li class="page-item page-link"><?php echo $last_page_no;?></li>
					<li class="page-item"><a class="page-link" href="<?php echo $next;?>">Next</a></li>
					<li class="page-item"><a class="page-link" href="<?php echo $last;?>">Last</a></li>
					</ul>
				</nav>
			</div>
			<div class="title d-flex flex-row justify-content-between">
				<nav aria-label="Page navigation example" style="margin-left:70px;" >
				<ul class="pagination " style="align:center;"id="det">
					<li class="page-item"><a class="page-link" href="<?php echo $first;?>"style="font-size: 10px;">First</a></li>
					<li class="page-item"><a class="page-link" href="<?php echo $prev;?>"style="font-size: 10px;">Previous</a></li>
					<li style="font-size: 10px;" class="page-item page-link"><?php echo $page_no;?></li>
					<li style="font-size: 10px;" class="page-item page-link"><?php echo $last_page_no;?></li>
					<li style="font-size: 10px;"class="page-item"><a class="page-link" href="<?php echo $next;?>">Next</a></li>
					<li style="font-size: 10px;" class="page-item"><a class="page-link" href="<?php echo $last;?>">Last</a></li>
					</ul>
				</nav>
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
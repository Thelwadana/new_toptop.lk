	<?php
	include_once 'connection.php';
	


	if(isset($_GET['id']) && $_GET['id']!=0){
		$postid =$_GET['id'];
		$sql = "SELECT * FROM posts WHERE postid = $postid";
		$result = $conn->query($sql);




		if ($result->num_rows > 0) {
		
		// output data of each row
			while($row = $result->fetch_assoc()) {
				// totalviews count
			
				$sql2="UPDATE posts SET totalviews=totalviews+1 WHERE postid = $postid";
				$conn->query($sql2);	
			
				// totalviews count end

				
				$title = $row["Title"];
				$SmallDes = $row["small_description"];
				$Name = $row["fullname"];
				$Number = $row["mobile_number"];
				$Year = $row["vehicle_year"];
				$Capacity = $row["engine_capacity"];
				$mileage = $row["mileage"];
				$price = $row["price"];
				$sellerid = $row["Sellerid"];


				$Make_id = $row["make_id"];
				$District = $row["districtid"];
				$City = $row["locationid"];
				$Transmissin_id = $row["transmission"];
				$addtime = $row["addeddate"];
				$condition = $row["condition_id"];
				$fuel_type = $row["fuel_type"];
				$views = $row["totalviews"];
				$postDate = $row["addeddate"];
				



				$sql2 = "SELECT make_id,make_name FROM make WHERE make_id LIKE'%$Make_id%'";
				$result2 = $conn->query($sql2);
				$row2 = $result2->fetch_assoc();

				$sql3 = "SELECT  condition_id,condition_type FROM condition_table WHERE condition_id LIKE'%$condition%'";
				$result2 = $conn->query($sql3);
				$row3 = $result2->fetch_assoc();

				$sql4 = "SELECT transmission_id,transmission_name FROM transmission WHERE transmission_id LIKE '%$Transmissin_id%'";
				$result2 = $conn->query($sql4);
				$row4 = $result2->fetch_assoc();

				$sql5 = "SELECT fuel_type_id,fuel_type_name FROM fuel_type WHERE fuel_type_id LIKE '%$fuel_type%'";
				$result2 = $conn->query($sql5);
				$row5 = $result2->fetch_assoc();


				$sql6 = "SELECT dis_id,districtName FROM districts WHERE dis_id LIKE'%$District%'";
				$result2 = $conn->query($sql6);
				$row6 = $result2->fetch_assoc();

				$sql7 = "SELECT city_id,city_name FROM city WHERE city_id LIKE'%$City%'";
				$result2 = $conn->query($sql7);
				$row7 = $result2->fetch_assoc();

				$imag1 =base64_encode($row["img1"]);
                $imag2 =base64_encode($row["img2"]);
                $imag3 =base64_encode($row["img3"]);
                $imag4 =base64_encode($row["img4"]); 

				$sql8 = "SELECT * FROM sellers WHERE seller_id LIKE'%$sellerid%'";
				$result2 = $conn->query($sql8);
				$row8 = $result2->fetch_assoc();

				

			
				
				


				
			}
		}else {
		
			header('Location: 404.html');
		}
	}else{
		header('Location: 404.html');
	}
	?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>

<!-- img slider css-->



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
		<title>Job Listing</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<link rel="stylesheet" href="css/imageslider.css">
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
			<link href="4/thumbnail-slider.css" rel="stylesheet" type="text/css" />
            <link href="4/ninja-slider.css" rel="stylesheet" type="text/css" />

			<!--slider css-->
			<style>
            body {font: normal 0.9em Arial;margin:0;}
            a {color:#1155CC;}
            ul li {padding: 10px 0;}
            header {display:block;padding:60px 0 10px;background:rgba(0,0,0,0.8);text-align:center;}
            header a {
            font-family: sans-serif;
            font-size: 24px;
            line-height: 24px;
            padding: 8px 13px 7px;
            color: #555;
            text-decoration:none;
            transition: color 0.7s;
            }
            header a.active {
            font-weight:bold;
            width: 24px;
            height: 24px;
            padding: 4px;
            text-align: center;
            display:inline-block;
            border-radius: 50%;
            background: #4d5256;
            color: #191919;
            }
            code {display:block;white-space:pre; background-color:#f6f6f6;padding:8px; overflow:auto;border:1px dotted #999;margin:6px 0;}
            </style>
			<!--slider css end-->
		</head>
	

		
		<body>
			<!-- Main nav bar -->
				<!--header dilshan-->
<header class=""id="header" id="home" style="margin-bottom:10%; background-color:black;">
	<div class="container">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="index.html"><img src="img/WHITE_LOGO.png" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
						  <li class="menu-active"><a href="ads.php">All Ads</a></li>
						  <li class="menu-active"><a href="contact.php">Contact</a></li>
				          <li  id="d_det"><a class="ticker-btn" href="register.php">Sign up</a></li>
						  <li  id="d_det"><a class="ticker-btn" href="login.php">Logn in</a></li>
				          <li  id="d_det"><a class="ticker-btn" href="register.php">Post Your Ad</a></li>
						  <li class="menu-active" id="det"><a  href="register.php">Sign up</a></li>
						  <li class="menu-active" id="det"><a  href="login.php">Logn in</a></li>
				          <li class="menu-active" id="det"><a  href="register.php">Post Your Ad</a></li>			          				          
				</ul>
			</nav><!-- #nav-menu-container -->		    		
		</div>
	 </div>
</header><!-- #header -->
<!-- #header -->			
<!-- Start post Area -->
			<section class="post-area section-gap" style="margin-top:2%;">
				<div class="container" >
					<div class="row justify-content-center d-flex">
						<div class="col-lg-9 post-list1">
								<!-- carousel begining -->
								<div class="container">
									<div class="row justify-content-center d-flex">
										<div class="col-lg-12 post-list p-0">
										<div class="container-fluid">
                                          <div class="row">
                                              <div class="col-lg-12">
											  <div id='ninja-slider' class="pt-3">
                                                    <div>
                                                        <div class="slider-inner">
                                                            <ul>
                                                                <li><a class="ns-img" href="data:image/jpeg;base64,<?php echo $imag1;?>"></a></li>
                                                                <li><a class="ns-img" href="data:image/jpeg;base64,<?php echo $imag2;?>"></a></li>
                                                                <li><a class="ns-img" href="data:image/jpeg;base64,<?php echo $imag3;?>"></a></li>
                                                                <li><a class="ns-img" href="data:image/jpeg;base64,<?php echo $imag4;?>"></a></li>
                                                              
                                                            </ul>
                                                            <div class="fs-icon" title="Expand/Close"></div>
                                                        </div>
                                                        <div id="thumbnail-slider">
                                                            <div class="inner">
                                                                <ul>
                                                                  
                                                                    <li>
                                                                        <a class="thumb" href="data:image/jpeg;base64,<?php echo $imag1;?>"></a>
                                                                      
                                                                    </li>
                                                                    <li>
                                                                        <a class="thumb" href="data:image/jpeg;base64,<?php echo $imag2;?>"></a>
                                                                        
                                                                    </li>
                                                                    <li>
                                                                        <a class="thumb" href="data:image/jpeg;base64,<?php echo $imag3;?>"></a>
                                                                       
                                                                    <li>
                                                                        <a class="thumb"href="data:image/jpeg;base64,<?php echo $imag4;?>"></a>
                                                                        
                                                                    </li>
                                                                   
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                      		</div>
                                          </div>
                                      </div>
                                      
                                      <script>
                                          function showLargePhoto(index) {
                                              $("#larger-photo .carousel-item").removeClass("active");
                                              $("#larger-photo .carousel-item:nth-child(" + index + ")").addClass("active");
                                          }
                                      </script>


	

								
											<div class="details p-2">
												
												<i class="fa fa-map-marker" aria-hidden="true"></i><span class="details"> &nbsp <?php echo $row6["districtName"]; ?>,<?php echo $row7["city_name"]; ?> </span>
											</div>


										

											<div class="price" id="d_det">
												<div class="price_int" style="text-align: left; padding-right:40%;"><span>RS  <?php echo $price; ?> </span>
												<span class="overvw_price" style="text-align: right;"> <?php echo $row3["condition_type"]; ?> &nbsp, &nbsp <?php echo $row2["make_name"]; ?> &nbsp , &nbsp <?php echo $mileage; ?>Km &nbsp </span></div>
											</div>
											
									<div class="col-lg-12 discription pb-4">
									
											
									   <div class="container">
									   
										   <div class="row">

                                                <div class="col-lg-8 post-list pt-1">
													<ul id="v_name-1">
													<li>
										
									                	<span class="bol-text">Post Date:</span>
									                	<span><?php echo $postDate ; ?></span>
									                </li>  
												    </ul>
												   
													<h4 id="v_name-1" style="padding-bottom:2%; font-size:20px text-transform: uppercase; "  > <?php echo $title; ?></h4>
													<span class="row-4" style="height:100%;"> <?php echo $SmallDes; ?></span>
													<div>  
													<ul1 >       
                                                            <h4 class="over">Contact Information</h4>
															<button class="Overview"></button>  
																<li>
										
																	<span class="bol-text">Oner Name :</span>
																	<span><?php echo $Name; ?></span>
																</li>
																<li>
																<span class="bol-text">Contact Number : </span>
																;	<span><?php echo $Number; ?></span>
																</li>
																<li>
																<span class="bol-text">Location : </span>
																	<span><?php echo $row6["districtName"]; ?>,<?php echo $row7["city_name"]; ?></span>
																</li>
																
																
									
															</ul>
													</div>



												    
														
														

                                                </div>
														
											      <div class="col-lg-4 post-list pt-1">

															<h4 class="over">Overview</h4>
															<button class="Overview"></button>
															<ul1 >
															    
																<li>
										
																	<span class="bol-text">Condition:</span>
																	<span><?php echo $row3["condition_type"]; ?></span>
																</li>
																<li>
																<span class="bol-text">Brand : </span>
																	<span><?php echo $row2["make_name"]; ?></span>
																</li>
															
																<li>
																<span class="bol-text">Kilometers Run :  </span>
																	<span><?php echo $mileage; ?>Km</span>
																</li>

																<li>
																<span class="bol-text"> Transmission :  </span>
																	<span><?php echo  $row4["transmission_name"]; ?></span>
																</li>

																<li>
																<span class="bol-text">Fuel Type :  </span>
																    <span><?php echo  $row5["fuel_type_name"]; ?></span>
																</li>

																<li>
																<span class="bol-text">Year :  </span>
																    <span><?php echo  $Year ?></span>
																</li>

																<li>
																<span class="bol-text">Engine Capacity :  </span>
																    <span><?php echo  $Capacity ?>cc</span>
																</li>
																
									
															</ul1>
															<div class="col-lg- post-list pt-2">
																<table class="table">
      
        													<tr>
         														 <td ><span><i class="fa fa-eye" aria-hidden="true"></i></span><span> &nbsp<?php echo  $views; ?>&nbsp views<span></td>
          
       														 </tr>
      
      

        													<tr>
          													<td ><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp Report Abuse</td>
          
        													</tr>
        													<tr>
         													  <td ><i class="fa fa-share-alt" aria-hidden="true"></i>&nbsp Share this Ad:</td>
          
        													</tr>
      
    														</table>
															<a href="http://www.facebook.com/sharer.php?u=<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" target="_blank" class="fa fa-facebook"></a>
                                                            <a href="https://twitter.com/share?url=<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" target="_blank" class="fa fa-twitter"></a>
                                                            <a href="https://www.linkedin.com/shareArticle?url=<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" target="_blank" class="fa fa-linkedin"></a>
                                                            <a href="https://wa.me/?text=<?="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>" target="_blank" class="fa fa-whatsapp"></a>


																
																
															</div>
										        </div>
											
									        </div>
								        </div>
							        </div>
											<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d35818.719732048536!2d-4.25169!3d55.868392!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488815562056ceeb%3A0x71e683b805ef511e!2sGlasgow%2C+Glasgow+City%2C+UK!5e0!3m2!1sen!2sus!4v1448625188752" width="100%" height="300" frameborder="0" style="border:0 width:100px height:100px"  allowfullscreen></iframe> -->
                       
										</div>
									</div>
									
								</div>
								
									
								
							<!-- carousel end -->
							
							
							
							
																					
						</div>
						<div class="col-lg-3 sidebar my-3">
							<div class="single-slidebar">
								<h5>Seller Information</h5>
								<table class="table">
									<tr>
										<div class="seller_name">
										<th><span class="seller_name"><?php echo  $row8["seller_name"]; ?></span></th>
										</div>
									</tr>
									<tr>
									<button class="call"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo  $row8["contact_no1"]; ?></button>
									</tr>
								</table>

										
								
								
									
										
	
	
										
  

							</div>								
							<div class="col-lg-12 sidebar p-1">
							<div class="single-slidebar">
								<h4>Ads</h4>
								<div class="active-relatedjob-carusel">
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										
										
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										
									</div>																		
								</div>
							</div>
							
								
						</div>
						<div class="col-lg-12 sidebar p-1">
							<div class="single-slidebar">
								<h4>Ads</h4>
								<div class="active-relatedjob-carusel">
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										
									</div>
									<div class="single-rated">
										<img class="img-fluid" src="img/r1.jpg" alt="">
										
									</div>																		
								</div>
							</div>
												
						<!-- carousel end 
							<div class="single-slidebar">
								<h4>Jobs by Category</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="category.html"><p>Technology</p><span>37</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Media & News</p><span>57</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Goverment</p><span>33</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Medical</p><span>36</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Restaurants</p><span>47</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Developer</p><span>27</span></a></li>
									<li><a class="justify-content-between d-flex" href="category.html"><p>Accounting</p><span>17</span></a></li>
								</ul>
							</div>
							-->
							<div class="single-slidebar">
								<h4>Carrer Advice Blog</h4>
								<div class="blog-list">
									
									
									<div class="single-blog " style="background:#000 url(img/blog1.jpg);">
										<a href="single.html"><h4>Home Audio Recording <br>
										For Everyone</h4></a>
										<div class="meta justify-content-between d-flex">
											<p>
												02 Hours ago
											</p>
											<p>
												<span class="lnr lnr-heart"></span>
												06
												 <span class="lnr lnr-bubble"></span>
												02
											</p>
										</div>
									</div>																		
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
			<script src="4/thumbnail-slider.js" type="text/javascript"></script>
            <script src="4/ninja-slider.js" type="text/javascript"></script>


<!-- image slider -->				

<!--end slider -->	


	</body>
	</html>




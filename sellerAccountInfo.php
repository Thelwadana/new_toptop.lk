	<?php
	include_once 'connection.php';
	session_start();

	if(!isset($_SESSION['uname'])){
	   header('location:AccDetaillog.php');
	}
	$email = $_SESSION['uname'];
	$sql = " SELECT * FROM sellers Where email_1='$email' or username='$email'";
	$row = mysqli_fetch_assoc($conn->query($sql) );
	$sname = $row["seller_name"];


	
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




		
	



		<body>
			<!--header dilshan-->
			<section class="" >
			<?php include_once 'sellernavigation.php' ?>
			</section>

			<!-- #header -->
<!-- End banner Area -->
<section class="post-area section-gap mt-3 mt-lg-5">
				<div class="container">
					<div class="col-lg-12 post-list1">
						<div class="row"><!-- title Strats by udara gunawardana -->
							<div class="col-lg-6 title1">
							  Account Details
							</div>
						
						
							
						

						</div><!-- title Ends by udara gunawardana-->
						<section class="post-area section-gap">
			            <div class="row">
						    <div class="col-lg-6">
                                <dl class="dl-horizontal">

                                    <dt>User Name:</dt> <dd><?php echo $row['username']; ?></dd>
                                    
                                </dl>
                            </div>
                            <div class="col-lg-6">
                                <dl class="dl-horizontal">

                                    <dt>Fist Name:</dt> <dd><?php echo $row['seller_name'] ?></dd>
                                    
                                </dl>
                            </div>
							<div class="col-lg-6">
                                <dl class="dl-horizontal">

                                    <dt>Last Name:</dt> <dd><?php echo $row['last_name']; ?></dd>
                                   
                                </dl>
                            </div>
							<div class="col-lg-6">
                                <dl class="dl-horizontal">

                                    <dt>Email:</dt> <dd><?php echo $row['email_1']; ?></dd>
                                    
                                </dl>
                            </div>
							<div class="col-lg-6">
                                <dl class="dl-horizontal">

                                    <dt>Phome Number:</dt> <dd><?php echo $row['contact_no1']; ?></dd>
                                   
                                </dl>
                            </div>
							<div class="col-lg-6">
                                <dl class="dl-horizontal">

                                    <dt>Address:</dt> <dd><?php echo $row['seller_address1']; ?></dd>
                                   
                                </dl>
                            </div>

						</div>

						<div class="row pt-5">
						    <div class="col-lg-12">
                                <dl class="dl-horizontal">

								<button  style="wi" type="button" class="btn btn-success" onclick="window.location.href='editaccdetails.php';" >EDIT</button>
                                    
                                </dl>
                            </div>
							<div class="col-lg-12">
                                <dl class="dl-horizontal">

                                <button type="button" class="btn btn-danger" onclick="window.location.href='deleteacc.php';">DELETE</button>
                                    
                                </dl>
                            </div>

						</div>
			            </section>

						<!-- form strats by udara gunawardana-->
					
					</div>	
				</div>	
</section>
			<!-- End post Area -->	

			<!-- Start post Area -->
		
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
			   $("#Province").on("change", function(){
				var provinceId = $("#Province").val();
				var getURL     = "get-districts.php?province_id=" + provinceId;
				$.get(getURL, function(data, status){
					$("#District").html(data);
				});
				});
			 });

			
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




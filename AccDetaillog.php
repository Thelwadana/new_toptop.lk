<?php
    require_once('connection.php');
	session_start();
	if(!isset($_SESSION['uname'])){
		header('location:login.php');
	 }
	 $email = $_SESSION['uname'];
	 $sql = " SELECT * FROM sellers Where email_1='$email' or username='$email'";
	 $detail = mysqli_fetch_assoc($conn->query($sql) );
	 $sname = $detail["seller_name"];
	

	if(isset($_POST[ 'submit'])) {
		$email = $_POST['email'];
		$pass = $_POST['password'];

		
			
		
		if(empty($_POST['email'])){
			$email_error = "please insert your Email/Username";
		}
		if(empty($_POST['password'])){
			$pass_error =" please insert your password";
		}
		else if(!empty($email)  && !empty($pass)){

			require_once('connection.php');


			$sql = "select * from sellers where(email_1='$email' or username='$email')and password='$pass'";
			$result = mysqli_query($dbConnection, $sql);

			if (mysqli_num_rows($result) == 1) {

				$_SESSION['uname'] = $email;

				header('Location: sellerAccountInfo.php');
			}
			else{
				$all_error="Email or password is wrong";
			}
		}
	}



	?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
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

			<!-- Main nav bar -->
			<section class="" >
			<?php include_once 'sellernavigation.php' ?>
			</section>

			<!-- #header -->

		<!-- Start post Area -->
		<section class="post-area section-gap"  style="margin-top:5%;">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 post-list2">
							
						</div>
						<div class="col-lg-8 post-list1">
							<div class="row"><!-- title Strats by udara gunawardana -->
								<div class="col-lg-6 title1">
                                	Please Enter Email And Password
								</div>
					
							</div><!-- title Ends by udara gunawardana-->
						
							<div class="col-lg-7 post-list1">
								<form method="POST" action="" >
									<div class="mb-3">
										<label for="exampleInputEmail1" class="form-label">Email/User name</label>
										<input type="text" class="form-control" id="Email1" name="email" aria-describedby="emailHelp">

										<?php
										if(isset($email_error)){?>
									    <p style="color:red;"><?php echo $email_error?></p>
									    <?php }
									    ?>
										
										
									</div>
									<div class="mb-3">
										<label for="password" class="form-label">Password</label>
										<input type="password" class="form-control" id="password" name="password">

										<?php
										if(isset($pass_error)){?>
									    <p style="color:red;"><?php echo $pass_error?></p>
									    <?php }
									    ?>

									</div>
									<?php
										if(isset($all_error)){?>
									    <p style="color:red;"><?php echo $all_error?></p>
									    <?php }
									    ?>

									
									<div class="col-lg-12 post-list1">
										<div class="row">
											<div class="col-lg-6 post-list1">
									
												<button type="submit" name="submit" class="btn btn-primary">sumbit</button>
												
											</div>
											<div class="col-lg-6 "id="udara">
											<span class=forget><a href="fogetyourpass.php">Forget your password?</a></span>
											</div>
										</div>
										
									</div>

								</form>
						
							</div>
							
							<div class="col-lg-1 post-list3">
								
							</div>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End post Area -->


			<!-- Start callto-action Area -->
			<section class="callto-action-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10 text-white">Join us today without any hesitation</h1>
								<p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
								<a class="primary-btn" href="#">I am a Candidate</a>
								<a class="primary-btn" href="#">We are an Employer</a>
							</div>
						</div>
					</div>	
				</div>	
			</section>
			<!-- End calto-action Area -->

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
		</body>
	</html>




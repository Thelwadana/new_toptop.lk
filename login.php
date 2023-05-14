<?php
	session_start();
	if(isset($_POST[ 'submit'])) {

		$email_error="";
		$pass_error ="";
		$email1 = $_POST['email'];
		$pass1 = $_POST['password'];

		
			
		
		if(empty($_POST['email'])){
			$email_error = "please insert your Email/Username";
		}
		if(empty($_POST['password'])){
			$pass_error =" please insert your password";
		}
		else if(!empty($email1)  && !empty($pass1)){

			require_once('connection.php');


			$sql = "select * from sellers where(email_1='$email1' or username='$email1')and password='$pass1'";
			$result = mysqli_query($dbConnection, $sql);

			if (mysqli_num_rows($result) > 0) {

				$_SESSION['uname'] = $email1;

				header('Location: seller_dash.php');
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
			<?php include_once 'navigation.php' ?>	

<!-- start banner Area -->
<section class="banner-area relative" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">Login in</h1>	
				<p class="text-white link-nav"><a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span>  <a href="category.html"> Login in</a></p>
			</div>											
		</div>
	</div>
</section>
<!-- End banner Area -->	

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
		</body>
	</html>




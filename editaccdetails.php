	<?php
	include_once 'connection.php';
	session_start();
	if(!isset($_SESSION['uname'])){
		header('location:AccDetaillog.php');
	}
	$email = $_SESSION['uname'];
	$sql   = "SELECT  * FROM sellers where email_1='$email'or username='$email'";
	$row   = mysqli_fetch_assoc($conn->query($sql));
	$sname = $row["seller_name"];
	
	if(isset($_POST['submit']))
	{
		$first_name =$_POST['First_Name'];
		$last_name =$_POST['Last_Name'];
		//$username =$_POST['User_Name']; user name doesn't update due to unknown  reason
		$email1 = $_POST['Email'];
		$password=$_POST['password'];
		$address1 = $_POST['address_one'];
		$address2 = $_POST['address_two'];
		$tel = $_POST['mobile_number'];

		

		if(!empty($first_name) && !empty($email1)){
				
			
			
			
			   
				$sql = "update sellers set seller_name='$first_name',last_name='$last_name',email_1='$email1',password='$password',seller_address1='$address1',seller_address2='$address2',contact_no1='$tel' where email_1='$email' or username='$email'" ;
				

				if ($conn->query($sql) === TRUE) {
					
					header('location:AccDetaillog.php');
									
					  } 
					else {
										echo "Error updating record: " . $conn->error;
						
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




		
	



		<!-- Main nav bar -->
		<body>
			<!--header dilshan-->
			<section class="" >
			<?php include_once 'sellernavigation.php' ?>
			</section>

			<!-- #header -->
<!-- End banner Area -->	

			<!-- Start post Area -->
			<section class="post-area section-gap mt-3 mt-lg-5">
				<div class="container">
					<div class="col-lg-12 post-list1">
						<div class="row"><!-- title Strats by udara gunawardana -->
							<div class="col-lg-6 title1">
							Register Free for Advertise Your Vehicle with toptop.lk 
							</div>
						
						
							
						

						</div><!-- title Ends by udara gunawardana-->

						<!-- form strats by udara gunawardana-->
						<form class="form p-3" name="registation" method="post" action="editaccdetails.php">
							<div class="form-row ">
								<div class="form-group col-md-6">
									<label for="First_Name "><span class="lable font-weight-bold">First Name</span></label>
									<input type="text" name="First_Name" class="form-control" id="First_Name" value="<?php echo $row['seller_name']; ?>">
									<span id="Fname" class="text-danger"></span></p> 
								</div>
								<div class="form-group col-md-6">
									<label for="Last_Name"><span class="lable font-weight-bold">Last Name</span></label>
									<input type="text" name="Last_Name" class="form-control" id="Last_Name" value="<?php echo $row['last_name']; ?>">
									<span id="Lname" class="text-danger"></span></p>
								</div>
							</div>
							<div class="form-row ">
								<div class="form-group col-md-6">
									<label for="User_Name"><span class="lable font-weight-bold">User Name</span></label>
									<input type="text" name="User_Name "class="form-control" id="User_Name" value="<?php echo $row['username']; ?>">
									<span id="Uname" class="text-danger"></span></p>
								</div>
									<div class="form-group col-md-6">
									<label for="inputEmail4"><span class="lable font-weight-bold">Email</span></label>
								    <input type="email" name="Email" class="form-control" id="Email" value="<?php echo $row['email_1']; ?>">
									<span id="Remail" class="text-danger"></span></p>
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword1"><span class="lable font-weight-bold">Pasword</span></label>
									<input type="password" name="password" class="form-control" id="inputPassword1" value="<?php echo $row['password']; ?>">
									<span id="Pass" class="text-danger"></span></p>
									 <span>password between 8 to 15 characters. <br></span>
									 <span>least one lowercase letter. <br></span>
									 <span>least one uppercase.  <br></span>
									 <span>least one numeric.  <br></span>
									 <span>least one special character.</span>
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword2"><span class="lable font-weight-bold">Re-enter Password</span></label>
									<input type="password" name="re_password" class="form-control" id="inputPassword1" value="<?php echo $row['password']; ?>">
									<span id="Rpass" class="text-danger"></span></p>
								</div>
							</div>
							
							<div class="form-row ">
								
								<div class="form-group col-md-6">
									<label for="telephone2"><span class="lable font-weight-bold">Mobile Number</span></label>
									<input type="text" name="mobile_number" class="form-control" id="telephone2" value="<?php echo $row['contact_no1']; ?>">
									<span id="Mnumber" class="text-danger"></span></p>
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress"><span class="lable font-weight-bold">Address</span></label>
								<input type="text" name="address_one" class="form-control" id="address_one" value="<?php echo $row['seller_address1']; ?>">
								<span id="Addressone" class="text-danger"></span></p>
							</div>
							
							<div class="form-row">
							    
								<div class="form-group col-md-4">
								<label for="inputTelephoneNumber">District</label>
            <select id="District" name="District" class="form-control" value="<?php echo $district; ?>" >
				<?php
				     //Get Locations
					       include_once 'connection.php';
				           $sql = "SELECT dis_id, districtName FROM districts";
				           $result = $conn->query($sql);
				           if ($result->num_rows > 0) {
				           // output data of each row
				            echo "option value=".$row['district']."></option>";
				           while($row = $result->fetch_assoc()) {
				           	echo "<option value=".$row["districtid"].">".$row["districtName"]."</option>";
				           }
				           } else {
				               echo '<option value="">Locations not found</option>';
				           }
				?>			
            </select>
									<span id="Province" class="text-danger"></span></p>
									
								</div>
								
								
								
								
								
							</div>
						
							<button type="submit"  name="submit" class="btn btn-primary">EDIT</button>
						
						</form><!-- form ends by udara gunawardana-->
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




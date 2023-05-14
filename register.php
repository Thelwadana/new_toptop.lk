



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
<section class="" >
	<?php include_once 'navigation.php' ?>
</section>

		

<!-- start banner Area -->
<section class="banner-area relative" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">Sign up</h1>	
				<p class="text-white link-nav"><a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span>  <a href="category.html"> Sign Up</a></p>
			</div>											
		</div>
	</div>
</section>
<!-- End banner Area -->	

			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="col-lg-12 post-list1">
						<div class="row"><!-- title Strats by udara gunawardana -->
							<div class="col-lg-6 title1">
							Register Free for Advertise Your Vehicle with toptop.lk 
							</div>
						</div><!-- title Ends by udara gunawardana-->

<?php
 $phone_error ="";
 $username_error ="";
 $fistname_error="";
 $lastname_error="";
 $email_error="";
 $password_error="";
 $repass_error="";
 $address_error="";



 $fistName="";
 $lastName="";
 $phone ="";
 $userName ="";
 $email="";
 $password="";
 $repass="";
 $address="";
 $district="District";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  
  $fistName = $_POST["FirstName"];
  $lastName = $_POST["LastName"];
  $phone = $_POST["phone"];
  $userName = $_POST["Username"];
  $email= $_POST["Email"];
  $password= $_POST["Pass"];
  $repass= $_POST["RePass"];
  $address= $_POST["Address"];
  $district=$_POST["District"];
  echo '<script type="text/javascript">';
  echo "alert('$district');";
  echo '</script>';
 
 
 

  //check firstname - Dileesha
  if (!preg_match("/^[a-zA-Z]{1,20}$/", $fistName)  || empty($fistName)) {
    $fistname_error = "Please enter The Username contains only letters and is 20 characters or less";
	$Fist_n=false;
  }else{ 
	$fistname_error="";
	$Fist_n=true;
	
  }

 


  //check lastname - Dileesha
  if (!preg_match("/^[a-zA-Z]{1,20}$/", $lastName)  || empty($lastName)) {
    $lastname_error = "Please enter The Username contains only letters and is 20 characters or less";
	$Last_n=false;
  }else{ 
	$lastname_error="";
	$Last_n=true;
	
  }


  //check phonenumber - Dileesha
  if (!preg_match("/^[0-9]{10}$/", $phone) || empty($phone)) {
    $phone_error = "Phone number must contain 10 digits";
	$Pnumber= false;
  }else{ 
	include_once 'connection.php';
	$sql = "SELECT * FROM sellers WHERE contact_no1='$phone'";
    $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
		        $phone_error = "The mobile number you have entered is already in use.";
				$Pnumber= false;
        }
		else{
			$phone_error ="";
			$Pnumber= true;
	}


  }


  //check username - Dileesha
  if (!preg_match("/^.{1,15}$/", $userName) || empty($userName)) {
    $username_error = "Please enter a user name that is between 15 characters.";
	$User_n=false;
  }else{ 
	include_once 'connection.php';
	$sql = "SELECT * FROM sellers WHERE username='$userName'";
    $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
		        $username_error = "The user name you have entered is already in use.";
				$User_n=false;
        }
		else{
			$username_error="";
			$User_n=true;			
   }
  }

  #check email - Dileesha
  if (!preg_match("/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i", $email) || empty($email)) {
    $email_error = "Email empty or is not valid.";
	$Emailer=false;
  }else{ 
	include_once 'connection.php';
	$sql = "SELECT * FROM sellers WHERE email_1='$email'";
    $result = mysqli_query($conn, $sql);
       if (mysqli_num_rows($result) > 0) {
		        $email_error = "The email you have entered is already in use.";
				$Emailer=false;
        }
		else{
			$email_error ="";
			$Emailer=true;
	}
  }
  
  #check password - Dileesha
  if (empty($password)) {
    $password_error = "Password empty or is not strong.";
	$Passworder=false;
  }else{
	$Passworder = true; 
	
  }

  //check re-enter password - Dileesha
  if ($password!=$repass) {
    $repass_error = "Password not match.";
	$RPassworder=false;

  }else{ 
	$repass_error = "";
	$RPassworder=true;
	
  }

  //check address - Dileesha
  if (empty($address)) {
    $address_error = "Enter address.";
	$Addres=false;
  }else{ 
	$address_error = "";
	$Addres=true;
  }

  //insert database - Dileesha
  if($Fist_n==true && $Last_n==true && $User_n==true && $Emailer==true &&  $Passworder==true && $Pnumber==true && $Addres==true){
   
	$approved="approved";
	$query = "INSERT INTO sellers (seller_name,username,seller_address1,contact_no1,password,district,province,email_1) VALUES ('$fistName', '$userName', '$address', '$phone', '$password' , '$district' , '$province' , '$email') ";


	  if(mysqli_query($conn, $query)){
		  header('Location:login.php');
	  }else{
		  echo"Sorry, Registration failed";      
	  }
	}
  else{
	$massege='Not ok';
  }

}


 
?>						



<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFirstName">First Name</label>
      <input type="text" class="form-control" id="FirstName" name="FirstName" value="<?php echo $fistName; ?>" required placeholder="First Name">
	  <div id="message"><?php echo $fistname_error; ?></div>
    </div>
    <div class="form-group col-md-6">
      <label for="inputFirstName">Last Name</label>
      <input type="text" class="form-control" id="LastName" name="LastName" value="<?php echo $lastName; ?>" required placeholder="Last Name">
	  <div id="message"><?php echo $lastname_error; ?></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername">Username</label>
      <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $userName; ?>" required  placeholder="Username">
	  <div id="message"><?php echo $username_error; ?></div>
    </div>
    <div class="form-group col-md-6">
	<label for="inputUsername">Email</label>
      <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $email; ?>" required  placeholder="Email">
	  <div id="message"><?php echo $email_error; ?></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputReEnterPassword">Password</label>
      <input type="password" class="form-control" id="Pass" name="Pass" value="<?php echo $password; ?>" required  placeholder="Password">
	  <div id="message"><?php echo $password_error; ?></div>
	  <small>least 8 characters long <br></small>
	  <small>least 1 lowercase letter <br></small>
	  <small>least 1 uppercase letter <br></small>
	  <small>least 1 digit <br></small>
	  <small>least 1 special character from the set @$!%*?&</small>
    </div>
    <div class="form-group col-md-6">
      <label for="inputReEnterPassword">Re-enter Password</label>
      <input type="password" class="form-control" id="RePass" name="RePass" value="<?php echo $repass; ?>" required placeholder="Re-enter Password">
	  <div id="message"><?php echo $repass_error; ?></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputTelephoneNumber">Telephone Number</label>
      <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>" required  placeholder="Telephone Number">
	  <div id="message"><?php echo $phone_error; ?></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputTelephoneNumber">Address</label>
      <input type="text" class="form-control" id="Address" name="Address" value="<?php echo $address; ?>" required  placeholder="address">
	  <div id="message"><?php echo $address_error; ?></div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
	        <label for="inputTelephoneNumber">District</label>
            <select id="District" name="District" class="form-control" value="<?php echo $district; ?>" >
				<?php
				     //Get Locations
					       include_once 'connection.php';
				           $sql = "SELECT dis_id, districtName FROM districts";
				           $result = $conn->query($sql);
				           if ($result->num_rows > 0) {
				           // output data of each row
				            echo '<option value="0 ">'.$district.'</option>';
				           while($row = $result->fetch_assoc()) {
				           	echo "<option value=".$row["districtid"].">".$row["districtName"]."</option>";
				           }
				           } else {
				               echo '<option value="">Locations not found</option>';
				           }
				?>			
            </select>
    </div>
   </div>
  <button type="submit"  class="btn btn-primary">Submit</button>
</form>











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




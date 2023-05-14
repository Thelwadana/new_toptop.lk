<?php 
include_once 'connection.php';


						//Condition
							$sqlcount=0;
							$status=1;
							$sql = "SELECT * FROM posts WHERE status LIKE'%$status%' ";

							if(isset($_GET['search']) && $_GET['search']!=""){
								$searchKey = $_GET['search'];
								if ($sqlcount==0){
								    $sql = $sql." AND Title LIKE '%$searchKey%'";
								}else{
									$sql = $sql." AND Title LIKE '%$searchKey%'";
								}
								$sqlcount+=1;
							}
							
							if(isset($_GET['make']) && $_GET['make']!=0){
								$make = $_GET['make'];
								if ($sqlcount==0){
									$sql =$sql."AND make_id LIKE '%$make%'";
								}else{
									$sql =$sql."AND make_id LIKE '%$make%'";
								}
								$sqlcount+=1;
							}
							if(isset($_GET['categ']) && $_GET['categ']!=0){
								$cate = $_GET['categ'];
								if ($sqlcount==0){
									$sql =$sql."AND type_id LIKE '%$cate%'";
								}else{
									$sql =$sql."AND type_id LIKE '%$cate%'";
								}
								$sqlcount+=1;
							}
							if(isset($_GET['loc']) && $_GET['loc']!=0){
								$loc = $_GET['loc'];
							if ($sqlcount==0){
                                    $sql =$sql."AND locationid LIKE '%$loc%'";
								}else{
									$sql =$sql."AND locationid LIKE '%$loc%'";
								}
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
								
								if ($sqlcount==0){
									$sql =$sql."AND price BETWEEN ". $selectprice;
								}else{
									$sql =$sql."AND price BETWEEN ". $selectprice;
								}
								$sqlcount+=1;
							}
							if ($sqlcount==0){
								$sql = "SELECT * FROM posts WHERE status LIKE'%$status%' ";
							}

							echo $sql;
							
						
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

								$sub_catsub = "SELECT type_name FROM vehicle_type Where type_id='".$row["type_id"]."'";	
								$result_catsub = $conn->query($sub_catsub);
								if ($result_catsub->num_rows > 0) {
									// output data of each row
									while($row_catsub = $result_catsub->fetch_assoc()) {
										//$image = $row_image["image"];
										
										$lastcatsub =$row_catsub['type_name'];
									}
								}
								

								echo '<div class="single-post d-flex flex-row">
								<div class="thumb" style="width: 150px;">
								
									'.$image.'
								</div>
								<div class="details " style="width:100%; padding-left: 30px;">
								
									<br><div class="title d-flex flex-row justify-content-between">
									
										<div class="titles">
										
										<a href="ad.php?id='.$row["postid"].'"><h4 style="margin-top:-1.5rem;">'.$row["Title"].'</h4></a>
											<h6> </h6>	
											<h5><span class="badge bg-success">New</span></h5>
											<p><i class="fa fa-clock-o"></i> &nbsp4 Weeks ago &nbsp&nbsp&nbsp <i class="fa fa-user-o"></i> &nbsp'.$lastseller.' &nbsp&nbsp&nbsp <i class="fa fa-map-marker"></i> &nbsp'.$lastloc.' </p>		
											<h5 class="vehicle_details" style="margin-top:1rem;">'.$row["small_description"].'</h5>
											</div>
										
										<ul class="btns">
										  <header>'.$lastcatsub.'</header>
										  <header for=""><i class="fa fa-tags"></i> sell</header>
										  <header for=""><i class="fa fa-eye"></i> views</header>
										  <br><h4>'.$row["price"].'</h4>
                                    	  <button type="button" onclick="ad.php?id='.$row["postid"].'" class="btn btn-success">Details</button>
									</ul>
									</div>
								</div>
							</div>
 
							<hr class="border border-primary border-3 opacity-75">

							';
	
							}
							} else {
							echo "No results found.";
							}
							$conn->close();
?>
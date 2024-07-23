<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
if(!isset($_SESSION['uemail']))
{
	header("location:login.php");
}

$error="";
$msg="";
if(isset($_POST['add']))
{
	
	$title=$_POST['title'];
	$pcontent=$_POST['pcontent'];
	$ptype=$_POST['type'];
	$bpr=$_POST['bpr'];
	$bedroom=$_POST['bedroom'];
	$bathroom=$_POST['bathroom'];
	$btype=$_POST['btype'];
	$balcony=$_POST['balcony'];
	$kitchen=$_POST['kitchen'];
	$floor=$_POST['floor'];
	$foodoption=$_POST['foodoption'];
	$rent=$_POST['rent'];
	$kmoney=$_POST['kmoney'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$district=$_POST['district'];
	$feature=$_POST['feature'];
	$uid=$_SESSION['uid'];
	$location_link=$_POST['location_link'];
	$isFeatured=$_POST['isFeatured'];
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	
	move_uploaded_file($temp_name,"admin/property/$aimage");
	move_uploaded_file($temp_name1,"admin/property/$aimage1");
	move_uploaded_file($temp_name2,"admin/property/$aimage2");
	move_uploaded_file($temp_name3,"admin/property/$aimage3");
	
	$sql="insert into property (title,pcontent,type,bpr,bedroom,bathroom,btype, balcony,kitchen,floor,foodoption,rent,kmoney,address,city,district,feature,uid,location_link,pimage,pimage1,pimage2,pimage3,isFeatured)
	values('$title','$pcontent','$ptype','$bpr','$bedroom','$bathroom','$btype','$balcony','$kitchen','$floor','$foodoption','$rent','$kmoney','$address','$city','$district','$feature','$uid','$location_link', '$aimage','$aimage1','$aimage2','$aimage3', '$isFeatured')";
	$result=mysqli_query($con,$sql);
	if($result)
		{
			$msg="<p class='alert alert-success'>Property Inserted Successfully</p>";
					
		}
		else
		{
			$error="<p class='alert alert-warning'>Property Not Inserted Some Error</p>";
		}
}							
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp; display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">

<!--	Title   -->
<title>Bodimak.lk</title>

</head>
<body>


<div id="page-wrapper">
    <div class="row"> 
		<!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->

		 
		<!--	Submit property   -->
        <div class="full-row">
            <div class="container">
                    <div class="row">
						<div class="col-lg-12">
							<h2 class="text-secondary double-down-line text-center">Submit Property</h2>
                        </div>
					</div>
                    <div class="row p-5 bg-white">
                        <form method="post" enctype="multipart/form-data">
								<div class="description">
									<h5 class="text-secondary">Basic Information</h5><hr>
									<?php echo $error; ?>
									<?php echo $msg; ?>

										<div class="row">
											<div class="col-xl-12">
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Title</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="title" required placeholder="Enter Title">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-2 col-form-label">Content</label>
													<div class="col-lg-9">
														<textarea class="tinymce form-control" name="pcontent" rows="10" cols="30"></textarea>
													</div>
												</div>
											</div>

											<div class="col-xl-6">
											   <div class="form-group row">
													<label class="col-lg-3 col-form-label">Property Type</label>
													<div class="col-lg-9">
														<select class="form-control" required name="type">
															<option value="">Select Type</option>
															<option value="apartment">Apartment</option>
															<option value="house">House</option>
															<option value="apartment">Room</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bedroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bedroom" required placeholder="Enter Bedroom  (only no 0 to 10)">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bathroom" required placeholder="Enter Bathroom (only no 0 to 10)">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balcony" required placeholder="Enter Balcony  (only no 0 to 10)">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Food options</label>
													<div class="col-lg-9">
														<select class="form-control" required name="foodoption">
															<option value="">Provide or not</option>
															<option value="Yes">Yes</option>
															<option value="No">No</option>
														</select>
													</div>
												</div>
											</div>

                                            <div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Kitchen</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kitchen" required placeholder="Enter Kitchen (only no 0 to 10)">
													</div>
												</div>

												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">Beds pre room</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bpr" required placeholder="Enter Number of beds in room (only no 0 to 10)">
													</div>
												</div>

												<div class="form-group row">
													<div class="col-lg-9">
														<select class="form-control" required name="btype">
															<option value="">Select Type</option>
															<option value="Attached">Attached to the room</option>
															<option value="Separated">Separated to the room</option>
														</select>
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Floor</label>
													<div class="col-lg-9">
														<select class="form-control" required name="floor">
															<option value="">Select Floor</option>
															<option value="1st Floor">1st Floor</option>
															<option value="2nd Floor">2nd Floor</option>
															<option value="3rd Floor">3rd Floor</option>
															<option value="4th Floor">4th Floor</option>
															<option value="5th Floor">5th Floor</option>
														</select>
													</div>
												</div>
                                            </div> 
										</div>
										
										<div class="form-group row">
											<label class="col-lg-2 col-form-label">Feature</label>
											<div class="col-lg-9">
											<p class="alert alert-danger">* Add Features</p>
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
												<div class="col-md-4">
												</div>
											</textarea>
											</div>
										</div>

										<h5 class="text-secondary">Price & Location</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Monthly Rent</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="rent" required placeholder="Enter monthly rent">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Key Money</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="kmoney" required placeholder="Enter Keymoney">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">City</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="city" required placeholder="Enter City">
													</div>
												</div>

												<div class="form-group row">
												  <label class="col-lg-3 col-form-label">Location</label>
													<div class="col-lg-9">
														<button class="btn btn-secondary" onclick="openMap()">Pick Your Location</button><br><br>
                                                        <input type="hidden" id="location_link" name="location_link">
													</div>
												</div>
											</div>

											<div class="col-xl-6">
											   <div class="form-group row">
													<label class="col-lg-3 col-form-label">District</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="district" required placeholder="Enter District">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Address</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="address" required placeholder="Enter Address">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
												
										<h5 class="text-secondary">Image & Status</h5><hr>
										<div class="row">
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 2</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage2" type="file" required="">
													</div>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Image 1</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage1" type="file" required="">
													</div>
												</div>
												<div class="form-group row">
													<label class="col-lg-3 col-form-label">image 3</label>
													<div class="col-lg-9">
														<input class="form-control" name="aimage3" type="file" required="">
													</div>
												</div>
											</div>
										</div>
										<hr>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-lg-3 col-form-label"><b>Is Featured?</b></label>
													<div class="col-lg-9">
														<select class="form-control" required name="isFeatured">
															<option value="">Select...</option>
															<option value="0">No</option>
															<option value="1">Yes</option>
														</select>
													</div>
												</div>
											</div>
										</div>

										
											<input type="submit" value="Submit Property" class="btn btn-info"name="add" style="margin-left:200px;">
								</div>
							</form>
						</div>            
					</div>
				</div>
			</div>
		</div>
	<!--	Submit property   -->
        
    
		<!--	Footer   start-->
		<?php include("include/footer.php");?>
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
	
<!-- Wrapper End --> 

<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script> 
<script src="js/tinymce/tinymce.min.js"></script>
<script src="js/tinymce/init-tinymce.min.js"></script>
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/custom.js"></script>

<script>
        function openMap() {
            // Open the map page in a new window or tab
            const mapWindow = window.open('map.php', '_blank');

            // Define a function in the parent window to set the saved location
            window.setSavedLocation = function (location) {
                // Handle the saved location in the main page
                console.log('Saved Location:', location);
                // You can use this location variable as needed in your main page
				document.getElementById('location_link').value = location;
            };
        }
</script>

</body>
</html>
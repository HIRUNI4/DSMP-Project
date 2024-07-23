<?php
session_start();
require("config.php");

if(!isset($_SESSION['auser']))
{
	header("location:index.php");
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
	
	$aimage=$_FILES['aimage']['name'];
	$aimage1=$_FILES['aimage1']['name'];
	$aimage2=$_FILES['aimage2']['name'];
	$aimage3=$_FILES['aimage3']['name'];
	
	$temp_name  =$_FILES['aimage']['tmp_name'];
	$temp_name1 =$_FILES['aimage1']['tmp_name'];
	$temp_name2 =$_FILES['aimage2']['tmp_name'];
	$temp_name3 =$_FILES['aimage3']['tmp_name'];
	
	move_uploaded_file($temp_name,"property/$aimage");
	move_uploaded_file($temp_name1,"property/$aimage1");
	move_uploaded_file($temp_name2,"property/$aimage2");
	move_uploaded_file($temp_name3,"property/$aimage3");
	
	$sql="insert into property (title,pcontent,type,bpr,bedroom,bathroom,btype, balcony,kitchen,floor,foodoption,
	rent,kmoney,address,city,district,feature,uid,location_link,pimage,pimage1,pimage2,pimage3)
	values('$title','$pcontent','$ptype','$bpr','$bedroom','$bathroom','$btype','$balcony','$kitchen','$floor','$foodoption',
	'$rent','$kmoney','$address','$city','$district','$feature','$uid','$location_link','$aimage','$aimage1','$aimage2','$aimage3')";
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Bodimak.lk | Property</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="assets/css/feathericon.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		
		<div if="" lt="" IE="" 9=""></div>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<div endif=""></div>
    </head>
    <body>

		
			<!-- Header -->
			<?php include("header.php"); ?>
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Property</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Property</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Add Property Details</h4>
								</div>
								<form method="post" enctype="multipart/form-data">
								<div class="card-body">
									<h5 class="card-title">Property Detail</h5>
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
													<label class="col-lg-2 col-form-label">Uid</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="uid" required placeholder="Enter User Id (only number)">
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
														<input type="text" class="form-control" name="bedroom" required placeholder="Enter Bedroom  (only no 1 to 10)">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Bathroom</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bathroom" required placeholder="Enter Bathroom (only no 1 to 10)">
													</div>
												</div>

												<div class="form-group row">
													<label class="col-lg-3 col-form-label">Balcony</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="balcony" required placeholder="Enter Balcony  (only no 1 to 10)">
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
														<input type="text" class="form-control" name="kitchen" required placeholder="Enter Kitchen (only no 1 to 10)">
													</div>
												</div>

												<div class="form-group row mb-3">
													<label class="col-lg-3 col-form-label">Beds pre room</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" name="bpr" required placeholder="Enter Number of beds in room (only no 1 to 10)">
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
											<p class="alert alert-danger">* Add more Features</p>
											<textarea class="tinymce form-control" name="feature" rows="10" cols="30">
											</textarea>
											</div>
										</div>

										<h4 class="card-title">Price & Location</h4>
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

												<div class="form-group row">
												  <label class="col-lg-3 col-form-label">Location Picker:</label>
													<div class="col-lg-9">
                                                        <input type="text" id="location_picker" name="location_picker" readonly><br><br>
                                                        <button type="button" onclick="openLocationPicker()">Pick Location</button><br><br>
                                                        <input type="hidden" id="location_link" name="location_link">
													</div>
												</div>
											</div>
										</div>
												
										<h4 class="card-title">Image & Status</h4>
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

											<input type="submit" value="Submit" class="btn btn-primary"name="add" style="margin-left:200px;">
										
								</div>
								</form>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->

		
		<!-- jQuery -->
        <script src="assets/js/jquery-3.2.1.min.js"></script>
		<script src="assets/plugins/tinymce/tinymce.min.js"></script>
		<script src="assets/plugins/tinymce/init-tinymce.min.js"></script>
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
		
		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>
		
    </body>

</html>
<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");
								
?>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts
	========================================================-->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link
	========================================================-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<!--	Title   -->

</head>
<body>



        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->
<div id="page-wrapper">
    <div class="row"> 
        <!--	Banner Start   -->
        <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('../images/1.jpg'); 
        background-size: cover; background-position: center center; background-repeat: no-repeat; padding: 10px;">
            <div class="container h-100">
                <div class="row h-100 w-80 align-items-center">
                    <div class="col-lg-12">
                        <div class="text-warning">
                        <h1 class="mb-4">Search Property</h1>
                           <form method="post" action="propertygrid.php">
                                <div class="row">
                                <div class="form-group row">
                                    <div class="col-md-4 col-lg-2">
                                        <div class="form-group">
                                        <input type="text" class="form-control" name="address" placeholder="Enter area">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                        <input type="text" class="form-control" name="bpr" placeholder="Enter beds per room">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" name="foodoption">
                                                <option value="">Food Options</option>
												<option value="yes">Provide</option>
												<option value="no">Not provide</option>
												
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" name="foodoption">
                                                <option value="">Cooking Facilities</option>
												<option value="yes">Yes</option>
												<option value="no">No</option>
												
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                            <select class="form-control" name="btype">
                                                <option value="">Bathroom type</option>
												<option value="Attached">Attached to the room</option>
                                                <option value="Separated">Separated to the room</option>
												
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2">
                                        <div class="form-group">
                                        <input type="text" class="form-control" name="rent" placeholder="Enter Rent">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" name="filter" class="btn btn-warning btn-block">Filter</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                    
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
<!--	Banner End  -->

        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-warning text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    

<!--	Js Link
============================================================--> 
<script src="js/jquery.min.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/greensock.js"></script> 
<script src="js/layerslider.transitions.js"></script> 
<script src="js/layerslider.kreaturamedia.jquery.js"></script> 
<!--jQuery Layer Slider --> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/owl.carousel.min.js"></script> 
<script src="js/tmpl.js"></script> 
<script src="js/jquery.dependClass-0.1.js"></script> 
<script src="js/draggable-0.1.js"></script> 
<script src="js/jquery.slider.js"></script> 
<script src="js/wow.js"></script> 
<script src="js/YouTubePopUp.jquery.js"></script> 
<script src="js/validate.js"></script> 
<script src="js/jquery.cookie.js"></script> 
<script src="js/custom.js"></script>

</body>
</head>
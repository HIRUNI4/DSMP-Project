<?php 
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
include("config.php");	

$itemsPerPage = 6;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $itemsPerPage;

$query = mysqli_query($con, "SELECT property.*, user.uname, user.uimage 
                             FROM `property`, `user` 
                             WHERE property.uid = user.uid
                             LIMIT $offset, $itemsPerPage");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta Tags -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="images/favicon.ico">

<!--	Fonts   -->
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<!--	Css Link   -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/layerslider.css">
<link rel="stylesheet" type="text/css" href="css/color.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--	Title   -->

</head>
<body>

<!--	Page Loader 
<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
	<div class="d-flex justify-content-center y-middle position-relative">
	  <div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	  </div>
	</div>
</div>
Page Loader End  -->

<div id="page-wrapper">
    <div class="row"> 
        <!--	Header start  -->
		<?php include("include/header.php");?>
        <!--	Header end  -->

        <!--	Banner Start   -->
        <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('2q.jpg'); 
        background-size: cover; background-position: center center; background-repeat: no-repeat;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-lg-12">
                        <div class="text-white">
                            <h1 class="mb-4">Find The <span class="text-warning"> Ideal Student Rental </span> Today! </h1>
                            <h4>  We don't want to sell you a <span class="text-warning">House</span>, We wan't you to find a 
                            <span class="text-warning"><br>Home.</span>. </h4><br><br>
                            <a href="filterproperty.php"><button type="button" name="filter" class="btn btn-warning w-100">Search Property</button></a><br>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!--	Banner End  -->

        <!-----  Our Services  ---->
        <div class="full-row bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-black text-center mb-3">What We Do</h2></div>
                </div>
                <div class="text-box-one">
                    <div class="row">
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
								<i class="flaticon-star text-warning flat-medium" aria-hidden="true"></i>
                                <h5 class="text-secondary hover-text-warning py-3 m-0"><a href="#">Rental Service</a></h5>
                                <p>Our platform is designed to enhance your entire rental experience. We provide valuable services such as maintenance requests, reviews, and customer support to ensure a smooth and enjoyable stay for guests, beyond just finding the perfect place to stay.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
								<i class="flaticon-star text-warning flat-medium" aria-hidden="true"></i>
                                <h5 class="text-secondary hover-text-warning py-3 m-0"><a href="#">Property Listing</a></h5>
                                <p>For property owners, we provide a hassle-free platform to list their rental properties. Showcase your property to potential tenants, manage bookings, and maximize your rental income effortlessly.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
								<i class="flaticon-star text-warning flat-medium" aria-hidden="true"></i>
                                <h5 class="text-secondary hover-text-warning py-3 m-0"><a href="#">Filter Property</a></h5>
                                <p>Our AI-driven system goes beyond typical searches. It predicts your satisfaction with boarding places based on your filtered requirements. Say goodbye to guesswork and discover accommodations that match your preferences with precision.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="p-4 text-center hover-bg-white hover-shadow rounded mb-4 transation-3s"> 
								<i class="flaticon-star text-warning flat-medium" aria-hidden="true"></i>
                                <h5 class="text-secondary hover-text-warning py-3 m-0"><a href="#">Payment Service</a></h5>
                                <p>We offer a secure and seamless payment service, ensuring that both guests and property owners can handle transactions with confidence. From booking fees to rental payments, our platform simplifies the payment process.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-----  Our Services  ---->

        <!-- Property Grid -->
        <div class="full-row">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                                ?>
                                <div class="col-md-6">
                                    <div class="featured-thumb hover-zoomer mb-4">
                                        <div class="overlay-black overflow-hidden position-relative"> <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                        <div class="sale bg-warning text-white">For Rent</div>
                                        <div class="price text-primary text-capitalize"><?php echo $row['rent'];?>LKR <span class="text-white"><?php echo $row['type'];?></span></div>
                                    </div>
                                    <div class="featured-thumb-data shadow-one">
                                        <div class="p-4">
                                            <h5 class="text-secondary hover-text-warning mb-2 text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h5>
                                            <span class="location text-capitalize"><i class="fas fa-map-marker-alt text-warning"></i> <?php echo $row['14'];?></span> </div>
                                            <div class="px-4 pb-4 d-inline-block w-100">
                                                <div class="float-left text-capitalize"><i class="fas fa-user text-warning mr-1"></i>By : <?php echo $row['uname'];?></div>
                                                <div class="float-right"><i class="far fa-calendar-alt text-warning mr-1"></i> <?php echo date('d-m-Y', strtotime($row['date']));?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="col-md-12">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-4">
                                        <?php
                                        $totalPropertiesQuery = mysqli_query($con, "SELECT COUNT(*) as total FROM `property`");
                                        $totalProperties = mysqli_fetch_assoc($totalPropertiesQuery)['total'];
                                        $totalPages = ceil($totalProperties / $itemsPerPage);

                                        if ($page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">Previous</a></li>';
                                        }

                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            $activeClass = ($page == $i) ? 'active' : '';
                                            echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                        }

                                        if ($page < $totalPages) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar-widget mt-5">
                            <h4 class="double-down-line-left text-secondary position-relative pb-4 mb-4">Recently Added Property</h4>
                            <ul class="property_list_widget">
							
								<?php 
								$query=mysqli_query($con,"SELECT * FROM `property` ORDER BY date DESC LIMIT 5;");
										while($row=mysqli_fetch_array($query))
										{
								?>
                                <li> <img src="admin/property/<?php echo $row['18'];?>" alt="pimage">
                                    <h6 class="text-secondary hover-text-warning text-capitalize"><a href="propertydetail.php?pid=<?php echo $row['0'];?>"><?php echo $row['1'];?></a></h6>
                                    <span class="font-14"><i class="fas fa-map-marker-alt icon-success icon-small"></i> <?php echo $row['14'];?></span>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--	Achievement   -->
        <div class="full-row overlay-secondary" style="background-image: url('images/breadcromb.jpg'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
            <div class="container">
                <div class="fact-counter">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-house flat-large text-white" aria-hidden="true"></i>
								<?php
										$query=mysqli_query($con,"SELECT count(pid) FROM property");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                <div class="count-num text-warning my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
								<?php } ?>
                                <div class="text-white h5">Property Available</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-man flat-large text-white" aria-hidden="true"></i>
                                <?php
										$query=mysqli_query($con,"SELECT count(uid) FROM user");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                <div class="count-num text-warning my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
								<?php } ?>
                                <div class="text-white h5">Registered Users</div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-chat-comment-oval-speech-bubble-with-text-lines flat-large text-white" aria-hidden="true"></i>
                                <?php
										$query=mysqli_query($con,"SELECT count(fid) FROM feedback");
											while($row=mysqli_fetch_array($query))
												{
										?>
                                <div class="count-num text-warning my-4" data-speed="3000" data-stop="<?php 
												$total = $row[0];
												echo $total;?>">0</div>
								<?php } ?>
                                <div class="text-white h5">Feedbacks</div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="count wow text-center  mb-sm-50" data-wow-duration="300ms"> <i class="flaticon-reward flat-large text-white" aria-hidden="true"></i>
                               
                                <div class="text-warning my-4">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                </div>
								
                                <div class="text-white h5">Rating</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--	Achievement End   -->

		<!--	Testonomial -->
        <div class="full-row">
            <div class="container">
                <div class="row">
					<div class="col-lg-12">
						<div class="content-sidebar p-4">
							<div class="mb-3 col-lg-12">
								<h4 class="text-secondary double-down-line text-center mb-4">Feedbacks</h4>
									<div class="recent-review owl-carousel owl-dots-gray owl-dots-hover-success">
										<?php
												$query=mysqli_query($con,"SELECT feedback.*, user.* from feedback,user where feedback.uid=user.uid and feedback.status='0'");
												while($row=mysqli_fetch_array($query))
													{
										?>
										<div class="item">
											<div class="p-4 bg-success down-angle-white position-relative">
												<p class="text-white"><i class="fas fa-quote-left mr-2 text-white"></i><?php echo $row['fdescription']; ?>. <i class="fas fa-quote-right mr-2 text-white"></i></p>
											</div>
											<div class="p-2 mt-4">
												<span class="text-warning d-table text-capitalize"><?php echo $row['uname']; ?>
											</div>
										</div>
										<?php }  ?>
									</div>
							</div>
						 </div>
					</div>
				</div>
			</div>
		</div>
        <!--	Testonomial -->

        <!--	Footer   start-->
		<?php include("include/footer.php");?>
		<!--	Footer   start-->
        
        <!-- Scroll to top --> 
        <a href="#" class="bg-warning text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a> 
        <!-- End Scroll To top --> 
    </div>
</div>

<!--	Js Link   --> 
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
<?php
session_start();
require 'connection/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>SHOESHION</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ABOC">
	<meta name="keywords" content="online shop, shoes, amazon, best e-commerce">
	<!-- TODO: treba skontat opis -->
	<meta name="description" content="treba napisat opis">
	<link rel="shortcut icon" href="images/logoIcon.ico" type="image/x-icon">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<!-- <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css"> -->
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<!-- <link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css"> -->


	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">

	<!-- TOASTR -->
	<link href="toastr.css" rel="stylesheet" />
</head>

<body class="goto-here">
	<!-- <div class="py-1 bg-black">
			<div class="container">
				<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
					<div class="col-lg-12 d-block">
						<div class="row d-flex">
							<div class="col-md pr-4 d-flex topper align-items-center">
								<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
								<span class="text">+ 1235 2355 98</span>
							</div>
							<div class="col-md pr-4 d-flex topper align-items-center">
								<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
								<span class="text">youremail@email.com</span>
							</div>
							<div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
								<span class="text">3-5 Business days delivery &amp; Free Returns</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">

			<a class="navbar-brand" href="index.php">IME </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav">
					<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
					<!-- <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">
					<a class="dropdown-item" href="shop.html">Shop</a>
					<a class="dropdown-item" href="product-single.html">Single Product</a>
					<a class="dropdown-item" href="cart.html">Cart</a>
					<a class="dropdown-item" href="checkout.html">Checkout</a>
				</div>
			  </li> -->
					<!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
			  <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
					<!-- TODO: da se broj izmedju [] promijeni na osnovu broja artikala u favorite -->
					<li class="nav-item cta cta-colored"><a href="favorite.php" class="nav-link" id="favoriteNumber"><span class="ion-ios-heart"></span>
							<?php

							if (isset($_SESSION['email'])) {
								$session = $_SESSION['email'];

								/* require 'connection/connect.php'; */

								$sql = "SELECT * FROM  favoriteproduct where user = '$session' ";

								$result = $dbc->query($sql);

								$count = $result->num_rows;

								if ($count > 0) {
									echo '[' . $count . ']';
								} else {
									echo '[0]';
								}
							} else {
								echo '[0]';
							}

							?>
						</a></li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<?php
					if (isset($_SESSION['email'])) {
						$session = $_SESSION['email'];
						echo "<li class='nav-item'><a href='logout.php'  class='nav-link link'><span class='navLinks'><i class='fas fa-sign-in-alt mr-2'></i>Logout</span></a></li><input type='text'  value='$session' hidden id='session' name='session'  onload='sessionCheck(id)'>";
					} else {
						echo '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">Sign
							in</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#registerModal" style="cursor: pointer;">Sign
							up</a></li>';
					}
					?>
					<!-- <li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#loginModal" style="cursor: pointer;">Sign
							in</a></li>
					<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#registerModal" style="cursor: pointer;">Sign
							up</a></li> -->
				</ul>
			</div>
		</div>
	</nav>
	<!-- /nav -->

	<div class="modal fade " id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Sign in</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="loginForm" name="loginForm">
						<div class="col-12">
							<input type="email" placeholder="you@example.com" class="form-control" id="emailLog" name="emailLog" required>
							<br>
						</div>
						<div class="col-12">
							<div class="pass">
								<input type="password" placeholder="Password..." class="form-control" name="passLog" id="passLog" required>
							</div>
						</div>
						<div class="row">
							<div class="col-7 col-sm-7 col-md-7 col-lg-7">
								<a class="badge ml-3 text-primary" style="text-decoration:none; cursor: pointer;" data-toggle="modal" data-target="#registerModal" data-dismiss="modal">
									<!-- TODO: na hover druga boja -->
									<span style="font-size:13px;">No account?</span>
								</a>
							</div>
							<!-- TODO: uradit forgot password -->
							<!-- <div class="col-5 col-sm-5 col-md-5 col-lg-5">
								<a href="forgotPass.php" class="badge ml-sm-4  text-primary">
									<span style="font-size:13px;">Forgot password?</span>
								</a>
							</div> -->
							<br />
						</div>
						<div class="col-xs-12  offset-5 mt-3">
							<button type="button" id="logButton" name="logButton" class="btn btn-primary">Login
							</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close <span aria-hidden="true">&times;</span></button>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Create a free account</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="regForm" name="regForm">
						<div class="col-xs-12">
							<input type="text" placeholder="Full name..." id="fullSign" name="fullSign" class="form-control" required>
							<br>
						</div>
						<div class="col-xs-12">
							<input type="email" placeholder="you@example.com" id="emailSign" name="emailSign" class="form-control" required>
							<br />
						</div>
						<div class="col-xs-12">
							<div class="pass">
								<input type="password" placeholder="Password..." class="form-control" name="passSign" id="passSign" required>
								<i class="far fa-eye passIcon" id="passIcon"></i>
							</div>
						</div>
						<div class="col-12 mb-3" style="margin-left:-10px !important;">
							<!-- TODO: na hover treba druga boja -->
							<a class="text-primary" data-toggle="modal" data-target="#loginModal" style="cursor: pointer;" data-dismiss="modal">Already has
								account?</a>
						</div>
						<div class="col-xs-12  offset-4">
							<button type="button" class="btn btn-lg btn-primary" id="signButton" name="signButton">Sign
								up for
								free
							</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close <span aria-hidden="true">&times;</span></button>
				</div>
			</div>
		</div>
	</div>


	<section id="home-section" class="hero">
		<!-- TODO: mozda samo stavit da se ne moze skrolat -->
		<div class="home-slider owl-carousel">
			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
						<img class="one-third order-md-last img-fluid" src="images/bg_1.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">#New Arrival</span>
								<div class="horizontal">
									<h1 class="mb-4 mt-3">Shoes Collection 2019</h1>
									<p class="mb-4">A small river named Duden flows by their place and
										supplies it with
										the necessary regelialia. It is a paradisematic country.</p>
									<p><a href="shop.php" class="btn-custom">Discover Now</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight">
				<div class="overlay"></div>
				<div class="container-fluid p-0">
					<div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">

						<img class="one-third order-md-last img-fluid" src="images/bg_2.png" alt="">
						<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">

								<span class="subheading">#New Arrival</span>
								<div class="horizontal">
									<h1 class="mb-4 mt-3">New Shoes Winter Collection</h1>
									<p class="mb-4">A small river named Duden flows by their place and
										supplies it with
										the necessary regelialia. It is a paradisematic country.</p>
									<p><a href="shop.php" class="btn-custom">Discover Now</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- TODO: ovaj dio nam mozda ne treba -->
	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row no-gutters ftco-services">
				<div class="col-lg-6 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services p-4 py-md-5">
						<div class="icon d-flex justify-content-center align-items-center mb-4">
							<span class="flaticon-bag"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Free Shipping</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
								there live the blind texts.</p>
						</div>
					</div>
				</div>
				<!-- <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services p-4 py-md-5">
						<div class="icon d-flex justify-content-center align-items-center mb-4">
							<span class="flaticon-customer-service"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Support Customer</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
								there live the blind texts.</p>
						</div>
					</div>
				</div> -->
				<div class="col-lg-6 text-center d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services p-4 py-md-5">
						<div class="icon d-flex justify-content-center align-items-center mb-4">
							<span class="flaticon-payment-security"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Secure Payments</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
								there live the blind texts.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h2 class="mb-4">Izdvojeni artikli / Posebni</h2>
					<!-- TODO: izmjenit tekst il obrisat -->
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php

				/* require 'connection/connect.php'; */

				$sql = "SELECT * FROM products";
				$result = $dbc->query($sql);

				$count = $result->num_rows;
				if ($count > 0) {
					while ($row = $result->fetch_assoc()) {
						if ($row['special'] == 1) {
							echo '<div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
					<div class="product d-flex flex-column">
						<a href="#" class="img-prod"><img class="img-fluid" src=" data:image/jpeg;base64,' . base64_encode($row["image"]) . '" alt="' . $row['title'] . '">
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3">
							<div class="d-flex">
								<div class="cat">
									<span>' . $row['type'] . '</span>
								</div>
								<div class="rating">
									<p class="text-right mb-0">
										<a href="#"><span class="ion-ios-star-outline"></span></a>
										<a href="#"><span class="ion-ios-star-outline"></span></a>
										<a href="#"><span class="ion-ios-star-outline"></span></a>
										<a href="#"><span class="ion-ios-star-outline"></span></a>
										<a href="#"><span class="ion-ios-star-outline"></span></a>
									</p>
								</div>
							</div>
							<h3><a href="#">' . $row['title'] . '</a></h3>
							<div class="pricing">
								<p class="price"><span>$' . $row['price'] . '</span></p>
								<input type="number" value="' . $row['ID'] . '" hidden id="product">
							</div>
							<p class="bottom-area d-flex px-3">
								<a href="javascript:void(0)" class="add-to-cart text-center py-2 mr-1 " id="saveFavorite' . $row["ID"] . '" onclick="saveFavorite(this.id)"><span>SAVE<i class="ion-ios-heart ml-1"></i></span></a>
								<a class="buy-now text-center py-2" target="_blank" href="' . $row['amazonLink'] . '"><span>Buy now<i class="ion-ios-cart ml-1"></i></span></a>
							</p>
						</div>
					</div>
				</div>';
						}
					}
				} else {
					echo " 0 results";
				}
				$dbc->close();
				?>

			</div>
		</div>
	</section>


	<section class="ftco-section testimony-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-5">
					<div class="services-flow">
						<div class="services-2 p-4 d-flex ftco-animate">
							<div class="icon">
								<span class="flaticon-bag"></span>
							</div>
							<div class="text">
								<h3>Free Shipping</h3>
								<p class="mb-0">Separated they live in. A small river named Duden flows</p>
							</div>
						</div>
						<div class="services-2 p-4 d-flex ftco-animate">
							<div class="icon">
								<span class="flaticon-heart-box"></span>
							</div>
							<div class="text">
								<h3>Valuable Gifts</h3>
								<p class="mb-0">Separated they live in. A small river named Duden flows</p>
							</div>
						</div>
						<div class="services-2 p-4 d-flex ftco-animate">
							<div class="icon">
								<span class="flaticon-payment-security"></span>
							</div>
							<div class="text">
								<h3>All Day Support</h3>
								<p class="mb-0">Separated they live in. A small river named Duden flows</p>
							</div>
						</div>
						<div class="services-2 p-4 d-flex ftco-animate">
							<div class="icon">
								<span class="flaticon-customer-service"></span>
							</div>
							<div class="text">
								<h3>All Day Support</h3>
								<p class="mb-0">Separated they live in. A small river named Duden flows</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="heading-section ftco-animate mb-5">
						<h2 class="mb-4">Our satisfied customer says</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
							there live the blind texts. Separated they live in</p>
					</div>
					<div class="carousel-testimony owl-carousel">
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
										countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Garreth Smith</p>
									<span class="position">Marketing Manager</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
										countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Garreth Smith</p>
									<span class="position">Interface Designer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
										countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Garreth Smith</p>
									<span class="position">UI Designer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
										countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Garreth Smith</p>
									<span class="position">Web Developer</span>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimony-wrap">
								<div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
									<span class="quote d-flex align-items-center justify-content-center">
										<i class="icon-quote-left"></i>
									</span>
								</div>
								<div class="text">
									<p class="mb-4 pl-4 line">Far far away, behind the word mountains, far from the
										countries Vokalia and Consonantia, there live the blind texts.</p>
									<p class="name">Garreth Smith</p>
									<span class="position">System Analyst</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-gallery">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
					<h2 class="mb-4">Follow Us On Instagram / Pratite nove ponude na inst</h2>
					<!-- TODO: izmjenit ovaj teskt -->
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
						live the blind texts. Separated they live in</p>
				</div>
			</div>
		</div>
		<div class="container-fluid px-0">
			<div class="row no-gutters">
				<div class="col-md-4 col-lg-2 ftco-animate">
					<!-- TODO: promijenit mozda na klik popup...mozda i napravit da se moze listat desno-lijevo (slideshow)-->
					<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
						<!-- <div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div> -->
					</a>
				</div>
				<div class="col-md-4 col-lg-2 ftco-animate">
					<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
						<!-- <div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div> -->
					</a>
				</div>
				<div class="col-md-4 col-lg-2 ftco-animate">
					<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
						<!-- <div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div> -->
					</a>
				</div>
				<div class="col-md-4 col-lg-2 ftco-animate">
					<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
						<!-- <div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div> -->
					</a>
				</div>
				<div class="col-md-4 col-lg-2 ftco-animate">
					<a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-5.jpg);">
						<!-- <div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div> -->
					</a>
				</div>
				<div class="col-md-4 col-lg-2 ftco-animate">
					<a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-6.jpg);">
						<!-- <div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div> -->
					</a>
				</div>
			</div>
		</div>
	</section>


	<footer class="ftco-footer" style="position:relative; padding-top: 5em">
		<div class="container">
			<div class="row">
				<div class="mouse">
					<a href="#" class="mouse-icon">
						<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">IME STRANICE</h2>
						<!-- TODO: ovdje kratki opis -->
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<!-- <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li> -->
							<!-- TODO: fb i inst profili kad se naprave-->
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Menu</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Shop</a></li>
							<li><a href="#" class="py-2 d-block">Favorites</a></li>
							<!-- <li><a href="#" class="py-2 d-block">About</a></li>
							<li><a href="#" class="py-2 d-block">Journal</a></li>
							<li><a href="#" class="py-2 d-block">Contact Us</a></li> -->
						</ul>
					</div>
				</div>
				<!-- <div class="col-md-4">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Help</h2>
						<div class="d-flex">
							<ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
								<li><a href="#" class="py-2 d-block">Shipping Information</a></li>
								<li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
								<li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
								<li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="#" class="py-2 d-block">FAQs</a></li>
								<li><a href="#" class="py-2 d-block">Contact</a></li>
							</ul>
						</div>
					</div> -->
			</div>
			<!-- <div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Have a Questions?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
									View, San Francisco, California, USA</span></li>
							<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929
										210</span></a></li>
							<li><a href="#"><span class="icon icon-envelope"></span><span
										class="text">info@yourdomain.com</span></a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div>
		<div class="row" style="margin: 0 !important; padding: 0 !important;">
			<div class="col-md-12 text-center">
				<p>
					&copy; <span id="currentYear"></span> All rights reserved | Created by <a href="https://abocdev.com/">Aboc</a>
				</p>
			</div>
		</div>
		</div>
	</footer>



	<!-- loader -->
	<!-- TODO: mozda promijenit loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>

	<script src="js/owl.carousel.min.js"></script>

	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/aos.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<!-- <script src="js/bootstrap-datepicker.js"></script> -->
	<script src="js/scrollax.min.js"></script>
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
	</script>
	<script src="js/google-map.js"></script> -->
	<!-- TOASTR -->
	<script src="toastr.js"></script>
	<script src="js/main.js"></script>


	<script>
		var year = new Date().getFullYear()
		$('#currentYear').html(year)
	</script>

	<!-- TODO: include file -->
	<script>
		$(document).ready(function() {

			$('#loginForm input').on('blur change keyup', function(e) {
				if (e.keyCode == 13) {
					$('#logButton').trigger('click');
				}
			});

			$('#regForm input').on('blur change keyup', function(e) {
				if (e.keyCode == 13) {
					$('#signButton').trigger('click');
				}
			});

			toastr.options.closeButton = true;
			toastr.options.preventDuplicates = true;

			$('#logButton').click(function() {
				var emailLog = $('#emailLog').val();
				var passLog = $('#passLog').val();

				function validateEmail($emailLog) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					return emailReg.test($emailLog);
				}

				if (emailLog == "") {
					toastr.error("Please enter your email address.")
				} else if (!validateEmail(emailLog)) {
					toastr.warning("Please enter a valid email address.")
				} else if (passLog == "") {
					toastr.error("Please enter your password.")
				} else {
					$.ajax({
						url: "dbSend/login.php?task=login&emailLog=" + emailLog + "&passLog=" + passLog,
						success: function(data) {
							if (data.indexOf('sent') > -1) {
								toastr.success('Logged in successfully.')

								$('#emailLog').val("");
								$('#passLog').val("");

								var delay = 1500;
								setTimeout(function() {
									console.log(window.location.replace(window.location.href));
								}, delay);

							} else if (data.indexOf('activated') > -1) {
								toastr.error('Please activate your email address.')
							} else if (data.indexOf('pass') > -1) {
								toastr.error('Password is incorrect.')
							} else {
								toastr.error('Email is incorrect.')
							}
						},
						error: function(data, err) {
							toastr.error('Some problem occurred. Please try later.')
						}
					});
				}
			})

			$('#signButton').click(function() {
				var fullNameSign = $('#fullSign').val();
				var emailSign = $('#emailSign').val();
				var passSign = $('#passSign').val();

				function validateEmail($emailSign) {
					var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
					return emailReg.test($emailSign);
				}

				if (fullNameSign == "") {
					toastr.error("Please enter your name.")
				} else if (emailSign == "") {
					toastr.error("Please enter your email address.")
				} else if (!validateEmail(emailSign)) {
					toastr.warning("Please enter a valid email address.")
				} else if (passSign == "") {
					toastr.error("Please create a password.")
				} else {
					$.ajax({
						url: "dbSend/register.php?task=register&fullSign=" + fullNameSign + "&emailSign=" + emailSign + "&passSign=" + passSign,
						success: function(data) {
							if (data.indexOf('sent') > -1) {
								toastr.success('Your account created successfully. Please verify your email.')

								$('#fullSign').val("");
								$('#emailSign').val("");
								$('#passSign').val("");

								var delay = 1500;
								setTimeout(function() {
									console.log(window.location.replace(window.location.href));
								}, delay);

								/* window.location = "https://bttbh.ba/phpSendEmail.php?emailSign=" + emailSign + "&firstSign=" + firstSign + "&lastSign=" + lastSign; */
							} else {
								toastr.error('The email is already exists.')
							}
						},
						error: function(data, err) {
							toastr.error('Some problem occured. Please try later.')
						}
					})
				}
			})
		})



		if (typeof $('#session').val() == "undefined") {
			$('[id^="save"]').css('pointer-events', 'none')
			$('[id^="save"]').css('opacity', 0.5)

			$('#favoriteNumber').css('pointer-events', 'none')
		}

		function saveFavorite(id) {
			var idRes = id.replace(/\D/g, "")
			var user = $('#session').val()
			$.ajax({
				url: "dbSend/saveFavorite.php?task=save&productID=" + idRes + "&user=" + user,
				success: function(data) {
					if (data.indexOf('saved') > -1) {
						toastr.success('Item added to favorite.')
					} else {
						toastr.error('There is a problem with the server. Please try again later')
					}
				},
				error: function(data, err) {
					toastr.error('Some problem occured. Please try later.')
				}
			})
		}
	</script>
</body>

</html>
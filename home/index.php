<?php 
require_once '../db_conn.php';
session_start();

if (!isset($_SESSION['user_id'])){
	//If already login, jump to home page directly
	header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/login/"); 
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SoundX</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../style.css" />
  </head>
  <body>
    <!-- the navigation bar -->
    <div class="nav-bar-container">
        <!-- Left part -->
        <a class="logo" href="index.html">
          <img src="../img/SoundX-Logo.png" alt="SoundX" width="100px">
        </a>
        <div class="brand-container">
          <a class="left-nav brand">Brand</a>
          <!-- TODO: brand dropdown -->
          <div class="brand-dropdown-content">
            <!--Here is something to display => brand-->
			<!-- TODO: style the list -->
			<ul class="nav-dropdown-item">
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Brand 1</div>
						</a>						
					</div>
				</li>
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Brand 1</div>
						</a>					
					</div>
				</li>
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Very long name of Brand 1</div>
						</a>						
					</div>
				</li>
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Brand 1</div>
						</a>						
					</div>
				</li>
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Brand 1</div>
						</a>					
					</div>
				</li>
			</ul>
          </div>
        </div>
        <div class="type-container">
          <a class="left-nav type">Type</a>
          <!-- TODO: type dropdown -->

          <div class="type-dropdown-content">
            <!--Here is something to display => type-->
			<ul class="nav-dropdown-item">
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Brand 1</div>
						</a>						
					</div>
				</li>
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Brand 1</div>
						</a>					
					</div>
				</li>
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Very long name of Brand 1</div>
						</a>						
					</div>
				</li>
				<li class="subnav-item">
					<div class="item-block">
						<a class="item-block-link" href="brand.html">
							<img src="../img/placeholder.png" alt="SoundX" width="130px"><br>
							<div class="font-item">Brand 1</div>
						</a>						
					</div>
				</li>
			</ul>
          </div>
        </div>
        <a class="left-nav" href="product_list/index.php">Product</a>
        <a class="left-nav" href="#contact">Contact</a>
        <!-- Right part -->
        <a class="right-nav" href="../account">
        <img class="account-logo" src="../img/profile-user.png" alt="account"></a>
        <a class="right-nav" href="html/cart.html">
        <img class="cart-logo" src="../img/shopping-cart.png" alt="cart" style="padding-top: 3px;"></a>
        
    </div>

    <!-- Big Banner container -->
    <div class="top-banner-container">
      <!-- Full-width images -->
      <div class="banner-page">
		  <a href="product_details/index.php?product_id=1">
        <img src="../img/placeholder.png" style="height: 400px; width: 100%" />
	</a>
        <div class="caption-text">Caption Text</div>
      </div>

      <div class="banner-page">
        <img src="../img/placeholder.png" style="height: 400px; width: 100%" />
        <div class="caption-text">Caption Two</div>
      </div>

      <div class="banner-page">
        <img src="../img/placeholder.png" style="height: 400px; width: 100%" />
        <div class="caption-text">Caption Three</div>
      </div>

      <!-- Next and previous buttons -->
      <a class="prev" onclick="next(-1)">&#10094;</a>
      <a class="next" onclick="next(1)">&#10095;</a>
    </div>
    <br />

    <!-- Top Sales -->
    <div class="top-sales">
		<div class="title">
			<h1>TOP SALES</h1>
		</div>
		<div class="top-sales-column">
			<div class="product-list">
				<div class="product-list-flex">
					<div class="product-list-item-block">
						<div class="product-list-item-img">
							<a href="product.html" class="item-img-link">
								<img src="../img/placeholder.png" class="item-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
						<a class="item-info-link">
							<div class="item-info-body">
								<p class="item-info-body-title">Earphone A</p>
								<p class="item-info-body-type">Headset</p>
								<p class="item-info-body-price">$324.00</p>
							</div>
						</a>
						</div>
					</div>
					<div class="product-list-item-block">
						<div class="product-list-item-img">
							<a href="product.html" class="item-img-link">
								<img src="../img/placeholder.png" class="item-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
						<a class="item-info-link">
							<div class="item-info-body">
								<p class="item-info-body-title">Earphone A</p>
								<p class="item-info-body-type">Headset</p>
								<p class="item-info-body-price">$324.00</p>
							</div>
						</a>
						</div>
					</div>
					<div class="product-list-item-block">
						<div class="product-list-item-img">
							<a href="product.html" class="item-img-link">
								<img src="../img/placeholder.png" class="item-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
						<a class="item-info-link">
							<div class="item-info-body">
								<p class="item-info-body-title">Earphone A</p>
								<p class="item-info-body-type">Headset</p>
								<p class="item-info-body-price">$324.00</p>
							</div>
						</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Full-width banner promotion -->
		<div class="topSale-banner-container">
			<div class="topSale-banner-img">
				<img src="../img/placeholder.png" style="display:none">
			</div>
			<div class="topSale-banner-text-container">
				<div class="topSale-banner-text">
					<div id="topSale-title">
						<p style="font-size:40px; font-weight:700; line-height:45px; margin:0px 0 10px;">Discover Best Sounds Experience</p>
						<p style= "font-size:20px; margin:10px 0;">Brand Name</p>
					</div>
					<div>
						<!-- top sales promotion product shop now-->
						<a href="productA.html" class="product-button">
							<span class="product-button-text">
								Shop Now
							</span>
						</a>
						
					</div>
				</div>
			</div>
		</div>
	</div>

    <!-- See More -->
    <div class="top-sales">
		<div class="title">
			<h1>SEE MORE</h1>
		</div>
		<div class="top-sales-column">
			<div class="product-list">
				<div class="type-list-flex">
					<div class="type-list-item-block">
						<div>
							<!--product list pag -->
							<a href="product_list.html" class="item-img-link">
								<img src="../img/placeholder.png" class="type-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
						<a class="item-info-link">
							<div>
								<p class="type-item-title">Earphone A</p>
							</div>
						</a>
						</div>
					</div>
					<div class="type-list-item-block">
						<div>
							<!--product list pag -->
							<a href="product_list.html" class="item-img-link">
								<img src="../img/placeholder.png" class="type-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
						<a class="item-info-link">
							<div>
								<p class="type-item-title">Earphone A</p>
							</div>
						</a>
						</div>
					</div>
					<div class="type-list-item-block">
						<div>
							<!--product list pag -->
							<a href="product_list.html" class="item-img-link">
								<img src="../img/placeholder.png" class="type-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
						<a class="item-info-link">
							<div>
								<p class="type-item-title">Earphone A</p>
							</div>
						</a>
						</div>
					</div>
					<div class="type-list-item-block">
						<div>
							<!--product list pag -->
							<a href="product_list.html" class="item-img-link">
								<img src="../img/placeholder.png" class="type-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
						<a class="item-info-link">
							<div>
								<p class="type-item-title">Earphone A</p>
							</div>
						</a>
						</div>
					</div>					
			</div>
		</div>
    </div>
    <br />

    <!-- Contact -->
    <div id="contact">
		<div id="contact-text">
			<h2>Contact Us</h1>
				<p>
					<!-- (+65) 8888 - 8888 -->
					&#40;&#43;65&#41; 8888 &#45; 8888 <br />
					<!-- support@soundx.com -->
					<a href="mailto:support@soundx.com" style="color:azure; text-decoration: none;">
					  support&#64;soundx.com</a> <br /><br />
					156 Nanyang Cres<br />
					Singapore, 636866
				</p>
		</div>
	</div>
    
  </body>
  <script src="../script.js"></script>
</html>

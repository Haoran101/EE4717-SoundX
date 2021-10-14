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
	<link rel="stylesheet" href="../css/elements.css" />
	<link rel="stylesheet" href="../css/home-style.css" />
</head>

<body>
	<!-- the navigation bar -->
	<?php include '../Elements/nav_bar.php';?>

	<!-- Big Banner container -->
	<div class="top-banner-container">
		<!-- Full-width images -->
		<div class="banner-page transition">
			<a href="../product_details/?product_id=21">
				<img src="../img/banner/banner1_product21_1.jpeg" style="height: 500px; width: 100%" />
			</a>
			<div class="caption-text">Bose Sport Open Earbuds</div>
		</div>

		<div class="banner-page transition">
			<a href="../product_details/?product_id=13">
				<img src="../img/banner/banner2_product13_1.png" style="height: 500px; width: 100%" />
			</a>
			<div class="caption-text">IER-H500A h.ear in 2 In-ear Headphones</div>
		</div>

		<div class="banner-page transition">
			<a href="../product_details/?product_id=3">
				<img src="../img/banner/banner4_product3_1.jpg" style="height: 500px; width: 100%" />
			</a>
			<div class="caption-text">Razer Hammerhead Duo Console</div>
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
							<a href="../product_details/?product_id=10" class="item-img-link">
								<img src="../img/product-snapshot/10.png" class="topSale-item-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
							<a class="item-info-link">
								<div class="item-info-body">
									<p class="item-info-body-title">WF-1000XM4 Wireless Noise Cancelling Headphones</p>
									<p class="item-info-body-type">Noise Cancelling</p>
									<p class="item-info-body-price">$379.00</p>
								</div>
							</a>
						</div>
					</div>
					<div class="product-list-item-block">
						<div class="product-list-item-img">
							<a href="../product_details/?product_id=1" class="item-img-link">
								<img src="../img/product-snapshot/1.png" class="topSale-item-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
							<a class="item-info-link">
								<div class="item-info-body">
									<p class="item-info-body-title">RAZER HAMMERHEAD TRUE WIRELESS 2019</p>
									<p class="item-info-body-type">True Wireless Earbuds</p>
									<p class="item-info-body-price">$169.90</p>
								</div>
							</a>
						</div>
					</div>
					<div class="product-list-item-block">
						<div class="product-list-item-img">
							<a href="../product_details/?product_id=8" class="item-img-link">
								<img src="../img/product-snapshot/8.png" class="topSale-item-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
							<a class="item-info-link">
								<div class="item-info-body">
									<p class="item-info-body-title">Beats EP blue</p>
									<p class="item-info-body-type">Wired Headphone</p>
									<p class="item-info-body-price">$138.00</p>
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
						<p style="font-size:40px; font-weight:700; line-height:45px; margin:0px 0 10px; color:white">
							Discover Best Sounds Experience</p>
						<p style="font-size:24px; font-weight:300; margin:10px 0; color:white">Beats</p>
					</div>
					<div>
						<!-- top sales promotion product shop now-->
						<a href="../product_details/?product_id=6" class="product-button">
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
						<div id="type-item-img">
							<!--product list pag -->
							<a href="../product_list/?wireless=true" class="item-img-link">
								<img src="../img/type/wireless.png" class="type-img" width="180px" style="padding-top: 20px;">
							</a>
						</div>
						<div class="product-list-item-info">
							<a class="item-info-link">
								<div>
									<p class="type-item-title">WIRELESS</p>
								</div>
							</a>
						</div>
					</div>
					<div class="type-list-item-block">
						<div id="type-item-img">
							<!--product list pag -->
							<a href="../product_list/?Gaming=true" class="item-img-link">
								<img src="../img/type/game.jpg" class="type-img" width="200px" style="padding-top: 20px;">
							</a>
						</div>
						<div class="product-list-item-info">
							<a class="item-info-link">
								<div>
									<p class="type-item-title">GAMING</p>
								</div>
							</a>
						</div>
					</div>
					<div class="type-list-item-block">
						<div id="type-item-img">
							<!--product list pag -->
							<a href="../product_list/?Wired=true" class="item-img-link">
								<img src="../img/type/wired.jpg" class="type-img" width="250px">
							</a>
						</div>
						<div class="product-list-item-info">
							<a class="item-info-link">
								<div>
									<p class="type-item-title">WIRED</p>
								</div>
							</a>
						</div>
					</div>
					<div class="type-list-item-block">
						<div id="type-item-img">
							<!--product list pag -->
							<a href="../product_list/?Bluetooth=true" class="item-img-link">
								<img src="../img/type/bluetooth.png" class="type-img" width="130px" style="padding-top: 50px;">
							</a>
						</div>
						<div class="product-list-item-info">
							<a class="item-info-link">
								<div>
									<p class="type-item-title">BLUETOOTH</p>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br />
		<?php include '../Elements/footer.php'; ?>
</body>
<script src="script.js"></script>

</html>
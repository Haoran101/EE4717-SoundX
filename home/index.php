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
		<div class="banner-page">
			<a href="product_details/index.php?product_id=1">
				<img src="../img/banner/banner1_product21_1.jpeg" style="height: 500px; width: 100%" />
			</a>
			<div class="caption-text">Caption Text</div>
		</div>

		<div class="banner-page">
			<img src="../img/banner/banner2_product13_1.png" style="height: 500px; width: 100%" />
			<div class="caption-text">Caption Two</div>
		</div>

		<div class="banner-page">
			<img src="../img/banner/banner4_product3_1.jpg" style="height: 500px; width: 100%" />
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
								<img src="../img/product/1-1.jpg" class="topSale-item-img" width="250px">
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
								<img src="../img/product/10-1.jpg" class="topSale-item-img" width="250px">
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
								<img src="../img/product/23-1.jpg" class="topSale-item-img" width="250px">
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
						<p style="font-size:40px; font-weight:700; line-height:45px; margin:0px 0 10px; color:white">
							Discover Best Sounds Experience</p>
						<p style="font-size:24px; font-weight:300; margin:10px 0; color:white">Beates</p>
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
						<div id="type-item-img">
							<!--product list pag -->
							<a href="product_list.html" class="item-img-link">
								<img src="../img/product/3-1.jpg" class="type-img" width="250px">
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
						<div id="type-item-img">
							<!--product list pag -->
							<a href="product_list.html" class="item-img-link">
								<img src="../img/product/9-1.jpg" class="type-img" width="250px">
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
					<div id="type-item-img">
						<!--product list pag -->
						<a href="product_list.html" class="item-img-link">
							<img src="../img/product/13-1.jpg" class="type-img" width="250px">
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
					<div id="type-item-img">
						<!--product list pag -->
						<a href="product_list.html" class="item-img-link">
							<img src="../img/product/25-1.jpg" class="type-img" width="250px">
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
	<?php include '../Elements/footer.php'; ?>
</body>
<script src="../script.js"></script>

</html>
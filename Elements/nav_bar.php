<?php include_once '../db_conn.php';

$brands = array('Razer', 'Beats', 'Sony', 'SteelSeries', 'Bose');
$types = array('Wired', 'Wireless', 'Gaming', 'Sport');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/elements.css" />
</head>

<body>
	<div class="nav-bar-container">
		<!-- Left part -->
		<a class="logo" href="../home/">
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
							<a class="item-block-link"
								href="../product_list/filtered.php?brand%5B%5D=1&min_price=0&max_price=1000">
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $brands[0]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href="../product_list/filtered.php?brand%5B%5D=2&min_price=0&max_price=1000">
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $brands[1]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href="../product_list/filtered.php?brand%5B%5D=3&min_price=0&max_price=1000">
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>>
								<div class="font-item"><?php echo $brands[2]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href="../product_list/filtered.php?brand%5B%5D=4&min_price=0&max_price=1000">
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $brands[3]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href="../product_list/filtered.php?brand%5B%5D=5&min_price=0&max_price=1000">
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $brands[4]; ?></div>
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
							<a class="item-block-link"
								href=<?php echo "../product_list/filtered.php?{$types[0]}=true&min_price=0&max_price=1000"; ?>>
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $types[0]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href=<?php echo "../product_list/filtered.php?{$types[1]}=true&min_price=0&max_price=1000"; ?>>
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $types[1]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href=<?php echo "../product_list/filtered.php?{$types[2]}=true&min_price=0&max_price=1000"; ?>>
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $types[2]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href=<?php echo "../product_list/filtered.php?{$types[3]}=true&min_price=0&max_price=1000"; ?>>
								<div class="item-img"><img src="../img/placeholder.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $types[3]; ?></div>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="product-container">
			<a class="left-nav" href="../product_list/">Product</a>
		</div>
		<div class="contact-container">
			<a class="left-nav" href="#contact">Contact</a>
		</div>
		<!-- Right part -->
		<div class="right-nav">
			<div class="right-nav-item">
				<a href="../account/">
					<img class="account-logo" src="../img/profile-user.png" alt="account"></a>
			</div>
			<div class="right-nav-item">
				<a href="html/cart.html">
					<img class="cart-logo" src="../img/shopping-cart.png" alt="cart"></a>
			</div>
		</div>

	</div>
</body>

</html>
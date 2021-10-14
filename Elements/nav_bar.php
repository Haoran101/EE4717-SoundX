<?php include_once '../db_conn.php';
include_once '../query_utils.php';

$brands = array('Razer', 'Beats', 'Sony', 'SteelSeries', 'Bose');
$types = array('Wired', 'Wireless', 'Gaming', 'Sport');

$brand = select_all_from_table($db, "brand");

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
					<?php 
					for ($i=0; $i<count($brand); $i++){
						$brand_row = $brand[$i];
						$brand_name = $brand_row['brand_name'];
						$brand_id = $brand_row['brand_id'];
						echo "<li class='subnav-item'>
						<div class='item-block'>
							<a class='item-block-link'
								href='../product_list/?brand%5B%5D={$brand_id}'>
								<div class='item-img'><img src='../img/brand/{$brand_id}.png' alt='SoundX' width='130px'></div>
								<div class='font-item'>{$brand_name}</div>
							</a>
						</div>
					</li>";
					}
					?>
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
								href=<?php echo "../product_list/?{$types[0]}=true"; ?>>
								<div class="item-img"><img src="../img/type/wired.jpg" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $types[0]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href=<?php echo "../product_list/?{$types[1]}=true"; ?>>
								<div class="item-img"><img src="../img/type/wireless.png" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $types[1]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href=<?php echo "../product_list/?{$types[2]}=true"; ?>>
								<div class="item-img"><img src="../img/type/game.jpg" alt="SoundX" width="130px"></div>
								<div class="font-item"><?php echo $types[2]; ?></div>
							</a>
						</div>
					</li>
					<li class="subnav-item">
						<div class="item-block">
							<a class="item-block-link"
								href=<?php echo "../product_list/?{$types[3]}=true"; ?>>
								<div class="item-img"><img src="../img/type/sport.png" alt="SoundX" width="130px"></div>
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
				<a href="../cart/">
					<img class="cart-logo" src="../img/shopping-cart.png" alt="cart"></a>
			</div>
		</div>

	</div>
</body>

</html>
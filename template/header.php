<head>
	<title>Bellah Space Bakery</title>
	<!-- compiled and minified css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<style type="text/css">
		.brand{
			background: #cbb09c !important;
		}
		.brand-text{
			color: #cbb09c !important;
		}
		form {
			max-width: 460px;
			margin: 20px auto;
			padding: 20px;
		}
		.muffin{
			width: 100px;
			margin: 40px auto -30px;
			display: block;
			position: relative;
			/*top: -30px;*/
		}
	</style>
</head>
<?php include 'config.php'; ?>

<body class="grey lighten-4">
	<nav class="white z-depth-0">
		<div class=container>
			<a href="<?php echo BASE_URL; ?>index.php" class="brand-logo brand-text"> Bellah Space Bakery</a>
				<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li><a href="<?php echo BASE_URL; ?>template/add.php" class="btn brand z-depth-0">Add Product</a></li>	
				</ul>
		</div>
	</nav>
 
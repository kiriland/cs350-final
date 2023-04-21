<?php session_start();
if(isset($_SESSION['user_login'])){

}else {
	//redirect to login page id the user is not logged in.
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'login.php';
	header("Location: http://$host$uri/$extra");
} ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Grocery Store </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css"> </head>

<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"> <img src="https://www.logolynx.com/images/logolynx/c7/c702102793667822e78ef5d7bdb7f5d8.jpeg" alt="Logo" width="90" class="d-inline-block align-text-top"> Online Grocery </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item"> <a class="nav-link active" aria-current="page" href="#">Shop Online</a> </li>
					<li class="nav-item"> <a class="nav-link" href="#">Pricing</a> </li>
					<li class="nav-item"> <a class="nav-link" href="#">About Us</a> </li>
				</ul>
				<ul class="navbar-nav ms-md-auto">
					<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['user_login']?>
                        </a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Orders</a></li>
							<li><a class="dropdown-item" href="#">Settings</a></li>
							<li><a class="dropdown-item" href="logout.php">Log Out</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Main block -->
	<div class="container">
		<main>
			<div class="container-md">
				<div class="row align-items-start">
					<div class="col ">
						<h3>Produce</h3>
						<div class="container text-center">
							<div class="card-group">
								<div class="card"> <img src="https://www.bestfreshinc.com/wp-content/uploads/2017/09/Persian-Cucumbers-1.jpg" class="card-img-top product-image-med" alt="...">
									<div class="card-body">
										<h5 class="card-title">Persian Cucumbers</h5>
										<p class="card-text">Description</p>
										<p class="card-text"><small class="text-body-secondary">1 lb</small></p>
									</div>
								</div>
								<div class="card"> <img src="https://thegrocerybag.co.uk/wp-content/uploads/2020/08/VINE-TOMATO.jpg" width="200" height="auto" class="card-img-top product-image-med" alt="...">
									<div class="card-body">
										<h5 class="card-title">Vine Tomatoes</h5>
										<p class="card-text">Description</p>
										<p class="card-text"><small class="text-body-secondary">1.5 lb</small></p>
									</div>
								</div>
								<div class="card"> <img src="http://gastronomt.ru/upload/iblock/15c/46302.jpg" class="card-img-top product-image-med" alt="...">
									<div class="card-body">
										<h5 class="card-title">Celery</h5>
										<p class="card-text">Description</p>
										<p class="card-text"><small class="text-body-secondary">24 oz </small></p>
									</div>
								</div>
								<div class="card"> <img src="https://cdn.shopify.com/s/files/1/0367/4642/8547/products/awokado-hass.jpg?v=1603762033" class="card-img-top product-image-med" alt="...">
									<div class="card-body">
										<h5 class="card-title">Organic Avocados</h5>
										<p class="card-text">Description</p>
										<p class="card-text"><small class="text-body-secondary">4 cts</small></p>
									</div>
								</div>
								<div class="card"> <img src="https://cdn.shopify.com/s/files/1/0367/4642/8547/products/awokado-hass.jpg?v=1603762033" class="card-img-top product-image-med" alt="...">
									<div class="card-body">
										<h5 class="card-title">Organic Avocados</h5>
										<p class="card-text">Description</p>
										<p class="card-text"><small class="text-body-secondary">4 cts</small></p>
									</div>
								</div>
                                <div class="card"> <img src="https://cdn.shopify.com/s/files/1/0367/4642/8547/products/awokado-hass.jpg?v=1603762033" class="card-img-top product-image-med" alt="...">
									<div class="card-body">
										<h5 class="card-title">Organic Avocados</h5>
										<p class="card-text">Description</p>
										<p class="card-text"><small class="text-body-secondary">4 cts</small></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="row align-items-start">
                    <div class="col">
                        <h3>Meats & Fish</h3>
                        <div class="container text-center">
                            <div class="card-group">
                                <div class="card"> <img src="https://www.bestfreshinc.com/wp-content/uploads/2017/09/Persian-Cucumbers-1.jpg" class="card-img-top product-image-med" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Persian Cucumbers</h5>
                                        <p class="card-text">Description</p>
                                        <p class="card-text"><small class="text-body-secondary">1 lb</small></p>
                                    </div>
                                </div>
                                <div class="card"> <img src="https://thegrocerybag.co.uk/wp-content/uploads/2020/08/VINE-TOMATO.jpg" width="200" height="auto" class="card-img-top product-image-med" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Vine Tomatoes</h5>
                                        <p class="card-text">Description</p>
                                        <p class="card-text"><small class="text-body-secondary">1.5 lb</small></p>
                                    </div>
                                </div>
                                <div class="card"> <img src="https://thegrocerybag.co.uk/wp-content/uploads/2020/08/VINE-TOMATO.jpg" width="200" height="auto" class="card-img-top product-image-med" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Vine Tomatoes</h5>
                                        <p class="card-text">Description</p>
                                        <p class="card-text"><small class="text-body-secondary">1.5 lb</small></p>
                                    </div>
                                </div>
                                <div class="card"> <img src="http://gastronomt.ru/upload/iblock/15c/46302.jpg" class="card-img-top product-image-med" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Celery</h5>
                                        <p class="card-text">Description</p>
                                        <p class="card-text"><small class="text-body-secondary">24 oz </small></p>
                                    </div>
                                </div>
                                <div class="card"> <img src="https://cdn.shopify.com/s/files/1/0367/4642/8547/products/awokado-hass.jpg?v=1603762033" class="card-img-top product-image-med" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Organic Avocados</h5>
                                        <p class="card-text">Description</p>
                                        <p class="card-text"><small class="text-body-secondary">4 cts</small></p>
                                    </div>
                                </div>
                                <div class="card"> <img src="https://cdn.shopify.com/s/files/1/0367/4642/8547/products/awokado-hass.jpg?v=1603762033" class="card-img-top product-image-med" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Organic Avocados</h5>
                                        <p class="card-text">Description</p>
                                        <p class="card-text"><small class="text-body-secondary">4 cts</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
	</main>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>

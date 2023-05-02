<?php session_start();
function printCart() {
	return count($_SESSION['cart']);
  }
if(!isset($_SESSION['user_id'])){
	header('Location: /login.php');
    die;
} ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Online Grocery Store </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
				<button type="button" class="btn btn-outline-primary">Cart <span><?php echo printCart()?></span></button>
					<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['first_name']?>
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
	<div class="container-fluid">
		<main>
			<div class="container-xxl">
				<div class="row align-items-start">
					<div class="col" id="produce">
						<h3>Produce</h3>
						<div class="container text-center">
							<div class="row row-cols-1 row-cols-md-6 g-1">
								<!-- Produce Items go here -->
							</div>
						</div>
					</div>
				</div>
                <div class="row align-items-start">
                    <div class="col" id="bakery">
                        <h3>Bakery</h3>
                        <div class="container text-center">
                            <div class="row row-cols-1 row-cols-md-6 g-1">
                                <!-- Bakery Items go here -->
                            </div>
                        </div>
                    </div>
                </div>
			</div>
	</main>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
<script language="javascript">
//Dynamically load the products on the page.
$.ajax({url: "checkout.php",type:'GET',data: { function: "getProduce"}}).done(function( html ) {
    $("#produce > .container > .row").append(html);
});
$.ajax({url: "checkout.php",type:'GET',data: { function: "getBakery"}}).done(function( html ) {
    $("#bakery > .container > .row").append(html);
});

//When clicked on add to cart, perform actions.
$(document.body).on('click', '.btn-sm', function(){
	var itemName = $(this).prev().prev().prev().text();
  $.ajax({
    url:'checkout.php',
    type:'POST',
	data: { function: "addToCart", itemId: itemName },
    success:function(data){	$('.btn-outline-primary span').text(data);}
  });
});
	</script>
</html>

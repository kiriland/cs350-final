<?php session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: /login.php");
    die();
}
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Grocery Store </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <body>
	<!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">
          <img src="https://www.logolynx.com/images/logolynx/c7/c702102793667822e78ef5d7bdb7f5d8.jpeg" alt="Logo" width="90" class="d-inline-block align-text-top"> Online Grocery </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/index.php">Shop Online</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">My Orders</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-md-auto">
            <button type="button" class="btn btn-outline-primary" id="cart-button" data-bs-toggle="modal" data-bs-target="#exampleModal">Cart <span class="cart-itemNumber"> </span>
            </button>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo $_SESSION["first_name"] ." " .$_SESSION["last_name"]; ?> </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="orders.php">Orders</a>
                </li>
                <li>
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Cart Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 " id="exampleModalLabel">Shopping cart</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div>
              <p class="mb-0">You have <span class="cart-itemNumber"> </span> items in your cart </p>
            </div>
            <div id="cart-body">
              <!-- Cart Items go here -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="location.href='/checkout.php';">Checkout</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Main block -->
    <div class="container-fluid">
      <main>
        <div class="container-xxl">
          <div class="row align-items-start">
            <div class="col" id="pastOrders">
              <h3>Your Past Orders</h3>
              <div class="container text-center">
                <div class="row row-cols-1 row-cols-md-6 g-1">
                  <!-- Past Orders go here -->

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
<script language="javascript">
//Dynamically load the products on the page.
$.ajax({
    url: "utility.php",
    type: 'GET',
    data: {
        function: "getPastOrders"
    }
}).done(function(html) {
    $("#pastOrders > .container > .row").append(html);
});



//Below only cart functionality
$.ajax({
	url: 'utility.php',
	type: 'GET',
	data: {
		function: "getTotalCartNumber"
	},
	success: function(data) {
		$('.cart-itemNumber').each(function() {
			$(this).text(data);
		});
	}
});

$(document.body).on('click', '#cart-button', function() {
    $.ajax({
        url: "utility.php",
        type: 'GET',
        data: {
            function: "getCart"
        }
    }).done(function(html) {
        $("#cart-body").html(html);
    });
});

$(document.body).on('click', '.fa-trash-alt', function() {
    var productID = $(this).data("id");
    $.ajax({
        url: "utility.php",
        type: 'POST',
        data: {
            function: "deleteProduct",
            productID: productID
        },
        success: function(html) {
            $("#cart-body").html(html);
        }
    });
    $.ajax({
        url: 'utility.php',
        type: 'GET',
        data: {
            function: "getTotalCartNumber"
        },
        success: function(data) {
            $('.cart-itemNumber').each(function() {
                $(this).text(data);
            });
        }
    });
});
	</script>
</html>

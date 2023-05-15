<?php session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
require 'mysqli_connect.php';
$Address = $_POST['address'];
$City = $_POST['city'];
$State = $_POST['state'];
$Zip = $_POST['zip'];
$Country= $_POST['country'];
$query = "INSERT INTO orders (user_id,order_date,ShipName,ShipAddress, ShipCity, ShipState, ShipZip, ShipCountry, product_price) VALUES
('{$_SESSION['user_id']}', now(),'{$_SESSION['first_name']} {$_SESSION['last_name']}', '{$Address}', '{$City}', '{$State}', '{$Zip}','{$Country}', '{$_SESSION['total_price']}')";
  try {
    mysqli_query($dbc, $query);
    echo "Success! Order Confirmed";
    $_SESSION['cart'] = array();
    $_SESSION['total_price'] = 0;
    mysqli_close($dbc);
    header('Location: /orders.php');
  } catch (Exception $e) {
    echo $e;
    mysqli_close($dbc);
  }

}

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    

    

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="checkout.css" rel="stylesheet">
  </head>
  <body class="bg-body-tertiary">
 
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://www.logolynx.com/images/logolynx/c7/c702102793667822e78ef5d7bdb7f5d8.jpeg" alt="" width="72" height="57">
      <h2>Checkout</h2>
      <p class="lead">Checkout your grocery items below and get them delivered in 2 hours.</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill"> </span>
        </h4>
        <ul class="list-group mb-3" id="cartProducts">
          <!-- Cart products go here-->
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$ <?php echo $_SESSION['total_price'];?></strong>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Shipping address</h4>
        <form class="needs-validation" novalidate method="post" action="checkout.php">
          <div class="row g-3">
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-md-3">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" name="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            
            <div class="col-md-3">
              <label for="state" class="form-label">State</label>
              <select class="form-select" id="state" name="state" required>
  <option value="">Choose...</option>
  <option>Alabama</option>
  <option>Alaska</option>
  <option>Arizona</option>
  <option>Arkansas</option>
  <option>Colorado</option>
  <option>Connecticut</option>
  <option>Delaware</option>
  <option>Florida</option>
  <option>Georgia</option>
  <option>Hawaii</option>
  <option>Idaho</option>
  <option>Illinois</option>
  <option>Indiana</option>
  <option>Iowa</option>
  <option>Kansas</option>
  <option>Kentucky</option>
  <option>Louisiana</option>
  <option>Maine</option>
  <option>Maryland</option>
  <option>Massachusetts</option>
  <option>Michigan</option>
  <option>Minnesota</option>
  <option>Mississippi</option>
  <option>Missouri</option>
  <option>Montana</option>
  <option>Nebraska</option>
  <option>Nevada</option>
  <option>New Hampshire</option>
  <option>New Jersey</option>
  <option>New Mexico</option>
  <option>New York</option>
  <option>North Carolina</option>
  <option>North Dakota</option>
  <option>Ohio</option>
  <option>Oklahoma</option>
  <option>Oregon</option>
  <option>Pennsylvania</option>
  <option>Rhode Island</option>
  <option>South Carolina</option>
  <option>South Dakota</option>
  <option>Tennessee</option>
  <option>Texas</option>
  <option>Utah</option>
  <option>Vermont</option>
  <option>Virginia</option>
  <option>Washington</option>
  <option>West Virginia</option>
  <option>Wisconsin</option>
  <option>Wyoming</option>
</select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>


            <div class="col-md-3">
              <label for="city" class="form-label">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>


            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-body-secondary">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Place your order</button>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-body-secondary text-center text-small">
    <p class="mb-1">&copy; 2023 GreenBean Grocery</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="/index.php">Main Page</a></li>
     
    </ul>
  </footer>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  </body>
  <script language="javascript">

    $.ajax({
    url: "utility.php",
    type: 'GET',
    data: {
        function: "fetchCheckoutCart"
    }
}).done(function(html) {
    $("#cartProducts").append(html);
});
$.ajax({
        url: 'utility.php',
        type: 'GET',
        data: {
            function: "getTotalCartNumber"
        },
        success: function(data) {
            $('.rounded-pill').each(function() {
                $(this).text( data);
            });
        }
    });
  </script>
</html>

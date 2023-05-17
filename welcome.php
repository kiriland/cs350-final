<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>GreenBean Grocery - Fresh and Affordable</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <!-- Custom CSS -->
  <style>
    /* Add background image to the website*/
    html,
    body {
        height: 100%;
    }
    body {
        background-image: url('https://wallpapercave.com/wp/wp3152292.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }
    main {
        margin-top: 1%;
    }
    /* Add styles for the jumbotron background */
    .jumbotron {
      background-color: DarkSlateGrey;
      background-size: cover;
      color: #fff;
      text-shadow: 2px 2px #000;
    }

    /* Add styles to images on the webpage */
    .marketing img {
        width: auto;
        height: 150px;
    }

    /*Footer*/
    footer {
        padding: 1%;
        color: #727272;
        text-align: center;
    }
    footer p:last-child {
        margin-bottom: 0;
    }


  </style>
</head>
<body>
  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="https://www.logolynx.com/images/logolynx/c7/c702102793667822e78ef5d7bdb7f5d8.jpeg" alt="Logo" width="90" class="d-inline-block align-text-top"> Online Grocery </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/login.php">Shop Online</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-md-auto">
            <button type="button" class="btn btn-outline-primary me-2" onclick='location.href="/login.php"'>Login</button>
            <button type="button" class="btn btn-primary" onclick='location.href="/register.php"'>Sign-up</button>
            
          </ul>
        </div>
      </div>
    </nav>

    <main class="container bg-light-subtle mx-auto p-2 rounded">
  <!-- Jumbotron -->
  <div class="container" style="padding-top: 12px;">
        <div class="p-5 mb-4 rounded-3 jumbotron">
            <div class="container-fluid py-5">
            <h1 class="display-3 fw-bold">Fresh and Affordable Groceries</h1>
            <p class="lead">Order online and get groceries delivered to your doorstep in just 2 hours!</p>
            <a class="btn btn-lg btn-success" href="/login.php">Shop Now</a>
            </div>
        </div>
    </div>

  <!-- Main content -->
  <div class="container">
    <h2>About GreenBean Grocery</h2>
    <p>At GreenBean Grocery, we are committed to providing our customers with the freshest and most affordable groceries. Our online store allows you to easily browse and order groceries from the comfort of your own home, and have them delivered to you in just 2 hours.</p>
    <p>We source our products from local farmers and suppliers to ensure that you get the freshest produce and highest quality products. Our prices are competitive, and we offer a wide range of products to suit your every need.</p>
  </div>

  <!-- Featurettes -->
<div class="container marketing">
  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Convenient Online Shopping</h2>
      <p class="lead">With GreenBean Grocery, you can easily browse and order groceries online from the comfort of your own home. Our website is easy to use and allows you to quickly find the products you need.</p>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" src="https://t4.ftcdn.net/jpg/03/27/67/01/360_F_327670103_x3cftYIkFEgvgB6l7djS5stZ3ccIQLLD.jpg" alt="Shopping Cart">
    </div>
  </div>
  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" src="data:image/png;base64,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" alt="Credit Card">
    </div>
    <div class="col-md-7">
      <h2 class="featurette-heading">Safe and Secure Payments</h2>
      <p class="lead">Our website uses secure payment processing to keep your personal and financial information safe. You can rest assured that your transactions are secure when you shop with GreenBean Grocery.</p>
    </div>
  </div>
  <hr class="featurette-divider">
  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Fast Delivery</h2>
      <p class="lead">We know that time is of the essence when it comes to grocery shopping, which is why we offer fast and reliable delivery. With GreenBean Grocery, you can get your groceries delivered to your doorstep in just 2 hours!</p>
    </div>
    <div class="col-md-5">
      <img class="featurette-image img-fluid mx-auto" src="https://media.istockphoto.com/id/1305082823/vector/fast-delivery-truck-icon-fast-shipping-design-for-website-and-mobile-apps-vector-illustration.jpg?s=612x612&w=0&k=20&c=9mod1Mbprgb4xjIbtzHOjCR4-9MfcuckkQ4IGL1XYg4=" alt="Delivery">
    </div>
  </div>
  <hr class="featurette-divider">
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; GreenBean Grocery 2023. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
</main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
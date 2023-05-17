<?php 
function fetchProducts($query){
    require 'mysqli_connect.php';
    $result = mysqli_query($dbc, $query);
    $html = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $id = htmlspecialchars($row['product_id']);
        $title = htmlspecialchars($row['product_title']);
        $img = htmlspecialchars($row['product_img']);
        $description = htmlspecialchars($row['product_description']);
        $price = htmlspecialchars($row['product_price']);
        
        // Generate HTML output using the data from the current row
        $html .= '<div class="col">';
        $html .= '<div class="card h-100">';
        $html .= '<img src="' . $img . '" class="card-img-top product-image-med" alt="' . $title . '">';
        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">' . $title . '</h5>';
        $html .= '<p class="card-text">' . $description . '</p>';
        $html .= '<p class="card-text"><small class="text-body-secondary">' .$price. '</small></p>';
        $html .= '</div>';
        $html .= '<div class="card-footer bg-light-subtle"><button type="button" class="btn btn-primary btn-sm" id="' . $id . '">Add to cart</button></div>';
        $html .= '</div></div>';
    }
    mysqli_close($dbc);
    return $html;
}
function fetchCartItems($cart){
    require 'mysqli_connect.php';
    $totalPrice = 0;
    $html = '';
    foreach( $cart as $item => $quantity ){ 
        $query = 'SELECT product_title, product_img,product_price,product_id FROM products  WHERE product_id ='. $item;
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);
        $img = htmlspecialchars($row['product_img']);
        $title = htmlspecialchars($row['product_title']);
        $price = htmlspecialchars($row['product_price']);
        $id = htmlspecialchars($row['product_id']);
        $totalPrice += $price * $quantity;
        $html .= ' <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div class="d-flex flex-row align-items-center">
              <div>';
        $html .= '<img src="' . $img . '" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">';
        $html .= '</div>
        <div class="ms-3">
          <h5>' . $title;
        $html .= '</h5>
        </div>
      </div>
      <div class="d-flex flex-row align-items-center">
        <div style="width: 50px;">
          <h5 class="fw-normal mb-0">';
        $html .= $quantity . '</h5>
        </div>
        <div style="width: 80px;">
          <h5 class="mb-0">$';
        $html .= $price * $quantity  . '</h5>
        </div>
        <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt" data-id="'. $id .'"></i></a>
      </div>
    </div>
  </div>
</div>';
    }
    $html .= '<p class="fs-4">Total: <span class="text-end">$'. $totalPrice .'</span></p>';
    $_SESSION['total_price'] = $totalPrice;
    mysqli_close($dbc);
    return $html;
}

function fetchCheckoutCart ($cart){
  require 'mysqli_connect.php';
  $html = '';
  foreach( $cart as $item => $quantity ){ 
      $query = 'SELECT product_title, product_description,product_price,product_id FROM products  WHERE product_id ='. $item;
      $result = mysqli_query($dbc, $query);
      $row = mysqli_fetch_assoc($result);
      $title = htmlspecialchars($row['product_title']);
      $price = htmlspecialchars($row['product_price']);
      $description = htmlspecialchars($row['product_description']);
      $totalPrice = $price * $quantity;
      $html .= "<li class='list-group-item d-flex justify-content-between lh-sm'>
      <div>
      <h6 class='my-0'>{$title}</h6>
      <small class='text-body-secondary '>{$description}    <span class='text-end fw-bold'>Qty: {$quantity}</span></small>
      </div>
      <span class='text-body-secondary'>{$totalPrice}</span>
      </li>";
  }
  mysqli_close($dbc);
  return $html;
}

function getPastOrders ($user_id){
  require 'mysqli_connect.php';
  $query = "SELECT order_id,order_date, product_price FROM orders WHERE user_id = $user_id";
  $result = mysqli_query($dbc, $query);
  $html = '';
  while ($row = mysqli_fetch_assoc($result)) {
      $order_id = htmlspecialchars($row['order_id']);
      $order_date = htmlspecialchars($row['order_date']);
      $product_price = htmlspecialchars($row['product_price']);

      // Generate HTML output using the data from the current row
      $html .= "<div class='col'>
      <div class='card'>
        <div class='card-body'>
          <h5 class='card-title'>Order ID: {$order_id}</h5>
          <h6 class='card-subtitle mb-2 text-muted'>Order Date: {$order_date}</h6>
          <p class='card-text'>Order Total: \${$product_price}</p>
        </div>
      </div>
    </div>";
  }
  mysqli_close($dbc);
  return $html;
}

session_start();
if ($_SESSION['user_id'] && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['function'] === 'addToCart' ) {
        $product_id = $_POST['productID'];
        $totalItems = 0;
        if (array_key_exists($product_id, $_SESSION['cart'])) { // add to cart array
            $_SESSION['cart'][$product_id] += 1;
        }else {
            $_SESSION['cart'][$product_id] = 1;
        }
    }
    if ($_POST['function'] === 'deleteProduct') {
        $product_id = $_POST['productID'];
        unset($_SESSION['cart'][$product_id]);
        echo fetchCartItems($_SESSION['cart']);
    }
}elseif ($_SESSION['user_id'] && $_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['function'] === 'getProduce') {
        $query = "SELECT product_id,product_title, product_img, product_description, product_price FROM products  WHERE product_category = 'Produce'";
        echo fetchProducts($query);
    }
    if ($_GET['function'] === 'getBakery') {
        $query = "SELECT product_id,product_title, product_img, product_description, product_price FROM products  WHERE product_category = 'Bakery'";
        echo fetchProducts($query);
    }
    if ($_GET['function'] === 'getBeverages') {
      $query = "SELECT product_id,product_title, product_img, product_description, product_price FROM products  WHERE product_category = 'Beverages'";
      echo fetchProducts($query);
    }
    if ($_GET['function'] === 'getMeats') {
      $query = "SELECT product_id,product_title, product_img, product_description, product_price FROM products  WHERE product_category = 'Meats'";
      echo fetchProducts($query);
    }
    if ($_GET['function'] === 'getCart') {
        echo fetchCartItems($_SESSION['cart']);
    }
    if ($_GET['function'] === 'getTotalCartNumber') {
        $totalItems = 0;
        foreach( $_SESSION['cart'] as $item => $countOfItem ){ //count total items in the cart
            $totalItems += $countOfItem;
        }
        echo $totalItems ; 
    }
    if ($_GET['function'] === 'fetchCheckoutCart' ) {
      echo fetchCheckoutCart($_SESSION['cart']);
  }
    if ($_GET['function'] === 'getPastOrders' ) {
      echo getPastOrders($_SESSION['user_id']);
  }
}
?>
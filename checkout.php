<?php 
session_start();
if ($_SESSION['user_id'] && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['function'] === 'addToCart' ) {
        array_push($_SESSION['cart'],$_POST['itemId']);
        echo count($_SESSION['cart']) ;
    }
}elseif ($_SESSION['user_id'] && $_SERVER['REQUEST_METHOD'] === 'GET') {
    if ($_GET['function'] === 'getProducts') {
        require 'mysqli_connect.php';
        $query = 'SELECT product_id,product_title, product_img, product_description, product_price FROM products';
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
            $html .= '<div class="card h-100" id="' . $id . '">';
            $html .= '<img src="' . $img . '" class="card-img-top product-image-med" alt="' . $title . '">';
            $html .= '<div class="card-body">';
            $html .= '<h5 class="card-title">' . $title . '</h5>';
            $html .= '<p class="card-text">' . $description . '</p>';
            $html .= '<p class="card-text"><small class="text-body-secondary">' .$price. '</small></p>';
            $html .= '</div>';
            $html .= '<div class="card-footer bg-light-subtle"><button type="button" class="btn btn-primary btn-sm">Add to cart</button></div>';
            $html .= '</div></div>';
        }
        mysqli_close($dbc);
        echo $html;
    }
}
?>
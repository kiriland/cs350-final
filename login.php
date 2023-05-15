<?php 
session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'mysqli_connect.php';
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $query = "SELECT user_id,username,first_name,last_name,email FROM users WHERE username = '{$Username}' and pass = SHA1('{$Password}')";
    $result = mysqli_query($dbc, $query);
    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            echo "Successfuly Logged In {$Username}!";
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['cart'] = array();
            $_SESSION['total_price'] = 0;
            header('Location: /index.php');
            mysqli_close($dbc);
            die;
        }else {
            echo "Wrong username or password! Try again";
        }
    } 
    else {
        echo "Error: " . $query . "<br>" . mysqli_error($dbc);
      }
    mysqli_close($dbc);

if(isset($_SESSION['user_id'])){ //check if already logged in successfully
    header('Location: /index.php');
    die;
    }
}
?>
<html>
 <head>
   <title>LOGIN PAGE</title>
<style>
    * {
    padding: 0;
    margin: 0;
}
    body {
    font-family: Arial, sans-serif;
    background-color: lightblue;
    text-align: center;
  }
input{
    width: 10%;
    padding: 10px;
}
  .container{
    width: 350px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    position: absolute;
    
}
.container h1 {
    font-size: 40px;
    text-align: center;
    text-transform: uppercase;
    margin: 40px 0;
}
.container p {
    font-size: 20px;
    margin: 15px 0;
}
.container input {
    font-size: 16px;
    width: 100%;
    padding: 15px 10px ;
    border: 0;
    outline: none;
    border-radius: 5px;
}
.container .button{
    margin-top:5%;
    background-color: green;
    color: white;
}
</style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <p>User Name</p>
            <input type="text" name="Username" placeholder="Enter your Username">
            <p>Password</p>
            <input type="Password" name="Password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
            <div class="pass">Forgot Password?</div>
            <input type="submit" class="button" value="Sign In">
            <p>Not a member? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
</body>
</head>
</html>
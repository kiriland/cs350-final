<?php 
session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $_SESSION['user_login'] = $_POST['Username']; 
    require 'mysqli_connect.php';
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $sql = "SELECT user_id FROM user WHERE username = '{$Username}' and pass = '{$Password}'";
    if (mysqli_query($dbc, $sql)) {
        echo "Successfuly Logged In {$Username}!";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
      }
      mysqli_close($dbc);
      

    $_SESSION['user_login'] = $_POST['Username'];
    $_SESSION['cart'] = array();


if(isset($_SESSION['user_login'])){ //check if logged in successfully
    //redirect to main page
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    }else{
    // Not logged in :(
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
            <input type="text" name="Username" placeholder="Email">
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
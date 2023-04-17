<?php session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_login'] = $_POST['InputEmail'];

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
  .container{
    width: 80%;
    max-width: 600px;
    background-color: white;
    border-radius: 8px;
    padding: 20px;
     
  }

</style>
</head>
<body style="background-color: lightblue">
<div class="container">
<form action="login.php" method="post">
  <div class="mb-3">
    <label for="InputEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="InputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" id="InputPassword" name= "InputPassword"> 
  </div>
  <button type="submit" class="btn btn-primary">Log In</button>
  <button type="" class="btn btn-primary">Register</button>
  
</form>
</div>
</body>
</html>
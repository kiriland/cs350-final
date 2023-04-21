<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require 'mysqli_connect.php'; //This opens a connection to the database and creates a $dbc variable that we can later use to perform database queries on.
  $Username = $_POST['username'];
  $Pass = $_POST['password'];
  $FName = $_POST['firstname'];
  $LName = $_POST['lastname'];
  $Email = $_POST['email'];
  $query = "INSERT INTO users (username, pass, first_name, last_name, email) VALUES 
  ('{$Username}', SHA1('{$Pass}'), '{$FName}', '{$LName}', '{$Email}')";
  if (mysqli_query($dbc, $query)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
  }
  mysqli_close($dbc);
}

?>

<html>
 <head>
   <title>REGISTER PAGE</title>
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
      
		<h1>Create account</h1>
      <form method="post" action="register.php">
        <?php echo $LName;?>
        <label for="firstname"><p>First Name</p></label>
        <input type="text" name="firstname" placeholder="Enter your first name">
        <label for="lastname"><p>Last Name</p></label>
        <input type="text" name="lastname" placeholder="Enter your last name">
        <label for="email"><p>Email</p></label>
        <input type="email" name="email" placeholder="Enter your email">
        <label for="username"><p>Username</p></label>
        <input type="text" name="username" placeholder="Enter your username">
        <label for="password"><p>Password</p></label>
        <input type="password" name="password" placeholder="Enter your password">
        <label for="password"><p>Re-enter Password</p></label>
        <input type="password" placeholder="Re-enter password">
        <input type="submit" class="button" value="Register">
        <p>Already have an account? <a href="login.php">Sign In Here</a></p>
      </form>
    </div>
  
 </body>
</html>

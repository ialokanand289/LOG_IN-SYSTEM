<?php
$login=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql= "SELECT  * from user where username='$username' AND password='$password'";

    echo $sql;
    $result= mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if ($num==1){ 
      $login=true;
      session_start();
      $_SESSION['loggedin']= true;
      $_SESSION['username']= $username;
      header("location:welcome.php");   
    }
    
    else{
        $showError="Invalid Credentials";
    }
}
?>
<!doctype html> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> You are logged in. 
      </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong> Warning!</strong>' .$showError.'
        </div>';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
  <div class="container my-4">
    <h1 class="text-center"> Log In to our Website </h1>
    <form action="/LOG_IN SYSTEM/login.php" method="post" class="was-validated">
    <div class="mb-3 mt-3 col-md-5"> 
      <label for="username" class="form-label">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="mb-3 mt-3 col-md-5">
      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
  <button type="submit" class="btn btn-primary mt-3 col-md-5">Log In</button>
  </form>
    

  </div>
</html>
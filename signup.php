<?php
$showAlert=false;
$showError=false;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    //$exists=false;

    //check whether the user name exist
    $existSql="select * from user where username='$username'";
    $result= mysqli_query($conn,$existSql);
    $numExistRows= mysqli_num_rows($result);
    if($numExistRows>0){
      $showError=" username Already Exists.";
    } 
    else{
        if(($password==$cpassword)){
          $sql="INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
          $result= mysqli_query($conn,$sql);
          
    }
    else{
        $showError="Password do not match";
    }
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Your account is now created and you can login. 
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
    <h1 class="text-center"> Sign Up to our Website </h1>
    <form action="/LOG_IN SYSTEM/signup.php" method="post" class="was-validated">
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
    <div class="mb-3 mt-3 col-md-5">
      <label for="cpassword" class="form-label">Confirm Password:</label>
      <input type="password" class="form-control" id="cpassword" placeholder="Enter password" name="cpassword" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Make sure to type the same password. </div>
    </div>
  <button type="submit" class="btn btn-primary mt-3 col-md-5">Sign Up</button>
  </form>
    

  </div>
</html>
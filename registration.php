<?php
// $showAlert=false;
// $showError=false;
include 'partials/_dbconnect.php';

if(isset($_POST['action']) && $_POST['action']=='register'){
    // echo '<pre>';
    // print_r($_POST);
    // exit;
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    //$exists=false;

    //check whether the user name exist
    // $existSql="select * from user where username='$username'";
    // $result= mysqli_query($conn,$existSql);
    // $numExistRows= mysqli_num_rows($result);
    // if($numExistRows>0){
    //   echo "username Already Exists.";
    // } 
    // else{
        if(($password==$cpassword)){
          $sql="INSERT INTO `user` (`username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
          $res= mysqli_query($conn,$sql);
          
}
}
// }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
  <div class="container my-4">
    <h1 class="text-center"> Sign Up to our Website </h1>
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
  <button type="button" id="register-btn" class="btn btn-primary mt-3 col-md-5">Sign Up</button>
    

  </div>
  </html>
  <script>
    $(document).ready(function(){
        $('#register-btn').click(function(e){
            // alert('click');
            e.preventDefault();
            var name = $("#username").val();
            var password = $("#password").val();
            var cpassword = $("#cpassword").val();
            //mydata={name:username , password:password , cpassword:cpassword};
            var error=0;
            if(name==""){
                alert('please fill your firstname');
                error++;
            }
            if(password==""){
                alert('please fill your password');
                error++;
            }
            if(cpassword==""){
                alert('please fill your cpassword');
                error++;
            }
            if(cpassword != password){
                alert('password is not matching');
                error++
            }
            if(error==0){    
                $.ajax({
                    url: "login.php",
                    type: 'POST',
                    data:{
                        action: 'register',
                        username: name,
                        password: password,
                        cpassword: cpassword,
                    },
                    success: function(data){
                        alert('You are registered');
                    },
                    error: function(){
                        alert('Error');
                }
              });
            };
        });
    });

</script>


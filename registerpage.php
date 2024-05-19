<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    /* Custom styles */
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
     
    }
    .form-group {
      margin-bottom: 20px;
    }
    .error{
      font-size:10px;
      color:red;
    }
    .message-box{
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      text-align:center;
    }
    .header{
      text-align:center;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="message-box"  ><h6  id="success-message"></h6></div>
  <div class="form-container">
    <h2 class="header" justify_content="center">Registration Form</h2>
    <form method="post">
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter First Name">
        <p class="error" id="error-message"></p>

      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name">
        <p class="error" id="error-message-lastName"></p>
      </div>
      
      <div class="form-group">
        <label for="phoneNumber">Phone Number</label>
        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number">
        <p class="error" id="error-message-phoneNumber"></p>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address"></textarea>
        <p class="error" id="error-message"></p>
      </div>
      <div class="form-group">
        <label for="profession">Profession</label>
        <input type="text" class="form-control" id="profession" name="profession" placeholder="Enter Profession">
        <p class="error" id="error-message"></p>
      </div>
      <div class="form-group">
        <label for="hobby">Hobby</label>
        <input type="text" class="form-control" id="hobby" name="hobby" placeholder="Enter Hobby">
        <p id="error-message"></p>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        <p class="error" id="error-message-password"></p>
      </div>
      <div class="form-group">
        <label for="confirdPassword">Confirm Password</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Re-enter Password">
        <p class="error" id="error-message-confirmPassword"></p>
      </div>
      
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php

$host = 'localhost'; 
$dbname = 'new_db'; 
$username = 'root'; 
$password = '';


$conn=mysqli_connect($host,$username,$password,$dbname);

if (!$conn){
  die( "connection error: " . mysqli_connect_error());
}
// echo "connection successfull";





// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["firstName"];
    $lastName= $_POST["lastName"];
    $phoneNumber=$_POST["phoneNumber"];
    $address=$_POST["address"];
    $profession=$_POST["profession"];
    $hoby=$_POST["hobby"];
    $password=$_POST["password"];
    $confirmPassword=$_POST["confirmPassword"];

    $err_message="";

    if(empty($firstName)){

    echo "<script>";
    echo "document.getElementById('error-message').innerHTML ='This field is required'; " ;
    echo "</script>";
    }
    elseif(empty($lastName)){
      echo "<script>";
      echo "document.getElementById('error-message-lastName').innerHTML ='This field is required'; " ;
      echo "</script>";
    }
    elseif(empty($phoneNumber)){
      echo "<script>";
      echo "document.getElementById('error-message-phoneNumber').innerHTML ='This field is required'; " ;
      echo "</script>";
    }
    
    elseif(empty($password)){
      echo "<script>";
      echo "document.getElementById('error-message-password').innerHTML ='This field is required'; " ;
      echo "</script>";
    }
    elseif(empty($confirmPassword)){
      echo "<script>";
      echo "document.getElementById('error-message-confirmPassword').innerHTML ='This field is required'; " ;
      echo "</script>";
    }
    elseif($password != $confirmPassword){
      echo "<script>";
      echo "document.getElementById('error-message-confirmPassword').innerHTML ='Password did not match'; " ;
      echo "</script>";
    }
    
    
    else{
      $sql="INSERT INTO `users` ( `firstname`, `lastname`, `phonenumber`, `address`, `profession`, `hobby`, `password`) VALUES ('$firstName','$lastName','$phoneNumber' ,'$address','$profession', '$hoby','$password')";
      if(mysqli_query($conn, $sql)){
        echo "<script>";
      echo "document.getElementById('success-message').innerHTML ='Data is inserted successfully '; " ;
      echo "</script>";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    }
   
}
?>

</body>
</html>

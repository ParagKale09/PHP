<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $admin_username = $_POST["admin_username"];
    $admin_pass = $_POST["admin_pass"];
    $admin_cpass = $_POST["admin_cpass"];
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `adminlogin` WHERE admin_username = '$admin_username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Admin username Already Exists";
    }
    else{
        // $exists = false; 
        if(($admin_pass == $admin_cpass)){
            $hash = password_hash($admin_pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `adminlogin` ( `admin_username`, `admin_pass`, `admin_dt`) 
            VALUES ('$admin_username', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
}    
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>CRUD | SignUp</title>
  </head>
  <style>
     .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
    </style>
  <body>
    <?php require 'nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '.$showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
    <img src="/crud/logo.png" height="95px" alt="paris" class="center">
     <h1 class="text-center">Signup(Admin) to CRUD</h1>
     <form action="/crud/admin_signup.php" method="post">
        <div class="form-group">
            <label for="username">Admin username</label>
            <input type="text" maxlength="12" class="form-control" id="admin_username" name="admin_username" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" maxlength="23" class="form-control" id="admin_pass" name="admin_pass">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" maxlength="23" class="form-control" id="admin_cpass" name="admin_cpass">
            <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
        </div>
         
        <button type="submit" class="btn btn-primary">Admin SignUp</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
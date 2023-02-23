<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $admin_username = $_POST["admin_username"];
    $admin_pass = $_POST["admin_pass"];
    $exists=false;

    //$sql = "Select * from logininfo where username='$username' AND password='$password'";
    $sql = "Select * from adminlogin where admin_username='$admin_username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row = mysqli_fetch_assoc($result)){ 
            if(password_verify($admin_pass ,$row['admin_pass'])){
                $login = true;
                session_start();
                $_SESSION['adminloggedin'] = true;
                $_SESSION['admin_username'] = $admin_username;
                header("location: index.php");
            }
            else{
                $showError = "Invalid Creadentials";
            }
        }
        
    }
    else{
        $showError = "Invalid Creadentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD | Admin Login</title>
    <style>
     .center {
    display: block;
    margin-left: auto;
    margin-right: auto;
  }
    </style>
</head>
<body>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">

    <title>Login</title>
  </head>
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
                <strong>Error!</strong> "Password not matched"
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div> ';
            }
    ?>

    <div class="container my-4">
    <img src="/crud/logo.png" height="95px" alt="paris" class="center">
     <h1 class="text-center">Login(Admin) to CRUD</h1>
     <form action="/crud/adminlogin.php" method="post">
        <div class="form-group">
            <label for="username">Admin Username</label>
            <input type="text" class="form-control" id="admin_username" name="admin_username" aria-describedby="emailHelp">           
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="admin_pass" name="admin_pass">
        </div>       
        <button type="submit" class="btn btn-primary">Admin Login</button>
     </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
    crossorigin="anonymous"></script>`
</body>
</html>
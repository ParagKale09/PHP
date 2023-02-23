<?php 

if(isset($_SESSION['username']) && $_SESSION['loggedin']=true){
  $logedin = true;
}
else{
  $logedin = false;
}

if(isset($_SESSION['admin_username']) && $_SESSION['adminloggedin']=true){
  $adminlogedin = true;
}
else{
  $adminlogedin = false;
}

echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="#"><img src="/crud/logo.png" height="32px" alt=""></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/crud/index.php">Home</a>
      </li>';
      if(!$logedin && !$adminlogedin){
        echo '
        <li class="nav-item">
        <a class="nav-link" href="/crud/login.php">Login</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/crud/signup.php">Signup</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/crud/adminlogin.php">Admin login </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/crud/admin_signup.php">Admin Signup</a>
        </li>';
      }
      // if(!$adminlogedin){
      //   echo '<li class="nav-item">
      //   <a class="nav-link" href="/crud/adminlogin.php">Admin login </a>
      //   </li>
      //   <li class="nav-item">
      //   <a class="nav-link" href="/crud/admin_signup.php">Admin Signup</a>
      //   </li>';
      // }
      if($logedin || $adminlogedin){
        if($adminlogedin){
          echo '<li class="nav-item">
        <a class="nav-link" href="#">Registeration</a>
        </li>';
        }
        echo '<li class="nav-item">
        <a class="nav-link" href="/crud/logout.php">Logout</a>
        </li>';
      }
      echo '</ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
  </nav>';



?>
<?php session_start();
if(!isset($_SESSION["email"])&&!isset($_SESSION["pswd"]))
{
   ?><script>location.replace("index.php");</script><?php
}
include("db.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="admin.php">Admin Panel</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="jobApplication.php" name="notice">Customer</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="registerEmployee.php" name="awards">Employee</a>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="levels.php">Add level </a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="monthly_stats.php">Set holidays</a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="profile_admin.php">Check Profiles </a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="leave_request.php">Leave Request </a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="responsibility.php">Responsibilities</a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="ip_address.php">Login Stats</a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="event.php">Add Event</a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="gallery.php">Gallery</a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="policiesAdmin.php">HR-Policies</a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="recognition.php">Recognition</a></li>
      </li>
      <li class="nav-item">
        <li><a class="nav-link" href="daily_checkin.php">Set Daily checkin</a></li>
      </li>
      

  </ul>
  <ul class="navbar-nav ml-auto">
    
    
      <li class="nav-item">
        <a class="nav-link" href="logout.php" name="logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>

</body>
</html>
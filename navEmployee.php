<?php session_start();
if(!isset($_SESSION["Eemail"])&&!isset($_SESSION["Epswd"]))
{
    ?><script>location.replace("loginEmployee.php");</script><?php
}

include("db.php");
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    .bs-example{
        margin: 20px;
    }
</style>
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a href="employee.php" class="navbar-brand">Home</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="profile.php" class="nav-item nav-link">iBrigade-Profile</a>
                <a href="assessments.php" class="nav-item nav-link">My Assessments</a>
                <a href="salaryEmployee.php" class="nav-item nav-link">Salary and Benefits</a>
                
                <a href="hrpolicies.php" class="nav-item nav-link">HR Policies</a>
                <a href="keyBrigades.php" class="nav-item nav-link">Key-Brigades</a>
               
            </div>
            <div class="navbar-nav ml-auto">
                
                <a href="logoutEmp.php" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>
</body>
</html>
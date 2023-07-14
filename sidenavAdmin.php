<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 

.sidenav {
font-family: "Lato", sans-serif;
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #343a40;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="assessmentsAdmin.php">Assessments</a>
  <a href="concernAdmin.php">Concerns</a>
  <a href="salaryAdmin.php">Salary and Benefits</a>
  <a href="policiesAdmin.php">Company Policies</a>
  <a href="noticeAdmin.php">Notice</a>
  <a href="awardsAdmin.php">Award</a>
  <a href="leaveAdmin.php">Leave Application</a>
  <a href="addTeamName.php">Add Team Name</a>
  <a href="dailyCheckinCheckout.php">View Check-In Check-Out</a>
  <a href="hrPolicies.php">HR Policies</a>
  <a href="deleteEmp.php">Delete Employee</a>
  <a href="update.php">Update Employee</a>
  
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
</body>
</html> 

<?php
session_start();
include("navEmployee.php");
$email=$_SESSION["Eemail"];
$id="";
$searchquery = "SELECT * FROM employee where email='$email'";
$result = mysqli_query($conn, $searchquery);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    if ($row = mysqli_fetch_assoc($result)) {
        $id=$row["id"];
  
    }
}
?> 
 
 
 
 
 <html>
<head>
    <title>Complains</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
 
    @import url('https://fonts.googleapis.com/css?family=Numans');



</style>
</head>
<body>
    <div class="container">
<br>

<h2 >Complains Received</h2><br>

<table class="table table-bordered">
  <tr>
    <th>Details</th>
    <th>On Date</th>
    
    
  </tr>
 
    <?php

$sql = "SELECT * FROM complains WHERE emp_id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["details"]. "</td><td>"
. $row["date"]. "</td></tr>" ;

}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
  
 
</table>
</div>
</body>
</html>
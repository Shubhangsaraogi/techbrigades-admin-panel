<?php
include("navAdmin.php");
include("sidenavAdmin.php");
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
@$delid=@$_GET["delid"];
  if(isset($delid))
  {
    $deletequery = "DELETE FROM employee WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("deleteEmployee.php?msg=Deleted Successfully");</script><?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
     $deletequery = "DELETE FROM leave_employee WHERE emp_id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
     $deletequery = "DELETE FROM leave_record WHERE emp_id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
      $deletequery = "DELETE FROM salary WHERE emp_id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("deleteEmployee.php?msg=Deleted Successfully");</script><?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit/Delete Employee</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style="background: #D7D7D8">
    
<div class="container-fluid">
       <br>
       <h1  align="center" style="font-family: 'Gelasio', serif;">Edit/Delete Employee</h1>
        <?php
        $cnt="";
        $showquery = "SELECT Count(*) as cnt FROM employee";
    $result = mysqli_query($conn, $showquery);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row 
    if ($row = mysqli_fetch_assoc($result)) {
        $cnt=$row["cnt"];
    }
}
    ?>
        <h5  align="center" style="font-family: 'Gelasio', serif;">Number of employees: <?php echo $cnt;?></h5>
<?php
  $showquery = "SELECT * FROM employee order by fname";
  $result = mysqli_query($conn, $showquery);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
  ?><br>
      <table class="table table-bordered table-responsive" >
          <tr>
              <td><h5>Picture:</h5></td>
              <td><h5>Name:</h5></td>
              <td><h5>Mobile:</h5></td>
              <td><h5>Email:</h5></td>
              <td><h5>Mailing Address:</h5></td>
              <td><h5>Designation</h5></td>
              <td><h5>Hiring Date</h5></td>
              <td><h5>Office Address</h5></td>
              <td><h5>Team names</h5></td>
              <td><h5>Reporting manager</h5></td>
              <td colspan="2"><h5>Action</h5></td>
              
          </tr>
      
      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>

      
              <tr>
                 <td><img src="<?php echo $row["img"]; ?>" height="75px" width="75px"></td> 
                  <td><?php echo $row["fname"]." ".$row["lname"]; ?></td>
                  <td><?php echo $row["mobile"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["mailing_address"]; ?></td>
                  <td><?php echo $row["designation"]; ?></td>
                  <td><?php echo $row["hiring_date"]; ?></td>
                  <td><?php echo $row["office_address"]; ?></td>
                  <td><?php
                  if(isset($row["team_name"])&&!empty($row["team_name"]))
                  {
                      echo $row["team_name"]; 
                  }
                  
                  if(isset($row["team_name1"])&&!empty($row["team_name1"]))
                  {
                      echo ", ".$row["team_name1"]; 
                  }
                  if(isset($row["team_name2"])&&!empty($row["team_name2"]))
                  {
                       echo ", ".$row["team_name2"];
                  }
                  ?>
                  </td>
                  <td><?php echo $row["manager"]; ?></td>
                 <td><button class="btn btn-danger"><a style="color:black;" href="editEmployee.php?editid=<?php echo $row["id"]; ?>">Edit</a></button></td>
                  <td><button class="btn btn-danger"><a style="color:black;" href="deleteEmployee.php?delid=<?php echo $row["id"]; ?>">Delete</a></button></td>
              </tr>
          
  <?php
      }
  } else {
      echo "0 results";    
  }

  mysqli_close($conn);
?>
      </table>
      <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
         <form action="registerEmployee.php" method="POST">
                
                 <button class="btn btn-dark" type="submit">Add Employee</button>
                 
                </form>
        </div>
        </div>
        <br><br>
        
</body>
</html>
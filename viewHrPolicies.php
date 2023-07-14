<?php
//session_start();
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
    $deletequery = "DELETE FROM hr_policies WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("viewHrPolicies.php?msg=Deleted Successfully");</script><?php
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
    <title>Policy</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
    
 
      
    
    
    
    
    
    
</head>
<body style="background: #D7D7D8">
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">HR Policies</h1>
   
<?php
  $showquery = "SELECT * FROM hr_policies";
  $result = mysqli_query($conn, $showquery);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
  ?><br>
      <table class="table table-bordered" >
          <tr>
              <td>
                  <h5>Policy</h5>
              </td>
              <td colspan="2">
                  <h5>Action</h5>
              </td>
              
          </tr>
      
      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>

      
              <tr>
                  <td><?php echo $row["policy"]; ?></td>
                  <td><button class="btn btn-info"><a style="color:black;" href="editHrPolicies.php?editid=<?php echo $row["id"]; ?>">Edit</a></td></button>
                  <td><button class="btn btn-danger"><a style="color:black;" href="viewHrPolicies.php?delid=<?php echo $row["id"]; ?>">Delete</a></td></button>
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
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
         <form action="hrPolicies.php" method="POST">
                
                 <input type="submit" name="submit" id="submit" class="btn btn-dark" value="Add Policies" />
                 
                </form>
        </div>
        </div>
</body>
</html>
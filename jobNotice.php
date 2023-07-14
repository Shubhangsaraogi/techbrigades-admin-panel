<?php
include("navAdmin.php");
include("sidenavCustomer.php"); 
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
@$delid=@$_GET["delid"];
  if(isset($delid))
  {
    $deletequery = "DELETE FROM job_notice WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("jobNotice.php?msg=Deleted Successfully");</script><?php
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
    <title>JOB Notice</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style=" background:   #D7D7D8">
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">JOB NOTICE</h1>
   
        <form action="jobNotice.php" method="POST" >        
            <div class="row">
                <div class="col-sm-3">
            <div class="form-group">
                <label for="pwd">Date:</label>
                <input type="text" class="form-control" id="date" value="<?php echo date("Y-m-d");?>" name="date">
            </div>
            </div>
            <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                <label for="notice">Notice</label>
    <textarea class="form-control" id="notice" name="notice" rows="4" required></textarea>

                </div>
                
            </div>
            <br>
            <button type="submit" class="btn btn-dark" name="btn" value="submit">Submit</button>
            <button type="reset" class="btn btn-dark" name="btn" value="cancel">Cancel</button>
        </form>
    <br>
        
<?php
if(isset($_POST["date"])&&isset($_POST["notice"]))
{
$date=$_POST["date"];
$notice=mysqli_real_escape_string($conn,@$_POST['notice']);
$btn=$_POST["btn"];
if($btn=="submit")
{
   
    
    $insertquery = "INSERT INTO job_notice(notice,date) VALUES('$notice','$date')";
           if (mysqli_query($conn, $insertquery)) {
               // echo "New record created successfully";
             ?><script>alert("successful");</script>  <?php
           } else {
               die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
           }
            
  
}
}
?>
<?php

  $showquery = "SELECT * FROM job_notice";
  $result = mysqli_query($conn, $showquery);

  if (mysqli_num_rows($result) > 0) {
      // output data of each row
  ?><br>
      <table class="table table-bordered" >
          <tr>
              <td><h5>Notice:</h5></td>
              <td><h5>Action</h5></td>
              
          </tr>
      
      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>

      
              <tr>
                  <td><?php echo $row["notice"]; ?></td>      
                  <td><button class="btn btn-danger"><a style="color:black;" href="jobNotice.php?delid=<?php echo $row["id"]; ?>">Delete</a></td></button>
              </tr>
          
  <?php
      }
  } else {
      echo "0 results";    
 

}
  mysqli_close($conn);
?>
      </table>
</div>
</body>
</html>
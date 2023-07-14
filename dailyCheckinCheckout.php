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
    $deletequery = "DELETE FROM check_in_out WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("dailyCheckinCheckout.php?msg=Deleted Successfully&&d=<?php echo $d;?>");</script><?php
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
    <title>Daily check-in check-out</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<style>
body
{
   
 background:  #D7D7D8
}

</style>
<body>
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">Check Daily Check-in Check-out of Employees</h1>
   
        <form action="dailyCheckinCheckout.php" method="POST" >        
            <div class="row">
                <div class="col-sm-3">
            <div class="form-group">
                <label for="pwd">Date:</label>
                <input type="month" class="form-control" id="date" value="" name="date">
                
            </div>
            </div>
            
            <div class="col-sm-9"></div>
            </div>
            <br>
            <button type="submit" class="btn btn-dark" name="btn" value="submit">Submit</button>
            <button type="reset" class="btn btn-dark" name="btn" value="cancel">Cancel</button>
        </form>
    <br>
       
<?php
@$d=@$_GET["d"];
if(isset($_POST["date"]) or isset($d))
{
    if(isset($d))
    {
        $date=$d;
    }
    else
    {
        $date=$_POST["date"];
    }

@$btn=@$_POST["btn"];
if($btn=="submit" or isset($d))
{
    $searchquery = "SELECT * FROM check_in_out where date_format(date,'%Y-%m')='$date' order by emp_name";
    $result = mysqli_query($conn, $searchquery);

    if (mysqli_num_rows($result) > 0) {
        echo $date;
        ?><table class="table">
            <tr>
            <th>Employee Name</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Action</th>
            </tr>

       <?php
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            ?><tr>
                <td><?php echo $row["emp_name"];?></td>
                <td><?php echo $row["checkin"];?></td>
                <td><?php echo $row["checkout"];?></td>
                <td><button class="btn btn-danger"><a style="color:black;" href="dailyCheckinCheckout.php?delid=<?php echo $row["id"]; ?>&&d=<?php echo $date; ?>">Delete</a></td></button>
            </tr><?php
           
        
    } 
}else {
        echo "0 results";
    }
    ?></table><?php
   
}

}
?>
 
</body>

</html>
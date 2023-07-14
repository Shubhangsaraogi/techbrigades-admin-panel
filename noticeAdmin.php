<?php
include("navAdmin.php");
include("sidenavAdmin.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style=" background:  #D7D7D8">
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">NOTICE</h1>
   
        <form action="noticeAdmin.php" method="POST" >        
            <div class="row">
                <div class="col-sm-3">
            <div class="form-group">
                <label for="pwd">Date:</label>
                <input type="text" class="form-control" id="date" value="<?php echo date("Y-m-d");?>" name="date" required>
            </div>
            </div>
            <div class="col-sm-3">
            <label for="sel1">Employee</label>
            <select class="form-control" id="emp" name="emp">
            <option value="everyone"> Everyone</option>
                <?php
                
                $searchquery = "SELECT * FROM employee order by fname";
                $result = mysqli_query($conn, $searchquery);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                      
                ?>

                        <option value="<?php echo $row["id"]; ?>"> <?php echo $row["fname"]." ".$row["lname"]; ?></option>
                        
                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>

            </select>
            </div>
            <div class="col-sm-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                <label for="notice">Notice</label>
   <textarea class="form-control" rows="5" id="notice" name="notice" required></textarea>
                </div>
                
            </div>
            <br>
            <button type="submit" class="btn btn-dark" name="btn" value="submit">Submit</button>
            <button type="reset" class="btn btn-dark" name="btn" value="cancel">Cancel</button>
        </form>
    <br>
         <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="noticeHistory.php" method="POST">
        <button type="submit" class="btn btn-dark">HISTORY</button><br>
        </form>
        </div>
        </div>
<?php
if(isset($_POST["date"])&&isset($_POST["emp"])&&isset($_POST["notice"])&&!empty($_POST["notice"]))
{
$date=$_POST['date'];
$emp=$_POST['emp'];
$notice= mysqli_real_escape_string($conn,@$_POST['notice']);
if($emp=="everyone")
{
    $searchquery = "SELECT * FROM employee";
    $result = mysqli_query($conn, $searchquery);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
           $emp=$row["id"];
           $insertquery = "INSERT INTO notice(notice,emp_id,date) VALUES('$notice','$emp','$date')";
           if (mysqli_query($conn, $insertquery)) {
               // echo "New record created successfully";
           } else {
               die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
           }
    
        }
         ?><script>alert("successful");</script>  <?php
    } else {
        echo "0 results";
    }
   
}
else
{
    
    $insertquery = "INSERT INTO notice(notice,emp_id,date) VALUES('$notice','$emp','$date')";
           if (mysqli_query($conn, $insertquery)) {
               // echo "New record created successfully";
             ?><script>alert("successful");</script>  <?php
           } else {
               die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
           }
            
  
}
}
?>
</body>
</html>
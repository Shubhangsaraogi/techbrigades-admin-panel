<?php
session_start();
include("navAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complains</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">Complains</h1>
   
        <form action="complainAdmin.php" method="POST" >        
            <div class="row">
            <div class="col-sm-3">
            <label for="sel1">Employee:</label>
            <select class="form-control" id="emp" name="emp">
                <?php
                
                $searchquery = "SELECT * FROM employee";
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
                <label for="complain">Complain:</label>
    <textarea class="form-control" id="complain" name="complain" rows="4"></textarea>

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
        <form action="complainHistory.php" method="POST">
        <button type="submit" class="btn btn-dark">COMPLAIN HISTORY</button>
        </form>
        </div>
        </div>
<?php

if(isset($_POST["emp"])&&isset($_POST["complain"]))
{
   
$emp_id=$_POST["emp"];
$complain=$_POST["complain"];
$btn=$_POST["btn"];
if($btn=="submit")
{
 
           $insertquery = "INSERT INTO complains(details,emp_id) VALUES('$complain','$emp_id')";
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
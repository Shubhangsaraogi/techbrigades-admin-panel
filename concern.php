<?php
//session_start();
include("navEmployee.php");
include("sidenavEmpass.php");
$email=$_SESSION["Eemail"];
$emp_id="";
$showquery = "SELECT * FROM employee where email='$email'";
$result = mysqli_query($conn, $showquery);
if (mysqli_num_rows($result) > 0) {
    // output data of each row 
    if($row = mysqli_fetch_assoc($result)) {
        $emp_id=$row["id"];
    }
}
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Concern</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style=" background: #D7D7D8;">
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">My Concern</h1>
   
        <form action="concern.php?id=<?php echo $emp_id;?>" method="POST" >        
            <div class="row">
                <div class="col-sm-10">
                <label for="complain">Concern:</label>
    <textarea class="form-control" id="concern" name="concern" rows="4" required></textarea>

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
        <form action="concern.php?id=<?php echo $emp_id;?>" method="POST">
        <button type="submit" class="btn btn-dark" name="history">My Concern History</button>
        </form>
        </div>
        </div>
<?php
if(isset($_POST["concern"])&&!empty($_POST["concern"]))
{
   
$emp_id=$_GET["id"];
$complain=mysqli_real_escape_string($conn, @$_POST['concern']);
$btn=$_POST["btn"];
if($btn=="submit")
{
                                $name="";
                                $searchquery = "SELECT * FROM employee WHERE id='$emp_id'";
                                $result = mysqli_query($conn, $searchquery);

                                if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                 if($row2 = mysqli_fetch_assoc($result)) {
                                     $name=$row2["fname"]." ".$row2["lname"];
                                 }
                                }
 
           $insertquery = "INSERT INTO concern(details,emp_id,emp_name,forwarded) VALUES('$complain','$emp_id','$name','')";
           if (mysqli_query($conn, $insertquery)) {

               // echo "New record created successfully";
               ?><script>alert("successful");</script>  <?php
           } else {
               die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
           }
    
        }
    
}
if(isset($_POST["history"]) or isset($_POST["more"]))
{
    $id=$_GET["id"];
    if(isset($_POST["more"]))
    {
        $showquery1 = "SELECT * FROM concern WHERE emp_id='$id' order by id Desc ";
    }
    else
    {
        $showquery1 = "SELECT * FROM concern WHERE emp_id='$id' order by id Desc limit 5 ";
    }
            
            $result1 = mysqli_query($conn, $showquery1);
            if (mysqli_num_rows($result1) > 0) {
                ?>
            
        <table class="table table-bordered">
            <tr>
                <th>Concern</th>
                <th>Status</th>
                <th>Date</th>
            </tr>

            <?php
              
                 while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>


                        <tr>

                        <td><?php echo $row1["details"]; ?></td>
                            <?php if(!empty($row1["forwarded"]))
                            {
                               ?><td> <?php echo "Forwarded";?></td><?php
                            }
                            else
                            {
                                ?><td style="color:red;"> <?php echo "Yet to forward";?></td><?php
                            }
                                ?>
                            <td><?php $d=$row1["date"];
    $d=date("Y-m-d", strtotime($d));
     echo $d; ?></td>
                           

                        </tr>

                <?php
                    }
                    ?></table><?php
                    if(isset($_POST["history"]))
                    {
                        ?>
                    
                    <form action="concern.php?id=<?php echo $id;?>" method="POST">
                        <button class="btn btn-dark" type="submit" name="more">View All</button>
                    </form>
                    <?php
                    }
                }
             else
                {
                    echo "Nothing to show";
                }
   
}

?>
</body>
</html>
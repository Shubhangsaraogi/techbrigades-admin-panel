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
    $deletequery = "DELETE FROM awards WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("awardsHistory.php?msg=Deleted Successfully");</script><?php
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
    <title>Awards history</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style="background: #D7D7D8">
    
<div class="container">
       <br>
    
        <h1  align="left" style="font-family: 'Gelasio', serif;">Awards History</h1>
        <?php
            $d=0;
            $cnt=0;
            $c=0;
            
            $date=" SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM awards ORDER BY date DESC  ";
            $cnt = mysqli_query($conn, $date);
            if (mysqli_num_rows($cnt) > 0) {
                // output data of each row 
                ?>
                    
                <table class="table table-bordered">
                    <tr>
                        <th>Award Title</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                    <?php
                while ($row = mysqli_fetch_assoc($cnt)) {
                    $d=$row["date"];
                    

                    $showquery1 = "SELECT * FROM awards  WHERE  date_format(date,'%Y-%m-%d')='$d'";
                    $result1 = mysqli_query($conn, $showquery1);
                    if (mysqli_num_rows($result1) > 0) {
                      
                         while ($row1 = mysqli_fetch_assoc($result1)) {
    
                            ?>
        
        
                                <tr>
        
                                <td><?php echo $row1["award_name"]; ?></td>
                                    <td><?php echo $row1["emp_name"]; ?></td>
                                    <td><?php $d=$row1["date"];
    $d=date("Y-m-d", strtotime($d));
     echo $d; ?></td>
                                      <td><button class="btn btn-danger"><a style="color:black;" href="awardsHistory.php?delid=<?php echo $row1["id"]; ?>">Delete</a></td></button>
                                   
        
                                </tr>
        
                        <?php
                            }
                        } 
      
                       
                    }

 ?></table><?php

                }
           
            ?>
            <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="awardsAdmin.php" method="POST">
        <button type="submit" class="btn btn-dark">AWARD</button>
        </form>
        </div>
        </div>
</body>
</html>
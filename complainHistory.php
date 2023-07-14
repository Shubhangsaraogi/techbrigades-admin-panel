<?php
session_start();
include("navAdmin.php");


?> 
 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complains History</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body>
    
<div class="container">
       <br>
    
        <h1  align="left" style="font-family: 'Gelasio', serif;">Complains History</h1>
        <?php
            $d=0;
            $cnt=0;
            $c=0;
            
            $date=" SELECT DISTINCT date FROM complains ORDER BY date DESC  ";
            $cnt = mysqli_query($conn, $date);
            if (mysqli_num_rows($cnt) > 0) {
                // output data of each row 
                ?>
                    
                <table class="table table-bordered">
                    <tr>
                        <th>Complaint</th>
                        <th>Employee Name</th>
                        <th>Date</th>
                    </tr>

                    <?php
                while ($row = mysqli_fetch_assoc($cnt)) {
                    $d=$row["date"];
                    

                    $showquery1 = "SELECT * FROM complains WHERE  date='$d'";
                    $result1 = mysqli_query($conn, $showquery1);
                    if (mysqli_num_rows($result1) > 0) {
                      
                         while ($row1 = mysqli_fetch_assoc($result1)) {
    
                            ?>
        
        
                                <tr>
        
                                <td><?php echo $row1["details"]; ?></td>
                                <?php 
                                $name="";
                                $id=$row1["emp_id"];
                                $searchquery = "SELECT * FROM employee WHERE id='$id'";
                                $result = mysqli_query($conn, $searchquery);

                                if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                 if($row2 = mysqli_fetch_assoc($result)) {
                                     $name=$row2["fname"]." ".$row2["lname"];
                                 }
                                }?>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $row1["date"]; ?></td>
                                   
        
                                </tr>
        
                        <?php
                            }
                        } 
      
                        ?></table><?php
                    }



                }
           
            ?>
            <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="complainAdmin.php" method="POST">
        <button type="submit" class="btn btn-dark">Complain</button>
        </form>
        </div>
        </div>
</body>
</html>
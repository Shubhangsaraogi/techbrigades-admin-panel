<?php
//session_start();
include("navAdmin.php");
include("sidenavAdmin.php"); 
@$uid=@$_GET["uid"];
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
if(isset($uid))
{
    $sql = "UPDATE leave_record SET vacation='12',used_vacation='0',sick='6',used_sick='0',personal='4',used_personal='0',parential='7',used_parential='0',unpaid='0' WHERE emp_id='$uid'";

                                                    if (mysqli_query($conn, $sql)) {
                                                      // echo "Record updated successfully";
                                                        ?><script>
                                                       location.replace("leaveAdmin.php?msg=Reset Successfully");
                                                   </script> <?php
                                                       
                                                        
                                                    } else {
                                                        echo "Error updating record: " . mysqli_error($conn);
                                                    } 
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave applications</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style=" background:  #D7D7D8">


    <div class="container">
        <br>

        <h1 align="left" style="font-family: 'Gelasio', serif;">Employee Leave Record</h1>
        <div class="form-group">

<form action="leaveAdmin.php" method="POST">
    <div class="row">
        <div class="col-sm-2">
            <label for="sel1">
                <h3>Employee:</h3>
            </label>

            <select class="form-control" id="sel1" name="emp">

                <?php

                $searchquery = "SELECT * FROM employee";
                $result = mysqli_query($conn, $searchquery);

                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];

                ?>

                        <option value="<?php echo $id; ?>"> <?php echo $row["fname"]." ".$row["lname"]; ?></option>

                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>

            </select>
            <br>
            <button class="btn btn-dark" type="submit" name="btn" value="submit">Submit</button>
        </div>
    </div>
</form>
  </div> <br>
                <?php
                if(isset($_POST["emp"])&&!empty($_POST["emp"]))
                {
                    $empid=$_POST["emp"];
                    if($_POST["btn"]=="submit")
                    {
                $date = " SELECT * FROM leave_record where emp_id='$empid'";
                $cnt = mysqli_query($conn, $date);
                if (mysqli_num_rows($cnt) > 0) {
                    ?>
                        <table class="table table-responsive">
                            <tr>
                                <th rowspan="2">
                                    Employee Name
                                </th>
                                <th colspan="2">
                                    Vacation Leaves
                                </th>
                                <th colspan="2">
                                    Sick Leaves
                                </th>
                                <th colspan="2">
                                   Personal Leaves
                                </th>
                                <th colspan="2">
                                    Parential leaves
                                </th>
                                <th colspan="2">
                                    Unpaid leaves
                                </th>
                                <th rowspan="2">
                                    Action
                                </th>
                                

                            </tr><?php
                    // output data of each row 
                    while ($row1 = mysqli_fetch_assoc($cnt)) {
                      

                ?>

                            <tr>
                                <th>Used</th>
                                <th>Remaining</th>
                                <th>Used</th>
                                <th>Remaining</th>
                                <th>Used</th>
                                <th>Remaining</th>
                                <th>Used</th>
                                <th>Remaining</th>
                                <th>Used</th>
                                <th>Action</th>
                                
                                

                            </tr>

                            <?php
                            $showquery = "SELECT * FROM leave_record where emp_id='$empid' ";
                            $result = mysqli_query($conn, $showquery);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row 
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <tr>
                                        <td><a style="color:black;" href="viewApplication.php?id=<?php echo $empid;?>&&name=<?php echo $row["emp_name"];?>"><?php echo $row["emp_name"]; ?></td>
                                        <td><?php echo $row["used_vacation"]; ?></td>
                                        <td><?php echo $row["vacation"]; ?></td>
                                        <td><?php echo $row["used_sick"]; ?></td>
                                        <td><?php echo $row["sick"]; ?></td>
                                        <td><?php echo $row["used_personal"]; ?></td>
                                        <td><?php echo $row["personal"]; ?></td>
                                        <td><?php echo $row["used_parential"]; ?></td>
                                        <td><?php echo $row["parential"]; ?></td>
                                        <td><?php echo $row["unpaid"]; ?></td>
                                        <td><button class="btn btn-danger"><a style="color:black;" href="leaveAdmin.php?upid=<?php echo $empid;?>&&name=<?php echo $row["emp_name"];?>">Update</a></button></td>
                                        <td><button class="btn btn-danger"><a style="color:black;" href="leaveAdmin.php?uid=<?php echo $empid;?>">Reset Leaves</a></button></td>
                                        
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table><?php
                            }
                        } else {
                            echo " 0 results";
                        }
                    }
                }
                                ?>
     
     <?php
     @$upid=@$_GET["upid"];
     @$name=@$_GET["name"];
     if(isset($upid))
     {
         ?>
       <h3>Employee name: <?php echo $name;?></h3>
        <form action="leaveAdmin.php" method="POST">
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                       <div class="form-group">
                        <label for="days">Leave Type</label>
                        <input type="text" class="form-control" id="" value="unpaid" name="leavetype" readonly>
                    </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="sdate"> Start Date:</label>
                        <input type="date" placeholder="dd-mm-yyyy" class="form-control" id="sdate" value="" name="sdate" oninput="diff()">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="edate">End Date:</label>
                        <input type="date" placeholder="dd-mm-yyyy" class="form-control" id="edate" value="" name="edate" oninput="diff()">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="days">No of days:</label>
                        <input type="number" class="form-control" id="days" value="" name="days" readonly>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-10">
                    <label for="notice">Description</label>
                    <textarea class="form-control" id="reason" name="reason" rows="4"></textarea>

                </div>

            </div>
            <input type="hidden" value="<?php echo $name;?>" name="name">
            <input type="hidden" value="<?php echo $upid;?>" name="upid">
            <br>
            <button type="submit" class="btn btn-dark" name="btn" value="update">Submit</button>
            <button type="submit" class="btn btn-dark" name="btn" value="cancel"><a style="color:white" href="leaveAdmin.php">Cancel</a></button>
        </form>
         
         <?php
     }
     ?>
     <script>
        function diff() {
            var dateFirst = new Date(document.getElementById("sdate").value);
            var dateSecond = new Date(document.getElementById("edate").value);

            // time difference
            var timeDiff = Math.abs(dateSecond.getTime() - dateFirst.getTime());

            // days difference
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

            // difference
            diffDays=diffDays+1;
            document.getElementById("days").value = diffDays;
        }
    </script>
    <?php 
    if (
        isset($_POST["sdate"]) && isset($_POST["edate"]) && isset($_POST["days"]) && isset($_POST["reason"]) && isset($_POST["leavetype"])
        && !empty($_POST["sdate"]) && !empty($_POST["edate"]) && !empty($_POST["days"]) && !empty($_POST["reason"]) && !empty($_POST["leavetype"])
    ) {
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $days = mysqli_real_escape_string($conn, @$_POST['days']);
        $reason = mysqli_real_escape_string($conn, @$_POST['reason']);
        $leavetype = mysqli_real_escape_string($conn, @$_POST['leavetype']);
        $empid=$_POST["upid"];
        $empname=$_POST["name"];
        $btn = $_POST["btn"];
            if ($btn == "update") {

                                            $insertquery = "INSERT INTO leave_employee(emp_id,emp_name,from_date,to_date,no_of_days,type,reason) VALUES('$empid','$empname','$sdate','$edate','$days','$leavetype','$reason')";
                                            if (mysqli_query($conn, $insertquery)) {
                                                // echo "New record created successfully";
                               
                                                        } else {
                                                           
                                                            die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
                                                        }
                                                     $unpaid='';   
                                                  $showquery = "SELECT * FROM leave_record where emp_id='$empid'";
                            $result = mysqli_query($conn, $showquery);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row 
                                if ($row = mysqli_fetch_assoc($result)) {
                                    $unpaid=$row["unpaid"];
                                }
                            }
                            $unpaid=$unpaid+$days;
                                                        
                                                         $sql = "UPDATE leave_record SET unpaid='$unpaid' where emp_id='$empid'";

                                                    if (mysqli_query($conn, $sql)) {
                                                       echo "Record updated successfully";
                                                        ?><script>
                                                       location.replace("leaveAdmin.php?msg=Successful");
                                                   </script> <?php
                                                       
                                                        
                                                    } else {
                                                        echo "Error updating record: " . mysqli_error($conn);
                                                    }
                                                    
            }
    }
    ?>
        </div>

</body>

</html>
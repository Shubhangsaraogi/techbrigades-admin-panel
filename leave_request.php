<?php include("navAdmin.php");
include("sidenavAdmin.php");
@$msg = @$_GET["msg"];
if (isset($msg) ) {
?><script>
        alert("<?php echo $msg; ?>");
    </script> <?php
            }

                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>levels</title>
    <style>
        body {
            background: #D7D7D8;
        }
    </style>
</head>

<body>
<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
  
    
<h4>Select Employee to manage Leave count</h4>
<br>
<br>

    <select class="custom-select" id="inputGroupSelect01" name="taskOption" >
        
          <option selected>Choose...</option>
          <?php
          $level;
$showquery1 = "SELECT * FROM employee ;";

$result1 = mysqli_query($conn, $showquery1);
$level;
                    
if (mysqli_num_rows($result1) > 0) {
                        
    while ($row1 = mysqli_fetch_assoc($result1)) {
        ?>
    <option value="<?php echo $row1["id"];?>" namespace ><?php echo $row1["fname"]." ".$row1["lname"];?> </option>
    <?php
                        }
                    }
                    ?>
  </select>
  <br>
  <br>
  <h4>Select the Leave type</h4>
            <div class="col-sm-4 p-0 my-4">
                <select class="custom-select" id="type" name="type">
                    <option selected>Choose...</option>
                    <option >Sick Leave</option>
                    <option >Vacation Leave</option>
                    <option >Personal Leave</option>
                    
                </select>
            </div>
  <button type="submit" name="submit" value="" class="my-4 btn btn-secondary btn-lg" >Submit</button>
</form>
</div>


</div>
</div>

<?php
if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&isset($_POST['taskOption'])) {
            $id = $_POST['taskOption'];
            $type = $_POST['type'];
            $sql = "SELECT * from leave_emp WHERE emp_id='$id' AND type='$type';";
            if ($result1 = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result1) > 0) {
                    if ($row2 = mysqli_fetch_assoc($result1)) {
                        $id=$row2['id'];
                        ?>
                        <script>
                            location.replace("edit_leave.php?id=<?php echo $id;?>");
                            </script>
                        <?php                         
                    }
                }
                else{
                    ?>
                    <script>
                        location.replace("edit_leave.php?id=<?php echo $id;?>&type=<?php echo $type;?>");
                        </script>
                    <?php 
                }
            }
                       
        }
    }
?>


    <?php
    //     }
    // }
    // else{
    //     echo "not working";
    // }
    // }
   

            // $sql = "SELECT * from employee WHERE id='$emp_id';";
            $sql = "SELECT * from leave_emp ;";
            if ($result1 = mysqli_query($conn, $sql)) {
                $temp=0;
                
    ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Leave Type</th>
                            <th scope="col">Leave Reason</th>
                            <th scope="col">Leave Duration from</th>
                            <th scope="col">Leave Duration to</th>
                            <th scope="col">No. of Days</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        while ($row2 = mysqli_fetch_assoc($result1)) {
                        $emp_id=$row2['emp_id'];
                        $sql2 = "SELECT * from employee WHERE id='$emp_id';";
                        $result2 = mysqli_query($conn, $sql2);
                        $row1 = mysqli_fetch_assoc($result2);
                        $name = $row1['fname'] . " " . $row1['lname'];
                            $temp++;
                        ?>

                            <tr>
                                <form action="leave_request.php" method="POST">
                                    <th scope="row"><?php echo $temp; ?></th>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $row2['type']; ?></td>
                                    <td><?php echo $row2['reason']; ?></td>
                                    <td><?php echo $row2['duration_from']; ?></td>
                                    <td><?php echo $row2['duration_to']; ?></td>
                                    <?php
                                        $from=$row2['duration_from'];
                                        $time1=date_create($from);
                                        $to=$row2['duration_to'];
                                        $time2=date_create($to);
                                        $days=date_diff($time1,$time2);
                                    ?>
                                    <td><?php echo $days->format('%d days'); ?></td>
                                    <td>
                                        <?php
                                            if($row2['counter']){
                                                ?>
                                                <button type="button" class="btn btn-secondary bg-success">Approved</button>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <button type="submit" name="button_approve" value="<?php echo $row2['id']; ?>" class="btn btn-secondary">Approve</button>
                                                <?php
                                            }
                                        ?>
                                    </td>

                                    <td>
                                        <a href="edit_leave.php?id=<?php echo $row2["id"];?>" class="btn btn-primary">Edit</a>
                                    </td>

                                </form>
                            </tr>

                    </tbody>

                <?php
                        }
                ?>
                </table>
            <?php
            }
        
    

    if (isset($_POST['button_approve'])) {
        $id = $_POST['button_approve'];
        $sql = "UPDATE leave_emp SET counter='1' WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            ?>
            <script>
                location.replace("leave_request.php?msg=Request approved Successfully");
            </script>
    <?php
        }
    }
    // }
    ?>
</body>

</html>
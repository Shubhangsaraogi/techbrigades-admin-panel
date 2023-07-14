<?php
//session_start();
include("navAdmin.php");
include("sidenavAdmin.php");

@$mg=@$_GET["mg"];
if(isset($mg))
{
    ?><script>alert("<?php echo $mg;?>");</script><?php
}
@$delid=@$_GET["del"];
  if(isset($delid))
  {
    $deletequery = "DELETE FROM daily_checkin WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("checkin_history.php?mg=Deleted Successfully");</script><?php
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
    <title>History</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style="background: #D7D7D8">


    <div class="container">
        <br>

        <h1 align="left" style="font-family: 'Gelasio', serif;">HISTORY</h1>
        <div class="row">
            <div class="col-sm-8">
            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <h5>S.N.</h5>
                                    </td>
                                    <td>
                                        <h5>Employee Name</h5>
                                    </td>
                                    <td>
                                        <h5>Checkin Time</h5>
                                    </td>
                                    <td>
                                        <h5>Action</h5>
                                    </td>
                                </tr>
                <?php

                $everyone = " SELECT * FROM daily_checkin WHERE everyone='1'";
                $result = mysqli_query($conn, $everyone);
                $temp=0;
                if (mysqli_num_rows($result) > 0) {
                    while ($row0 = mysqli_fetch_assoc($result)) {
                        $time = $row0["checkin"];
                        $id=$row0['id'];
                        $temp++;
                        ?>
                            <tr>
                                <td>
                                    <?php echo $temp;?>
                                </td>
                                <td>
                                    Everyone
                                </td>
                                <td>
                                    <?php echo $time;?>
                                </td>
                                <td>
                                    <button class="btn btn-danger"><a style="color:black;" href="checkin_history.php?del=<?php echo $id; ?>">Delete</a></button>
                                </td>
                            </tr>
                        <?php
                    }
                }
                $date = " SELECT * FROM daily_checkin WHERE everyone='0'";
                $cnt = mysqli_query($conn, $date);
                if (mysqli_num_rows($cnt) > 0) {
                    while ($row = mysqli_fetch_assoc($cnt)) {
                        $time = $row["checkin"];
                        $emp_id=$row['emp_id'];
                        $id=$row['id'];
                        $temp++;

                        $notice = " SELECT * FROM employee where id='$emp_id'";
                        $cnt1 = mysqli_query($conn, $notice);
                        if (mysqli_num_rows($cnt1) > 0) {
                            if ($row2 = mysqli_fetch_assoc($cnt1)) {
                                $name=$row2['fname']." ".$row2['lname'];
                ?>

                            
                                <tr>
                                    <td>
                                        <?php echo $temp;?>
                                    </td>
                                    <td>
                                        <?php echo $name;?>
                                    </td>
                                    <td>
                                        <?php echo $time;?>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger"><a style="color:black;" href="checkin_history.php?del=<?php echo $id; ?>">Delete</a></button>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                    }
                }
                        ?>
            </div>
            
        </div>
        <div class="container m-2">

            <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <form action="daily_checkin.php" method="POST">
                        <button type="submit" class="btn btn-dark">Add Daily Checkin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
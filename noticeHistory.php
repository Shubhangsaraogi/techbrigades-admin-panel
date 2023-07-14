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
    $deletequery = "DELETE FROM notice WHERE notice='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("noticeHistory.php?mg=Deleted Successfully");</script><?php
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
                <?php

                $d = 0;
                $cnt = 0;
                $cnt1 = "";
                $c = 0;
                $n = "";
                $date = " SELECT DISTINCT date FROM notice  ORDER BY date DESC  ";
                $cnt = mysqli_query($conn, $date);
                if (mysqli_num_rows($cnt) > 0) {
                    // output data of each row 
                    while ($row = mysqli_fetch_assoc($cnt)) {
                        $d = $row["date"];



                        $notice = " SELECT DISTINCT notice FROM notice where date='$d'";
                        $cnt1 = mysqli_query($conn, $notice);
                        if (mysqli_num_rows($cnt1) > 0) {
                            // output data of each row 
                ?>

                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <h5 style="color:black;"><?php echo $d; ?></h5>
                                    </td>
                                    <td>
                                        <h5>Number of Employees<h5>
                                    </td>
                                    <td>
                                        <h5>Action<h5>
                                    </td>
                                </tr>

                                <?php
                                while ($row1 = mysqli_fetch_assoc($cnt1)) {
                                    $n = $row1["notice"];

                                ?>


                                    <tr>


                                        <td><?php echo $row1["notice"]; ?></td>
                                        <td>
                                            <?php
                                            $count = 0;
                                            $showquery1 = "SELECT * FROM notice  WHERE  notice='$n'";
                                            $result1 = mysqli_query($conn, $showquery1);
                                            if (mysqli_num_rows($result1) > 0) {

                                                while ($row2 = mysqli_fetch_assoc($result1)) {
                                                    $count = $count + 1;
                                                }
                                            }
                                            ?><a href="noticeHistory.php?msg=<?php echo $n; ?>"><?php echo $count; ?></a><?php

                                            ?></td>

                                            <td><button class="btn btn-danger"><a style="color:black;" href="noticeHistory.php?del=<?php echo $row1["notice"]; ?>">Delete</a></button></td>
                                    </tr>

                            <?php
                                }
                            }

                            ?>
                            </table><?php
                                }
                            }
                                    ?>
            </div>
            <div class="col-sm-4">
                <?php
                @$msg=@$_GET["msg"];
                if (isset($msg)) {
                    $fname = "";
                    $lname = "";
                    $emp = "";
                    $showquery1 = "SELECT * FROM notice  WHERE  notice='$msg'";
                    $result1 = mysqli_query($conn, $showquery1);
                ?><table class="table table-bordered" id="name">
                        <tr>
                            <th>
                                Names
                            </th>
                        </tr><?php
                                if (mysqli_num_rows($result1) > 0) {

                                    while ($row2 = mysqli_fetch_assoc($result1)) {
                                        $emp = $row2["emp_id"];
                                        $showquery = "SELECT * FROM employee  WHERE id='$emp'";
                                        $result = mysqli_query($conn, $showquery);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $fname = $row["fname"];
                                                $lname = $row["lname"];
                                ?><tr>
                                            <td><?php echo $fname . " " . $lname; ?></td>
                                        </tr><?php

                                            }
                                        }
                                    }
                                }
                                                ?>
                    </table><?php
                        }
                            ?>
            </div>
        </div>
<div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="noticeAdmin.php" method="POST">
        <button type="submit" class="btn btn-dark">Add Notice</button>
        </form>
        </div>
        </div>
</body>

</html>
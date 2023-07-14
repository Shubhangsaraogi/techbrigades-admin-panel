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
    $deletequery = "DELETE FROM recognition WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("recognitionHistory.php?mg=Deleted Successfully");</script><?php
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

                $date = " SELECT * FROM event_employee  ORDER BY id DESC  ";
                $cnt = mysqli_query($conn, $date);
                if (mysqli_num_rows($cnt) > 0) {
                    // output data of each row 
                    while ($row = mysqli_fetch_assoc($cnt)) {
                        $name=$row['name'];
                        $date=$row['date'];
                        $start_time=$row['start_time'];
                        $end_time=$row['end_time'];
                        $venue=$row['venue'];
                        $topic=$row['topic'];
                        $mode=$row['mode'];
                        $img=$row['img'];
                ?>

                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <h5 >Event Name</h5>
                                    </td>
                                    <td>
                                        <h5>Date<h5>
                                    </td>
                                    <td>
                                        <h5>Start Time<h5>
                                    </td>
                                    <td>
                                        <h5>End Time<h5>
                                    </td>
                                    <td>
                                        <h5>Venue<h5>
                                    </td>
                                    <td>
                                        <h5>Topic<h5>
                                    </td>
                                    <td>
                                        <h5>Mode<h5>
                                    </td>
                                    <td>
                                        <h5>Image<h5>
                                    </td>
                                </tr>

                                    <tr>
                                        <td><?php echo $row1["fname"]." ".$row1['lname']; ?></td>
                                        <td><?php echo $row["recognition"]; ?></td>
                                            <td><button class="btn btn-danger"><a style="color:black;" href="recognitionHistory.php?del=<?php echo $row["id"]; ?>">Delete</a></button></td>
                                    </tr>

                            <?php
                                }
                            }

                            ?>
                            </table><?php
                                
                            
                                    ?>
            </div>
            
<div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="recognition.php" method="POST">
        <button type="submit" class="btn btn-dark">Add Recognition</button>
        </form>
        </div>
        </div>
</body>

</html>
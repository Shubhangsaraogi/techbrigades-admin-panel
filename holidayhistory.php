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
    $deletequery = "DELETE FROM monthly_stats WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("holidayhistory.php?mg=Deleted Successfully");</script><?php
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
                $date = " SELECT DISTINCT months FROM monthly_stats  ORDER BY months DESC  ";
                $cnt = mysqli_query($conn, $date);
                if (mysqli_num_rows($cnt) > 0) {
                    // output data of each row 
                    while ($row = mysqli_fetch_assoc($cnt)) {
                        $d = $row["months"];


                        $notice = " SELECT * FROM monthly_stats where months='$d'";
                        $cnt1 = mysqli_query($conn, $notice);
                        if (mysqli_num_rows($cnt1) > 0) {
                            // output data of each row 
                ?>

                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <h5 >Month</h5>
                                    </td>
                                    <td>
                                        <h5>Number of holidays<h5>
                                    </td>
                                    <td>
                                        <h5>Holiday title<h5>
                                    </td>
                                </tr>

                                <?php
                                while ($row1 = mysqli_fetch_assoc($cnt1)) {
                                    $n = $row1["holidays"];
                                    $d=date("F", strtotime($d)); 
                                ?>


                                    <tr>


                                        <td><?php echo $d; ?></td>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo $row1["holiday_title"]; ?></td>

                                            <td><button class="btn btn-danger"><a style="color:black;" href="holidayhistory.php?del=<?php echo $row1["id"]; ?>">Delete</a></button></td>
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
            
<div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="monthly_stats.php" method="POST">
        <button type="submit" class="btn btn-dark">Add holiday</button>
        </form>
        </div>
        </div>
</body>

</html>
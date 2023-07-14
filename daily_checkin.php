<?php include("navAdmin.php");
include("sidenavAdmin.php");
@$msg = @$_GET["msg"];
if (isset($msg) && $msg == "Successful") {
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
<?php
        //  function get_client_ip() {
        //     $ipaddress = '';
        //     if (getenv('HTTP_CLIENT_IP'))
        //         $ipaddress = getenv('HTTP_CLIENT_IP');
        //     else if(getenv('HTTP_X_FORWARDED_FOR'))
        //         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        //     else if(getenv('HTTP_X_FORWARDED'))
        //         $ipaddress = getenv('HTTP_X_FORWARDED');
        //     else if(getenv('HTTP_FORWARDED_FOR'))
        //         $ipaddress = getenv('HTTP_FORWARDED_FOR');
        //     else if(getenv('HTTP_FORWARDED'))
        //        $ipaddress = getenv('HTTP_FORWARDED');
        //     else if(getenv('REMOTE_ADDR'))
        //         $ipaddress = getenv('REMOTE_ADDR');
        //     else
        //         $ipaddress = 'UNKNOWN';
        //     return $ipaddress;
        // }
        // $ip=get_client_ip();
        // $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
        // $ipInfo = json_decode($ipInfo);
        // $timezone = $ipInfo->timezone;
        // date_default_timezone_set($timezone);
        // echo $timezone;
    ?>
    <div class="container">
        <form action="daily_checkin.php" method="POST">
            <div class="row">
                
                <div class="col-sm-3">
                    <label for="sel1">Employee</label>
                    <select class="form-control" id="emp" name="emp">
                        <option value="everyone"> Everyone</option>
                <?php
                
                $searchquery = "SELECT * FROM employee order by fname";
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
            <div class="col-sm-3">
                <div class="input-group mb-3">
                    
                <div class="input-group-prepend">
                    
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="title" class="col-form-label">Enter Daily Checkin Time</label>
                        </div>
                        <div class="col-auto">
                            <input type="time" id="title" class="form-control"  name="time">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <input type="submit" name="submit" vlaue="Choose options" class=" btn btn-secondary btn-lg">
  <a href="checkin_history.php" class="btn btn-danger btn-lg m-4">History</a>

        </div>
        
    </div>
</div>
</form>

    <?php
    if(isset($_POST["time"])&&isset($_POST["emp"]))
    {
    $time=$_POST['time'];
    $id=$_POST['emp'];
    if($id=="everyone")
    {
        $check_Record_is_Present = "SELECT * FROM daily_checkin where  emp_id='0'";
        if ($result1=mysqli_query($conn, $check_Record_is_Present)) {
            if (mysqli_num_rows($result1) > 0) {
                $sql = "UPDATE daily_checkin SET checkin='$time' WHERE emp_id='0' AND everyone='1'";
                if (mysqli_query($conn, $sql)) {
                    ?>
                    <script>
                        location.replace("daily_checkin.php?msg=Successful");
                    </script>
                    <?php            
                } else {
                    die("Error: " . $sql . "<br>" . mysqli_error($conn));
                }
            }
            else
            {
                $insertquery = "INSERT INTO daily_checkin(checkin,emp_id,everyone) VALUES('$time','0','1')";
                if (mysqli_query($conn, $insertquery)) {
                    ?>
                    <script>
                        location.replace("daily_checkin.php?msg=Successful");
                    </script>
                    <?php            
                } else {
                    die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
                }
            }
        }
        
    }
    else
    {
        $check_Record_is_Present = "SELECT * FROM daily_checkin where  emp_id='$id'";
    
               if ($result1=mysqli_query($conn, $check_Record_is_Present)) {
                    if (mysqli_num_rows($result1) > 0) {
                        $sql = "UPDATE daily_checkin SET checkin='$time' WHERE emp_id='$id'";
                        if (mysqli_query($conn, $sql)) {
                            ?>
                            <script>
                                location.replace("daily_checkin.php?msg=Successful");
                            </script>
                            <?php            
                        } else {
                            die("Error: " . $sql . "<br>" . mysqli_error($conn));
                        }
                    }
                    else
                    {
                        $insertquery = "INSERT INTO daily_checkin(checkin,emp_id,everyone) VALUES('$time','$id','0')";
                        if (mysqli_query($conn, $insertquery)) {
                            ?>
                            <script>
                                location.replace("daily_checkin.php?msg=Successful");
                            </script>
                            <?php            
                        } else {
                            die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
                        }
                    }
               } else {
                   die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
               }
    }
    }
    ?>
</body>

</html>
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
    <div class="container">
        <form action="monthly_stats.php" method="POST">

            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="title" class="col-form-label">Enter the title of the holiday</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" id="title" class="form-control"  name="title">
                        </div>
                    </div>


                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="no." class="col-form-label">Enter the no. of holidays</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" id="no." class="form-control"  name="number">
                        </div>
                    </div>
                    


                    <select class="custom-select" id="inputGroupSelect01" name="month" style="margin-top: 4%;margin-left: 1%;">
                        <option selected>month</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>

            </div>

            <!-- <div class="input-group mb-3">

                <div class="input-group-prepend">
            <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="no." class="col-form-label">Duration from</label>
                        </div>
                        <div class="col-auto">
                            <input type="date" id="no." class="form-control"  name="duration_from">
                        </div>
                    </div>
                    <div class="row g-3 align-items-center m-1">
                        <div class="col-auto">
                            <label for="no." class="col-form-label">Duration To</label>
                        </div>
                        <div class="col-auto">
                            <input type="date" id="no." class="form-control"  name="duration_to">
                        </div>
                    </div>
</div>
</div> -->
           
            <input type="submit" name="submit" value="Submit" class=" btn btn-secondary btn-lg">
        </div>
        
    </div>
</div>
</form>
<div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="holidayhistory.php" method="POST">
        <button type="submit" class="btn btn-dark">HISTORY</button><br>
        </form>
        </div>
        
        </div>
    <?php
    
    if (isset($_POST['submit'])) {
        if (!empty($_POST['month']) && !empty($_POST['number'])) {
            $d = date("Y");
            $month = $_POST['month'];
            $number = $_POST['number'];
            $title = $_POST['title'];
            // $duration_from = $_POST['duration_from'];
            // $duration_to = $_POST['duration_to'];
            
            // $sun = 0;
            // $sat = 0;
            // $m = date('m');
            // $y = date('Y');  
            //     // $numdays = cal_days_in_month(CAL_GREGORIAN, $m, $y);
            // // $duration_from=date('D', $duration_from);
            // // $duration_to=date('D', $duration_to);
            // $numdays = date('d');
            // for ($i = 1; $i <= $duration_to; $i++) {
            //     if (date('N', strtotime($y . '-' . $m . '-' . $i)) == 7)
            //         $sun++;
            //     if (date('N', strtotime($y . '-' . $m . '-' . $i)) == 6)
            //         $sat++;
            // }      
            // $sun2 = 0;
            // $sat2 = 0;    
            
            // for ($i = 1; $i <= $duration_from; $i++) {
            //     if (date('N', strtotime($y . '-' . $m . '-' . $i)) == 7)
            //         $sun2++;
            //     if (date('N', strtotime($y . '-' . $m . '-' . $i)) == 6)
            //         $sat2++;
            // }         
            // $sat_final=$sat-$sat2;
            // $sun_final=$sun-$sun2;
            // $number_final=$number-($sat_final+$sun_final);   
            $sql = "INSERT INTO monthly_stats(months,holidays,holiday_title) VALUES('$d-$month-1','$number','$title')";

            if ($result1 = mysqli_query($conn, $sql)) {
    ?>
                <script>
                    location.replace("monthly_stats.php?msg=Successful");
                </script>
            <?php
            } else {
            ?>
                <script>
                    location.replace("monthly_stats.php?msg=Unsuccessful");
                </script>
    <?php
            }
        }
    }

    // }
    ?>
</body>

</html>
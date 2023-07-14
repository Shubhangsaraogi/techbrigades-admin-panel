<?php
//session_start();
include("navAdmin.php");
include("sidenavAdmin.php");
@$id = @$_GET["editid"];
$name="";
$searchquery = "SELECT * FROM employee where id='$id'";
                            $result = mysqli_query($conn, $searchquery);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                if ($row = mysqli_fetch_assoc($result)) {
                                    $name=$row["fname"]." ".$row["lname"];
                                }
                            }
                          
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edit Salary And Benefits</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style="background: #D7D7D8;"> 

    <div class="container">
        <br>
        <h1 align="center" style="font-family: 'Gelasio', serif;">Edit Salary And Benefits</h1>
        <div class="form-group">
      <?php   $searchquery = "SELECT * FROM salary where emp_id='$id'";
                            $result = mysqli_query($conn, $searchquery);

                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                if ($row = mysqli_fetch_assoc($result)) {
                                
                            ?>
            <form action="salaryEdit.php?editid=<?php echo $id;?>" method="POST">
                <div class="row">
                     <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                    <label for="">Employee Name</label>
                        <input type="text" class="form-control " name="name" value="<?php echo $name;?>" readonly>
                    </div>
                    <div class="col-sm-4"></div>
                   
                
                </div>
                <br>
                <div class="row">
                <div class="col-sm-3">
                    <label for="">Enter Base Salary</label>
                        <input type="text" class="form-control " name="basesalary" value="<?php echo $row["base_salary"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter First Festival Bonus</label>
                        <input type="text" class="form-control " name="first" value="<?php echo $row["one"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter Second Festival Bonus</label>
                        <input type="text" class="form-control " name="second" value="<?php echo $row["two"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter Yearly Bonus</label>
                        <input type="text" class="form-control " name="yearlybonus" value="<?php echo $row["yearly_bonus"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter Q1 Bonus</label>
                        <input type="text" class="form-control " name="q1" value="<?php echo $row["q1"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter Q2 Bonus</label>
                        <input type="text" class="form-control " name="q2" value="<?php echo $row["q2"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter Q3 Bonus</label>
                        <input type="text" class="form-control " name="q3" value="<?php echo $row["q3"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter Q4 Bonus</label>
                        <input type="text" class="form-control " name="q4" value="<?php echo $row["q4"];?>">
                    </div>
                    <div class="col-sm-3">
                    <label for="">Enter Provident fund</label>
                        <input type="text" class="form-control " name="pf" value="<?php echo $row["pf"];?>">
                    </div>
                    
                    
                </div>
                <br>
                <div class="row">
                <div class="col-sm-4">
                    <label for="">Enter Performance Bonus</label>
                        <input type="text" class="form-control " name="perfbonus" value="<?php echo $row["perf_bonus"];?>">
                    </div>
                    <div class="col-sm-4">
                    <label for="">Enter Medical Benefits</label>
                        <input type="text" class="form-control " name="medical" value="<?php echo $row["medical"];?>">
                    </div>
                    <div class="col-sm-4">
                    <label for="">Enter Other Benefits</label>
                        <input type="text" class="form-control " name="other" value="<?php echo $row["other"];?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                    <button class="btn btn-dark" type="submit" name="btn" value="update">Update</button>
                     <button class="btn btn-dark" name="btn" ><a style='color:white' href='salaryAdmin.php'>Cancel</a></button>
                    </div>
                </div>

            </form>
            <?php
               
            }
        }
            ?>
        </div>
      
      


        <?php
            if (isset($_POST["basesalary"])
            && isset($_POST["first"])
            && isset($_POST["second"])
            && isset($_POST["yearlybonus"]) 
            && isset($_POST["perfbonus"])
            && isset($_POST["medical"])
            && isset($_POST["other"])) {
                $bs = $_POST["basesalary"];
                $first = $_POST["first"];
                $second = $_POST["second"];
                $yearly = $_POST["yearlybonus"];
                $perf = $_POST["perfbonus"];
                $med = $_POST["medical"];
                $other = $_POST["other"];
                $btn = $_POST["btn"];
                $q1 = $_POST["q1"];
                $q2 = $_POST["q2"];
                $q3 = $_POST["q3"];
                $q4 = $_POST["q4"];
                $pf = $_POST["pf"];
                if ($btn == "update") {
                    $sql = "UPDATE salary SET base_salary='$bs', one='$first',two='$second',yearly_bonus='$yearly',
                    perf_bonus='$perf',medical='$med',other='$other',q1='$q1',q2='$q2',q3='$q3',q4='$q4',pf='$pf' WHERE emp_id='$id'";

                    if (mysqli_query($conn, $sql)) {
                        //echo "Record updated successfully";
            ?><script>
                            location.replace("salaryAdmin.php?msg=Successful");
                        </script> <?php


                                } else {
                                    echo "Error updating record: " . mysqli_error($conn);
                                }
                            }
                        }

                ?>
              
            <?php mysqli_close($conn); ?>
<br>
<br>
</body>

</html>
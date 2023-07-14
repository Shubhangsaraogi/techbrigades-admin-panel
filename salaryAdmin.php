<?php
//session_start();
include("navAdmin.php");
include("sidenavAdmin.php");
@$msg = @$_GET["msg"];
if (isset($msg)) {
?><script>
        alert("<?php echo $msg; ?>");
    </script><?php
            }

                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary And Benefits</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style="background: #D7D7D8;"> 

    <div class="">
        <br>
        <h1 align="center" style="font-family: 'Gelasio', serif;">Salary And Benefits</h1>
      



        <?php
     $showquery = "SELECT * FROM employee order by fname";
     $result = mysqli_query($conn, $showquery);

     if (mysqli_num_rows($result) > 0) {
         $emp_id="";
         ?>
         <table class="table table-responsive">
         <tr>
             <td><h5>Employee Name</h5></td>
             <td><h5>Base Salary</h5></td>
             <td><h5>First Festival Bonus</h5></td>
             <td><h5>Second Festival Bonus</h5></td>
             <td><h5>Yearly Bonus</h5></td>
             <td><h5>Q1 Bonus</h5></td>
             <td><h5>Q2 Bonus</h5></td>
             <td><h5>Q3 Bonus</h5></td>
             <td><h5>Q4 Bonus</h5></td>
             <td><h5>Provident fund</h5></td>
             <td><h5>Performance Bonus</h5></td>
             <td><h5>Medical Benefits</h5></td>
             <td><h5>Other Benefits</h5></td>
             <td><h5>Action</h5></td>
           
         </tr>
         <?php
         while ($row = mysqli_fetch_assoc($result)) {
             $emp_id=$row["id"];
                $showquery1 = "SELECT * FROM salary where emp_id='$emp_id'";
                $result1 = mysqli_query($conn, $showquery1);

                if (mysqli_num_rows($result1) > 0) {
                    // output data of each row
                        if ($row1 = mysqli_fetch_assoc($result1)) {

                        ?>


                            <tr>

                            <td><?php echo $row["fname"]." ".$row["lname"]; ?></td>
                                <td><?php echo $row1["base_salary"]; ?></td>
                                 <td><?php echo $row1["one"]; ?></td>
                                 <td><?php echo $row1["two"]; ?></td>
                                 <td><?php echo $row1["yearly_bonus"]; ?></td>
                                  <td><?php echo $row1["q1"]; ?></td>
                                  <td><?php echo $row1["q2"]; ?></td>
                                  <td><?php echo $row1["q3"]; ?></td>
                                  <td><?php echo $row1["q4"]; ?></td>
                                  <td><?php echo $row1["pf"]; ?></td>
                                <td><?php echo $row1["perf_bonus"]; ?></td>
                                <td> <?php echo $row1["medical"]; ?></td>
                                <td> <?php echo $row1["other"]; ?></td>
                                <td>
                        <button class="btn btn-danger"><a style="color:black;" href="salaryEdit.php?editid=<?php echo $row["id"];?>">Edit</a></button>
                        </td>
                                
                                
                            </tr>

                    <?php
                        }
                    }
                 }
                 } else {
                        echo "0 results";
                    }
                    ?>
                    </table>



       


            <?php mysqli_close($conn); ?>
<br>
<br>
</body>

</html>
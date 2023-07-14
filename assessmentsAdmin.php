<?php
//session_start();
include("navAdmin.php");
include("sidenavAdmin.php");
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>")</script><?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee assessments</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style="background:  #D7D7D8">


    <div class="container">
        <br>
  
      
        <br>

        <h1 align="left" style="font-family: 'Gelasio', serif;">Employee Assessments</h1>
       
        
<br>
   
        <form action="assessmentsAdmin.php" method="POST" >        
            <div class="row">
            <div class="col-sm-6">
            <label for="sel1">Employee</label>
            <select class="form-control" id="emp" name="emp">
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
            <br>
            
            </div>
            <div class="row">
                <div class="col-sm-6"><button type="submit" class="btn btn-dark" name="btn" value="submit">Submit</button></div>
                </div>
          
        </form>
  
    <?php
if(isset($_POST["emp"]))
{
$emp=$_POST["emp"];
if($_POST["btn"]=="submit")
{

    $showquery1 = "SELECT Distinct lock_date,emp_name FROM my_assessments  WHERE  emp_id='$emp' order by lock_date Desc";
    $result1 = mysqli_query($conn, $showquery1);
    if (mysqli_num_rows($result1) > 0) {
        ?><table class="table table-bordered">
            <tr>
                <th>Till(Date)</th>
                <th>Plans</th>
            </tr>
        <?php
       while ($row1 = mysqli_fetch_assoc($result1)) {
           $d=$row1["lock_date"];
           ?><tr><td><?php echo $row1["emp_name"];?></td><td><?php echo $d;?></td><td><?php
           $searchquery = "SELECT * FROM my_assessments where emp_id='$emp' and lock_date='$d' ";
           $result = mysqli_query($conn, $searchquery);
       
           if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                        echo "&bull;".$row["plan"]."<br>";
       
                       }
                       ?></td></tr><?php
                   }
          
       }
    }
    else
    {
        echo "Nothing to show!!";
    }






 
           

    
        }
    }
    ?>
    </table>
</div>
</body>
</html>
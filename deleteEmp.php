<?php include("navAdmin.php");
include("sidenavAdmin.php"); 
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script> <?php
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
        body{
            background: #D7D7D8;
        }
    </style>
</head>
<body>
    <div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

    
<h4>Select Employee to Delete</h4>
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
  <button type="submit" name="submit" value="" class=" btn btn-secondary btn-lg" >Submit</button>
 
</form>
</div>


</div>
</div>

<?php
  

if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&isset($_POST['taskOption'])) {
            $id = $_POST['taskOption'];
            $level;
            $levelQuery = "SELECT * FROM employee WHERE id='$id'";
            $result0=mysqli_query($conn, $levelQuery);
            if (mysqli_num_rows($result0) > 0) {
                    
                while ($row1 = mysqli_fetch_assoc($result0)) {
                    $level=$row1['level'];
                }
            }
            $sql = "DELETE FROM employee WHERE id='$id'";
            if($result=mysqli_query($conn, $sql))
            {
                $sql = "DELETE FROM capabilities WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM check_in_out WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM education WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM experience WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM leave_emp WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM my_assessments WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM notice WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM recognition WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM responsibility WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }
                $sql = "DELETE FROM salary WHERE emp_id='$id'";
                if(!$result=mysqli_query($conn, $sql))
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                    <?php 
                }

                $showquery1 = "DELETE FROM boss WHERE junior_id='$id'";
                if (!$result1=mysqli_query($conn, $showquery1))
                {
                    echo $conn->error1;
                }
                $showquery2 = "SELECT * FROM boss WHERE boss_id='$id'";
                $result2=mysqli_query($conn, $showquery2);
                if (mysqli_num_rows($result2) > 0) {
                    ?>
                    <script>
                        location.replace("replaceEmp.php?level=<?php echo $level;?>&id=<?php echo $id;?>");
                    </script>
                    <?php
                }
                else
                {
                    ?>
                    <script>
                        location.replace("deleteEmp.php?msg=Successfull");
                        </script>
                    <?php
                }
            }
            else
            {
                ?>
                <script>
                    location.replace("deleteEmp.php?msg=<?php echo $conn->error;?>");
                    </script>
                <?php
            }
        }
    }
      
// }
?>
</body>
</html>


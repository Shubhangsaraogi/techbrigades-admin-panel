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

    
<h4>Select Employee to Replace the Delted Employee</h4>
<br>
<br>
  
    <select class="custom-select" id="inputGroupSelect01" name="taskOption" >
        
          <option selected>Choose...</option>
          <?php
          $level;
          $id;
          if(isset($_GET['level'])&&isset($_GET['id']))
          {
              $level=$_GET['level'];
              $id=$_GET['id'];
          }
          else if(empty($_GET['level'])&&empty($_GET['id'])&&!isset($_POST['submit']))
          {
            ?>
            <script>
                location.replace("deleteEmp.php?msg=Delete an Employee first");
            </script>
            <?php
          }
$showquery1 = "SELECT * FROM employee WHERE level='$level';";

$result1 = mysqli_query($conn, $showquery1);
                    
if (mysqli_num_rows($result1) > 0) {
                        
    while ($row1 = mysqli_fetch_assoc($result1)) {
        
        ?>
    <option value="<?php echo $row1["id"];?>" namespace ><?php echo $row1["fname"]." ".$row1["lname"];?> </option>
    <?php
                        }
                    }
                    ?>
  </select>
  <button type="submit" name="submit" value="<?php echo $id;?>" class=" btn btn-secondary btn-lg" >Submit</button>
</form>
</div>


</div>
</div>

<?php
  

if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&isset($_POST['taskOption'])) {
            $newEmpid = $_POST['taskOption'];
            $id = $_POST['submit'];
            $showquery1 = "SELECT * FROM boss WHERE boss_id='$id' ";
            $result=mysqli_query($conn, $showquery1);
            if (mysqli_num_rows($result) > 0) {
                    
                while ($row1 = mysqli_fetch_assoc($result)) {
                    $junior_id=$row1['junior_id'];
                    $updateQuery = "UPDATE boss SET boss_id='$newEmpid' WHERE junior_id='$junior_id'";
                    if($result1=mysqli_query($conn, $updateQuery))
                        continue;
                    else
                    {
                    ?>
                        <script>
                            location.replace("replaceEmp.php?msg=<?php echo $result1;?>");
                        </script>
                    <?php
                    }
                }
                    ?>
                        <script>
                            location.replace("deleteEmp.php?msg=Employee Deleted successfully");
                        </script>
                    <?php
            }
            
        }
    }
      
// }
?>
</body>
</html>


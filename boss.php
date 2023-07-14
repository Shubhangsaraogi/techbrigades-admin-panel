<?php include("navAdmin.php");
include("sidenavAdmin.php"); 
@$msg=@$_GET["msg"];
if(isset($msg)&&$msg=="Successful")
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

    <div class="input-group mb-3">
  
<h4>Add boss of the employee</h4>
<br>
<br>
  
    <select class="custom-select" id="inputGroupSelect01" name="taskOption" >
        
          <option selected>Choose...</option>
          <?php
$junior_level=$_SESSION["junior_level"];
    $boss_level=$junior_level-1;
    $junior_id=$_SESSION["junior_id"];

$showquery1 = "SELECT * FROM employee where level='$boss_level';";

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
  <input type="submit" name="submit" vlaue="Choose options" class=" btn btn-secondary btn-lg" >
</form>
</div>
</div>
</div>


            <?php
  
    $junior_level=$_SESSION["junior_level"];
    $boss_level=$junior_level-1;
    $junior_id=$_SESSION["junior_id"];
    if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&isset($_POST['taskOption'])) {
            $id = $_POST['taskOption'];
            
            // echo $junior_id." ".$boss_level." ".$junior_level." ".$id;
            $showquery1 = "SELECT * FROM employee WHERE id='$id'";
            $result0=mysqli_query($conn, $showquery1);
            $row = mysqli_fetch_assoc($result0);
            $name=$row['fname']." ".$row['lname'];
           
            $sql2 = "UPDATE employee SET manager ='$name' WHERE id='$junior_id'";
            $sql = "INSERT INTO boss(boss_level,boss_id,junior_level,junior_id) VALUES('$boss_level','$id','$junior_level','$junior_id')";
            if($result2=mysqli_query($conn, $sql2)){

                if( $result1=mysqli_query($conn, $sql)){
                    ?>
                <script>
                    location.replace("levels.php?msg=Successful");
                    </script>
                <?php
            }
        }
            else{
                ?>
                <script>
                        location.replace("levels.php?msg=Unsuccessful");
                </script>
                <?php
            }
        }
    }
      
// }
?>
</body>
</html>


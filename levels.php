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
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>    " method="POST">

    <div class="input-group mb-3">
      <?php
          
              ?>

  <div class="row">

      <div class="col-sm-4 p-0" >
          <div class="form-group">
              <label for="level">Level:</label>
              <input type="text" class="form-control" id="level" placeholder="Enter level" name="level" required>
            </div>
        </div>
  
    <select class="custom-select" id="inputGroupSelect01" name="taskOption" >
        
          <option selected>Choose Employee...</option>
          <?php
$showquery1 = "SELECT * FROM employee ;";

$result1 = mysqli_query($conn, $showquery1);
                    
if (mysqli_num_rows($result1) > 0) {
                        
    while ($row1 = mysqli_fetch_assoc($result1)) {
        
        if($row1["level"]==0){
        ?>
    <option value="<?php echo $row1["id"];?>" namespace ><?php echo $row1["fname"]." ".$row1["lname"];?> </option>
    <?php
                        }
                    }
                }
                    ?>
  </select>
  <input type="submit" name="submit" vlaue="Choose options" class="my-2 btn btn-secondary btn-lg" >
</form>
</div>

</div>

</div>
</div>

<?php
            
    if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&!empty($_POST['level'])) {
            $id = $_POST['taskOption'];
            $level=$_POST['level'];
            
            $sql = "UPDATE employee SET level ='$level' WHERE id='$id'";
            if( $result1=mysqli_query($conn, $sql)){
                if($level!=1){
                    if(isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['junior_level']=$level;
                    $_SESSION["junior_id"]=$id;
                    ?>
                <script>
                        location.replace("boss.php?msg=Successful");
                </script>
                <?php
                }
                else{

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
      
?>
</body>
</html>


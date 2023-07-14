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

    
<h4>Select Employee to Update</h4>
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
  <button type="submit" name="submit" value="promote" class="my-4 btn btn-secondary btn-lg" >Promote</button>
  <button type="submit" name="submit" value="demote" class="my-4 m-3 btn btn-secondary btn-lg" >Demote</button>
 
</form>
</div>


</div>
</div>

<?php
if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&isset($_POST['taskOption'])) {
            $id = $_POST['taskOption'];
            if($id=="Choose..."){

                $id=0;
            }
            $button=$_POST['submit'];
            if($button=='promote')
            {
                ?>
                <script>
                    location.replace("promote.php?id=<?php echo $id;?>");
                    </script>
                <?php
            }
            else if($button=='demote')
            {
                ?>
                    <script>
                        location.replace("demote.php?id=<?php echo $id;?>");
                    </script>
                <?php
            }
        }
    }
?>
</body>
</html>


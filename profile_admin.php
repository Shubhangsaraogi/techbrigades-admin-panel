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

    
<h4>Select Employee to see their profile</h4>
<br>
<br>
  
    <select class="custom-select" id="inputGroupSelect01" name="taskOption" >
        
          <option selected>Choose...</option>
          <?php
$showquery1 = "SELECT * FROM employee ;";

$result1 = mysqli_query($conn, $showquery1);
                    
if (mysqli_num_rows($result1) > 0) {
                        
    while ($row1 = mysqli_fetch_assoc($result1)) {
        
        ?>
    <option value="<?php echo $row1["id"];?>" namespace ><?php echo $row1["fname"]." ".$row1["lname"];?> </option>
    <!-- <option value="2">Two</option> -->
    <!-- <option value="3">Three</option> -->
    <?php
                        }
                    }
                    ?>
  </select>
  <input type="submit" name="submit" vlaue="Choose options" class=" btn btn-secondary btn-lg" >
</form>
</div>
<!-- <button type="submit" name="button" value="submit" class=" btn btn-secondary btn-lg">Submit</button> -->


</div>
</div>

<?php
            // $id = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);
//             $id = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
//    if ($id) {
    //   $id= htmlentities($_POST['taskOption'], ENT_QUOTES, "UTF-8");
   
        // if(isset($_POST["button"])&&!empty($_POST["button"])){
            // $button=$_POST["button"];
            // echo "shubhang".$id.$level;
            // if($button=="submit"){
                // $id=$_POST["taskOption"];

                
        // $insertquery = "INSERT INTO employee(level) VALUES('$level') WHERE id='$id';";
        // $insertquery = "UPDATE employee SET level ='$level' WHERE id='$id'; ";
                
                    // $sql = "UPDATE employee SET level ='$level' WHERE id='$id'";
                    // if( $result1=mysqli_query($conn, $sql)){
                    //     while($row=mysqli_fetch_assoc($result1)){
                    //         echo $row["fname"];
            ?>
            <!-- <h1>hello</h1> -->
                    <!-- <script>
                        location.replace("admin.php?msg=Successful");
                    </script> -->
            <?php
    //     }
    // }
    // else{
    //     echo "not working";
    // }
// }
   

if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&isset($_POST['taskOption'])) {
            $id = $_POST['taskOption'];
            // $sql = "UPDATE employee SET level ='$level' WHERE id='$id'";
                    ?>
                <script>
                        location.replace("../employee-tech/profile.php?admin_id=<?php echo $id;?>");
                </script>
                <?php
        }
    }
      
// }
?>
</body>
</html>


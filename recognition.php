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
    <title>Recognition</title>
    <style>
        body {
            background: #D7D7D8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3>Choose Employee</h3>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <select class="custom-select" id="inputGroupSelect01" name="taskOption">
                <option selected>Choose...</option>
                <?php
                $showquery1 = "SELECT * FROM employee ";

                $result1 = mysqli_query($conn, $showquery1);

                if (mysqli_num_rows($result1) > 0) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                ?>
                            <option value="<?php echo $row1["id"]; ?>" namespace><?php echo $row1["fname"] . " " . $row1["lname"]; ?>   </option>
                <?php
                        
                    }
                }
                ?>
            </select>
            <button name="submit" class="btn btn-secondary btn-lg">Submit</button>
        </form>
    </div>

    <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="recognitionHistory.php" method="POST">
        <button type="submit" class="btn btn-dark">HISTORY</button><br>
        </form>
        </div>
        </div>
    </div>
    </div>

    <?php
    
    if (isset($_POST['submit'])) {
        if (!empty($_POST['taskOption'])) {
            $id = $_POST['taskOption'];
            ?>
            <script>
                    location.replace("addRecognition.php?id=<?php echo $id; ?>");
            </script>
            <?php
    }
}

    ?>
</body>

</html>
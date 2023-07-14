<?php include("navAdmin.php");
include("sidenavAdmin.php");
@$msg = @$_GET["msg"];
if (isset($msg) && $msg == "Successful") {
?><script>
        alert("<?php echo $msg; ?>");
    </script> <?php
            }

                ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsibilities</title>
    <style>
        body {
            background: #D7D7D8;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            if(!isset($_GET['id']) )
            {
                ?>
                <script>
                    location.replace("recognition.php?msg=Please Select the Employee first");
                </script>
                <?php
            }
        ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="form-group">
                    <label for="response">Add recognition</label>
                    <input type="text" name="input" class="form-control" id="response" aria-describedby="emailHelp">
                </div>
                
                <button type="submit" name="responsibility" value="<?php echo $id; ?>" class="btn btn-primary">Submit</button>
            </form>
    </div>

    <?php
    if(isset($_POST['responsibility'])){
        $id=$_POST['responsibility'];
        $input=$_POST['input'];
        $insertquery = "INSERT INTO recognition(emp_id,recognition) VALUES('$id','$input')";
        if(mysqli_query($conn, $insertquery)){
            ?>
            <script>
                    location.replace("recognition.php?msg=Successful");
            </script>
            <?php
        }
        else
        {
            ?>
            <script>
                    location.replace("recognition.php?msg=Unsuccessful");
            </script>
            <?php
        }
        
    }
 

    ?>
</body>

</html>
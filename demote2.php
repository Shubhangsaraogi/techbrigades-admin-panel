<?php include("navAdmin.php");
include("sidenavAdmin.php");
@$msg = @$_GET["msg"];
if (isset($msg)) {
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
    <title>levels</title>
    <style>
        body {
            background: #D7D7D8;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">



            <?php
            $id;
            $newlevel;
            if (isset($_GET['id'])&&isset($_GET['newlevel'])) {
                $id = $_GET['id'];
                $newlevel=$_GET['newlevel'];
            }
            else if(empty($_GET['newlevel'])&&empty($_GET['id'])&&!isset($_POST['submit']))
            {
                echo "Go back variables undefined";
            }
            $levelQuery = "SELECT * FROM employee WHERE id='$id'";
            $result0 = mysqli_query($conn, $levelQuery);
            if (mysqli_num_rows($result0) > 0) {

                if ($row0 = mysqli_fetch_assoc($result0)) {
                    $name = $row0['fname'] . " " . $row0['lname'];
                }
            }
            ?>
            <h4>Select the Boss of <?php echo $name; ?></h4>
            <div class="col-sm-4 p-0 my-4">
                <select class="custom-select" id="level" name="boss">
                    <option selected>Choose...</option>
                    <?php
                    $level=$newlevel-1;
                    $sql = "SELECT * FROM employee WHERE level='$level'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['fname']." ".$row['lname'];?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
<input type="hidden" name="newlevel" value="<?php echo $newlevel;?>">
            
            
            <button type="submit" name="submit" value="<?php echo $id;?>" class="my-4 btn btn-secondary btn-lg">Submit</button>

        </form>
    </div>


    </div>
    </div>

    <?php


    if (isset($_POST['submit'])) {
        if (!empty($_POST['boss']) && isset($_POST['boss'])) {
            $id = $_POST['submit'];
            $boss_id = $_POST['boss'];
            $newlevel=$_POST['newlevel'];
            $boss_level=$newlevel-1;
            $sql3 = "SELECT * FROM employee WHERE id='$boss_id'";
            if($result3=mysqli_query($conn, $sql3))
            {
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    $name=$row3['fname']." ".$row3['lname'];
                    $sql5 = "UPDATE employee SET manager='$name' WHERE id='$id'";
                    if(!$result5=mysqli_query($conn, $sql5))
                    {
                        ?>
                        <script>
                            location.replace("demote2.php?msg=<?php echo $conn->error;?>");
                        </script>
                        <?php 
                    }
                }
            }
            else
            {
                ?>
                <script>
                    location.replace("demote2.php?msg=<?php echo $conn->error;?>");
                </script>
                <?php                         
            }            
            $sql = "SELECT * FROM boss WHERE junior_id='$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $sql2 = "UPDATE boss SET junior_level='$newlevel',boss_id='$boss_id',boss_level='$boss_level' WHERE junior_id='$id'";
                if(!$result2=mysqli_query($conn, $sql2))
                {
                    ?>
                <script>
                    location.replace("demote2.php?msg=<?php echo $conn->error;?>");
                    </script>
                <?php 
                }   
                else
                {
                    
                    ?>
                    <script>
                        location.replace("update.php?msg=Successfully updated");
                    </script>
                    <?php                     
                }
            }   
            else
            {
                $sql2 = "INSERT INTO boss(boss_level,boss_id,junior_level,junior_id) VALUES('$boss_level','$boss_id','$newlevel','$id')";
                if(!$result2=mysqli_query($conn, $sql2))
                {
                    ?>
                <script>
                    location.replace("demote2.php?msg=<?php echo $conn->error;?>");
                    </script>
                <?php 
                }   
                else
                {
                    ?>
                    <script>
                        location.replace("update.php?msg=Successfully updated");
                    </script>
                    <?php                     
                }
            }
            
            ?>
            <script>
                location.replace("update.php?msg=Successfully updated");
            </script>
            <?php             
        }
    }

    // }
    ?>
</body>

</html>
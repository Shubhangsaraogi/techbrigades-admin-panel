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
            $level;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            else if(empty($_GET['id'])&&!isset($_POST['submit']))
            {
            ?>
                <script>
                    location.replace("update.php?msg=Select the employee first");
                </script>
            <?php
            }
            $levelQuery = "SELECT * FROM employee WHERE id='$id'";
            $result0 = mysqli_query($conn, $levelQuery);
            if (mysqli_num_rows($result0) > 0) {

                if ($row0 = mysqli_fetch_assoc($result0)) {
                    $level = $row0['level'];
                    $name = $row0['fname'] . " " . $row0['lname'];
                }
            }
            $maxlevel = "SELECT max(junior_level) As max FROM boss";
            $result3 = mysqli_query($conn, $maxlevel);
            $junior_level;
            if (mysqli_num_rows($result3) > 0) {

                if ($row3 = mysqli_fetch_assoc($result3)) {
                    $junior_level = $row3['max'];
                }
            }
            ?>
            <h4>Select the demotion level of <?php echo $name; ?></h4>
            <div class="col-sm-4 p-0 my-4">
                <select class="custom-select" id="level" name="level">
                    <option selected>Choose...</option>
                    <?php
                    $temp = $level+1;
                    while ($temp <=$junior_level+1) {
                    ?>
                        <option value="<?php echo $temp;?>">level <?php echo $temp; ?></option>
                    <?php
                        $temp++;
                    }
                    ?>
                </select>
            </div>

            <?php
            $temp=0;
            $sql = "SELECT * FROM boss WHERE boss_id='$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                ?>
                    <h4>Select boss of junior's</h4>
                    <br>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $temp++;
                    $junior_name;
                    $junior_id=$row['junior_id'];

                    $nameQuery= "SELECT * FROM employee WHERE id='$junior_id'";
                    $result1 = mysqli_query($conn, $nameQuery);

                    if (mysqli_num_rows($result1) > 0) {
                        if ($row1 = mysqli_fetch_assoc($result1)) {
                            $junior_name=$row1['fname']." ".$row1['lname'];
                        }
                    }
            ?>
                    <select class="custom-select" id="level" name="<?php echo $temp;?>">
                        <option selected>Select Boss of <?php echo $junior_name;?></option>
                        <?php
                            $bossQuery= "SELECT * FROM employee WHERE level='$level' and id!='$id'";
                            $result2 = mysqli_query($conn, $bossQuery);

                            if (mysqli_num_rows($result2) > 0) {
                                while($row2 = mysqli_fetch_assoc($result2)) {
                                    ?>
                                        <option value="<?php echo $row2['id'];?>"><?php echo $row2['fname']." ".$row2['lname'];?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
            <?php
                }
            }
            ?>
            
            <button type="submit" name="submit" value="<?php echo $id;?>" class="my-4 btn btn-secondary btn-lg">Submit</button>

        </form>
    </div>


    </div>
    </div>

    <?php


    if (isset($_POST['submit'])) {
        if (!empty($_POST['level']) && isset($_POST['level'])) {
            $id = $_POST['submit'];
            $newlevel = $_POST['level'];
            $sql = "UPDATE employee SET level='$newlevel' WHERE id='$id'";
            if(!$result=mysqli_query($conn, $sql))
            {
                ?>
                <script>
                    location.replace("demote.php?msg=<?php echo $conn->error;?>");
                </script>
                <?php 
            }
            $temp=0;
            $sql2 = "SELECT * FROM boss WHERE boss_id='$id'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                while ($row = mysqli_fetch_assoc($result2)) {
                    $temp++;
                    $junior_id=$row['junior_id'];
                    $boss_id=$_POST[$temp];
                    $sql3 = "UPDATE boss SET boss_id='$boss_id' WHERE junior_id='$junior_id'";
                    if(!$result3=mysqli_query($conn, $sql3))
                    {
                        ?>
                        <script>
                            location.replace("demote.php?msg=<?php echo $conn->error;?>");
                        </script>
                        <?php 
                    }
                    $nameQuery2="SELECT * FROM employee WHERE id='$boss_id'";
                    if($result4=mysqli_query($conn, $nameQuery2))
                    {
                        while ($row4 = mysqli_fetch_assoc($result4)) {
                            $name=$row4['fname']." ".$row4['lname'];
                            $sql5 = "UPDATE employee SET manager='$name' WHERE id='$junior_id'";
                            if(!$result5=mysqli_query($conn, $sql5))
                            {
                                ?>
                                <script>
                                    location.replace("demote.php?msg=<?php echo $conn->error;?>");
                                </script>
                                <?php 
                            }
                        }
                    }
                }
            }
            ?>
                <script>
                location.replace("demote2.php?id=<?php echo $id;?>&newlevel=<?php echo $newlevel;?>");
                </script>
            <?php             
        
        }
    }

    // }
    ?>
</body>

</html>
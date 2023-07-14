<?php include("navAdmin.php");
include("sidenavAdmin.php");
@$msg = @$_GET["msg"];
if (isset($msg) ) {
?><script>
        alert("<?php echo $msg; ?>");
    </script> <?php
            }
@$delid=@$_GET["delid"];
  if(isset($delid))
  {
    
    $deletequery = "DELETE FROM leave_emp WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("leave_request.php?msg=Deleted Successfully");</script><?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
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
    <?php
    
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            if(isset($_GET['type']))
            {
                $type=$_GET['type'];
                $sql = "SELECT * from leave_emp WHERE emp_id='$id' AND type='$type';";
            }
            else
            {
                $sql = "SELECT * from leave_emp WHERE id='$id' ;";
            }            
            if ($result1 = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result1) > 0) {
                    if ($row2 = mysqli_fetch_assoc($result1)) {
                        $duration_to=$row2['duration_to'];
                    $duration_from=$row2['duration_from'];
                    ?>
                    <div class="container">
                        <h2>Update the leave duration</h2>
                        <form action="edit_leave.php" method="POST">
                            <div class="form-group">
                                <label for="from">Duration From</label>
                                <input type="date" value="<?php echo htmlspecialchars($duration_from); ?>" class="form-control" id="from" name="duration_from">
                            </div>
                            <div class="form-group">
                                <label for="to">Duration to</label>
                                <input type="date" value="<?php echo htmlspecialchars($duration_to); ?>" class="form-control" id="to" name="duration_to" >
                            </div>
                            <button class="btn btn-danger"><a style="color:black;" href="edit_leave.php?delid=<?php echo $id;?>">Delete</a></button>
                            <button type="submit" name="button" value="<?php echo $id;?>" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                    <?php
                }
            }
            else
            {
                    ?>
                    <div class="container">
                        <h2>Set the leave </h2>
                        <form action="edit_leave.php" method="POST">
                            <div class="form-group">
                                <label for="from">Duration From</label>
                                <input type="date"  class="form-control" id="from" name="duration_from">
                            </div>
                            <div class="form-group">
                                <label for="to">Duration to</label>
                                <input type="date" class="form-control" id="to" name="duration_to" >
                            </div>
                            <div class="form-group">
                                <label for="to">Reason</label>
                                <input type="text" class="form-control" id="to" name="reason" >
                            </div>

                            <input type="hidden"  name="type" value="<?php echo $type;?>" >

                            <button type="submit" name="button" value="<?php echo $id;?>" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                    <?php
            }
        }
    }
        
    ?>
<?php
    if(isset($_POST['button'])&&isset($_POST['duration_from'])&&isset($_POST['duration_to'])){
            $id=$_POST['button'];
            $duration_from=$_POST['duration_from'];
            $duration_to=$_POST['duration_to'];
            if(isset($_POST['type'])&&!empty($_POST['type']))
            {
                $type=$_POST['type'];
                $reason=$_POST['reason'];
                $sql = "INSERT INTO leave_emp(emp_id,reason,duration_from,duration_to,counter,type) VALUES('$id','$reason','$duration_from','$duration_to','1','$type')";

            }
            else
            {
                $sql = "UPDATE leave_emp SET duration_from='$duration_from' , duration_to='$duration_to' WHERE id='$id'";
            }
            if ($result1 = mysqli_query($conn, $sql)) {
                ?>
                <script>
                        location.replace("leave_request.php?msg=Successful");
                </script>
                <?php
            }
            else {
                echo "Error updating record: " . mysqli_error($conn);
            }

        }
    
?>
            
</body>

</html>
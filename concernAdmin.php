<?php
//session_start();
include("navAdmin.php");
include("sidenavAdmin.php");
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>")</script><?php
}
@$delid=@$_GET["delid"];
if(isset($delid))
{

    $deletequery = "DELETE FROM concern WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
     $deletequery = "DELETE FROM forward_concern WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("concernAdmin.php?msg=Deleted Successfully");</script><?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Concern</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style=" background: #D7D7D8;">
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">Employee Concern</h1>
   <?php

            $showquery1 = "SELECT * FROM concern where forwarded=''";
            $result1 = mysqli_query($conn, $showquery1);
            if (mysqli_num_rows($result1) > 0) {
                ?>
            
                <table class="table table-bordered">
                    <tr>
                    <th>Employee Name</th>
                        <th>Concern</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
        
                    <?php
                 while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>


                        <tr>
                        <td><?php echo $row1["emp_name"]; ?></td>
                        <td><?php echo $row1["details"]; ?></td>
                            <td><?php $d=$row1["date"];
                            $d=date("Y-m-d", strtotime($d));
                                 echo $d; ?></td>
                            <td><button class="btn btn-danger"><a style="color:black;" href="forwardConcern.php?id=<?php echo $row1["id"];?>">Forward</button></td>
                    
                           

                        </tr>

                <?php
                    }
                }
                else
                {
                    echo "Nothing to show";
                }
                ?></table><?php
               

    
        
   


?>
<form action="concernAdmin.php" method="POST">
    <button type="submit" class="btn btn-dark" name="history">History</button>

</form>
<?php
if(isset($_POST["history"]) or isset($_POST["more"]))
{
    if(isset($_POST["more"]))
    {
        $searchquery = "SELECT * FROM concern where forwarded!='' order by id Desc";
    }
    else
    {
        $searchquery = "SELECT * FROM concern where forwarded!='' order by id Desc limit 5";
    }
    $result = mysqli_query($conn, $searchquery);

    if (mysqli_num_rows($result) > 0) {
        ?>
        <table class="table table-responsive ">
            <tr>
                <th colspan="2">Concern</th>
                <th colspan="2">Employee Name</th>
                <th rowspan="2" >Reply</th>
                <th rowspan="2">Date</th>
                <th rowspan="2">Action</th>
                
            </tr>
            <tr>
                <th>Original</th>
                <th>Forwarded</th>
                <th>From</th>
                <th>Forwarded to</th>
            </tr>
        <?php
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            $id=$row["id"];
            $showquery1 = "SELECT * FROM forward_concern where id='$id'";
            $result1 = mysqli_query($conn, $showquery1);
            if (mysqli_num_rows($result1) > 0) {
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <tr>
                    <td><?php echo $row["details"];?></td>
                    <td><?php echo $row1["concern"];?></td>
                    <td><?php echo $row["emp_name"];?></td>
                    <td><?php echo $row1["emp_name"];?></td>
                    <?php if(empty($row1["reply"]))
                    {
                        ?><td style="color:red;"><?php echo "Not Replied!";?></td><?php
                    }
                    else
                    {
                        ?><td style="color:green;"><?php echo $row1["reply"];?></td><?php
                    } ?>
                    <td><?php $d=$row["date"];
                            $d=date("Y-m-d", strtotime($d));
                                 echo $d; ?></td>
                    <td><button class="btn btn-danger"><a style="color:black;" href="concernAdmin.php?delid=<?php echo $row1["id"];?>">Delete</button></td>
                    </tr>
                    <?php
                }
            }
           
        }
        ?>
        </table>
        <?php
        if(isset($_POST["history"]))
        {
            ?><form action="concernAdmin.php" method="POST">
                <button type="submit" class="btn btn-dark" name="more">View All</button>
            </form><?php
        }
    }
}


?>
</div>
<br><br><br>
</body>
</html>
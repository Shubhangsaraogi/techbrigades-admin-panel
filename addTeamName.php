<?php
include("navAdmin.php");
include("sidenavAdmin.php");
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
@$delid=@$_GET["delid"];
  if(isset($delid))
  {
    $deletequery = "DELETE FROM team WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("addTeamName.php?msg=Deleted Successfully");</script><?php
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
    <title>Team</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style=" background:  #D7D7D8">

    <div class="container">
<div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8" align="center">
<h1>Team names</h1>
        <form action="addTeamName.php" method="post">
            <div class="form group">
            <div class="row">
           <div class="col-sm-4"> </div>
   
            <div class="col-sm-4" align="left"><label>Enter Team Name: </label><input class="form-control" type="text"  name="team" value="" size="1" ><br><button class="btn btn-dark" type="submit" name="btn" value="submit">Add team</button> </div>
            
            <div class="col-sm-4"></div>
            </div>
            </div>
            <br>
           
        </form>

        <?php
        if(isset($_POST["team"])&&!empty($_POST["team"]))
        {
            
                        $name=mysqli_real_escape_string($conn,@$_POST['team']);
                        $btn=$_POST["btn"];
                        if($btn=="submit")
                        {
                        $insertquery = "INSERT INTO team(name) VALUES('$name')";
                        if (mysqli_query($conn, $insertquery)) {
                            // echo "New record created successfully";
                            ?><script>location.replace("addTeamName.php?msg=Added Successfully")</script><?php
                        } else {
                            die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
                        }
                        }
                   
        }  
        
?><br><table class="table">
    
    <?php
        $showquery1 = "SELECT * FROM team";
        $result1 = mysqli_query($conn, $showquery1);
        if (mysqli_num_rows($result1) > 0) {
            ?><tr align="center">
       
       <th >
            Team Name
        </th>
        <th >
            Action
        </th>
    </tr><?php

             while ($row2 = mysqli_fetch_assoc($result1)) {
                     ?>
                     <tr>
                         <td align="center">
                        <?php echo $row2["name"];?>
                     </td>
                       
                    <td align="center">
                        <button class="btn btn-danger"><a style="color:black;" href="addTeamName.php?delid=<?php echo $row2["id"];?>">Delete</a></button>
                        </td></tr><?php
                                                    
                                                }
                                            }
        ?>
        </div>
            <div class="col-sm-2"></div>
            </div>
    </div>
</body>

</html>
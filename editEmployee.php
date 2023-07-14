<?php 
include("navAdmin.php");
include("sidenavAdmin.php"); 
@$editid=@$_GET["editid"];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Edit Employee</title>
</head>

<body style=" background:  #D7D7D8">


    <div class="container">
     
        <h1  align="center" style="font-family: 'Gelasio', serif;">Edit Employee</h1>
        <?php
        $showquery = "SELECT * FROM employee where id='$editid'";
    $result = mysqli_query($conn, $showquery);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row 
    while ($row = mysqli_fetch_assoc($result)) {
    
    ?>
        <form action="editEmployee.php?editid=<?php echo $editid;?>" method="POST" >
        <input type="hidden" value="<?php echo $editid;?>" name="emp_id">
        <input type="hidden" value="<?php echo $row['fname'];?>" name="fname_original">
        <input type="hidden" value="<?php echo $row['lname'];?>" name="lname_original">
               <div class="row">           
             <div class="col-sm-6" >
                    <div class="form-group">
                        <label for="usr">First name:</label>
                        <input type="text" class="form-control" id="usr" value="<?php echo $row["fname"];?>" name="fname" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="usr">Last name:</label>
                        <input type="text" class="form-control" id="usr" value="<?php echo $row["lname"];?>" name="lname" required>
                    </div>
                </div>
            </div>
             <div class="row">           
             <div class="col-sm-4" >
                    <div class="form-group">
                        <label for="email">Email id:</label>
                        <input type="email" class="form-control" id="email" value="<?php echo $row["email"];?>" name="email" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="usr">Mailing Address:</label>
                        <input type="text" class="form-control" id="usr" value="<?php echo $row["mailing_address"];?>" name="mailing" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="no">Mobile no:</label>
                        <input type="number" class="form-control" id="no" value="<?php echo $row["mobile"];?>" name="mobile" required>
                    </div>
                </div>
            </div>
           
            <div class="row">
                  <div class="col-sm-4">
                <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="text" class="form-control" id="pwd" value="<?php echo $row["password"];?>" name="pswd" required>
            </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                        <label for="usr">Designation:</label>
                        <input type="text" class="form-control" id="usr" value="<?php echo $row["designation"];?>" name="designation" required>
                    </div>
                </div>
                <div class="col-sm-4">
                               <div class="form-group">
                        <label for="usr">Hiring date:</label>
                        <input type="date" class="form-control" id="usr" placeholder="Enter date" value="<?php echo $row["hiring_date"];?>" name="date" required>
                    </div>
                </div>
    
                </div>
                <div class="row">
        
                    <div class="col-sm-6">
                <div class="form-group">
                        <label for="usr">Office address:</label>
                        <input type="text" class="form-control" id="usr" value="<?php echo $row["office_address"];?>" name="address" required>
                    </div>
                    </div>
                   
                    <div class="col-sm-6">
                <div class="form-group">
                        <label for="usr">Reporting manager:</label>
                        <input type="text" class="form-control" id="usr" value="<?php echo $row["manager"];?>" name="manager" required>
                    </div>
                    </div>
                    </div>
                    <div class="row">
        
       
        <div class="col-sm-4">
    <div class="form-group">
            <label for="usr">Team name:</label>
<select class="form-control" id="emp" name="teamname">
<option value="<?php echo $row["team_name"]; ?>"> <?php echo $row["team_name"]; ?></option>
    <?php
    
    $searchquery1 = "SELECT * FROM team";
    $result1 = mysqli_query($conn, $searchquery1);

    if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while ($row1 = mysqli_fetch_assoc($result1)) {
          
    ?>

            <option value="<?php echo $row1["name"]; ?>"> <?php echo $row1["name"]; ?></option>
            
    <?php
        }
    } else {
        echo "0 results";
    }
    ?>

</select>
        </div>
        </div>
         
        <div class="col-sm-4">
    <div class="form-group">
            <label for="usr">Team name:</label>
<select class="form-control" id="emp" name="teamname1">
<option value="<?php echo $row["team_name1"]; ?>"> <?php echo $row["team_name1"]; ?></option>
    <?php
    
    $searchquery1 = "SELECT * FROM team";
    $result1 = mysqli_query($conn, $searchquery1);

    if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while ($row1 = mysqli_fetch_assoc($result1)) {
          
    ?>

            <option value="<?php echo $row1["name"]; ?>"> <?php echo $row1["name"]; ?></option>
            
    <?php
        }
    } else {
        echo "0 results";
    }
    ?>

</select>
        </div>
        </div>
       
        <div class="col-sm-4">
    <div class="form-group">
            <label for="usr">Team name:</label>
<select class="form-control" id="emp" name="teamname2">
<option value="<?php echo $row["team_name2"]; ?>"> <?php echo $row["team_name2"]; ?></option>
    <?php
    
    $searchquery1 = "SELECT * FROM team";
    $result1 = mysqli_query($conn, $searchquery1);

    if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while ($row1 = mysqli_fetch_assoc($result1)) {
          
    ?>

            <option value="<?php echo $row1["name"]; ?>"> <?php echo $row1["name"]; ?></option>
            
    <?php
        }
    } else {
        echo "0 results";
    }
    ?>

</select>
        </div>
        </div>
        </div>
            <button type="submit" class="btn btn-dark" name="btn" value="submit">Submit</button>
            <button type="reset" class="btn btn-dark" name="btn" value="cancel"><a style="color:white" href="deleteEmployee.php"> Cancel</a></button>
        </form>
        <?php
        }
    }
        ?>
     
        </div>

    


<?php
if(isset($_POST["fname"])&&isset($_POST["lname"])&&isset($_POST["mobile"])&&isset($_POST["email"])&&isset($_POST["mailing"])&&isset($_POST["pswd"])
&&isset($_POST["designation"])&&isset($_POST["date"])
&&isset($_POST["address"])&&(isset($_POST["teamname"])||isset($_POST["teamname1"])||isset($_POST["teamname2"]))&&isset($_POST["manager"])
&&!empty($_POST["fname"])&&!empty($_POST["lname"])&&!empty($_POST["mobile"])&&!empty($_POST["email"])&&!empty($_POST["mailing"])&&!empty($_POST["pswd"])
&&!empty($_POST["designation"])&&!empty($_POST["date"])
&&!empty($_POST["address"])&&!empty($_POST["teamname"])&&!empty($_POST["manager"]))
{
$fname=mysqli_real_escape_string($conn,@$_POST['fname']);
$lname=mysqli_real_escape_string($conn,@$_POST['lname']);
$mob=mysqli_real_escape_string($conn,@$_POST['mobile']);
$email=mysqli_real_escape_string($conn,@$_POST['email']);
$mailing=mysqli_real_escape_string($conn,@$_POST['mailing']);
$pswd=mysqli_real_escape_string($conn,@$_POST['pswd']);
$designation=mysqli_real_escape_string($conn,@$_POST['designation']);
$date=mysqli_real_escape_string($conn,@$_POST['date']);
$address=mysqli_real_escape_string($conn,@$_POST['address']);
$teamname=mysqli_real_escape_string($conn,@$_POST['teamname1']);
$teamname1=mysqli_real_escape_string($conn,@$_POST['teamname2']);
$teamname2=mysqli_real_escape_string($conn,@$_POST['teamname']);
$manager=mysqli_real_escape_string($conn,@$_POST['manager']);
$button=$_POST["btn"];
$emp_id=$_POST["emp_id"];
$fname_original=$_POST["fname_original"];
$lname_original=$_POST["lname_original"];
$name=$fname." ".$lname;
$name_original=$fname_original." ".$lname_original;
if($button=="submit")
{
    
    $sql = "UPDATE employee SET fname='$fname',lname='$lname',mobile='$mob',email='$email',mailing_address='$mailing',password='$pswd',
    designation='$designation',hiring_date='$date',office_address='$address',team_name='$teamname',team_name1='$teamname1',team_name2='$teamname2',
    manager='$manager' WHERE id='$editid'";

    if (mysqli_query($conn, $sql)) {
     
        $showquery1 = "SELECT * FROM boss WHERE boss_id='$emp_id' ";
        $result1 = mysqli_query($conn, $showquery1);
        if (mysqli_num_rows($result1) > 0) {
            while ($row2 = mysqli_fetch_assoc($result1)) {
                $id=$row2['junior_id'];
                $name=$fname." ".$lname;
                $showquery2 = "UPDATE employee SET manager='$name' WHERE id='$id' ";
                if (!mysqli_query($conn, $showquery2)) {
                    echo "Error updating record: " . mysqli_error($conn);
                }
            }
        
        }
        //echo "Record updated successfully";

?><script>
            location.replace("deleteEmployee.php?msg=Successful");
        </script> <?php


                } else {
                    echo "Error updating record: " . mysqli_error($conn);
                }
   
    
}





}

?>
   
</body>

</html>

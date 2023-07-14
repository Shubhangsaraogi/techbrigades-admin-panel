<?php 
include("navAdmin.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Register Employee</title>
</head>

<body style=" background:  #D7D7D8">


    <div class="container">
     
        <h1  align="center" style="font-family: 'Gelasio', serif;">Registration form</h1>
        <form action="registerEmployee.php" method="POST" >
               <div class="row">           
             <div class="col-sm-6" >
                    <div class="form-group">
                        <label for="usr">First name:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Enter first name" name="fname" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="usr">Last name:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Enter last name" name="lname" required>
                    </div>
                </div>
            </div>
             <div class="row">           
             <div class="col-sm-4" >
                    <div class="form-group">
                        <label for="email">Email id:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email id" name="email" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="usr">Mailing Address:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Enter mailing address" name="mailing" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="no">Mobile no:</label>
                        <input type="number" class="form-control" id="no" placeholder="Enter Mobile no" name="mobile" required>
                    </div>
                </div>
            </div>
           
            <div class="row">
                  <div class="col-sm-4">
                <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
            </div>
                </div>
                <div class="col-sm-4">
                <div class="form-group">
                        <label for="usr">Designation:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Enter Designation" name="designation" required>
                    </div>
                </div>
                <!-- <div class="col-sm-4">
                <div class="form-group">
                        <label for="usr">Level:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Enter level of employee" name="level" required>
                    </div>
                </div> -->
                <div class="col-sm-4">
                               <div class="form-group">
                        <label for="usr">Hiring date:</label>
                        <input type="date" class="form-control" id="usr" placeholder="Enter date" name="date" required>
                    </div>
                </div>
    
                </div>
                <div class="row">
        
                    <div class="col-sm-6">
                <div class="form-group">
                        <label for="usr">Office address:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Enter office address" name="address" required>
                    </div>
                    </div>
                    <div class="col-sm-6">
                <div class="form-group">
                        <label for="usr">Levels:</label>
                        <input type="text" class="form-control" id="usr" placeholder="Enter level" name="level" required>
                    </div>
                    </div>
                    </div>
                    <div class="row">
        
                    <div class="col-sm-4">
    <div class="form-group">
            <label for="usr">Team name:</label>
<select class="form-control" id="emp" name="teamname" REQUIRED>
<option value="">Select</option>
    <?php
    
    $searchquery = "SELECT * FROM team";
    $result = mysqli_query($conn, $searchquery);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          
    ?>

            <option value="<?php echo $row["name"]; ?>"> <?php echo $row["name"]; ?></option>
            
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
<option value="">Select</option>
    <?php
    
    $searchquery = "SELECT * FROM team";
    $result = mysqli_query($conn, $searchquery);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          
    ?>
        <option value="<?php echo $row["name"]; ?>"> <?php echo $row["name"]; ?></option>
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
<option value="">Select</option>
    <?php
    
    $searchquery = "SELECT * FROM team";
    $result = mysqli_query($conn, $searchquery);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          
    ?>

            <option value="<?php echo $row["name"]; ?>"> <?php echo $row["name"]; ?></option>
            
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
            <button type="reset" class="btn btn-dark" name="btn" value="cancel">Cancel</button>
        </form>
        <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
         <form action="deleteEmployee.php" method="POST">
                
                 <button class="btn btn-dark" type="submit">Edit/Delete Employee</button>
                 
                </form>
        </div>
    
        </div>
     
        </div>

    


<?php
if(isset($_POST["fname"])&&isset($_POST["lname"])&&isset($_POST["mobile"])&&isset($_POST["email"])&&isset($_POST["mailing"])&&isset($_POST["pswd"])
&&isset($_POST["designation"])&&isset($_POST["date"])
&&isset($_POST["address"])&&isset($_POST["teamname"])&&isset($_POST["teamname1"])&&isset($_POST["teamname2"])&&isset($_POST["level"])
&&!empty($_POST["fname"])&&!empty($_POST["lname"])&&!empty($_POST["mobile"])&&!empty($_POST["email"])&&!empty($_POST["mailing"])&&!empty($_POST["pswd"])
&&!empty($_POST["designation"])&&!empty($_POST["date"])
&&!empty($_POST["address"])&&!empty($_POST["teamname"])&&!empty($_POST["level"]))
{
$level=mysqli_real_escape_string($conn,@$_POST['level']);
$fname=mysqli_real_escape_string($conn,@$_POST['fname']);
$lname=mysqli_real_escape_string($conn,@$_POST['lname']);
$mob=mysqli_real_escape_string($conn,@$_POST['mobile']);
$email=mysqli_real_escape_string($conn,@$_POST['email']);
$mailing=mysqli_real_escape_string($conn,@$_POST['mailing']);
$pswd=mysqli_real_escape_string($conn,@$_POST['pswd']);
$designation=mysqli_real_escape_string($conn,@$_POST['designation']);
$date=mysqli_real_escape_string($conn,@$_POST['date']);
$address=mysqli_real_escape_string($conn,@$_POST['address']);
$teamname=mysqli_real_escape_string($conn,@$_POST['teamname']);
$teamname1=mysqli_real_escape_string($conn,@$_POST['teamname1']);
$teamname2=mysqli_real_escape_string($conn,@$_POST['teamname2']);
$manager=mysqli_real_escape_string($conn,@$_POST['manager']);
$button=$_POST["btn"];

if($button=="submit")
{
    $insertquery="INSERT INTO employee(fname,lname,mobile,email,mailing_address,password,designation,img,hiring_date,
    office_address,team_name,team_name1,team_name2,manager,level) VALUES('$fname','$lname','$mob', '$email','$mailing','$pswd','$designation','','$date','$address',
    '$teamname','$teamname1','$teamname2','$manager','$level')";
    
    if (mysqli_query($conn, $insertquery)) {
       // echo "New record created successfully";
      
    } else {
        echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
    }
    $name="";
    $empid="";
    $showquery = "SELECT * FROM employee ";
    $result = mysqli_query($conn, $showquery);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row 
    while ($row = mysqli_fetch_assoc($result)) {
        $empid=$row["id"];
        $_SESSION['junior_id']=$empid;
    $name=$row["fname"]." ".$row["lname"];
    }
    }
    $d=date("Y-m-d");
 $insertquery="INSERT INTO salary(emp_id,base_salary,one,two,yearly_bonus,perf_bonus,medical,other,date) VALUES('$empid','0','0','0','0','0','0','0','$d')";
    
    if (mysqli_query($conn, $insertquery)) {
     // echo "New record created successfully";
    } else {
        echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
    }
    $d_to=date("Y-m-t", strtotime($date));
 $insertquery="INSERT INTO register(emp_id,duration_from,duration_to) VALUES('$empid','$d','$d_to')";
    
    if (mysqli_query($conn, $insertquery)) {
     // echo "New record created successfully";
    } else {
        echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
    }



     $insertquery="INSERT INTO leave_record(emp_id,emp_name,vacation,used_vacation,sick,used_sick,personal,used_personal,parential,used_parential,unpaid) VALUES('$empid','$name','12','0', '6','0','4','0','7','0','0')";
    
    if (mysqli_query($conn, $insertquery)) {
        $_SESSION['junior_level']=$level;
       //echo "New record created successfully";
        ?><script>location.replace("boss.php?msg=Successful")</script> <?php
    } else {
        echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
    }
    
}





}

?>
   
</body>

</html>

<?php
//session_start();
include("navAdmin.php");
include("sidenavCustomer.php"); 
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
$address="";
$address1="";
$address1="";
$contact="";
$contact1="";
$contact2="";
$shour="";
$ehour="";
$email="";
$email1="";
$email2="";
$id="";
$showquery = "SELECT * FROM office_details";
$result = mysqli_query($conn, $showquery);
if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        $id=$row["id"];
        $address=$row["address"];
        $address1=$row["address1"];
        $address2=$row["address2"];
        $contact=$row["contact"];
        $contact1=$row["contact1"];
        $contact2=$row["contact2"];
        $shour=$row["shour"];
        $ehour=$row["ehour"];
        $email=$row["email"];
        $email1=$row["email1"];
        $email2=$row["email2"];

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Office Details</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style=" background:  #D7D7D8;">
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">Office Details</h1>
       <form action="officeDetails.php?editid=<?php echo $id;?>" method="POST">

<div class="form-group">
    <label for="usr">Address 1:</label>
    <input type="text" class="form-control" id="usr" name="address" value="<?php echo $address;?>"  required>
</div>
<div class="form-group">
    <label for="usr">Address 2:</label>
    <input type="text" class="form-control" id="usr" name="address1" value="<?php echo $address1;?>"  required>
</div>
<div class="form-group">
    <label for="usr">Address 3:</label>
    <input type="text" class="form-control" id="usr" name="address2" value="<?php echo $address2;?>"  required>
</div>
<div class="form-group">
    <label for="usr">Email 1:</label>
    <input type="text" class="form-control" id="usr" name="email" value="<?php echo $email;?>"  required>
</div>

<div class="form-group">
    <label for="usr">Contact 1:</label>
    <input type="number" class="form-control" id="usr" name="contact" value="<?php echo $contact;?>"  required>
</div>


<div class="form-group">
    <label for="usr">Office time (Start):</label>
    <input type="time" class="form-control" id="usr" name="shour" placeholder="<?php echo $shour;?>" value="<?php echo $shour;?>" required>
</div>

<div class="form-group">
    <label for="usr">Office time (End):</label>
    <input type="time" class="form-control" id="usr" name="ehour" value="<?php echo $ehour;?>" required>
</div>

<button type="submit" class="btn btn-dark" name="btn" value="edit">Update</button>

</form>

<?php

if(isset($_POST["address"])&&!empty($_POST["address"])&&isset($_POST["address1"])&&!empty($_POST["address1"])&&
isset($_POST["address2"])&&!empty($_POST["address2"])&&
isset($_POST["contact"])&&!empty($_POST["contact"])&&
isset($_POST["contact1"])&&!empty($_POST["contact1"])
&&isset($_POST["shour"])&&!empty($_POST["shour"])&&isset($_POST["ehour"])&&!empty($_POST["ehour"])
&&isset($_POST["email"])&&!empty($_POST["email"])&&isset($_POST["email1"])&&!empty($_POST["email1"]))
{
$address = mysqli_real_escape_string($conn,@$_POST['address']);
$address1 = mysqli_real_escape_string($conn,@$_POST['address1']);
$address2 = mysqli_real_escape_string($conn,@$_POST['address2']);
$email= mysqli_real_escape_string($conn,@$_POST['email']);
$email1=$email;
$email2=$email;
$contact = mysqli_real_escape_string($conn,@$_POST['contact']);
$contact1 = $contact;
$contact2 = $contact;
$shour = $_POST["shour"];
$ehour = $_POST["ehour"];
$button = $_POST["btn"];
if($button=="edit")
{
    
    $sql = "UPDATE office_details SET address='$address',address1='$address1',address2='$address2',email='$email',email1='$email1',email2='$email2',
    contact='$contact', contact1='$contact1',contact2='$contact2',
    shour='$shour',ehour='$ehour' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
       // echo "Record updated successfully";
         ?><script>location.replace("officeDetails.php?msg=Successfully Updated");</script><?php
        
    mysqli_close($conn);
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
}

?>
        </div>
</body>
</html>
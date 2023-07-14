<?php
//session_start();
include("navAdmin.php");
include("sidenavCustomer.php"); 
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
$fb="";
$tw="";
$insta="";
$yt="";
$li="";
$id="";
$showquery = "SELECT * FROM social_media";
$result = mysqli_query($conn, $showquery);
if (mysqli_num_rows($result) > 0) {
    if ($row = mysqli_fetch_assoc($result)) {
        $id=$row["id"];
        $insta=$row["instagram"];
        $tw=$row["twitter"];
        $yt=$row["youtube"];
        $li=$row["linkedin"];
        $fb=$row["facebook"];

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social media links</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style=" background:  #D7D7D8;">
    
<div class="container">
       <br>
       <h1  align="left" style="font-family: 'Gelasio', serif;">Social media links</h1>
       <form action="socialmedia.php?editid=<?php echo $id;?>" method="POST">

<div class="form-group">
    <label for="usr">Facebook:</label>
    <input type="text" class="form-control" id="usr" name="fb" value="<?php echo $fb;?>"  required>
</div>
<div class="form-group">
    <label for="usr">Twitter:</label>
    <input type="text" class="form-control" id="usr" name="tw" value="<?php echo $tw;?>"  required>
</div>
<div class="form-group">
    <label for="usr">Instagram:</label>
    <input type="text" class="form-control" id="usr" name="insta" value="<?php echo $insta;?>"  required>
</div>
<div class="form-group">
    <label for="usr">Youtube:</label>
    <input type="text" class="form-control" id="usr" name="yt" value="<?php echo $yt;?>"  required>
</div>

<div class="form-group">
    <label for="usr">Linked-in:</label>
    <input type="text" class="form-control" id="usr" name="li" value="<?php echo $li;?>"  required>
</div>



<button type="submit" class="btn btn-dark" name="btn" value="edit">Update</button>

</form>

<?php

if(isset($_POST["fb"])&&!empty($_POST["fb"])&&isset($_POST["tw"])&&!empty($_POST["tw"])
&&isset($_POST["yt"])&&!empty($_POST["yt"])&&isset($_POST["insta"])&&!empty($_POST["insta"])
&&isset($_POST["li"])&&!empty($_POST["li"]))
{
$facebook = mysqli_real_escape_string($conn,@$_POST['fb']);
$twitter= mysqli_real_escape_string($conn,@$_POST['tw']);
$youtube= mysqli_real_escape_string($conn,@$_POST['yt']);
$instagram= mysqli_real_escape_string($conn,@$_POST['insta']);
$linkedin= mysqli_real_escape_string($conn,@$_POST['li']);

$button = $_POST["btn"];
if($button=="edit")
{
    
    $sql = "UPDATE social_media SET facebook='$facebook',twitter='$twitter',instagram='$instagram',youtube='$youtube',
    linkedin='$linkedin' WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
       // echo "Record updated successfully";
         ?><script>location.replace("socialmedia.php?msg=Successfully Updated");</script><?php
        
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
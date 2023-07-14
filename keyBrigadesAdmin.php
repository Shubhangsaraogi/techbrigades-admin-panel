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
       $showquery1 = "SELECT * FROM key_brigades where id='$delid' ";
                                            $result1 = mysqli_query($conn, $showquery1);
                                            if (mysqli_num_rows($result1) > 0) {

                                                if ($row2 = mysqli_fetch_assoc($result1)) {
                                                    
                                                    unlink($row2["img"]);
                                                }
                                            }
    $deletequery = "DELETE FROM key_brigades WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("keyBrigadesAdmin.php?msg=Deleted Successfully");</script><?php
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
    <title>Key Brigades</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style=" background:  #D7D7D8;">

    <div class="container">
<div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8" align="center">
<h1>Key Brigades</h1>
        <form action="keyBrigadesAdmin.php" method="post" enctype="multipart/form-data">
            <div class="form group">
            <div class="row">
            <div class="col-sm-3"></div>
           <div class="col-sm-6"><input class="form-control" type="text" placeholder="Enter name"  name="name" required ></div>
           <div class="col-sm-3"></div>
           </div>
           <br>
           <div class="row">
            <div class="col-sm-3"></div>
           <div class="col-sm-6"><input class="form-control" type="text" placeholder="Enter position"  name="position" required ></div>
           <div class="col-sm-3"></div>
           </div>
           <br>
           <div class="row">
            <div class="col-sm-3"></div>
           <div class="col-sm-6"><input class="form-control" type="text" placeholder="Enter department"  name="department" required ></div>
           <div class="col-sm-3"></div>
           </div>
           <br>
           <div class="row">
            <div class="col-sm-3"></div>
           <div class="col-sm-6"><input class="form-control" type="number" placeholder="Enter mobile number"  name="mobile" required ></div>
           <div class="col-sm-3"></div>
           </div>
           <br>
           <div class="row">
            <div class="col-sm-3"></div>
           <div class="col-sm-6"><input class="form-control" type="text" placeholder="Enter email"  name="email" required ></div>
           <div class="col-sm-3"></div>
           </div>
           <br>
           <div class="row">
           <div class="col-sm-3"></div>
            <div class="col-sm-6" ><textarea class="form-control" type="text" placeholder="who we are"  name="who" rows="2" required></textarea></div>
            <div class="col-sm-3"></div>
           </div>
            </div>
            <br>
             <br>
            
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
             <input class="btn btn-dark" type="submit" value="Upload" name="submit">
             
           
        </form>

        <?php
        if(isset($_POST["name"])&&!empty($_POST["name"])&&isset($_POST["position"])&&!empty($_POST["position"])
        &&isset($_POST["department"])&&!empty($_POST["department"])&&isset($_POST["mobile"])&&!empty($_POST["mobile"])
        &&isset($_POST["email"])&&!empty($_POST["email"])&&isset($_POST["who"])&&!empty($_POST["who"]))
        {
                $target_dir = "keyBrigades/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 50000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $name=mysqli_real_escape_string($conn,@$_POST['name']);
                        $position=mysqli_real_escape_string($conn,@$_POST['position']);
                        $dept=mysqli_real_escape_string($conn,@$_POST['department']);
                        $mobile=mysqli_real_escape_string($conn,@$_POST['mobile']);
                        $email=mysqli_real_escape_string($conn,@$_POST['email']);
                        $who=mysqli_real_escape_string($conn,@$_POST['who']);
                        $insertquery = "INSERT INTO key_brigades(name,position,department,mobile,email,who_we_are,img) 
                        VALUES('$name','$position','$dept','$mobile','$email','$who','$target_file')";
                        if (mysqli_query($conn, $insertquery)) {
                            // echo "New record created successfully";
                            ?><script>location.replace("keyBrigadesAdmin.php?msg=Uploaded Successfully")</script><?php
                        } else {
                            die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
                        }
                        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
        }  
        
?><br>
</div>
            <div class="col-sm-2"></div>
            </div><table class="table table-responsive">
    
    <?php
        $showquery1 = "SELECT * FROM key_brigades order by id ";
        $result1 = mysqli_query($conn, $showquery1);
        if (mysqli_num_rows($result1) > 0) {
            ?><tr align="center">
       
       <th >
            Image
        </th>
       <th >
            Name
        </th>
        <th >
            Position
        </th>
        <th>
            Department
        </th>
        <th>
            mobile
        </th>
        <th>Email</th>
        <th>Who we are</th>
        <th >
            Action
        </th>
    </tr><?php

             while ($row2 = mysqli_fetch_assoc($result1)) {
                     ?>
                     <tr>
                     <td align="center">
                        <img src="<?php echo $row2["img"];?>" height="100px" width="100px" alt="">
                     </td>
                         <td align="center">
                        <?php echo $row2["name"];?>
                     </td>
                     <td align="center">
                        <?php echo $row2["position"];?>
                     </td>
                     <td align="center">
                        <?php echo $row2["department"];?>
                     </td>
                     <td align="center">
                        <?php echo $row2["mobile"];?>
                     </td>
                     <td align="center">
                        <?php echo $row2["email"];?>
                     </td>
                     <td align="center">
                        <?php echo $row2["who_we_are"];?>
                     </td>
                         
                    <td align="center">
                        <button class="btn btn-danger"><a style="color:black;" href="keyBrigadesAdmin.php?delid=<?php echo $row2["id"];?>">Delete</a></button>
                        </td></tr><?php
                                                    
                                                }
                                            }
        ?>
        
    </div>
</body>
<br>
</html>
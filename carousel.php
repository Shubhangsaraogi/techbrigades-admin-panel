<?php
include("navAdmin.php");
include("sidenavCustomer.php");
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
@$delid=@$_GET["delid"];
  if(isset($delid))
  {
       $showquery1 = "SELECT * FROM carousel where id='$delid' ";
                                            $result1 = mysqli_query($conn, $showquery1);
                                            if (mysqli_num_rows($result1) > 0) {

                                                if ($row2 = mysqli_fetch_assoc($result1)) {
                                                    
                                                    unlink($row2["img"]);
                                                }
                                            }
    $deletequery = "DELETE FROM carousel WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("carousel.php?msg=Deleted Successfully");</script><?php
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
    <title>Carousel</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style=" background:  #D7D7D8">

    <div class="container">
<div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8" align="center">
<h1>Carousel</h1>
        <form action="carousel.php" method="post" enctype="multipart/form-data">
            <div class="form group">
            <div class="row">
           <div class="col-sm-4"></div>
            <div class="col-sm-4" align="left"><input class="form-control" type="number" placeholder="Enter Slide Number" maxlength="1" min="1" max="5" name="no" value="" size="1" required></div>
            <div class="col-sm-4"> </div>
            </div>
            </div>
            <br>
             <br>
            
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
             <input class="btn btn-dark" type="submit" value="Upload Image" name="submit">
             
           
        </form>

        <?php
        if(isset($_POST["no"])&&!empty($_POST["no"]))
        {
                $target_dir = "carousel/";
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
                if ($_FILES["fileToUpload"]["size"] > 500000000) {
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
                        $no=$_POST["no"];
                        $insertquery = "INSERT INTO carousel(img,number) VALUES('$target_file','$no')";
                        if (mysqli_query($conn, $insertquery)) {
                            // echo "New record created successfully";
                            ?><script>location.replace("carousel.php?msg=Uploaded Successfully")</script><?php
                        } else {
                            die("Error: " . $insertquery . "<br>" . mysqli_error($conn));
                        }
                        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
        }  
        
?><br><table class="table">
    
    <?php
        $showquery1 = "SELECT * FROM carousel";
        $result1 = mysqli_query($conn, $showquery1);
        if (mysqli_num_rows($result1) > 0) {
            ?><tr align="center">
       
       <th >
            Slide number
        </th>
        <th >
            Image
        </th>
        <th >
            Action
        </th>
    </tr><?php

             while ($row2 = mysqli_fetch_assoc($result1)) {
                     ?>
                     <tr>
                         <td align="center">
                        <?php echo $row2["number"];?>
                     </td>
                         <td align="center">
                        <img src="<?php echo $row2["img"];?>" height="100px" width="100px" alt="">
                     </td>
                    <td align="center">
                        <button class="btn btn-danger"><a style="color:black;" href="carousel.php?delid=<?php echo $row2["id"];?>">Delete</a></button>
                        </td></tr><?php
                                                    
                                                }
                                            }
        ?>
        </div>
            <div class="col-sm-2"></div>
            </div>
    </div>
</body>
<br>
</html>
<?php include("navAdmin.php");
include("sidenavAdmin.php");
@$msg = @$_GET["msg"];
if (isset($msg) && $msg == "Successful") {
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
        <h3>Add Event</h3>
        <form method="POST" action="event.php" enctype="multipart/form-data">
            <div class="form-group" >
                <label for="name">Event Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" name="date" id="date" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="time">Starting time</label>
                <input type="time" class="form-control" name="start_time" id="time" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="end">End time</label>
                <input type="time" class="form-control" name="end_time" id="end" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="venue">Venue</label>
                <input type="text" class="form-control" name="venue" id="venue" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="topic">Topic</label>
                <input type="text" class="form-control" name="topic" id="topic" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="mode">Mode</label>
                <input type="text" class="form-control" name="mode" id="mode" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="fileToUpload">Upload Image</label>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" aria-describedby="emailHelp">
            </div>
            
            <button type="submit" name="submit" value="submit" class="btn btn-primary bg-dark ">Submit</button>
            
        </form>
    </div>

    <!-- <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
        <form action="eventHistory.php" method="POST">
        <button type="submit" class="btn btn-dark">HISTORY</button><br>
        </form>
        </div>
        </div> -->

    <?php

    if (isset($_POST['submit'])) {
        $button=$_POST['submit'];
        if($button=='submit'){
            $name=$_POST['name'];
            $date=$_POST['date'];
            $start_time=$_POST['start_time'];
            $end_time=$_POST['end_time'];
            $venue=$_POST['venue'];
            $topic=$_POST['topic'];
            $mode=$_POST['mode'];
            
            $showquery = "SELECT * FROM event_employee";

  $result = mysqli_query($conn, $showquery);

  if (mysqli_num_rows($result) > 0) {

    // output data of each row 

    while ($row1 = mysqli_fetch_assoc($result)) {

      if (isset($row1["img"]) && $row1["img"]) {
        unlink($row1["img"]);
      }
    }
  }





  $target_dir = "event/";

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

 

  // Check file size

  if ($_FILES["fileToUpload"]["size"] > 5000000) {

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

      //    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

    //   $sql = "UPDATE event_employee SET img='$target_file' WHERE email='$email'";


    $sql = "UPDATE event_employee SET name='$name',date='$date',start_time='$start_time',end_time='$end_time',venue='$venue',topic='$topic',mode='$mode',img='$target_file'";

      if (mysqli_query($conn, $sql)) {

        echo "Record updated successfully";

?> <script>
          location.replace("event.php?msg=Event added Successfully");
        </script><?php



                } else {

                  echo "Error updating record: " . mysqli_error($conn);
                }
              } else {

                echo "Sorry, there was an error uploading your file.";
              }
            }
          }

                
           
        }
    
    ?>
</body>

</html>
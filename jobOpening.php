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
       $showquery1 = "SELECT * FROM job_openings where id='$delid' ";
                                            $result1 = mysqli_query($conn, $showquery1);
                                            if (mysqli_num_rows($result1) > 0) {

                                                if ($row2 = mysqli_fetch_assoc($result1)) {
                                                    
                                                    unlink($row2["pdf"]);
                                                }
                                            }
    $deletequery = "DELETE FROM job_openings WHERE id='$delid'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("jobOpening.php?msg=Deleted Successfully");</script><?php
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
    <title>Job Openings</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style=" background: #D7D7D8">

    <div class="container">
<div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-8" align="center">
<h1>Job Openings</h1>
        <form action="jobOpening.php" method="post" enctype="multipart/form-data">
            <div class="form group">
            <div class="row">
            <div class="col-sm-3"></div>
           <div class="col-sm-6"><input class="form-control" type="text" placeholder="Enter Job Title"  name="title"  required></div>
           <div class="col-sm-3"></div>
           </div>
           <br>
           <div class="row">
           <div class="col-sm-3"></div>
            <div class="col-sm-6" ><textarea class="form-control" type="text" placeholder="Enter Job Description"  name="info" rows="2" required ></textarea></div>
            <div class="col-sm-3"></div>
           </div>
           <br>
           <div class="row">
           <div class="col-sm-3"></div>
            <div class="col-sm-6" ><input class="form-control" type="number" placeholder="Enter Number of Vacancies"  name="no" required></div>
            <div class="col-sm-3"></div>
           </div>
            </div>
            <br>
        
             <h5>Upload PDF File</h5>
          <input type="file" name="myfile"> <br>
          <button class="btn btn-dark" type="submit" name="save">upload</button>
             
           
        </form>

        <?php
        if(isset($_POST['save'])&&isset($_POST["title"])&&!empty($_POST["title"])&&isset($_POST["info"])
        &&!empty($_POST["info"])&&isset($_POST["no"])&&!empty($_POST["no"]))
        {   
            $filename = $_FILES['myfile']['name'];

            // destination of the file on the server
            $destination = 'jobPdfs/' . $filename;
        
            // get the file extension
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
        
            // the physical file on a temporary uploads directory on the server
            $file = $_FILES['myfile']['tmp_name'];
            $size = $_FILES['myfile']['size'];
        
            if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
                echo "You file extension must be .zip, .pdf or .docx";
            } elseif ($_FILES['myfile']['size'] > 10000000000000) { // file shouldn't be larger than 1Megabyte
                echo "File too large!";
            } 
            elseif(file_exists($destination))
            {
                    echo "Sorry, file already exists.";
            }
            else {
                // move the uploaded (temporary) file to the specified destination
                if (move_uploaded_file($file, $destination)) {
                    $title=mysqli_real_escape_string($conn,@$_POST['title']);
                    $info=mysqli_real_escape_string($conn,@$_POST['info']);
                    $no=mysqli_real_escape_string($conn,@$_POST['no']);
                    $sql = "INSERT INTO job_openings (title,info,vacancies,pdf) VALUES ('$title','$info','$no','$destination')";
                    if (mysqli_query($conn, $sql)) {
                        echo "File uploaded successfully";
                        ?><script>location.replace("jobOpening.php?msg=Uploaded Successfully");</script><?php
                        
                    }
                } else {
                    echo "Failed to upload file.";
                }
            }
        }

        
?><br><table class="table">
    
    <?php
        $showquery1 = "SELECT * FROM job_openings order by id DESC limit 3";
        $result1 = mysqli_query($conn, $showquery1);
        if (mysqli_num_rows($result1) > 0) {
            ?><tr align="center">
       <th >
            Title
        </th>
        <th >
            Description
        </th>
        <th >
            Number Of Vacancies
        </th>
        <th >
            PDF file
        </th>
        <th >
            Action
        </th>
    </tr><?php

             while ($row2 = mysqli_fetch_assoc($result1)) {
                     ?>
                     <tr>
                     <td align="center">
                     <?php echo $row2["title"];?>
                     </td>
                    <td align="center">
                        <?php echo $row2["info"];?>
                     </td>
                     <td align="center">
                        <?php echo $row2["vacancies"];?>
                     </td>
                     <td align="center">
                       <a style="color:black;" href="<?php echo $row2["pdf"];?>" target="_blank">Download</a>
                     </td>
                         
                    <td align="center">
                        <button class="btn btn-danger"><a style="color:black;" href="jobOpening.php?delid=<?php echo $row2["id"];?>">Delete</a></button>
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
<?php
include("navAdmin.php");
include("sidenavCustomer.php"); 
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>");</script><?php
}
@$delid1=@$_GET["delid1"];
@$delid2=@$_GET["delid2"];
@$delid3=@$_GET["delid3"];
@$delid4=@$_GET["delid4"];

  if(isset($delid1))
  {
    $deletequery = "DELETE FROM job_applications WHERE id='$delid1'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("jobApplication.php?msg=Deleted Successfully");</script><?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
  }
   if(isset($delid2))
  {
    $deletequery = "DELETE FROM free_consultation WHERE id='$delid2' and type='startup'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("jobApplication.php?msg=Deleted Successfully");</script><?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
  }
   if(isset($delid3))
  {
    $deletequery = "DELETE FROM free_consultation WHERE id='$delid3' and type='smallbusiness'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("jobApplication.php?msg=Deleted Successfully");</script><?php
    } else {
        echo "Error deleting record: " . $conn->error;
    }
  }
   if(isset($delid4))
  {
    $deletequery = "DELETE FROM free_consultation WHERE id='$delid4' and type='enterprise'";

    if ($conn->query($deletequery) === TRUE) {
        //echo "Record deleted successfully";
        ?><script>location.replace("jobApplication.php?msg=Deleted Successfully");</script><?php
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
    <title>JOB Applications</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>
<body style=" background:   #D7D7D8">
    
<div class="container-fluid" >
      

        <div class="row" id="one" style=" background:   #D7D7D8">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <br>
            <h1 align="left" style="font-family: 'Gelasio', serif;">Job Applications</h1>
                <?php
                if(isset($_POST["more"]))
                {
                $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM job_applications ORDER BY date DESC";
                }
                else if(isset($_POST["less"]))
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM job_applications ORDER BY date DESC limit 5";
                }
                else
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM job_applications ORDER BY date DESC limit 5";
                }
                $cnt = mysqli_query($conn, $date);
                $d = "";

                if (mysqli_num_rows($cnt) > 0) {
                    // output data of each row 
                    while ($row1 = mysqli_fetch_assoc($cnt)) {
                        $d = $row1["date"];
                        echo $d;

                ?>

                        <table class="table table-responsive">
                            <tr>
                                <th>
                                    Job title
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Location
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Experience
                                </th>
                                <th>
                                    Link to drive
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>

                            <?php
                            $showquery = "SELECT * FROM job_applications where date_format(date,'%Y-%m-%d')='$d' ";
                            $result = mysqli_query($conn, $showquery);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row 
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <tr>
                        <td>
                            <?php echo $row["job_title"];?>
                        </td>                
                        <td>
                            <?php echo $row["name"];?>
                        </td>
                        <td>
                            <?php echo $row["email"];?>
                        </td>
                        <td>
                            <?php echo $row["location"];?>
                        </td>
                        <td>
                            <?php echo $row["mobile"];?>
                        </td>
                        <td>
                            <?php echo $row["experience"];?>
                        </td>
                        <td>
                           <a href="<?php echo $row["link"];?>"> <?php echo $row["link"];?></a>
                        </td>
                         <td><button class="btn btn-danger"><a style="color:black;" href="jobApplication.php?delid1=<?php echo $row["id"]; ?>">Delete</a></td></button>
                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table><?php
                            }
                            if(empty($_POST["more"]))
                            {
                            ?><form action="jobApplication.php" method="POST">
                                <button class="btn btn-dark" type="submit" name="more" value="more">View All</button>
                            </form><?php
                            }
                            if(isset($_POST["more"]))
                            {
                            ?><form action="jobApplication.php" method="POST">
                                <button class="btn btn-dark" type="submit" name="less" value="less">View less</button>
                            </form><?php
                            }
                        } else {
                            echo "Nothing to show!!"."   <br><br>  ";
                        }

                                ?>
                                <br>
                                
            </div>
            <div class="col-sm-2"></div>
            
       
</div>
     

        <div class="row" id="two" style=" background:  rgb(192,192,199)">
        
        <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <br><br>
            <h1 align="left" style="font-family: 'Gelasio', serif;">Start-up Applications</h1>
                <?php
                if(isset($_POST["more1"]))
                {
                $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='startup' ORDER BY date DESC";
                }
                else if(isset($_POST["less1"]))
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='startup' ORDER BY date DESC limit 5";
                }
                else
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='startup' ORDER BY date DESC limit 5";
                }
                $cnt = mysqli_query($conn, $date);
                $d = "";

                if (mysqli_num_rows($cnt) > 0) {
                    // output data of each row 
                    while ($row1 = mysqli_fetch_assoc($cnt)) {
                        $d = $row1["date"];
                        echo $d;

                ?>

                        <table class="table table-responsive">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Business details
                                </th>
                               
                                <th>
                                    Digital Solution thinking of
                                </th>
                                <th>
                                    Action
                                </th>
                                
                            </tr>

                            <?php
                            $showquery = "SELECT * FROM free_consultation where type='startup' and date_format(date,'%Y-%m-%d')='$d' ";
                            $result = mysqli_query($conn, $showquery);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row 
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <tr>               
                        <td>
                            <?php echo $row["name"];?>
                        </td>
                        <td>
                            <?php echo $row["mobile"];?>
                        </td>
                        <td>
                            <?php echo $row["email"];?>
                        </td>
                        <td>
                            <?php echo $row["business_details"];?>
                        </td>
                        
                        <td>
                            <?php echo $row["digi_solution"];?>
                        </td>
                        <td><button class="btn btn-danger"><a style="color:black;" href="jobApplication.php?delid2=<?php echo $row["id"]; ?>">Delete</a></td></button>
                        
                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table><?php
                            }
                            if(empty($_POST["more1"]))
                            {
                            ?><form action="jobApplication.php/#two" method="POST">
                                <button class="btn btn-dark" type="submit" name="more1" value="more1">View All</button>
                            </form><?php
                            }
                            if(isset($_POST["more1"]))
                            {
                            ?><form action="jobApplication.php/#two" method="POST">
                                <button class="btn btn-dark" type="submit" name="less1" value="less1">View less</button>
                            </form><?php
                            }
                        } else {
                            echo "Nothing to show!!"."    <br><br>";
                        }

                                ?>
                                <br>
            </div>
            
            <div class="col-sm-2"></div>
        
</div>
     

        <div class="row" id="three" style=" background:  rgb(176,176,182)">
        <br><br>
        <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <br><br>
            <h1 align="left" style="font-family: 'Gelasio', serif;">Small business Applications</h1>
                <?php
                if(isset($_POST["more2"]))
                {
                $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='smallbusiness' ORDER BY date DESC";
                }
                else if(isset($_POST["less2"]))
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='smallbusiness' ORDER BY date DESC limit 5";
                }
                else
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='smallbusiness' ORDER BY date DESC limit 5";
                }
                $cnt = mysqli_query($conn, $date);
                $d = "";

                if (mysqli_num_rows($cnt) > 0) {
                    // output data of each row 
                    while ($row1 = mysqli_fetch_assoc($cnt)) {
                        $d = $row1["date"];
                        echo $d;

                ?>

                        <table class="table table-responsive">
                            <tr>
                            <th>
                                    Name
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Business details
                                </th>
                               
                                <th>
                                    Digital Solution thinking of
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>

                            <?php
                            $showquery = "SELECT * FROM free_consultation where type='smallbusiness' and date_format(date,'%Y-%m-%d')='$d' ";
                            $result = mysqli_query($conn, $showquery);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row 
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <tr>
                                    <td>
                            <?php echo $row["name"];?>
                        </td>
                        <td>
                            <?php echo $row["mobile"];?>
                        </td>
                        <td>
                            <?php echo $row["email"];?>
                        </td>
                        <td>
                            <?php echo $row["business_details"];?>
                        </td>
                        
                        <td>
                            <?php echo $row["digi_solution"];?>
                        </td>
                        <td><button class="btn btn-danger"><a style="color:black;" href="jobApplication.php?delid3=<?php echo $row["id"]; ?>">Delete</a></td></button>
                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table><?php
                            }
                            if(empty($_POST["more2"]))
                            {
                            ?><form action="jobApplication.php/#three" method="POST">
                                <button class="btn btn-dark" type="submit" name="more2" value="more2">View All</button>
                            </form><?php
                            }
                            if(isset($_POST["more2"]))
                            {
                            ?><form action="jobApplication.php/#three" method="POST">
                                <button class="btn btn-dark" type="submit" name="less2" value="less2">View less</button>
                            </form><?php
                            }
                        } else {
                            echo "Nothing to show!!"."<br><br>";
                        }

                                ?>
                                <br>
            </div>
            <div class="col-sm-2"></div> 
            
            
</div>
     

        <div class="row" id="four" style=" background:  rgb(161,161,167)">
        <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <br><br>
            <h1 align="left" style="font-family: 'Gelasio', serif;">Enterprise solutions Applications</h1>
                <?php
                if(isset($_POST["more3"]))
                {
                $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='enterprise' ORDER BY date DESC";
                }
                else if(isset($_POST["less3"]))
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='enterprise' ORDER BY date DESC limit 5";
                }
                else
                {
                    $date = " SELECT DISTINCT date_format(date,'%Y-%m-%d') as date FROM free_consultation where type='enterprise' ORDER BY date DESC limit 5";
                }
                $cnt = mysqli_query($conn, $date);
                $d = "";

                if (mysqli_num_rows($cnt) > 0) {
                    // output data of each row 
                    while ($row1 = mysqli_fetch_assoc($cnt)) {
                        $d = $row1["date"];
                        echo $d;

                ?>

                        <table class="table table-responsive">
                            <tr>
                            <th>
                                    Name
                                </th>
                                <th>
                                    Mobile
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Business details
                                </th>
                               
                                <th>
                                    Digital Solution thinking of
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>

                            <?php
                            $showquery = "SELECT * FROM free_consultation where type='enterprise' and date_format(date,'%Y-%m-%d')='$d' ";
                            $result = mysqli_query($conn, $showquery);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row 
                                while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                    <tr>
                                    <td>
                            <?php echo $row["name"];?>
                        </td>
                        <td>
                            <?php echo $row["mobile"];?>
                        </td>
                        <td>
                            <?php echo $row["email"];?>
                        </td>
                        <td>
                            <?php echo $row["business_details"];?>
                        </td>
                        
                        <td>
                            <?php echo $row["digi_solution"];?>
                        </td>
                        <td><button class="btn btn-danger"><a style="color:black;" href="jobApplication.php?delid4=<?php echo $row["id"]; ?>">Delete</a></td></button>
                    </tr>
                            <?php
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>
                        </table><?php
                            }
                            if(empty($_POST["more3"]))
                            {
                            ?><form action="jobApplication.php/#four" method="POST">
                                <button class="btn btn-dark" type="submit" name="more3" value="more3">View All</button>
                            </form><?php
                            }
                            if(isset($_POST["more3"]))
                            {
                            ?><form action="jobApplication.php/#four" method="POST">
                                <button class="btn btn-dark" type="submit" name="less3" value="less3">View less</button>
                            </form><?php
                            }
                        } else {
                            echo "Nothing to show!!"." <br><br><br>";
                        }

                                ?>
                                <br>
            </div>
            
            <div class="col-sm-2"></div>  
           
</div>
</div>
</body>
</html>
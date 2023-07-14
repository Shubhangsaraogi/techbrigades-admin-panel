<?php include("navAdmin.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>levels</title>
    <style>
        body{
            background: #D7D7D8;
        }
    </style>
</head>
<body>
    <div class="container">
  
</div>


<table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">S.N.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">Last Checkout</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                            // $date=date('Y-m-d');
                            // echo $newdate = date("Y-m-d", strtotime("-1 months"));
                            //sql= and date>=$newdate
                            $sql2 = "SELECT * from employee WHERE date!='000:00:00'  ORDER by date DESC";
                            $result2 = mysqli_query($conn, $sql2);
                            $temp=0;
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $name = $row2['fname'] . " " . $row2['lname'];
                                $ip=$row2['ip_address'];
                                $date=$row2['date'];
                                $time=$row2['time'];
                                $id=$row2['id'];
                                $sql3 = "SELECT * from check_in_out WHERE emp_id='$id'  ORDER by date DESC";
                                $result3 = mysqli_query($conn, $sql3);
                                $checkout="";
                                while ($row3= mysqli_fetch_assoc($result3)) {
                                    $checkout=$row3['checkout'];
                                }
                                $temp++;
                        ?>
                                    <th scope="row"><?php echo $temp; ?></th>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $time; ?></td>
                                    <td><?php echo $ip; ?></td>
                                    <td><?php echo $checkout; ?></td>
                                    </form>
                            </tr>
<?php
                            }
?>
                    </tbody>
<?php
            
    if(isset($_POST['submit'])){
        if(!empty($_POST['taskOption'])&&!empty($_POST['level'])) {
            $id = $_POST['taskOption'];
            $level=$_POST['level'];
            
            $sql = "UPDATE employee SET level ='$level' WHERE id='$id'";
            if( $result1=mysqli_query($conn, $sql)){
                if($level!=1){
                    if(isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION['junior_level']=$level;
                    $_SESSION["junior_id"]=$id;
                    ?>
                <script>
                        location.replace("boss.php?msg=Successful");
                </script>
                <?php
                }
                else{

                    ?>
                <script>
                        location.replace("levels.php?msg=Successful");
                </script>
                <?php
                }
            }
            else{
                ?>
                <script>
                        location.replace("levels.php?msg=Unsuccessful");
                </script>
                <?php
            }
        }
    }
      
?>
</body>
</html>


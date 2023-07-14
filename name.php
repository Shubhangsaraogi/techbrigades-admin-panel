<?php  
    include('db.php');

$number = count($_POST["policy"]);  



$policy="";


// $rot=$_POST["r1"];
if(isset($_POST["submit"]))
{
$i=0;
            for( ;$i<$number;$i=$i+1){
            $policy=$_POST["policy"][$i];
         

            

            $insertquery = "INSERT INTO policy_company(policy) VALUES('$policy')";
            if (mysqli_query($conn, $insertquery)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $insertquery . "<br>" . mysqli_error($conn);
            }
            
            ?><script>location.replace("policiesAdmin.php?msg=Successful");</script><?php
        echo "Data Inserted";  }
        mysqli_close($conn);
}
 ?> 
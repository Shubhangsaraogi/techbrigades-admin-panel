<?php include("navAdmin.php");?>
 

<?php 
 
@$msg=@$_GET["msg"];
if(isset($msg)&&$msg=="Successful")
{
    ?><script>alert("<?php echo $msg?>")</script><?php
}
$email=$_SESSION["email"];
$fname="";
$lname="";
$showquery = "SELECT * FROM admin WHERE email='$email'";
             $result = mysqli_query($conn, $showquery);
             if (mysqli_num_rows($result) > 0) {
                // output data of each row 
                if ($row = mysqli_fetch_assoc($result)) {
                  $fname=$row["fname"];
                  $lname=$row["lname"];
                }
              }
?>

<html lang="en">
<head>
  <title>Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

  
  
 
   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
 
  <style>
  
  </style>
</head>
<body style=" background:  #D7D7D8 ">

<img src="https://semantic-web.com/wp-content/uploads/2017/03/home-13-1280x443.jpg" alt="Trulli" width="100%"><br><br>


    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">WELCOME TO ADMIN PANEL !!</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Here you can access all the information regarding both customers and employees.  </p>
    </div>


</body>
</html>

  
  

  
  
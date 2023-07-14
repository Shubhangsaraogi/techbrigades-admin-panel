<?php 
session_start();
?>

<?php include('db.php'); ?>




<html>
    <head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0;"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    
    
    <style>
    @import url('https://fonts.googleapis.com/css?family=Numans');

    html,body{
    background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    height: 100%;
    font-family: 'Numans', sans-serif;
}
    </style>
   
    </head>
    <body>
       
      <?php include 'navbar.php'; ?>
        
      <div class="container">
    <br><br>
        <h2 align="center" style=" font-family: 'Gelasio', serif; color: white">Admin Login Form</h2> <br><br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6" style="border-radius: 20px;background-color:rgb(0,0,0,0.4) ">
        <form action="index.php" method="POST">
            <div class="form-group">
                <br>
               <h2 style="color:white">Sign In</h2> <br>
			     
                <!--label for="mob">Email Id:</label-->
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="form-group">
                <!--label for="pwd">Password:</label-->
                <input type="password" class="form-control" id="pwd" name="pswd" placeholder="Password">
            </div>
            <div class="form-group form-check" style="color:white">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" > Remember me
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary" name="btn" value="submit"> Login</button> 
            <button type="reset" class="btn btn-primary" name="btn" value="cancel">Cancel</button>
            <br>
           
        </form>
        </div>
        
        <div class="col-sm-3"></div>
        </div>
        
      </div>
      <?php
if(isset($_POST["email"])&&isset($_POST["pswd"])&&!empty($_POST["email"])&&!empty($_POST["pswd"]))
{

$email=mysqli_real_escape_string($conn,@$_POST['email']);
$pswd=mysqli_real_escape_string($conn,@$_POST['pswd']);
$button=$_POST["btn"];

if($button=="submit")
{
    $loginquery="SELECT * FROM admin WHERE email='$email' and password='$pswd'";
    
    $result = mysqli_query($conn, $loginquery);
    
    
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION["email"]=$email;
            $_SESSION["pswd"]=$pswd;
            ?><script>
             location.replace("admin.php?msg=Successful");</script>
           <?php
       
            
        }
    } else {
         ?><script>
             alert("UnSuccessful");</script>
           <?php
    
    }

    
}


}


?>
        
      
  </body>

 
   
</html>


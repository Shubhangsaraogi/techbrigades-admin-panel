<?php //session_start(); 
include("navEmployee.php");
//include("sidenavEmployee.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>HR Policies</title>
</head>
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    .fakeimg {
        height: 200px;
        background: #aaa;
    }
      .div1 {
  border: double;
}
@media only screen and (min-width: 992px) {
    .myclass{
        padding-left:20px;
        padding-right:260px;
      
        
    }
}
@media only screen and (max-width: 768px) {
    .myclass1{
        margin-left: 20px;
        padding-left: 40px;
       
      
        
    }
}
@media only screen and (min-width: 992px) {
    .myclass2{
        
        padding-right:150px;
        padding-left:150px;
        
      
        
    }
}
@media only screen and (max-width: 768px) {
    .myclass3{
        margin-left: 10px;
         padding-right:20px;
        padding-left:20px;
       
      
        
    }
}



  
</style>

<body style="background:  #D7D7D8">
<br><br>

<section class="text-gray-700 body-font"><br>
  <div class="container py-18 mx-auto div1" style="text-align: center;">
 
     <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900" style="text-align:center">HR Policies</h1><br> 
  
  <?php
      $showquery = "SELECT * FROM hr_policies  order by id";
       $result = mysqli_query($conn, $showquery);
       if (mysqli_num_rows($result) > 0) {
           while ($row = mysqli_fetch_assoc($result)) {
  ?>
    <div class="lg:w-full flex flex-col sm:flex-row sm:items-center items-start mx-auto">
       <tr>
      <td><p class="flex-grow    text-gray-900" >&bull;<?php echo $row["policy"];?></p></td>
     </tr>
    </div>
<?php
}
}
?>
    </table>
  </div>
</section>
<br>





<br><br>





 



</body>

</html>
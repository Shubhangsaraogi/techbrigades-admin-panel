<?php
//session_start();
include("navAdmin.php");
include("sidenavAdmin.php"); 
@$msg=@$_GET["msg"];
if(isset($msg))
{
    ?><script>alert("<?php echo $msg;?>")</script><?php
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Policies</title>
    <link href="https://fonts.googleapis.com/css?family=Calistoga|Gelasio|Russo+One&display=swap" rel="stylesheet">
</head>

<body style=" background:  #D7D7D8;">


    <div class="container">
        <br>
   
      
        <br>

        <h1 align="left" style="font-family: 'Gelasio', serif;">Add Policies</h1>
       
          
      <form name="add_name" id="add_name" action="name.php" method="POST" >
        
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                           
                         
                            <td>
                                <div class="form-group">
                                    <label for="no">Policy:</label>
                                    <input type="text" class="form-control " id="policy" placeholder="Enter policy" name="policy[]" required>
                                </div>
                            </td>
                          
                            
                            <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                        </tr>
                    </table>
                    <input type="submit" name="submit" id="submit" class="btn btn-dark" value="Submit" />
                </div>
            </form>
            <br>
            <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
         <form action="viewPolicies.php" method="POST">
                
                 <input type="submit" name="submit" id="submit" class="btn btn-dark" value="View Policies" />
                 
                </form>
        </div>
        </div>
        </div>
         
    

</body>
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
        $('#dynamic_field').append('<tr id="row' + i + '"><td><div class="form-group"><input type="text" class="form-control " id="policy" placeholder="Enter policy" name="policy[]" required></div></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');});
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                url: "name.php",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>
</html>
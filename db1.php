
<?php
$connect = new PDO('mysql:host=localhost;dbname=techbrigades', 'techbrigades', 'techbrigades@1');

if (!$conn)
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
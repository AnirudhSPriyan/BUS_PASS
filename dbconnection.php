<?php  
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'bus';  
  
$conn = mysqli_connect($host,$user,$pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
// echo '<p>Connected to database successfully</p>';  

?>
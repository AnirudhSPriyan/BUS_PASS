<?php  
session_start();
include('dbconnection.php');

$ktuid=$_POST['user'];
$psw=$_POST['psw'];

$sql="SELECT * FROM registered WHERE ktuid='$ktuid' and password='$psw'";  
$retval=mysqli_query($conn, $sql);  

if(mysqli_num_rows($retval)!=0)
{  
      $_SESSION["ktuid"] = $ktuid;
      echo "<script>window.location.href = 'dashboard.php'</script>";  
}
else
{  
   echo "invalid username or password";     
}  
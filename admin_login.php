<?php  
include('dbconnection.php');

$user=$_POST['user'];
$psw=$_POST['psw'];

$sql="SELECT * FROM admins WHERE username='$user' and password='$psw'";  
$retval=mysqli_query($conn, $sql);  

if(mysqli_num_rows($retval)!=0)
{  
      echo "<script>window.location.href = 'admin/dashboard.php'</script>";  
}
else
{  
   echo "invalid username or password";     
}  
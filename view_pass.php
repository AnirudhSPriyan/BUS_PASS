<?php  
include('dbconnection.php');

$name=$_POST['name'];
$ktu=$_POST['ktu'];

$sql="SELECT * FROM registered WHERE ktuid='$ktu'";  
$retval=mysqli_query($conn, $sql);  

if(mysqli_num_rows($retval) > 0){  
    while($row = mysqli_fetch_assoc($retval)){  
       echo "KTU ID :{$row['ktuid']}  <br> ".  
            "NAME : {$row['name']} <br> ".  
            "EMAIL : {$row['email']} <br> ".  
            "BOARDING : {$row['boarding']} <br> ".
            "APPROVAL STATUS : {$row['approved']} <br> ".
            "--------------------------------<br>";  
    } //end of while  
   }else{  
   echo "0 results";  
   }  
  
echo "<a href='./home.html'>Return to Home Page</a>";
mysqli_close($conn);  
?>
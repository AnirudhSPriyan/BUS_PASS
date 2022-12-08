<?php  
$host = 'localhost';  
$user = 'anirudh';  
$pass = '';  
$dbname = 'bus';  
  
$conn = mysqli_connect($host,$user,$pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
echo '<p>Connected to database successfully</p>';  

$user=$_POST['user'];
$psw=$_POST['psw'];

$sql="SELECT * FROM admins WHERE username='$user' and password='$psw'";  
$retval=mysqli_query($conn, $sql);  

if(mysqli_num_rows($retval)!=0)
{  
      echo "login success";
      $sql="SELECT * FROM registered";  
      $retval=mysqli_query($conn, $sql);  

      echo "<style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even){background-color: #f2f2f2}
      
      th {
        background-color: #04AA6D;
        color: white;
      }
      </style>";

      if(mysqli_num_rows($retval) > 0)
      {  
        echo "<table><tr><th>KTU ID</th><th>NAME</th><th>EMAIL</th><th>BOARDING</th><th>APPROVAL STATUS</th></tr>";
        while($row = mysqli_fetch_assoc($retval))
        {  
          echo "<tr><td>{$row['ktuid']} </td>   
           <td>{$row['name']} </td>  
           <td>{$row['email']} </td>   
           <td>{$row['boarding']} </td> 
           <td>{$row['approved']} </td></tr>"
          ;  
        } 
        echo "</table>";
      }
      else
      {  
        echo "0 results";  
      }  
} 
else
{  
   echo "invalid username or password";     
}  
  
echo "<a href='./home.html'>Return to Home Page</a>";
mysqli_close($conn);  
?>
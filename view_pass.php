<?php  
session_start();
include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link href="view_pass.css" rel="stylesheet"/>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card">
               
                <div > 
                <div class="line">
                    <hr>
                </div>
               
                <div class="d-flex justify-content-center px-2">
                    <div class="d-flex flex-row">
                        <h6 class="mt-0 off"><?php
               if(isset($_SESSION["ktuid"])){
                  $ktu = $_SESSION["ktuid"];
                  $sql="SELECT * FROM registered WHERE ktuid='$ktu'";  
                  $retval=mysqli_query($conn, $sql);  
                  
                  if(mysqli_num_rows($retval) > 0){  
                      while($row = mysqli_fetch_assoc($retval)){  
                         echo "KTU ID :{$row['ktuid']}  <br> ".  
                              "NAME : {$row['name']} <br> ".  
                              "EMAIL : {$row['email']} <br> ".  
                              "SEMESTER : {$row['semester']} <br> ". 
                              "BUS : {$row['busname']} <br> ". 
                              "BOARDING : {$row['boarding']} <br> ".
                              "APPROVAL STATUS : {$row['approved']} <br> ";  
                      } 
                      
                     }else{  
                     echo "0 results";  
                     }  
                  mysqli_close($conn); 
                  }
                  ?></h6> 
                    </div>
                </div>
                <div class="line">
                    <hr>
                </div>
                </div>
               
        </div>
        <a href='home.html'>Go HOME</a>
    </div>
</div>
</body>
</html>

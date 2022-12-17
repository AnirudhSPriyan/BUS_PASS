<?php
include('../dbconnection.php');
// if (strlen($_SESSION['bpmsaid']==0)) {
//   header('location:logout.php');
//   } else {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bus Pass Management System | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div id="container-fluid">
        <?php include_once('header.php');?>
        <div class="row">
        <?php include_once('sidebar.php');?>
        <div class="col mx-3">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">Manage Pass</h1>
                    <?php    
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

  
// echo "<a href='./home.html'>Return to Home Page</a>";
        mysqli_close($conn);  
        ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




  
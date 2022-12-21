<?php
include('dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bus Pass Management System | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">CET BUS PASS MANAGEMENT SYSTEM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li><a class="active" href="home.html">Home</a></li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
        <h2 class="page-header mt-5 pt-3">View Bus routes</h2>
        <form method="post">
                <label >Select a bus name to search</label>
                        <select class="my-3 mx-5" name="bus" id="bus">
                        <option disabled selected vauser_login.htmlue> -- select an option -- </option>
                        <?php
                        $query= "SELECT bus_name FROM buses";
                        $retval=mysqli_query($conn, $query);  
                        if(mysqli_num_rows($retval) > 0){  
                        while($row = mysqli_fetch_assoc($retval))
                        { 
                            $val=$row['bus_name'];
                            echo "<option value ='$val'> $val </option>";
                        }
                        }?>
                    </select>
                    <button type="submit" class="btn btn-success " name="submit" id="submit">Search</button>
                   
        </form>
    <br>      
    <?php    
        if(isset($_POST['submit'])){
            $bus=$_POST['bus'];
            $sql="SELECT * FROM routes where bus_name='$bus'";
            $query = "SELECT * from buses where bus_name='$bus'";

            $retval=mysqli_query($conn, $sql); 
            $ret=mysqli_query($conn, $query);
            
            echo "<style>
            table {
                border-collapse: collapse;
                width: 50%;
                
                margin-right: 20%;
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
            if(mysqli_num_rows($ret) > 0)
            {   
                while($r = mysqli_fetch_assoc($ret))
                {
                echo "<h6>License No : {$r['licenseno']}</h6><br>".
                        "<h6> Driver name: {$r['driver_name']}</h6><br>".
                        "<h6> Driver Contact no: {$r['driver_phno']}</h6><br>";
                }
            }
            if(mysqli_num_rows($retval) > 0)
            {  
                echo "<table><tr><th>BOARDING POINTS</th><th>FEES</th></tr>";
                while($row = mysqli_fetch_assoc($retval))
                {  
                echo "<tr><td>{$row['boarding_pt']} </td>   
                <td>{$row['fees']} </td>  
                </tr>";  
                } 
                echo "</table>";
            }
            else
            {  
                echo "0 results";  
            }  
                mysqli_close($conn);  
                        
        }
        ?> 
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>       

                
                                 
                                
            
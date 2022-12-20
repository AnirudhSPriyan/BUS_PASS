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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <div id="container-fluid"> -->
        
            <h1 class="page-header mx-5 my-3">View Bus routes</h1>
                <form method="post">
                        <label class="mx-5">Select a bus name to search</label>
                        <div class="d-flex">
                        </br>
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
                            </div>
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
                    h6{
                        margin-left: 10%;
                        margin-right: 20%;
                    }
                    table {
                        border-collapse: collapse;
                        width: 50%;
                        margin-left: 10%;
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
</body>
</html>       

                
                                 
                                
            
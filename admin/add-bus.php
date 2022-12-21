<?php
include('../dbconnection.php');
if(isset($_POST['submit'])){
    $licenseno=$_POST['licenseno'];
    $busname=$_POST['busname'];
    $driver=$_POST['driver'];
    $driver_phno=$_POST['phno'];

    $sql="INSERT INTO buses(licenseno,bus_name,driver_name,driver_phno) VALUES('$licenseno','$busname','$driver','$driver_phno')";  
    mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bus Pass Management System | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div id="container-fluid">
        <?php include_once('header.php');?>
        <div class="row" >
        <?php include_once('sidebar.php');?>
        <div class="col me-4">
            <div class="row" style="margin-left:150px;">
            <h2>Add Bus Details</h2>
            <form action="add-bus.php" method="post">
                
                    <label for="licenseno"><b>License Number</b></label>
                    <input type="text" placeholder="Enter License Number" name="licenseno" id="licenseno" required>    

                    <label for="busname"><b>Bus Name</b></label>
                    <input type="text" placeholder="Enter bus name" name="busname" id="busname" required>

                    <label for="driver"><b>Driver Name</b></label>
                    <input type="text" placeholder="Enter driver name" name="driver" id="driver" required>

                    <label for="driver"><b>Phone Number</b></label>
                    <input type="text" placeholder="Enter phone number" name="phno" id="phno" maxlength="10" required>

                    <button type="submit" class="registerbtn" name="submit" id="submit">Add Bus</button>
                
                </form>
</div>
        </div>
        </div>   
</body>
</html>       

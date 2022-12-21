<?php
session_start();
include('dbconnection.php');
if(isset($_POST['submit'])){
    $sem=$_POST['sem'];
    $bus=$_POST['bus'];
    $boarding=$_POST['boarding'];
    if (isSet($_SESSION['ktuid'])){
        $ktuid=$_SESSION['ktuid'];
        $sql="UPDATE registered set semester='$sem',boarding='$boarding',busname='$bus' where ktuid='$ktuid'";  
        mysqli_query($conn, $sql);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">


</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<form  method="post" id="apply_form">
  <div class="container">
    <h1>Apply Pass</h1>
    <!-- <p>Please fill in this form to apply for bus pass</p>
    <hr> -->

    
    <label ><b>Semester</b></label></br>
    <input type="text" placeholder="Enter Semester" name="sem" id="sem" required>
    </br>
    <label class="mt-3" for="bus"><b>Bus Route</b></label>
    </br>
    <select class="mb-3" name="bus" id="bus">
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
    </br>
    <label for="boarding"><b>Boarding Point</b></label>
    </br>
    <select name="boarding" id="boarding">
        <option disabled selected vauser_login.htmlue> -- select an option -- </option>
        <option value="Ullor"> Ulloor </option>
        <option value="Ullor"> Sreekaryam </option>
        <option value="Ullor"> Keshavadasapuram </option>
        <option value="Ullor"> Pattomr </option>

       
    </select>
   

    <button type="submit" name="submit" class="registerbtn" id="registerbtn" onclick="return alert('Application for bus pass submitted successfully');">Apply for pass</button>
  </div>
  
  
</form>

</body>
</html>

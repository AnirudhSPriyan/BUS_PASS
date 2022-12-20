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

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
.error{
  color: red;
}
</style>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<form  method="post" id="apply_form">
  <div class="container">
    <h1>Apply Pass</h1>
    <!-- <p>Please fill in this form to apply for bus pass</p>
    <hr> -->

    
    <label ><b>Semester</b></label>
    <input type="text" placeholder="Enter Semester" name="sem" id="sem" required>

    <label for="bus"><b>Bus Route</b></label>
    </br>
    <select name="bus" id="bus">
        <option disabled selected vauser_login.htmlue> -- select an option -- </option>
        <?php
        $query= "SELECT busname FROM buses";
        $retval=mysqli_query($conn, $query);  
                  if(mysqli_num_rows($retval) > 0){  
                    while($row = mysqli_fetch_assoc($retval))
                    { 
                        $val=$row['busname'];
                        echo "<option value ='$val'> $val </option>";
                    }
        }?>
        
        
    </select>
    </br>
    <label for="boarding"><b>Boarding Point</b></label>
    </br>
    <select name="boarding" id="boarding">
        <option disabled selected vauser_login.htmlue> -- select an option -- </option>
        <option value="Sreekaryam">Sreekaryam</option>
        <option value="Ulloor">Ulloor</option>
        <option value="Keshavadasapuram">Keshavadasapuram</option>
        <option value="Pattom">Pattom</option> 
    </select>
   

    <button type="submit" name="submit" class="registerbtn" id="registerbtn" onclick="return alert('Application for bus pass submitted successfully');">Apply for pass</button>
  </div>
  
  
</form>
<script>
// function reset(){
//    document.getElementById("reg_form").reset();
// }
// </script>
</body>
</html>

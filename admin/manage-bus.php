<?php
include('../dbconnection.php');
// if (strlen($_SESSION['bpmsaid']==0)) {
//   header('location:logout.php');
//   } else {

if(isset($_GET['delid'])){
  
    $licenseno = $_GET['delid'];
    $sql="delete from buses where licenseno = '$licenseno'";
    mysqli_query($conn, $sql);  
    echo "<script>alert('Data deleted');</script>"; 
    echo "<script>window.location.href = 'manage-bus.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bus Pass Management System | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="table.css">
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
                <h1 class="page-header">Manage Bus</h1>
                <table>
                <thead> 
                <tr><th>LICENSE NUMBER</th><th>BUS NAME</th><th>DRIVER NAME</th><th>PHONE NUMBER</th>  <th>ACTION</th</tr>
                </thead> 
                <tbody>
                <?php    
                  $sql="SELECT * FROM buses";  
                  $retval=mysqli_query($conn, $sql);  
                  if(mysqli_num_rows($retval) > 0){  
                    while($row = mysqli_fetch_assoc($retval))
                    {  ?>
                       <tr><td><?php echo($row['licenseno']) ?> </td>   
                       <td><?php echo($row['bus_name']) ?></td>  
                       <td><?php echo($row['driver_name'])?> </td>   
                       <td><?php echo($row['driver_phno']) ?></td> 
                       <td><a href=""> Edit </a>  ||  <a href="manage-bus.php?delid=<?php echo($row['licenseno'])?>" onclick="return confirm('Are you sure ?');"> Remove </a>
                      </td>
                      </tr>
                      
                    <?php }} ?>
                </tbody>
         </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




  
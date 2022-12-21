<?php
include('../dbconnection.php');
if(isset($_GET['id'])){
    $ktuid = $_GET['id'];
    $sql="update registered set approved = 1 where ktuid = '$ktuid' ";
    mysqli_query($conn, $sql);  
    echo "<script>window.location.href = 'dashboard.php'</script>";
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
        <div class="col-lg-6" >
            <div class="row" style="margin-left:150px;">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                    <div>
                
                    <?php    
                    $sql="SELECT * FROM registered where approved = 0";  
                    $retval=mysqli_query($conn, $sql);  

                    if(mysqli_num_rows($retval) > 0){
                    ?>
                    <table>
                        <tr>
                            <th>KTU ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>BOARDING</th>
                            <th>APPROVAL </th>
                        </tr>
                        <?php
                            while($row = mysqli_fetch_assoc($retval)){  
                                echo "<tr>
                                <td>{$row['ktuid']} </td> 
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['boarding']}</td>
                                <td>";
                            ?>
                            <button class="btn btn-success">
                                <a class="text" style="color:white;text-decoration:none;" href="dashboard.php?id=<?php echo($row['ktuid'])?>" onclick="return confirm('Are you sure to approve?');">Approve</a></button>
         
                                </td>
                            </tr>                        
                        <?php 
                            }
                        echo "</table>";
                    }
                    else
                    {  
                        echo "0 results";  
                    }  
                    mysqli_close($conn);  
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

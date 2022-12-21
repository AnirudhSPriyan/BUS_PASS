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
        <div class="col me-4" >
            
            <div class="row" style="margin-left:150px;" >
            <h1 class="page-header">Search Pass</h1>
                <form method="post">
                        <label>Search by Pass Number/Mobile Number</label>
                        <div class="d-flex">
                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control me-4">
                            <button type="submit" class="btn btn-success " name="search" id="submit">Search</button>
                        </div>
                </form>
            </div>
            <br/>      
            <?php    
                if(isset($_POST['searchdata'])){
                    $id=$_POST['searchdata'];
                    $sql="SELECT * FROM registered where ktuid like '$id%'";  
                    $retval=mysqli_query($conn, $sql); 
                    echo "<style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                        margin-left:150px;
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
                        mysqli_close($conn);  
                             
                }
                ?> 
</body>
</html>       

                
                                 
                                
            
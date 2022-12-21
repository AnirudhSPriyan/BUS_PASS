<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/dashboard.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/home.css" >
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
<div >
    <div class="card text-center col-6 col-lg-3 m-3" onclick="location.href='apply_pass.php'">
        <div class="d-flex justify-content-center align-items-center flex-row text-center">
        <h5 class="mb-0 percent">Apply Pass</h5>   
        
                
        </div>
    </div>


    <div class="card text-center col-6 col-lg-3 m-3" onclick="location.href='view_pass.php'">
        <div class="d-flex justify-content-center flex-row align-items-center text-center">
        <h5 class="mb-0 percent">View Pass</h5>   
        </div>
    </div>

</div>

<hr class="line">

 

</div>
</body>
</html>
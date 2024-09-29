<?php
session_start();
// IF user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login if username is not set
    header('Location: login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Profile submitted</title>
</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body " data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Recruitr</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="register.jsp">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php" >Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php" >Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <main>
       <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h3 class="text-center">Application Complete</h3><br>
        <div class="progress" role="progressbar" aria-label="Example 15px high" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 15px">
  <div class="progress-bar" style="width: 100%"></div>
</div>
<br>
      <h6 class="text-center">Application submitted successfully. <br>Please check your email :<?php echo $_SESSION['email'] ;?> for complete details.</h6>
      </div>
    </div>
  </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
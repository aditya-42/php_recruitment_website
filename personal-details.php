<?php
session_start();
// IF user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login if username is not set
    header('Location: login.php');
    exit();
}

// Read users.json
$users = json_decode(file_get_contents('users.json'), true);
$email = '';

// Validate credentials to get the email from json
foreach ($users as $user) {
    if ($user['username'] === $_SESSION['username']) {
        $_SESSION['email'] = $user['email'];
        $email = $_SESSION['email'];
        break; 
    }
}

// Session variables initialized
if (!isset($_SESSION['fullName'])) {
    $_SESSION['fullName'] = '';
}
if (!isset($_SESSION['phoneNumber'])) {
    $_SESSION['phoneNumber'] = '';
}

// Handle POST form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['fullName'] = trim(filter_var($_POST['fullName'], FILTER_SANITIZE_STRING));
    $_SESSION['phoneNumber'] = trim(filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
    header('Location: education-details.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Personal Details</title>
</head>
<body>
    <!-- nav starts -->
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
          <a class="nav-link active" href="login.php" >Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="logout.php" >Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <main>
       <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Personal Details</h3>
                    <form method="POST" action="">  
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="fullName" 
                                   value="<?php echo htmlspecialchars($_SESSION['fullName']); ?>" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" 
                                   value="<?php echo htmlspecialchars($email); ?>" disabled>
                        </div>    
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="phone" 
                                   value="<?php echo htmlspecialchars($_SESSION['phoneNumber']); ?>" placeholder="Enter your phone number" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save and next</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

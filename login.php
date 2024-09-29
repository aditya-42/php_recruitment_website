<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body>
  <!-- Nav starts -->
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
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
              <a class="nav-link " href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="login.php" >Login</a>
            </li>
          </ul>
        </div>
      </div>
</nav>
    <main>
        <div class="container login-container">
    <div class="login-form">
        <h3 class="text-center mb-4 mt-3">Login</h3>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Remember Me
                    </label>
                </div>
                
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <!-- php script starts -->
        <?php
        // Start session
        session_start();
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (isset($_POST["username"]) && isset($_POST["password"])){
            // Get username and password from the form
            $userInput = $_POST['username'];
            $passwordInput = $_POST['password'];
            $rememberMe= isset($_POST['rememberMe']);

            // Load users from JSON
            $users = json_decode(file_get_contents('users.json'), true);
            $applications = json_decode(file_get_contents('applications.json'), true);
            $validUser = false;

            // Validate credentials
            foreach ($users as $user) {
                if ($user['username'] === $userInput && password_verify($passwordInput, $user['password'])) {
                    $validUser = true;
                    break;
                }
            }

            

            if ($validUser) {
                // Start session
                $_SESSION['username'] = $userInput;

                // Set cookie for remember me
                if ($rememberMe) {
                    setcookie('username', $userInput, time() + (86400 * 7), "/"); // 7 days
                }
                

               // application already exists => redirect to submitted page
               foreach ($applications as $application) {
                if ($application['username'] === $userInput) {
                    $email = $application['email'] ;
                    $_SESSION['email'] = $email;
                    header('Location: submitted.php'); 
                    exit();
                  }
                }

                // Redirect to the job application form
                header('Location: personal-details.php');
                exit();
            } else {
                $error = 'Invalid username or password.';
            }
          }
        }
        ?>

    </div>
</div>
</main>
</body>
</html>
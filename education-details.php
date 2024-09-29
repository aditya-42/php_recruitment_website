<?php
session_start();

// if user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Session variables initialized
if (!isset($_SESSION['degree'])) {
    $_SESSION['degree'] = '';
}
if (!isset($_SESSION['fieldOfStudy'])) {
    $_SESSION['fieldOfStudy'] = '';
}
if (!isset($_SESSION['institution'])) {
    $_SESSION['institution'] = '';
}
if (!isset($_SESSION['graduationYear'])) {
    $_SESSION['graduationYear'] = '';
}

// Handle POST form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['degree'] = trim(filter_var($_POST['degree'], FILTER_SANITIZE_STRING));
    $_SESSION['fieldOfStudy'] = trim(filter_var($_POST['fieldOfStudy'], FILTER_SANITIZE_STRING));
    $_SESSION['institution'] = trim(filter_var($_POST['institution'], FILTER_SANITIZE_STRING));
    $_SESSION['graduationYear'] = trim(filter_var($_POST['graduationYear'], FILTER_SANITIZE_STRING));
    
    header('Location: work-experience.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Education Details</title>
</head>
<body>
  <!-- Nav starts -->
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Recruitr</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
       <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Education Details</h3>
                    <form method="POST" action="">  
                        <div class="mb-3">
                            <label for="degree" class="form-label">Highest Degree Obtained</label>
                            <input type="text" class="form-control" id="degree" name="degree" 
                                   value="<?php echo htmlspecialchars($_SESSION['degree']); ?>" 
                                   placeholder="Enter your highest degree" required>
                        </div>
                        <div class="mb-3">
                            <label for="fieldOfStudy" class="form-label">Field of Study</label>
                            <input type="text" class="form-control" id="fieldOfStudy" name="fieldOfStudy" 
                                   value="<?php echo htmlspecialchars($_SESSION['fieldOfStudy']); ?>" 
                                   placeholder="Enter your field of study" required>
                        </div>
                        <div class="mb-3">
                            <label for="institution" class="form-label">Name of Institution</label>
                            <input type="text" class="form-control" id="institution" name="institution" 
                                   value="<?php echo htmlspecialchars($_SESSION['institution']); ?>" 
                                   placeholder="Enter the name of your institution" required>
                        </div>
                        <div class="mb-3">
                            <label for="graduationYear" class="form-label">Year of Graduation</label>
                            <input type="number" class="form-control" id="graduationYear" name="graduationYear" 
                                   value="<?php echo htmlspecialchars($_SESSION['graduationYear']); ?>" 
                                   placeholder="Enter your graduation year" required>
                        </div>

                        <div class="row mb-4">
                            <div class="col">
                                <button type="button" onclick="location.href='personal-details.php';" 
                                        class="btn btn-secondary w-100">Previous</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100">Save and next</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

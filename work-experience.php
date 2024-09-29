<?php
session_start();

// if user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Session variables initialized
if (!isset($_SESSION['jobTitle'])) {
    $_SESSION['jobTitle'] = '';
}
if (!isset($_SESSION['companyName'])) {
    $_SESSION['companyName'] = '';
}
if (!isset($_SESSION['yearsExperience'])) {
    $_SESSION['yearsExperience'] = '';
}
if (!isset($_SESSION['keyResponsibilities'])) {
    $_SESSION['keyResponsibilities'] = '';
}

// Handle POST form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['jobTitle'] = trim(filter_var($_POST['jobTitle'], FILTER_SANITIZE_STRING));
    $_SESSION['companyName'] = trim(filter_var($_POST['companyName'], FILTER_SANITIZE_STRING));
    $_SESSION['yearsExperience'] = trim(filter_var($_POST['yearsExperience'], FILTER_SANITIZE_NUMBER_INT));
    $_SESSION['keyResponsibilities'] = trim(filter_var($_POST['keyResponsibilities'], FILTER_SANITIZE_STRING));

    header('Location: review.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Previous Work Experience</title>
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
                    <h3 class="text-center">Previous Work Experience</h3><br>
                    <div class="progress" role="progressbar" aria-label="Example 15px high" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 15px">
                        <div class="progress-bar" style="width: 60%"></div>
                    </div>
                    <br>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Previous Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" name="jobTitle" 
                                   value="<?php echo htmlspecialchars($_SESSION['jobTitle']); ?>" 
                                   placeholder="Enter your previous job title" required>
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" name="companyName" 
                                   value="<?php echo htmlspecialchars($_SESSION['companyName']); ?>" 
                                   placeholder="Enter the company name" required>
                        </div>
                        <div class="mb-3">
                            <label for="yearsExperience" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control" id="yearsExperience" name="yearsExperience" 
                                   value="<?php echo htmlspecialchars($_SESSION['yearsExperience']); ?>" 
                                   placeholder="Enter years of experience" required>
                        </div>
                        <div class="mb-3">
                            <label for="keyResponsibilities" class="form-label">Key Responsibilities</label>
                            <textarea class="form-control" id="keyResponsibilities" name="keyResponsibilities" rows="3" 
                                      placeholder="Describe your key responsibilities" required><?php echo htmlspecialchars($_SESSION['keyResponsibilities']); ?></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <button type="button" onclick="location.href='education-details.php';" class="btn btn-secondary w-100">Previous</button>
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

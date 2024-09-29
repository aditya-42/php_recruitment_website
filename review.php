<?php
session_start();

// if user is not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // JSON object for application data
    $applicationData = [
        'username' => $_SESSION['username'],
        'fullName' => $_SESSION['fullName'],
        'email' => $_SESSION['email'],
        'phone' => $_SESSION['phoneNumber'],
        'degree' => $_SESSION['degree'],
        'fieldOfStudy' => $_SESSION['fieldOfStudy'],
        'institution' => $_SESSION['institution'],
        'graduationYear' => $_SESSION['graduationYear'],
        'jobTitle' => $_SESSION['jobTitle'],
        'companyName' => $_SESSION['companyName'],
        'yearsExperience' => $_SESSION['yearsExperience'],
        'keyResponsibilities' => $_SESSION['keyResponsibilities']
    ];

    // Check if the JSON file exists and read existing data
    $filePath = 'applications.json';
    $applications = [];

    if (file_exists($filePath)) {
        $applications = json_decode(file_get_contents($filePath), true);
    }

    // Append new application data
   $applications[] = $applicationData;

    // Write back to JSON file
    file_put_contents($filePath, json_encode($applications));

    header('Location: submitted.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Review and Submit</title>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center">Review and Submit</h3><br>
                    <div class="progress" role="progressbar" aria-label="Example 15px high" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="height: 15px">
                        <div class="progress-bar" style="width: 80%"></div>
                    </div>
                    <br>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" value="<?php echo htmlspecialchars($_SESSION['fullName']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" disabled>
                        </div>    
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" value="<?php echo htmlspecialchars($_SESSION['phoneNumber']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="degree" class="form-label">Highest Degree Obtained</label>
                            <input type="text" class="form-control" id="degree" value="<?php echo htmlspecialchars($_SESSION['degree']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="fieldOfStudy" class="form-label">Field of Study</label>
                            <input type="text" class="form-control" id="fieldOfStudy" value="<?php echo htmlspecialchars($_SESSION['fieldOfStudy']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="institution" class="form-label">Name of Institution</label>
                            <input type="text" class="form-control" id="institution" value="<?php echo htmlspecialchars($_SESSION['institution']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="graduationYear" class="form-label">Year of Graduation</label>
                            <input type="number" class="form-control" id="graduationYear" value="<?php echo htmlspecialchars($_SESSION['graduationYear']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Previous Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" value="<?php echo htmlspecialchars($_SESSION['jobTitle']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="companyName" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="companyName" value="<?php echo htmlspecialchars($_SESSION['companyName']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="yearsExperience" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control" id="yearsExperience" value="<?php echo htmlspecialchars($_SESSION['yearsExperience']); ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="keyResponsibilities" class="form-label">Key Responsibilities</label>
                            <textarea class="form-control" id="keyResponsibilities" rows="1" disabled><?php echo htmlspecialchars($_SESSION['keyResponsibilities']); ?></textarea>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <button type="button" onclick="location.href='education-details.php';" class="btn btn-secondary w-100">Previous</button>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
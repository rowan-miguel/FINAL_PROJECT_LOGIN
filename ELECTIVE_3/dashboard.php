<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user information
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Logout processing
if (isset($_POST['logout'])) {
    // Destroy all session data
    session_destroy();
    
    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Welcome</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <style>
        .dashboard-container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .welcome-message {
            margin-bottom: 30px;
        }
        .dashboard-content {
            margin-top: 30px;
        }
        .stat-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .stat-label {
            color: #6c757d;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="dashboard.php">User Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <span class="text-white me-3">Welcome, <?php echo htmlspecialchars($user_name); ?></span>
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <button type="submit" name="logout" class="btn btn-outline-light">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard-container">
            <div class="welcome-message">
                <h2>Welcome to your Dashboard, <?php echo htmlspecialchars($user_name); ?></h2>
                <p class="text-muted">Here's an overview of your account</p>
            </div>
            
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle me-2"></i> You have successfully logged in to your account!
            </div>
            
            <div class="row dashboard-content">
                <div class="col-md-3">
                    <div class="stat-card bg-primary bg-opacity-10">
                        <div class="stat-icon text-primary">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="stat-value">45</div>
                        <div class="stat-label">Total Visits</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-success bg-opacity-10">
                        <div class="stat-icon text-success">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <div class="stat-value">8</div>
                        <div class="stat-label">Tasks</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-warning bg-opacity-10">
                        <div class="stat-icon text-warning">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="stat-value">3</div>
                        <div class="stat-label">Notifications</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card bg-danger bg-opacity-10">
                        <div class="stat-icon text-danger">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="stat-value">21</div>
                        <div class="stat-label">Favorites</div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">User Information</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <tr>
                                    <th>Name:</th>
                                    <td><?php echo htmlspecialchars($user_name); ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?php echo htmlspecialchars($user_email); ?></td>
                                </tr>
                                <tr>
                                    <th>Account ID:</th>
                                    <td>#<?php echo htmlspecialchars($user_id); ?></td>
                                </tr>
                                <tr>
                                    <th>Role:</th>
                                    <td><span class="badge bg-success">Member</span></td>
                                </tr>
                            </table>
                            <a href="#" class="btn btn-outline-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-sign-in-alt text-success me-2"></i>
                                        <span>Successful login</span>
                                    </div>
                                    <span class="text-muted small">Just now</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-user-edit text-primary me-2"></i>
                                        <span>Profile updated</span>
                                    </div>
                                    <span class="text-muted small">2 days ago</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-cog text-warning me-2"></i>
                                        <span>Settings changed</span>
                                    </div>
                                    <span class="text-muted small">1 week ago</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-user-plus text-info me-2"></i>
                                        <span>Account created</span>
                                    </div>
                                    <span class="text-muted small">2 weeks ago</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
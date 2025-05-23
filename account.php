<?php
// Start session
session_start();

// Mock user data (replace with database fetch in production)
$user = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'avatar' => 'https://via.placeholder.com/150'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - ZapCart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .account-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .avatar-container {
            text-align: center;
            margin-bottom: 2rem;
        }

        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control:read-only {
            background-color: #f8f9fa;
        }

        .btn-edit {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <?php include 'includes/navigation.php'; ?>

    <div class="container">
        <div class="account-container">
            <h2 class="text-center mb-4">Account Settings</h2>
            
            <div class="avatar-container">
                <img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Profile Avatar" class="avatar">
            </div>

            <form>
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" readonly>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-edit" disabled>
                        <i class="fas fa-edit"></i> Edit Profile
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 
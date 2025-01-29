<?php
require_once "_dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        button.btn.btn-primary {
            background-color: #5b3934 !important;
            color: white !important;
            border-color: #5b3934 !important;
        }

        .card-header {
            background-color: #dee2e6;

        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <?php
        // Check if the token is provided in the URL
        if (isset($_GET['token'])) {
            $token = $_GET['token'];

            // Verify the token in the database
            $sql = "SELECT * FROM users WHERE reset_token = ? AND reset_token_expire > NOW()";
            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                echo "Error in preparing SQL statement: " . $conn->error;
                exit;
            }

            $stmt->bind_param("s", $token);

            if (!$stmt->execute()) {
                echo "Error in executing SQL statement: " . $stmt->error;
                exit;
            }

            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user) {
                // Display reset password form
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Check if new password and confirm password match
                    if ($_POST['new_password'] === $_POST['confirm_password']) {
                        // Update user's password in the database
                        $new_password = $_POST['new_password'];
                        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash the new password using bcrypt
                        $sql_update = "UPDATE users SET password = ?, reset_token = NULL, reset_token_expire = NULL WHERE id = ?";
                        $stmt_update = $conn->prepare($sql_update);

                        if (!$stmt_update) {
                            echo "Error in preparing SQL statement: " . $conn->error;
                            exit;
                        }

                        $stmt_update->bind_param("si", $hashed_password, $user['id']);

                        if (!$stmt_update->execute()) {
                            echo "Error in updating password: " . $stmt_update->error;
                            exit;
                        }

                        // Clear reset token and expiration
                        $sql_clear_token = "UPDATE users SET reset_token = NULL, reset_token_expire = NULL WHERE id = ?";
                        $stmt_clear_token = $conn->prepare($sql_clear_token);

                        if (!$stmt_clear_token) {
                            echo "Error in preparing SQL statement: " . $conn->error;
                            exit;
                        }

                        $stmt_clear_token->bind_param("i", $user['id']);

                        if (!$stmt_clear_token->execute()) {
                            echo "Error in clearing reset token: " . $stmt_clear_token->error;
                            exit;
                        }

                        // Display success message and redirect after 2 seconds
                        echo '<div id="success-message" class="alert alert-success" role="alert">Password updated successfully.</div>';
                        echo '<script>
                            setTimeout(function(){
                                window.location.href = "../index.php";
                            }, 2000);
                          </script>';
                        exit;
                    } else {
                        echo '<div class="alert alert-danger" role="alert">New password and confirm password do not match.</div>';
                    }
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        Reset Your Password
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                    </div>
                </div>
                <?php
            } else {
                echo '<div class="alert alert-danger" role="alert">Invalid or expired reset token.</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Reset token not provided.</div>';
        }
        ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

require_once "_dbconnect.php";

// Step 1: User requests password reset (form submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input (email or username)
    $user_identifier = $_POST['user_identifier'];

    // Generate a unique token (you can use any method to generate a token)
    $token = bin2hex(random_bytes(32)); // Example: Generate a random 32-byte token

    // Store the token in the database along with the user's information
    $sql = "UPDATE users SET reset_token = ?, reset_token_expire = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error in preparing SQL statement: " . $conn->error;
        exit;
    }

    $stmt->bind_param("sss", $token, $user_identifier, $user_identifier);

    if (!$stmt->execute()) {
        echo "Error in executing SQL statement: " . $stmt->error;
        exit;
    }

    // Send an email with a link containing the token using PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kuyzjulio@gmail.com'; // SMTP username
        $mail->Password   = 'mrsi ovqp xyqn nqdy'; // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587; // SMTP port

        //Recipients
        $mail->setFrom('kuyzjulio@gmail.com', 'kuysjuliocafe');
        $mail->addAddress($user_identifier); // User's email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Link';
        $mail->Body    = 'Click the following link to reset your password: <a href="http://localhost/kuysjuliocafe/partials/update_password.php?token=' . $token . '">Reset Password</a>';

        $mail->send();
        echo '<script>alert("Password reset link has been sent to your email."); window.location.href = "../index.php";</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

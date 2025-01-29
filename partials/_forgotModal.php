<!-- Password reset modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Password reset form -->
                <form method="post" action="partials/_reset_password.php">
                    <!-- User Identifier (Email or Username) -->
                    <div class="form-group">
                        <label for="userIdentifier">Email or Username</label>
                        <input type="text" class="form-control" id="userIdentifier" name="user_identifier" placeholder="Enter your email or username" required>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="bottom-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                    <h5>Payment Options</h5>
                    <ul>
                        <li>
                            <a href="#"> <img src="image/maestro.png" alt="Maestro"> </a>
                        </li>
                        <li>
                            <a href="#"> <img src="image/cod.png" alt="Bitcoin"> </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-4 address color-gray">
                    <h5>Address</h5>
                    <p>Poblacion West, Munoz, Nueva Ecija</p>
                    <h5>Phone: +0123456789</h5>
                </div>
                <div class="col-xs-12 col-sm-5 additional-info color-gray">
    <h5>Additional Information</h5>
    <p>Join thousands of other cafés benefiting from partnering with us.</p>
    <h5 style="margin-top:35px;"><a href="<?php echo (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) ? 'admin/index.php' : 'admin/login.php'; ?>" style="color: #fff;">Admin Login</a></h5>
</div>

            </div>
        </div>
        <!-- Copyright Notice -->
        <div class="copyright text-center mt-3">
            <p>&copy; 2024 Kuyz JULIO CAFÉ . All rights reserved.</p>
        </div>
    </div>
</footer>

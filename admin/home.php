<h1 style="margin-top:98px">Welcome back <b>
        <?php echo $_SESSION['adminusername']; ?>
    </b></h1>
<div class="container-fluid">
    <div class="col-lg-12">
        <div class="card card-outline-primary">
            <div class="card-header">
                <h4 class="m-b-0 text-white">Admin Dashboard</h4>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa-solid fa-city f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php $sql = "select * from categories";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws; ?>
                                </h2>
                                <p class="m-b-0">Menu Categories</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa-solid fa-mug-hot f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php $sql = "select * from menu";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws; ?>
                                </h2>
                                <p class="m-b-0">Menus</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa-solid fa-users-gear f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php $sql = "select * from users";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws; ?>
                                </h2>
                                <p class="m-b-0">Users</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa-solid fa-cart-shopping f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php $sql = "select * from orders";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws; ?>
                                </h2>
                                <p class="m-b-0">Total Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-receipt f-s-40" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php
                                    $sql = "SELECT * FROM orders WHERE orderStatus IN ('0')";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws;
                                    ?>

                                </h2>
                                <p class="m-b-0">New Orders</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-spinner f-s-40" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php
                                    $sql = "SELECT * FROM orders WHERE orderStatus IN ( '1', '2', '3')";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws;
                                    ?>

                                </h2>
                                <p class="m-b-0">Processing Orders</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-check f-s-40" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php $sql = "select * from orders WHERE orderStatus IN ('4')";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws; ?>
                                </h2>
                                <p class="m-b-0">Delivered Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa fa-times f-s-40" aria-hidden="true"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php $sql = "select * from orders WHERE orderStatus IN ('5','6') ";
                                    $result = mysqli_query($conn, $sql);
                                    $rws = mysqli_num_rows($result);

                                    echo $rws; ?>
                                </h2>
                                <p class="m-b-0">Cancelled Orders</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-30">
                        <div class="media">
                            <div class="media-left meida media-middle">
                                <span><i class="fa-solid fa-peso-sign f-s-40"></i></span>
                            </div>
                            <div class="media-body media-text-right">
                                <h2>
                                    <?php
                                    $result = mysqli_query($conn, 'SELECT SUM(amount) AS value_sum FROM orders WHERE orderStatus = "4"');
                                    $row = mysqli_fetch_assoc($result);
                                    $sum = $row['value_sum'];
                                    // Format the sum as money
                                    $formatted_sum = number_format($sum, 2); // 2 decimal places
                                    echo '₱' . $formatted_sum; // Assuming US dollar currency
                                    ?>
                                </h2>
                                <p class="m-b-0">Total Earnings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
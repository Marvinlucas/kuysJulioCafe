<div class="container" style="margin-top:98px;background: aliceblue;">

    <div class="table-wrapper">
        <div class="table-title" style="border-radius: 14px;">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Order <b>Details</b></h2>
                </div>
                <div class="col-sm-8">
                    <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh
                            List</span></a>
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i>
                        <span>Print</span></a>
                </div>
            </div>
        </div>

        <ul class="nav nav-tabs flex-row " id="orderTabs">
            <li class="nav-item">
                <?php
                // Specify the order status you want to count
                $orderStatus = "0"; // For example, "New" status
                
                // Fetch orders with the specified status
                $sql = "SELECT COUNT(*) AS orderCount FROM `orders` WHERE `orderStatus` = '$orderStatus'";
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch the count of orders
                    $row = mysqli_fetch_assoc($result);
                    $orderCount = $row['orderCount'];
                    echo '
                <a class="nav-link active" id="newOrderTab" data-toggle="tab" href="#newOrder"
                    style="color:#5b3934 !important;">New Order
                    <span class="badge badge-pill badge-brown" id="newOrderCount">' . $orderCount . '</span> <!-- Notification badge -->
                </a>';
                } else {
                    // Handle the case where query fails
                    echo "Error fetching order count: " . mysqli_error($conn);
                }
                ?>
            </li>

            <li class="nav-item">
                <?php
                // Specify the order status you want to count
                $orderStatus = "1"; // For example, "New" status
                
                // Fetch orders with the specified status
                $sql = "SELECT COUNT(*) AS orderCount FROM `orders` WHERE `orderStatus` = '$orderStatus'";
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch the count of orders
                    $row = mysqli_fetch_assoc($result);
                    $orderCount = $row['orderCount'];
                    echo '
                <a class="nav-link" id="confirmOrderTab" data-toggle="tab" href="#confirmOrder"
                    style="color:#5b3934 !important;">Order Confirmed
                    <span class="badge badge-pill badge-brown" id="newOrderCount">' . $orderCount . '</span> <!-- Notification badge -->
                </a>';
                } else {
                    // Handle the case where query fails
                    echo "Error fetching order count: " . mysqli_error($conn);
                }
                ?>
            </li>

            <li class="nav-item">
                <?php
                // Specify the order status you want to count
                $orderStatus = "2"; // For example, "New" status
                
                // Fetch orders with the specified status
                $sql = "SELECT COUNT(*) AS orderCount FROM `orders` WHERE `orderStatus` = '$orderStatus'";
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch the count of orders
                    $row = mysqli_fetch_assoc($result);
                    $orderCount = $row['orderCount'];
                    echo '
                <a class="nav-link" id="preparingOrderTab" data-toggle="tab" href="#preparingOrder"
                    style="color:#5b3934 !important;">Preparing Order
                    <span class="badge badge-pill badge-brown" id="newOrderCount">' . $orderCount . '</span> <!-- Notification badge -->
                </a>';
                } else {
                    // Handle the case where query fails
                    echo "Error fetching order count: " . mysqli_error($conn);
                }
                ?>

            </li>

            <li class="nav-item">
                <?php
                // Specify the order status you want to count
                $orderStatus = "3"; // For example, "New" status
                
                // Fetch orders with the specified status
                $sql = "SELECT COUNT(*) AS orderCount FROM `orders` WHERE `orderStatus` = '$orderStatus'";
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch the count of orders
                    $row = mysqli_fetch_assoc($result);
                    $orderCount = $row['orderCount'];
                    echo '
                <a class="nav-link" id="otwOrderTab" data-toggle="tab" href="#otwOrder"
                    style="color:#5b3934 !important;">On the way
                    <span class="badge badge-pill badge-brown" id="newOrderCount">' . $orderCount . '</span> <!-- Notification badge -->
                </a>';
                } else {
                    // Handle the case where query fails
                    echo "Error fetching order count: " . mysqli_error($conn);
                }
                ?>

            </li>

            <li class="nav-item">
                <?php
                // Specify the order status you want to count
                $orderStatus = "4"; // For example, "New" status
                
                // Fetch orders with the specified status
                $sql = "SELECT COUNT(*) AS orderCount FROM `orders` WHERE `orderStatus` = '$orderStatus'";
                $result = mysqli_query($conn, $sql);

                // Check if query executed successfully
                if ($result) {
                    // Fetch the count of orders
                    $row = mysqli_fetch_assoc($result);
                    $orderCount = $row['orderCount'];
                    echo '
                <a class="nav-link" id="finishOrderTab" data-toggle="tab" href="#finishOrder"
                    style="color:#5b3934 !important;">Finish Order
                    <span class="badge badge-pill badge-brown" id="newOrderCount">' . $orderCount . '</span> <!-- Notification badge -->
                </a>';
                } else {
                    // Handle the case where query fails
                    echo "Error fetching order count: " . mysqli_error($conn);
                }
                ?>
            </li>

            <li class="nav-item">
                <?php
                // Specify the order statuses you want to count
            $sql = "SELECT COUNT(*) AS orderCount FROM `orders` WHERE (`orderStatus` >= 6 AND `orderStatus` <= 7)";
            $result = mysqli_query($conn, $sql);


            // Check if query executed successfully
            if ($result) {
                // Fetch the count of orders
                $row = mysqli_fetch_assoc($result);
                $orderCount = $row['orderCount'];
                echo '
                <a class="nav-link" id="canselOrderTab" data-toggle="tab" href="#cancelOrder"
                    style="color:#5b3934 !important;">Cancel Order
                    <span class="badge badge-pill badge-brown" id="newOrderCount">' . $orderCount . '</span> <!-- Notification badge -->
                </a>';
            } else {
                // Handle the case where query fails
                echo "Error fetching order count: " . mysqli_error($conn);
            }
            ?>
            </li>
        </ul>



        <div class="tab-content">

            <div class="tab-pane fade show active" id="newOrder">
                <?php
                // Fetch orders with status "New" or "Processing"
                $sql = "SELECT * FROM `orders` WHERE `orderStatus` = '0'";
                // Fetch and display orders
                include 'partials/order_display.php';
                ?>
            </div>

            <div class="tab-pane fade" id="confirmOrder">
                <?php
                // Fetch orders with status "Delivered" or "Cancelled"
                $sql = "SELECT * FROM `orders` WHERE `orderStatus` = '1'";
                // Fetch and display orders
                include 'partials/order_display.php';
                ?>
            </div>

            <div class="tab-pane fade" id="preparingOrder">
                <?php
                // Fetch orders with status "Delivered" or "Cancelled"
                $sql = "SELECT * FROM `orders` WHERE `orderStatus` = '2'";
                // Fetch and display orders
                include 'partials/order_display.php';
                ?>
            </div>

            <div class="tab-pane fade" id="otwOrder">
                <?php
                // Fetch orders with status "Delivered" or "Cancelled"
                $sql = "SELECT * FROM `orders` WHERE `orderStatus` = '3'";
                // Fetch and display orders
                include 'partials/order_display.php';
                ?>
            </div>

            <div class="tab-pane fade" id="finishOrder">
                <?php
                // Fetch orders with status "Delivered" or "Cancelled"
                $sql = "SELECT * FROM `orders` WHERE `orderStatus` = '4'";
                // Fetch and display orders
                include 'partials/order_display.php';
                ?>
            </div>

            <div class="tab-pane fade" id="cancelOrder">
                <?php
                // Fetch orders with status "Delivered" or "Cancelled"
                $sql = "SELECT * FROM `orders` WHERE (`orderStatus` >= 6 AND `orderStatus` <= 7)";
                // Fetch and display orders
                include 'partials/order_display.php';
                ?>
            </div>
        </div>

    </div>
</div>

<?php
include 'partials/_orderItemModal.php';
include 'partials/_orderStatusModal.php';
?>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
    .tooltip.show {
        top: -62px !important;
    }

    .table-wrapper .btn {
        float: right;
        color: #333;
        background-color: #fff;
        border-radius: 3px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-wrapper .btn:hover {
        color: #333;
        background: #f2f2f2;
    }

    .table-wrapper .btn.btn-primary {
        color: #5b3934;
        background: #fff2ec;
    }

    .table-wrapper .btn.btn-primary:hover {
        background: #c48c71;
        color: #fff;
    }

    .table-title .btn {
        font-size: 13px;
        border: none;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    .table-title {
        color: #fff;
        background: #5b3934;
        padding: 16px 25px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 80px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        /* background-color: #fcfcfc; */
    }

    table.table-striped.table-hover tbody tr:hover {
        /* background: #f5f5f5; */
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.view {
        width: 30px;
        height: 30px;
        color: #2196F3;
        border: 2px solid;
        border-radius: 30px;
        text-align: center;
    }

    table.table td a.view i {
        font-size: 22px;
        margin: 2px 0 0 1px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    table {
        counter-reset: section;
    }

    .count:before {
        counter-increment: section;
        content: counter(section);
    }
</style>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
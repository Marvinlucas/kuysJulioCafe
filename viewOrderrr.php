<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <title>Home</title>
  <link rel="icon" href="img/logo.jpg" type="image/x-icon">
  <style>
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            margin: 150px auto;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
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
            color: #fff;
            background: #5b3934;
        }

        .table-wrapper .btn.btn-primary:hover {
            background: #c48c71;
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
            color: #495057;
            background: #e9ecef;
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
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
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

        footer {
            background-color: #5b3934;
            padding: 70px 0 10px;
            z-index: 1;
            position: relative;
        }
    </style>
</head>

<body>
  <?php include 'partials/_dbconnect.php'; ?>
  <!-- ======= Hero Section ======= -->
  <div class="full_bg">
    <header class="nav-down">
      <?php require 'partials/_nav.php' ?>
    </header>
  </div>
  <?php
  if ($loggedin) {
    ?>

    <div class="container mt-5">
      <div class="table-wrapper" id="empty">
        <div class="table-title">
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

        <ul class="nav nav-tabs" id="orderTabs">
          <li class="nav-item">
            <a class="nav-link active" id="newOrderTab" data-toggle="tab" href="#newOrder"
              style="color:#5b3934 !important;">New Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="finishOrderTab" data-toggle="tab" href="#finishOrder"
              style="color:#5b3934 !important;">Finish Order</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="newOrder">
            <?php
            // Fetch orders with status "New" or "Processing"
            $sql = "SELECT * FROM `orders` WHERE `userId` = $userId AND (`orderStatus` >= 0 AND `orderStatus` <= 4)";
            // Fetch and display orders
            include 'partials/order_display.php';
            ?>
          </div>
          <div class="tab-pane fade" id="finishOrder">
            <?php
            // Fetch orders with status "Delivered" or "Cancelled"
            $sql = "SELECT * FROM `orders` WHERE `userId` = $userId AND (`orderStatus` = '4')";
            // Fetch and display orders
            include 'partials/order_display.php';
            ?>
          </div>
        </div>
      </div>
    </div>


    <?php
  } else {
    echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Check your Order. You need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
  }
  ?>

  <?php
  include 'partials/_orderItemModal.php';
  include 'partials/_orderStatusModal.php';
  require 'partials/_footer.php' ?>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
  <script src="assets/js/scrollHandler.js"></script>
</body>

</html>
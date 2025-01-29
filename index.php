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
    .full_bg {
      background: url(images/banner2.jpg);
      background-size: 100% 100%;
      background-position: center;
      background-repeat: no-repeat;
    }

    @media (max-width: 767px) {
      .full_bg {
        background: url(images/banner2.jpg);
        background-size: cover;
        /* Adjust background-size for better display on mobile */
        background-repeat: no-repeat;
        /* Ensure the image is not repeated */
        background-position: center;
      }
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
    <section class="banner_main">
      <div class="container">
        <div class="banner_po">
          <div class="row">
            <div class="col-md-7">
              <div class="text_box">
                <h1> <strong>Your Coffee </strong> <br> To Go! </h1>
                <a class="read_more" href="#menu-section" role="button">Order Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Category container starts here -->
  <div class="container my-3 mb-5">
    <section class="popular" id="menu-section">
      <div class="container">
        <div class="titlepage text-center">
          <h2>Our Menu</h2>
          <span>Easiest way to order your favourite coffee.</span>
        </div>
        <div class="row">


          <?php
          $sql = "SELECT * FROM `categories`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['categorieId'];
            $cat = $row['categorieName'];
            $desc = $row['categorieDesc'];

            echo '  <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                         <img src="img/card-' . $id . '.jpg" class="card-img-top" alt="image for this category" width="249px" height="270px">
                                                <div class="content">
                                                    <h5><a href="viewMenuList.php?catid=' . $id . '">' . $cat . '</a></h5>
                                                    <div class="product-name">' . substr($desc, 0, 30) . '... </div>
                                                    <div class="row justify-content-center">
                                                    <div class="price-btn-block"> <span class="price"></span> <a href="viewMenuList.php?catid=' . $id . '" class="btn theme-btn-dash pull-right">View All</a> </div>
                                                </div>
                                                </div>
                                            </div>
                                    </div>';
          }
          ?>
        </div>
      </div>
    </section>
  </div>
  <?php require 'partials/_footer.php' ?>
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
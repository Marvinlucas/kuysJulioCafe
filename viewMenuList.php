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
    <title id="title">Category</title>
    <link rel="icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        .jumbotron {
            padding: 2rem 1rem;
        }

        #cont {
            min-height: 570px;
        }

        .full_bg {
            background: url(images/banner2.jpg);
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 20px;
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
    <header class="nav-down">
        <?php require 'partials/_nav.php' ?>
    </header>

    <div>&nbsp;
        <a href="index.php" class="active text-dark">
            <i class="fas fa-qrcode"></i>
            <span>All Category</span>
        </a>
    </div>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE categorieId = $id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['categorieName'];
        $catdesc = $row['categorieDesc'];
    }
    ?>

    <!-- menu container starts here -->
    <div class="container my-3 mb-5" id="cont">
        <section class="popular">
            <div class="container">
                <div class="titlepage text-center">
                    <h2 id="catTitle">Items</h2>
                </div>

                <div class="row mt-5">
                    <?php
                    $id = $_GET['catid'];
                    $sql = "SELECT * FROM `menu` WHERE menuCategorieId = $id";
                    $result = mysqli_query($conn, $sql);
                    $noResult = true;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $noResult = false;
                        $menuId = $row['menuId'];
                        $menuName = $row['menuName'];
                        $menuPrice = $row['menuPrice'];
                        $menuDesc = $row['menuDesc'];

                        echo '<div class="col-xs-12 col-sm-6 col-md-4 food-item">
                <div class="food-item-wrap">
                            <img src="img/menu-' . $menuId . '.jpg" class="card-img-top" alt="image for this menu" width="249px" height="270px">
                            <div class="content">
                                <h5 class="card-title">' . substr($menuName, 0, 20) . '...</h5>
                                <h6 style="color: #ff0000">₱' . $menuPrice . '.00</h6>
                                <p class="card-text">' . substr($menuDesc, 0, 29) . '...</p>   
                                <div class="row justify-content-center">';
                        if ($loggedin) {
                            $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE menuId = '$menuId' AND `userId`='$userId'";
                            $quaresult = mysqli_query($conn, $quaSql);
                            $quaExistRows = mysqli_num_rows($quaresult);
                            if ($quaExistRows == 0) {
                                echo '<form action="partials/_manageCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="' . $menuId . '">
                                              ';
                            } else {
                                echo '';
                            }
                        } else {
                            echo '';
                        }
                        echo '</form>                            
                <div class="price-btn-block"> <span class="price"></span><a href="viewMenu.php?menuId=' . $menuId . '" class="btn theme-btn-dash pull-right">Quick View</button></a></div> 
               
                                </div>
                            </div>
                        </div>
                    </div>';
                    }
                    if ($noResult) {
                        echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry In this category No items available.</p>
                        <p class="lead"> We will update Soon.</p>
                    </div>
                </div> ';
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
    <script>
        document.getElementById("title").innerHTML = "<?php echo $catname; ?>";
        document.getElementById("catTitle").innerHTML = "<?php echo $catname; ?>"; 
    </script>
    <script src="assets/js/scrollHandler.js"></script>
</body>

</html>
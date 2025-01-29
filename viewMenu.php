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
    <title id=title>menu</title>
    <link rel="icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        #cont {
            min-height: 578px;
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

    <div class="container view" id="cont">
        <div class="card">
            <div class="card-body">
                <?php
                $menuId = $_GET['menuId'];
                $sql = "SELECT * FROM `menu` WHERE menuId = $menuId";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $menuName = $row['menuName'];
                $menuPrice = $row['menuPrice'];
                $menuDesc = $row['menuDesc'];
                $menuCategorieId = $row['menuCategorieId'];
                ?>
                <script>
                    document.getElementById("title").innerHTML = "<?php echo $menuName; ?>";
                </script>
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/menu-<?php echo $menuId; ?>.jpg" class="img-fluid" alt="menu Image"
                            style="object-fit: cover; width: 100%; height: 100%;">
                    </div>
                    <div class="col-md-6 mt-4">
                        <h3 class="card-title">
                            <?php echo $menuName; ?>
                        </h3>
                        <h5 class="card-text" style="color: #ff0000">₱
                            <?php echo $menuPrice; ?>.00
                        </h5>
                        <p class="card-text" style="text-align: justify;">
                            <?php echo $menuDesc; ?>
                        </p>


                        <?php
                        if ($loggedin) {
                            $quaSql = "SELECT `itemQuantity` FROM `viewcart` WHERE menuId = '$menuId' AND `userId`='$userId'";
                            $quaresult = mysqli_query($conn, $quaSql);
                            $quaExistRows = mysqli_num_rows($quaresult);
                            if ($quaExistRows == 0) {
                                // Fetch size options and prices from the database based on menu category ID
                                $sizeSql = "SELECT `sizeName`, `sizePrice` FROM `size` WHERE categoryId = '$menuCategorieId'";
                                $sizeResult = mysqli_query($conn, $sizeSql);
                                $sizes = mysqli_fetch_all($sizeResult, MYSQLI_ASSOC);

                                // Fetch addon options and prices from the database
                                $addonSql = "SELECT `addonName`, `addonPrice` FROM `addon` WHERE categoryId = '$menuCategorieId'";
                                $addonResult = mysqli_query($conn, $addonSql);
                                $addons = mysqli_fetch_all($addonResult, MYSQLI_ASSOC);
                                ?>
                                <form action="partials/_manageCart.php" method="POST">
                                    <input type="hidden" name="itemId" value="<?php echo $menuId; ?>">
                                    <div class="form-group">
                                        <label for="size">Size:</label>
                                        <select name="size" id="size" class="form-control">
                                            <?php
                                            foreach ($sizes as $size) {
                                                echo '<option value="' . $size['sizeName'] . '-' . $size['sizePrice'] . '">' . $size['sizeName'] . ' (₱' . $size['sizePrice'] . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="addon">Addon:</label>
                                        <select name="addon" id="addon" class="form-control">
                                            <?php
                                            foreach ($addons as $addon) {
                                                echo '<option value="' . $addon['addonName'] . '-' . $addon['addonPrice'] . '">' . $addon['addonName'] . ' (₱' . $addon['addonPrice'] . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <button type="submit" name="addToCart" class="btn btn-primary">Add to Cart</button>
                                </form>
                                <?php
                            } else {
                                // Fetch size options and prices from the database based on menu category ID
                                $sizeSql = "SELECT `sizeName`, `sizePrice` FROM `size` WHERE categoryId = '$menuCategorieId'";
                                $sizeResult = mysqli_query($conn, $sizeSql);
                                $sizes = mysqli_fetch_all($sizeResult, MYSQLI_ASSOC);

                                // Fetch addon options and prices from the database
                                $addonSql = "SELECT `addonName`, `addonPrice` FROM `addon` WHERE categoryId = '$menuCategorieId'";
                                $addonResult = mysqli_query($conn, $addonSql);
                                $addons = mysqli_fetch_all($addonResult, MYSQLI_ASSOC);
                                ?>
                                <form action="partials/_manageCart.php" method="POST">
                                    <input type="hidden" name="itemId" value="<?php echo $menuId; ?>">
                                    <div class="form-group">
                                        <label for="size">Size:</label>
                                        <select name="size" id="size" class="form-control">
                                            <?php
                                            foreach ($sizes as $size) {
                                                echo '<option value="' . $size['sizeName'] . '-' . $size['sizePrice'] . '">' . $size['sizeName'] . ' (₱' . $size['sizePrice'] . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="addon">Addon:</label>
                                        <select name="addon" id="addon" class="form-control">
                                            <?php
                                            foreach ($addons as $addon) {
                                                echo '<option value="' . $addon['addonName'] . '-' . $addon['addonPrice'] . '">' . $addon['addonName'] . ' (₱' . $addon['addonPrice'] . ')</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="space-between mt-5" style="display: flex; justify-content: space-around;">
                                        <a href="viewMenuList.php?catid=<?php echo $menuCategorieId; ?>"
                                            class="btn btn-secondary active text-dark" style="text-decoration: none;">
                                            <i class="fa-solid fa-arrow-left-long"></i>
                                            <span>Continue Shopping</span>
                                        </a>
                                        <button type="submit" name="addToCart" class="btn cart">Add to Cart</button>
                                    </div>
                                </form>

                                <?php
                            }
                        } else {
                            ?>
                            <button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginModal">Add to
                                Cart</button>

                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
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
    <script src="https://kit.fontawesome.com/ef7dab569f.js" crossorigin="anonymous"></script>
    <script src="assets/js/scrollHandler.js"></script>
</body>

</html>
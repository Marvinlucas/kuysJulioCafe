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
    <title>Cart</title>
    <link rel="icon" href="img/logo.jpg" type="image/x-icon">
    <style>
        #cont {
            min-height: 626px;
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
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($loggedin) {
        ?>

        <div class="container mb-5" id="cont">
            <div class="titlepage text-center mt-5">
                <h2 id="catTitle">My Cart</h2>
            </div>
            <div class="row marginlr mt-5">
                <div class="col-lg-8 mb-3">
                    <div class="card ">
                        <div class="table-responsive" style="background-color: #fff;">
                            <table class="table text-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Add On</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM `viewcart` WHERE `userId`= $userId";
                                    $result = mysqli_query($conn, $sql);
                                    $counter = 0;
                                    $totalPrice = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $menuId = $row['menuId'];
                                        $Quantity = $row['itemQuantity'];

                                        // Fetch menu details including original price
                                        $menuSql = "SELECT * FROM `menu` WHERE menuId = $menuId";
                                        $menuResult = mysqli_query($conn, $menuSql);
                                        $menuRow = mysqli_fetch_assoc($menuResult);
                                        $catId = $row['menuId'];
                                        $menuName = $menuRow['menuName'];
                                        $menuPrice = $menuRow['menuPrice'];

                                        // Fetch size and addon details
                                        $menuSize = $row['size'];
                                        $menuAddon = $row['addon'];

                                        // Fetch sizePrices and addonPrices
                                        $sizePrices = $row['sizePrices'];
                                        $addonPrices = $row['addonPrices'];

                                        // Set default display price to the original menu price
                                        $displayPrice = $menuPrice;

                                        // If sizePrices is not empty, replace display price with sizePrices
                                        if (!empty($sizePrices)) {
                                            $displayPrice = $sizePrices;
                                        }

                                        $total = ($displayPrice + $addonPrices) * $Quantity;
                                        $counter++;
                                        $totalPrice = $totalPrice + $total;
                                        ?>
                                        <tr>
                                            <td><img src="/kuysjuliocafe/img/menu-<?php echo $catId; ?>.jpg"
                                                    alt="image for this Category" width="100px" height="100px"></td>
                                            <td class="align-middle">
                                                <?php echo $menuName; ?>
                                            </td>
                                            <td class="align-middle">₱
                                                <?php echo $displayPrice; ?>.00
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $menuSize; ?>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $menuAddon; ?>
                                            </td>
                                            <td class="align-middle">
                                                <form id="frm<?php echo $menuId; ?>">
                                                    <input type="hidden" name="menuId" value="<?php echo $menuId; ?>">
                                                    <input type="number" name="quantity" value="<?php echo $Quantity; ?>"
                                                        class="text-center form-control"
                                                        onchange="updateCart(<?php echo $menuId; ?>)" onkeyup="return false"
                                                        style="width:60px" min="1" oninput="check(this)"
                                                        onClick="this.select();">
                                                </form>
                                            </td>
                                            <td class="align-middle">₱
                                                <?php echo $total; ?>.00
                                            </td>
                                            <td class="align-middle">
                                                <form action="partials/_manageCart.php" method="POST">
                                                    <button name="removeItem" class="btn btn-sm btn-outline-danger"
                                                        type="submit">
                                                        <i class="fas fa-trash-alt"></i> <!-- Font Awesome trash icon -->
                                                    </button>
                                                    <input type="hidden" name="itemId" value="<?php echo $menuId; ?>">
                                                </form>
                                            </td>

                                        </tr>

                                        <?php
                                    }

                                    if ($counter == 0) {
                                        echo '<script> document.getElementById("cont").innerHTML = \'<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>\';</script>';
                                    }
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-3">
                        <div class="pt-4  rounded p-3">
                            <h5 class="mb-3 text-uppercase font-weight-bold text-center">Order summary</h5>
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 ">
                                    Total Price<span>₱
                                        <?php echo $totalPrice ?>.00
                                    </span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0 ">
                                    Shipping<span>Free</span></li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3 ">
                                    <div>
                                        The total amount of

                                        <p class="mb-0">(including Tax & Charge)</p>

                                    </div>
                                    <span><strong>₱
                                            <?php echo $totalPrice ?>.00
                                        </strong></span>
                                </li>
                            </ul>
                            <div>
                                <strong>Note:</strong><span class="text-muted"> Rider accepts GCash payment</span>
                            </div>

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Cash On Delivery
                                </label>
                            </div><br>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                data-target="#checkoutModal">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
    } else {
        echo '<div class="container" style="min-height : 610px;">
        <div class="alert alert-info my-3">
            <font style="font-size:22px"><center>Before checkout you need to <strong><a class="alert-link" data-toggle="modal" data-target="#loginModal">Login</a></strong></center></font>
        </div></div>';
    }
    ?>
    <?php require 'partials/_checkoutModal.php'; ?>
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
        function check(input) {
            if (input.value <= 0) {
                input.value = 1;
            }
        }
        function updateCart(id) {
            $.ajax({
                url: 'partials/_manageCart.php',
                type: 'POST',
                data: $("#frm" + id).serialize(),
                success: function (res) {
                    location.reload();
                }
            })
        }
    </script>
</body>

</html>
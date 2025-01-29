<?php
include '_dbconnect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    if (isset($_POST['addToCart'])) {
        $itemId = $_POST["itemId"];
        
        // Initialize size and addon variables to NULL
        $size = NULL;
        $sizePrices = NULL;
        $addon = NULL;
        $addonPrices = NULL;

        // Check if size is selected
        if(!empty($_POST["size"])) {
            // Extract size and its corresponding price from the selected option value
            $sizeWithPrice = explode('-', $_POST["size"]);
            $size = $sizeWithPrice[0];
            $sizePrices = $sizeWithPrice[1];
        }

        // Check if addon is selected
        if(!empty($_POST["addon"])) {
            $addonWithPrice = explode('-', $_POST["addon"]);
            $addon = $addonWithPrice[0];
            $addonPrices = $addonWithPrice[1];
        }

        // Check whether this item exists
        $existSql = "SELECT * FROM `viewcart` WHERE menuId = '$itemId' AND size = '$size' AND addon = '$addon' AND `userId`='$userId'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            // If item exists, increase quantity
            $updateSql = "UPDATE `viewcart` SET `itemQuantity` = `itemQuantity` + 1 WHERE menuId = '$itemId' AND size = '$size' AND addon = '$addon' AND `userId`='$userId'";
            $updateResult = mysqli_query($conn, $updateSql);
            if ($updateResult) {
                echo "<script>alert('Item Quantity Increased.');
                window.history.back(1);
                </script>";
            } else {
                echo "<script>alert('Error updating item quantity.');
                window.history.back(1);
                </script>";
            }
        } else {
            // If item doesn't exist, add new item to cart
            $sql = "INSERT INTO `viewcart` (`menuId`, `itemQuantity`, `size`, `sizePrices`, `addon`, `addonPrices`, `userId`, `addedDate`) VALUES ('$itemId', '1', '$size', '$sizePrices', '$addon', '$addonPrices', '$userId', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Item Added to Cart.');
                window.history.back(1);
                </script>";
            } else {
                echo "<script>alert('Error adding item to cart.');
                window.history.back(1);
                </script>";
            }
        }
    
    }
    if (isset($_POST['removeItem'])) {
        $itemId = $_POST["itemId"];
        $sql = "DELETE FROM `viewcart` WHERE `menuId`='$itemId' AND `userId`='$userId'";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed');
                window.history.back(1);
            </script>";
    }
    if (isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";
        $result = mysqli_query($conn, $sql);
        echo "<script>alert('Removed All');
                window.history.back(1);
            </script>";
    }
    if (isset($_POST['checkout'])) {
        $amount = $_POST["amount"];
        $address1 = $_POST["address"];
        $address2 = $_POST["address1"];
        $phone = $_POST["phone"];
        $zipcode = $_POST["zipcode"];
        $password = $_POST["password"];
        $address = $address1 . " | " . $address2;

        $passSql = "SELECT * FROM users WHERE id='$userId'";
        $passResult = mysqli_query($conn, $passSql);
        $passRow = mysqli_fetch_assoc($passResult);
        $userName = $passRow['username'];
        if (password_verify($password, $passRow['password'])) {
            $sql = "INSERT INTO `orders` (`userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES ('$userId', '$address', '$zipcode', '$phone', '$amount', '0', '0', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            $orderId = $conn->insert_id;
            if ($result) {
                $addSql = "SELECT * FROM `viewcart` WHERE userId='$userId'";
                $addResult = mysqli_query($conn, $addSql);
                while ($addrow = mysqli_fetch_assoc($addResult)) {
                    $menuId = $addrow['menuId'];
                    $itemQuantity = $addrow['itemQuantity'];
                    $itemSize = $addrow['size'];
                    $itemAddon = $addrow['addon'];
                    $itemSql = "INSERT INTO `orderitems` (`orderId`, `menuId`, `itemQuantity`, `size`, `addon`) VALUES ('$orderId', '$menuId', '$itemQuantity', '$itemSize','$itemAddon')";
                    $itemResult = mysqli_query($conn, $itemSql);
                }
                $deletesql = "DELETE FROM `viewcart` WHERE `userId`='$userId'";
                $deleteresult = mysqli_query($conn, $deletesql);
                echo '<script>alert("Thanks for ordering with us. Your order id is ' . $orderId . '.");
                    window.location.href="http://localhost/kuysjuliocafe/index.php";  
                    </script>';
                exit();
            }
        } else {
            echo '<script>alert("Incorrect Password! Please enter correct Password.");
                    window.history.back(1);
                    </script>';
            exit();
        }
    }
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $menuId = $_POST['menuId'];
        $qty = $_POST['quantity'];
        $updatesql = "UPDATE `viewcart` SET `itemQuantity`='$qty' WHERE `menuId`='$menuId' AND `userId`='$userId'";
        $updateresult = mysqli_query($conn, $updatesql);
    }

}
?>

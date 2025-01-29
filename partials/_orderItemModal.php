<?php 
    $itemModalSql = "SELECT * FROM `orders` WHERE `userId`= $userId";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderid = $itemModalRow['orderId'];
    
?>

<!-- Modal -->
<div class="modal fade" id="orderItem<?php echo $orderid; ?>" tabindex="-1" role="dialog" aria-labelledby="orderItem<?php echo $orderid; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderItem<?php echo $orderid; ?>">Order Items</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            
                <div class="container">
                    <div class="row">
                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table text">
                            <thead>
                                <tr>
                                <th scope="col" class="border-0 bg-light align-middle text-center">
                                    <div class="px-3">Image</div>
                                </th>
                                <th scope="col" class="border-0 bg-light align-middle text-center">
                                    <div class="px-3">Name</div>
                                </th>
                                <th scope="col" class="border-0 bg-light align-middle text-center">
                                    <div class="px-3">Size</div>
                                </th>
                                <th scope="col" class="border-0 bg-light align-middle text-center">
                                    <div class="text-center">AddOns</div>
                                </th>
                                <th scope="col" class="border-0 bg-light align-middle text-center">
                                    <div class="text-center">Quantity</div>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
        $mysql = "SELECT * FROM `orderitems` WHERE orderId = $orderid";
        $myresult = mysqli_query($conn, $mysql);
        if(mysqli_num_rows($myresult) > 0) {
            while($myrow = mysqli_fetch_assoc($myresult)){
                $menuId = $myrow['menuId'];
                $itemQuantity = $myrow['itemQuantity'];
                $menuSize =  $myrow['size'];
                $menuAddon =  $myrow['addon'];

                $itemsql = "SELECT * FROM `menu` WHERE menuId = $menuId";
                $itemresult = mysqli_query($conn, $itemsql);
                if($itemresult && mysqli_num_rows($itemresult) > 0) {
                    $itemrow = mysqli_fetch_assoc($itemresult);
                    $menuName = $itemrow['menuName'];
                    $menuDesc = $itemrow['menuDesc'];
                    $menuCategorieId = $itemrow['menuCategorieId'];

                    echo '<tr>
                            <th scope="row">
                                <div class="p-2">
                                <img src="img/menu-'.$menuId. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                </div>
                            </th>
                            <td class="align-middle text-center"><strong>' .$menuName. '</strong></td>
                            <td class="align-middle text-center"><strong>' .$menuSize. '</strong></td>
                            <td class="align-middle text-center"><strong>' .$menuAddon. '</strong></td>
                            <td class="align-middle text-center"><strong>' .$itemQuantity. '</strong></td>
                        </tr>';
                } else {
                    // Handle case when no matching menu found
                    echo '<tr><td colspan="2">No menu found for ID: ' . $menuId . '</td></tr>';
                }
            }
        } else {
            // Handle case when no items found for the order
            echo '<tr><td colspan="2">No items found for order ID: ' . $orderid . '</td></tr>';
        }
    ?>
</tbody>

                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
    }
?>
<div class="table-responsive mt-3">
    <table class="table table-striped table-hover text-center" id="NoOrder">
        <thead>
            <tr>
                <th>Id</th>
                <th>Address</th>
                <th>Phone No</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Items</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, $sql);
            $counter = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                $Id = $row['userId'];
                $orderId = $row['orderId'];
                $address = $row['address'];
                $zipCode = $row['zipCode'];
                $phoneNo = $row['phoneNo'];
                $amount = $row['amount'];
                $orderDate = $row['orderDate'];
                $paymentMode = $row['paymentMode'];

                if ($paymentMode == 0) {
                    $paymentMode = "Cash on Delivery";
                } else {
                    $paymentMode = "Online";
                }
                $orderStatus = $row['orderStatus'];
                $counter++;

                echo '<tr>
                                <td>' . $Id . '</td>
                                <td>' . $address . '</td>
                                <td>' . $phoneNo . '</td>
                                <td>₱' . $amount . '.00</td>
                                <td>' . $paymentMode . '</td>
                                <td>' . date('M d, Y', strtotime($orderDate)) . '</td>
                                <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                                <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                            </tr>';
            }
            if ($counter == 0) {
                ?>
                <script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Order!	</div>';</script>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<table class=" table-responsive table table-striped table-hover text-center">
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
            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){
                $orderId = $row['orderId'];
                $address = $row['address'];
                $zipCode = $row['zipCode'];
                $phoneNo = $row['phoneNo'];
                $amount = $row['amount'];
                $orderDate = $row['orderDate'];
                $paymentMode = $row['paymentMode'];
                if($paymentMode == 0) {
                    $paymentMode = "Cash on Delivery";
                }
                else {
                    $paymentMode = "Online";
                }
                $orderStatus = $row['orderStatus'];
                
                $counter++;
                
                echo '<tr>
                        <td>' . $orderId . '</td>
                        <td>' . $address . '</td>
                        <td>' . $phoneNo . '</td>
                        <td>₱' . $amount . '.00</td>
                        <td>' . $paymentMode . '</td>
                        <td>' . date('M d, Y', strtotime($orderDate)) . '</td>
                        <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                        <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                        
                    </tr>';
            
            }
            
            if($counter == 0) {
                $result = mysqli_query($conn, $sql);
            $counter = 0;
            while($row = mysqli_fetch_assoc($result)){
                $orderId = $row['orderId'];
                $address = $row['address'];
                $zipCode = $row['zipCode'];
                $phoneNo = $row['phoneNo'];
                $amount = $row['amount'];
                $orderDate = $row['orderDate'];
                $paymentMode = $row['paymentMode'];
                if($paymentMode == 0) {
                    $paymentMode = "Cash on Delivery";
                }
                else {
                    $paymentMode = "Online";
                }
                $orderStatus = $row['orderStatus'];
                
                $counter++;
                
                echo '<tr>
                        <td>' . $orderId . '</td>
                        <td>' . $address . '</td>
                        <td>' . $phoneNo . '</td>
                        <td>₱' . $amount . '.00</td>
                        <td>' . $paymentMode . '</td>
                        <td>' . date('M d, Y', strtotime($orderDate)) . '</td>
                        <td><a href="#" data-toggle="modal" data-target="#orderStatus' . $orderId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                        <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                        
                    </tr>';
            
            } }
        ?>
    </tbody>
</table>

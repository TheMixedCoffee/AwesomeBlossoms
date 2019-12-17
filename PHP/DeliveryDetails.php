<!DOCTYPE html>
<?php
$activePage = "DeliveryDetails";
?>
    <head>
        <link rel="stylesheet" type="text/css" href="../Styles/Purchase2.css">
    </head>
    <body>
        <!--Content Box-->
        <?php include("NavBar.php"); ?>
        <div class="container">
 
            <!--End of Header-->
			<!--Main Box-->
			<div class="main-box row">
            <div class="row">
				<p id="purchase" class="m-3"> Purchase </p>
                <div class="order-details col mx-2 my-2">
					<p class="text-in-main"> Order Details </p>
                    <?php
                    $totalPriceCart = 0;
                    $currentOrder = $_POST['orderID'];
                    $query = "SELECT * from order_line inner join user_order on order_line.orderID = user_order.orderID where order_line.orderID = '$currentOrder'";
                    if(mysqli_query($conn,$query)){
                        $rs = mysqli_query($conn,$query);
                    }else{
                        echo mysqli_error($conn);
                    }
                    $itemQuery = "SELECT * from item left join order_line on item.itemID=order_line.itemID";
                    $itemRS = mysqli_query($conn,$itemQuery);
                    $itemRow = mysqli_fetch_assoc($itemRS);
                    while($row = mysqli_fetch_assoc($rs)){
                        $totalPriceItem = $row['totalPrice'];
                        $itemQty = $row['quantity'];
                        $totalPriceCart += $totalPriceItem;
                        echo '<div class="py-3">
                                <span class="cart-item-name">'.$itemRow['itemName'].'</span>
                                <span class="cart-item-qty">'.$itemQty.'x</span>
                                <span class="cart-item-total">'.$totalPriceItem.'</span>
                             </div>';
                             $itemRow = mysqli_fetch_assoc($itemRS);
                    }
                    echo '<span class="cart-total">Total:'.$totalPriceCart.'</span>';
                    ?>
				</div>
				<div class="delivery-details col mx-2 my-2">
					<p class="text-in-main"> Delivery Details </p>
                    <form action="Home.php?delivered=1" method="POST">
                    <label for="deliverDate">Date of Delivery</label>
                    <input type="date" name="dateDelivered" value="<?php echo date('Y-m-d'); ?>" />
                    <br>
                    <label for="deliverAddress">Address</label>
                    <input type="text" name="addressDelivered">
				</div>
				<div class="mode-of-payment col mx-2 my-2">
					<p class="text-in-main"> Mode of Payment </p>
                                <select name="category">
                                    <option value ="cod">Cash on Delivery</option>
                                    <option value ="pm">PayMaya</option>
                                    <option value ="gcash">GCash</option>
                                    <option value ="cc">Credit Card</option>
                                </select>
                    <div class="confirm-order mx-2 my-2">
					<button type="submit" class="confirm-button"> Confirm Order </button>
                    </form>
				</div>
				</div>
			</div>
            </div>
			<!--End of Main Box-->
            <!--Footer-->
            <!--End of Footer-->    
        </div>
        <?php include("Footer.php"); ?>
        <!--End of Content-->
    </body>
</html>
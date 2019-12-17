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
			<div class="main-box">
				<p id="purchase"> Purchase </p>
				<div class="order-details">
					<p class="text-in-main"> Order Details </p>
                    <?php
                    $query = "SELECT * from order_line inner join account where order_line.accountID = account.AccountID";
                    $rs = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_assoc($rs)){
                        $totalPriceItem = $row['itemPrice'] * $row['quantity'];
                        $totalPriceCart += $totalPriceItem;
                        echo '<div class="py-3">
                                <span class="cart-item-name">'.$row['itemName'].'</span>
                                <span class="cart-item-qty">'.$row['quantity'].'x</span>
                                <span class="cart-item-price">'.$row['itemPrice'].'=</span>
                                <span class="cart-item-total">'.$totalPriceItem.'</span>
                             </div>';
                        echo ''
                    }
                    ?>
				</div>
				<div class="delivery-details">
					<p class="text-in-main"> Delivery Details </p>
				</div>
				<div class="mode-of-payment">
					<p class="text-in-main"> Mode of Payment </p>
				</div>
				<div class="confirm-order">
					<button class="confirm-button"> Confirm Order </button>
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
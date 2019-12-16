<!DOCTYPE html>
<?php
$activePage = "PurchaseFlowers";
?>
    <head>
        <title>Awesome Blossoms</title>
        <link rel="stylesheet" type="text/css" href="../Styles/Purchase2.css">
        <link rel="shortcut icon" type="image/png" href="../Images/Icons/Logo/favicon.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <!--Content Box-->
        <div class="container">
           <?php include("NavBar.php"); ?>
            <!--End of Header-->
			<!--Main Box-->
			<div class="main-box">
				<p id="purchase"> Purchase </p>
				<div class="order-details">
					<p class="text-in-main"> Order Details </p>
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
            <?php include("Footer.php"); ?>
            <!--End of Footer-->    
        </div>
        <!--End of Content-->
    </body>
</html>
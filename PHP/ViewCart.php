<?php
    $activePage = "View Cart";
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Styles/ViewCart.css">
    </head>
    <body>
        <?php
        include("NavBar.php");
        ?>
            <!--End of Header-->
            <!--View Cart Us-->
               <div class="cart-body">
                <a href="PurchaseFlowers.html">
                    <button id="back-button">
                        X
                    </button>
                </a>
                <h3 id="cart-header">Cart</h3>
                <div class="cart-body-details">
                    <img src="https://via.placeholder.com/125" class="product-prev" alt="Product Preview">
                    <div class="flower-details">
                        <p class="det-words">Product Details</p>
                    </div>
                    <div class="order-details">
                        <p class="det-words">Order Details</p>
                    </div>
                    <button id="remove-cart">Remove from Cart</button>
                    <button id="edit-order">Edit Order</button>
                </div>
                <a href="Purchase Flowers - Purchase.html">
                <button id="purchase-button">Purchase</button>
                </a>
                </div>

               </div>
             <!--View Cart Section-->
             <!--Footer-->
            <footer class="footer">
                <span class="copyright"><h4>Awesome Blossoms Copyright (c) 2019</h4></span>
                <a href="#" class="to-top">Back to Top</a>
                <div class="footer-soc-med">
                    <a href="http://www.facebook.com"><img src="../Images/Icons/facebook.png" class="footer-soc-med-item" alt="Facebook"></a>
                    <a href="www.twitter.com"><img src="../Images/Icons/twitter.png" class="footer-soc-med-item" alt="Twitter"></a>
                    <a href="www.instagram.com"><img src="../Images/Icons/instagram.png" class="footer-soc-med-item" alt="Instagram"></a>
                </div>
            </footer>
            <!--End of Footer-->    
        </div>
        <!--End of Content-->
    </body>
</html>
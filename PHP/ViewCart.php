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
                <div class="cart-body-details row">
                    <div class="flower-details col-md-6">
                        <?php
                            if(isset($_POST['purchase-qty'])){
                                $qty = $_POST['purchase-qty'];
                            }else{
                                $qty = 1;
                            }
                            if(isset($_SESSION['cart'])){
                                $product_id = array_column($_SESSION['cart'],"itemID");
                                $query = "SELECT * from item";
                                $rs = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($rs)){
                                    foreach($product_id as $id){
                                        if($row['itemID'] ==  $id){
                                            echo '<div>
                                                <form action="ViewCart.php" method="POST">
                                                <img src="../Images/Shop/'.$row["itemPic"].'" class="cart-item-img" alt="Item Image">
                                                <h3 class="item-title">'.$row["itemName"].'</h3>
                                                <span class="item-price">Price:P'.$row["itemPrice"].'</span>
                                                <input type="number" class="quick-purchase-qty-input" name="purchase-qty" value='.$qty.'>
                                                <button type="submit" class="btn" name="Remove">Remove</button>
                                                </form>
                                                </div>';
                                        }
                                    }
                                }
                            }                            
                        ?>
                        <p class="det-words">Product Details</p>
                    </div>
                    <div class="order-details col-md-4">
                        <p class="det-words">Order Details</p>
                        <div>
                            <a href="Purchase Flowers - Purchase.html">
                            <button id="purchase-button">Purchase</button>
                            </a>
                        </div>
                    </div>
               </div>
             <!--View Cart Section-->
             <!--Footer-->
            <!--End of Footer-->    
        </div>
        <?php include("Footer.php"); ?> 
        <!--End of Content-->
    </body>
</html>
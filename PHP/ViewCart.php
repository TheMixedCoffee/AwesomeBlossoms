<?php
   $activePage = "View Cart";

   if(isset($_GET['action'])){
       if($_GET['action']== "removed"){
           include_once("ServerConnect.php");
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["itemID"] == $_GET['id']){
            unset($_SESSION['cart'][$key]);
            }
        }
        }
    }

?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Styles/ViewCart.css">
    </head>
    <body>
        <?php
        include("NavBar.php");
        include("AddCart.php");
        include("removeFromCart.php");
        include("UpdateItemCart.php");
        ?>
            <!--End of Header-->
            <!--View Cart Us-->
               <div class="cart-body">
                <a href="FlowerStore.php">
                    <button id="back-button">
                        X
                    </button>
                </a>
                <h3 id="cart-header">Cart</h3>
                <div class="cart-body-details row">
                    <div class="flower-details col-md-6">
                    <p class="det-words">Product Details</p>
                        <?php
                            if(isset($_POST['addQty'])){
                                $qty = $_POST['addQty'];
                            }else{
                                $qty = 1;
                            }
                            if(isset($_SESSION['cart'])){
                                $product_id = array_column($_SESSION['cart'],"itemID");
                                $query = "SELECT * from item inner join order_line on item.itemID=order_line.itemID";
                                $rs = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($rs)){
                                    foreach($product_id as $id){
                                        if($row['itemID'] ==  $id && $row['accountID'] == $_SESSION['accountID']){
                                            echo '<div class="py-3">
                                                <form action="UpdateItemCart.php" method="POST">
                                                <img src="../Images/Shop/'.$row["itemPic"].'" class="cart-item-img" alt="Item Image">
                                                <h3 class="item-title">'.$row["itemName"].'</h3>
                                                <span class="item-price">Price:P'.$row["itemPrice"].'</span>
                                                <br>
                                                <label for="qty">Quantity:</label>
                                                <input type="hidden" name="itemID" value='.$row['itemID'].'>
                                                <input type="number" class="quick-purchase-qty-input" name="addQty" value='.$row["quantity"].'>
                                                <button type="submit" class="btn" name="update">Update</button>
                                                <button type="submit" class="btn" name="remove">Remove</button>
                                                </form>
                                                </div>';
                                        }
                                    }
                                }
                            }else{
                                echo "Cart is empty";
                            }                            
                        ?>
                       
                    </div>
                    <div class="order-details col-md-4">
                        <p class="det-words">Order Details</p>
                        <div>
                            <?php
                            $totalPriceCart = 0;
                        if(isset($_SESSION['cart'])){
                                $product_id = array_column($_SESSION['cart'],"itemID");
                                $query = "SELECT * from item left join order_line on item.itemID=order_line.itemID";
                                $rs = mysqli_query($conn,$query);
                                while($row = mysqli_fetch_assoc($rs)){
                                    foreach($product_id as $id){
                                        if($row['itemID'] ==  $id){
                                            $totalPriceItem = $row['itemPrice'] * $row['quantity'];
                                            $totalPriceCart += $totalPriceItem;
                                            echo '<div class="py-3">
                                                    <span class="cart-item-name">'.$row['itemName'].'</span>
                                                    <span class="cart-item-qty">'.$row['quantity'].'x</span>
                                                    <span class="cart-item-total">'.$totalPriceItem.'</span>
                                                 </div>';
                                        }
                                    }
                                }
                                echo '<hr><br><span class="cart-total-price">Total:P'.$totalPriceCart.'</span>';
                            }
                            ?>
                            
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
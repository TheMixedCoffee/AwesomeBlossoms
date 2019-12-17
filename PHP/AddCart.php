<?php
if(isset($_POST['add'])){
    if(!isset($_SESSION['current_user'])){
        echo "<script> alert('You must log in to continue'); </script>";
    }else{
        $itemID = $_POST['itemID'];
        if(isset($_SESSION['cart'])){
            $item_array_id = array_column($_SESSION['cart'], "itemID");
            if(in_array($_POST['itemID'],$item_array_id)){
                echo "<script> alert('Item already in cart'); </script>";
                $query = "DELETE FROM order_line WHERE itemID = '$itemID'";
                mysqli_query($conn,$query);
            }else{
                $numItems = count($_SESSION['cart']);
                $item_array = array(
                    'itemID' => $_POST['itemID']
                );
                $_SESSION['cart'][$numItems] = $item_array;
            }
        }else{
            $item_array = array(
                'itemID' => $_POST['itemID']
            );
            $_SESSION['cart'][0] = $item_array;
        }
        $Email = $_SESSION['current_user'];
        $accountQuery = "SELECT AccountID from account where Email='$Email'";
        $accountRS = mysqli_query($conn,$accountQuery);
        $accRow = mysqli_fetch_assoc($accountRS);
        $accountID = $accRow['AccountID'];
        if(!isset($_SESSION['order'])){
            $orderQuery = "INSERT INTO user_order (accountID) VALUES('$accountID');";
            $orderRS = mysqli_query($conn,$orderQuery);
        }
        $getOrderID = "SELECT orderID from user_order where accountID ='$accountID'";
        $getOrderRS = mysqli_query($conn,$getOrderID);
        $orderRow = mysqli_fetch_assoc($getOrderRS);
        $orderID = $orderRow['orderID'];
        $_SESSION['order'] = $orderID;
        $priceQuery = "SELECT * from item WHERE itemID='$itemID'";
        $priceRS = mysqli_query($conn,$priceQuery);
        $row = mysqli_fetch_assoc($priceRS);
        $itemPrice = $row['itemPrice'];           
        $itemQty = 1;
        $totalItemPrice = $itemQty * $itemPrice;        
        $query = "INSERT INTO order_line (orderID,itemID,quantity,totalPrice,accountID) VALUES ('$orderID','$itemID','$itemQty','$totalItemPrice','$accountID') LIMIT 1";
        if(mysqli_query($conn,$query)){
    
        }else{
            echo mysqli_error($conn);
        }
    }
   
}


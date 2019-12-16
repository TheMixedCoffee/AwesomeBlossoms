<?php
if(isset($_POST['add'])){
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
    $priceQuery = "SELECT * from item WHERE itemID='$itemID'";
    $priceRS = mysqli_query($conn,$priceQuery);
    $row = mysqli_fetch_assoc($priceRS);
    $itemPrice = $row['itemPrice'];           
    $itemQty = $_POST['addQty'];
    $totalItemPrice = $itemQty * $itemPrice;
    $query = "INSERT INTO order_line (itemID,quantity,totalPrice) VALUES ('$itemID','$itemQty','$totalItemPrice') LIMIT 1";
    if(mysqli_query($conn,$query)){

    }else{
        echo mysqli_error($conn);
    }
}
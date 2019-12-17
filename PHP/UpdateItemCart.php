<?php
include_once("ServerConnect.php");
if(isset($_POST["update"])){
    $itemID = $_POST['itemID'];
    $newQty = $_POST['addQty'];
    $query = "UPDATE order_line SET quantity=$newQty where itemID='$itemID'";
                if(mysqli_query($conn,$query)){
                }else{
                    echo mysqli_error($conn);
                }
}

?>
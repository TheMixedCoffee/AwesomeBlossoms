<?php
include_once("ServerConnect.php");
if(isset($_POST["update"])){
    $itemID = $_POST['itemID'];
    $newQty = $_POST['addQty'];
    $query = "UPDATE order_line SET quantity=$newQty where itemID='$itemID'";
                if(mysqli_query($conn,$query)){
                    header("location:ViewCart.php?updated&id='$itemID'");
                }else{
                    echo mysqli_error($conn);
                }
}

?>

<?php
if(isset($_POST["remove"])){
    $itemID = $_POST['itemID'];
    $query = "DELETE from order_line where itemID='$itemID'";
                if(mysqli_query($conn,$query)){
                    header("location:ViewCart.php?action=removed&id='$itemID'");
                }else{
                    echo mysqli_error($conn);
                }                
}

?>
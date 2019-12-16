<?php
    include_once("ServerConnect.php");
    if(isset($_POST['confirmAddBtn'])){
        var_dump($_POST);
        echo "<script> console.log('yeet') </script>";
        $itemName = $_POST['addName'];
        if(!empty($_POST['tag'])){
            echo "<script> console.log('yeeters') </script>";
            $itemIDQuery = "SELECT itemID FROM item WHERE itemName = '$itemName'";
            $rs = mysqli_query($conn,$itemIDQuery);
            echo $itemIDQuery;
            $numRows = mysqli_num_rows($rs);
            if($numRows == 1){
                echo "<script> console.log('yeeteries') </script>";
                $itemDetails = mysqli_fetch_assoc($rs);
                $itemID = $itemDetails['itemID'];
            }
            foreach($_POST['tag'] as $selected){
                echo "<script> console.log('wow') </script>";
                $getCategory = "SELECT category_id FROM category WHERE cat_name= '$selected'";
                echo "<script> console.log($selected) </script>";
                $categoryRS =  mysqli_query($conn, $getCategory);
                $categoryDetails = mysqli_fetch_assoc($categoryRS);
                $categoryID = $categoryDetails['category_id'];
                $query = "INSERT INTO item_category (category_id,item_id) VALUES ('$categoryID', '$itemID')";
                mysqli_query($conn,$query);
            }
            print_r($query);
        }
    }
 
?>
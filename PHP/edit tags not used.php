//TAGS QUERY
        $itemIDQuery = "SELECT itemID FROM item WHERE itemName = '$itemName'";
        $rs = mysqli_query($conn,$itemIDQuery);
        $itemDetails = mysqli_fetch_assoc($rs);
        $itemID = $itemDetails['itemID'];
        $removeTagQuery = "SELECT * from item_category WHERE item_id = $itemID";
        $rtqRS = mysqli_query($conn,$removeTagQuery);
        $rtqNum = mysqli_num_rows($rtqRS);
        if($rtqNum == 1){
            $rtqRow = mysqli_fetch_assoc($rtqRS);
            foreach($_POST['tag'] as $selected){
                if($rtqRow['category_id'] != $selected){
                    $getCategory = "SELECT category_id FROM category WHERE category_id= '$selected'";
                    $categoryRS =  mysqli_query($conn, $getCategory);
                    $categoryDetails = mysqli_fetch_assoc($categoryRS);
                    $categoryID = $categoryDetails['category_id'];
                    $query = "INSERT INTO item_category (category_id,item_id) VALUES ('$categoryID', '$itemID')";
                    mysqli_query($conn,$query);
                }else{
                    $query = "DELETE FROM item_category WHERE category_id = $selected && item_id=$itemID";
                    mysqli_query($conn,$query);
                    $rtqRow = mysqli_fetch_assoc($rtqRS);
                }
        }    
    }else{
        foreach($_POST['tag'] as $selected){
                $getCategory = "SELECT category_id FROM category WHERE category_id= '$selected'";
                $categoryRS =  mysqli_query($conn, $getCategory);
                $categoryDetails = mysqli_fetch_assoc($categoryRS);
                $categoryID = $categoryDetails['category_id'];
                $query = "INSERT INTO item_category (category_id,item_id) VALUES ('$categoryID', '$itemID')";
                mysqli_query($conn,$query);
        }
    }
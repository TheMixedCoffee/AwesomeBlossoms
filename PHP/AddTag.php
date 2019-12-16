<?php
    if(isset($_POST['addNewTag'])){
        $newTagName = $_POST['newTagName'];
        $dupTag = "SELECT * from category where cat_name='$newTagName'";
        $tagRS = mysqli_query($conn,$dupTag);
        $numRows = mysqli_num_rows($tagRS);
        if($numRows == 1){
            $row = mysqli_fetch_assoc($tagRS);
            $temp = $row["active"];
            if($temp == 1){
                echo "<script type='text/javascript'> alert('Tag already exists in the database') </script>";
            }else{
                $queryActive = "UPDATE category 
                SET active = 1 WHERE cat_name = '$newTagName'";
                mysqli_query($conn, $queryActive) or die("Query failed: " . mysqli_error($conn));
                header("location:FlowerShopAdmin.php?activeTag=1");
            }
        }else{
            $query = "INSERT INTO category (cat_name) VALUES ('$newTagName')";
            mysqli_query($conn,$query);
            header("location:FlowerShopAdmin.php?addedTag=1");
        }
    }
?>
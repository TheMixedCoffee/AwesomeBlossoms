<?php
if(isset($_POST['confirmEdit'])){
    $newFName = $_POST['newFName'];
    $newLName = $_POST['newLName'];
    $newAddress = $_POST['newAddress'];
    $newNumber = $_POST['newNumber'];
    $currUser = $_SESSION['current_user'];
    $query = "UPDATE account 
            SET FName = '$newFName', 
            LName = '$newLName', 
            Address = '$newAddress', 
            ContactNumber = '$newNumber' 
            WHERE Email = '$currUser'";
    if(mysqli_query($conn,$query)){
        echo "<script type='text/javascript'> alert('Updated successfully') </script>";
    }
    $newQuery = "SELECT * from account where Email='$currUser' LIMIT 1";
		$rs = mysqli_query($conn,$newQuery);
		$numRows = mysqli_num_rows($rs);
		if($numRows == 1){
			$row = mysqli_fetch_assoc($rs);
				$_SESSION['current_user'] = $row['Email'];
				$_SESSION['login_user'] = $row['FName'];
				$_SESSION['user_lname'] = $row['LName'];
				$_SESSION['user_address'] = $row['Address'];
				$_SESSION['user_number'] = $row['ContactNumber'];
        }
}
?>
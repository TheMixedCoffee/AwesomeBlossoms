<?php
include_once("ServerConnect.php");
if(isset($_POST['submit'])){
    $feedback = $_POST['feedback'];
    if(isset($_SESSION['current_user'])){
        $email = $_SESSION['current_user'];
        $query = "SELECT * from account where Email='$email' LIMIT 1";
		$rs = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($rs);
        $userID = $row['AccountID'];
    }else{
        echo "<script> alert('You are not logged in, feedback will be sent anonymously'); </script>";
        $userID = 00000000000;
    }
    $insertQuery = "INSERT INTO feedback(feedbackDesc,accountID) VALUES (?,?)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$insertQuery);
    mysqli_stmt_bind_param($stmt, "si",$feedback, $userID);
    mysqli_stmt_execute($stmt);
    var_dump($_POST);
    echo "$userID";
    header("Location: ContactUs.php?feedback=sent");
}
?>
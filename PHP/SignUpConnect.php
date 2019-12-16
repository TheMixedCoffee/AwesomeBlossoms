<?php

$email = "";
$password = "";
$confirmPassword = "";
$firstName = "";
$lastName = "";
$address = "";
$contactNumber = "";

if(isset($_POST['signUp'])){
        $email= $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $contactNumber = $_POST['contactNumber'];
        $userType = "customer";

        $dupEmail = "SELECT Email from account where Email='$email'";
        $emailRS = mysqli_query($conn,$dupEmail);
        if(mysqli_num_rows($emailRS)){
            echo "<script type='text/javascript'> alert('Email has already been used. Please use a different email.') </script>";
        }else{
            if(strcmp($confirmPassword,$password)==0){
                $userPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO account (FName, LName, Address, Email, ContactNumber, Password, UserType) VALUES ('$firstName', '$lastName', '$address', '$email', '$contactNumber', '$userPassword','$userType')";
                mysqli_query($conn,$sql);

                header("Location:Home.php?signup=1");
            }
        }
}
?>
<?php 
$pass = '';
if(isset($_GET['invalid'])){
   echo '<script> alert("UNAUTHORIZED USER DETECTED") </script>';
}
?>
<!DOCTYPE html>
<head>
    <title>Awesome Blossoms - Oopsie</title>
    <link rel="stylesheet" type="text/css" href="../Styles/Header.css">
    <link rel="stylesheet" type="text/css" href="../Styles/Footer.css">
    <link rel="shortcut icon" type="image/png" href="../Images/Icons/Logo/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body onload ="timeout()">
    <h1>Oof! Something went wrong! You're not supposed to be here >:( </h1>
    <img src="../Images/Placeholder/gabutan.jpg" >
    <h2>Redirecting in 5 seconds</h2>
    <h3>If nothing happens, click <a href="Home.php">here</a></h3>
</body>
</html>
<script type="text/javascript">
function timeout(){
        window.setTimeout(function(){
        window.location.href = "Home.php";
    },5000);
}
</script>
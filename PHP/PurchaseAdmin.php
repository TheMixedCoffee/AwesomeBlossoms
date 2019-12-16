<!DOCTYPE html>
    <head>
        <title>Awesome Blossoms</title>
        <link rel="stylesheet" type="text/css" href="../Styles/PurchaseAdmin.css">
        <link rel="stylesheet" type="text/css" href="../Styles/HeaderNew.css">
        <link rel="stylesheet" type="text/css" href="../Styles/Footer.css">
        <script src="../Scripts/PurchaseAdmin.js"></script>
        <link rel="shortcut icon" type="image/png" href="../Images/Icons/Logo/favicon.png"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!--Content Box-->
        <?php
            include('NavBar.php');
        ?>
    <div class="row" id="admin-option">
            <div class="col">
                    <button onclick="addItem()" id="addBtn" class="btn btn-success">Add New Item</button>
            </div>
        </div>
        <div class="row" id="body">
        </div>
        <div id="storeFront">
            
            </div>
        </div>
        <!--End of Content-->
    </body>
</html>
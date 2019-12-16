<?php
global $activePage;
$activePage = "Home";
?>
<!DOCTYPE html>
<head>
    <title>Awesome Blossoms</title>
    <link rel="stylesheet" type="text/css" href="../Styles/Home.css">
    <?php
    if(isset($_GET['success'])){
        echo "<script> alert('You have logged in successfully!') </script>";
    }else if(isset($_GET['signup'])){
        echo "<script type='text/javascript'> alert('Signed up successfully! You can now log in.') </script>";
    }else if(isset($_GET['logout'])){
        echo "<script type='text/javascript'> alert('Logged out') </script>";
    }
    ?>
</head>
<body>
    <?php include("NavBar.php") ?>
    <!--Content Box-->
    <div class="container-fluid">
        <!--Header-->

        <!--End of Header-->
        <!--Aside-->
        <aside class="flowers-of-the-month">
            <h3 id ="fotm-header">Flowers of the Month</h3>
            <div class="fotm-item">
                <div class="fotm-item">
                    <img src="...\Images\Home Flowers\5.jpg" class="fotm-item-image" alt="Flower of the month">
                    <span class="fotm-name">Lavender</span>
                </div>
                <div class="fotm-item">
                    <img src="...\Images\Home Flowers\7.jpg" class="fotm-item-image" alt="Flower of the month">
                    <span class="fotm-name">Peony</span>
                </div>
                <div class="fotm-item">
                    <img src="...\Images\Home Flowers\14.jpg" class="fotm-item-image" alt="Flower of the month">
                    <span class="fotm-name">Yellow Daisy</span>
                </div>
                <div class="fotm-item">
                    <img src="...\Images\Home Flowers\15.jpg" class="fotm-item-image" alt="Flower of the month">
                    <span class="fotm-name">Daffodil</span>

                </div>    
                <div class="fotm-item">
                    <img src="...\Images\Home Flowers\1.jpg" class="fotm-item-image" alt="Flower of the month">
                    <span class="fotm-name">Bromeliads</span>
                </div>
            </aside>
            <!--End of Aside-->
            <!--About Section-->
            <section class="about-section">
                <h2 id="about-header">About Awesome Blossoms</h2>
                <p class="about-body">
                    Awesome Blossoms is a fairly new company which recently established in the early months of the year 2017. 
                    Its first retail store, which is also its main store, is located in Nasipit, Talamban, Cebu City. 
                    The company sells different kinds of flowers and also has a delivery service for these flowers. 
                    the need for a more accessible way for customers who live a distance away or is unable to physically buy flowers from the main store,
                    the company deployed a website on April 2018 which allows customers to order flowers online and have them delivered to their homes or events. 
                    The company started to blossom near the end of 2018 when it gained attention due to its wide selection of flowers.
                    Awesome Blossoms is hopeful to expand and have more branches in the near future.
                </p>
            </section>
            <!--End of About Section-->
            <!--Flower Gallery-->
            <section class="flower-gallery">
                <h4 id="flower-gallery-header">Flower Gallery</h4>
                <div class="gallery-item">
                    <img src="...\Images\Home Flowers\1.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\2.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\3.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\4.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\5.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\6.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\7.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\8.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\9.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\10.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\11.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\12.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\13.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\14.jpg" class="gallery-item-image" alt="Gallery item">
                    <img src="...\Images\Home Flowers\15.jpg" class="gallery-item-image" alt="Gallery item">
                </div>
            </section>
            <!--End of Gallery-->
            <!--Footer-->
            <?php include("Footer.php"); ?>
            <!--End of Footer-->    
        </div>
        <!--End of Content-->
    </body>
    </html>
<?php
$activePage = "PurchaseFlowers";
?>
<!DOCTYPE html>
    <head>
        <link rel="stylesheet" type="text/css" href="../Styles/Purchase.css">
    </head>
    <body>
        <?php include("NavBar.php"); 
        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page = $_GET['page'];
        }?>
        <!--Content Box-->
        <div class="container-fluid">
            <div class="container-wrap">
            <!--Aside-->
            <aside class="related-articles">
                <h3 id ="related-article-header">Related Articles</h3>
                <article class="article-item">
                    <h4 class ="article-title">Scents and sensibility: Time to wake up and (actually) smell the roses</h4>
                    <img src="../Images/Articles/1.jpg" class="article-item-image" alt="Related Article Image">
                    <p class="article-desc">We are a generation that have become used to lacklustre smelling botanicals. Adrian Higgins gets to the root of how we can make our gardens smell great again. <a href="https://www.independent.co.uk/environment/flower-garden-scent-fragrance-perfumed-plants-a9239286.html">Read more...</a> </p>
                </article>
                <article class="article-item">
                    <h4 class ="article-title">12 best artificial flowers: Realistic florals and foliage to brighten up any living space</h4>
                    <img src="../Images/Articles/2.jpg" class="article-item-image" alt="Related Article Image">
                    <p class="article-desc">Want a beautiful floral arrangement that will last for years? Opt for these striking faux blooms. <a href="https://www.independent.co.uk/extras/indybest/house-garden/best-fake-flowers-home-bouquet-silk-artificial-wedding-graves-uk-a8928856.html ">Read more...</a> </p>
                </article>
                <article class="article-item">
                    <h4 class ="article-title">Gardeners urged to let lawns run wild and count flowers to help save bees</h4>
                    <img src="../Images/Articles/3.jpg" class="article-item-image" alt="Related Article Image">
                    <p class="article-desc">'We're helping turn our famous trimmed green lawns into riots of colour with buttercups, daises and dandelions,' say campaigners. <a href="https://www.independent.co.uk/environment/no-mow-may-gardeners-wild-flowers-help-save-bees-a8927161.html">Read more...</a> </p>
                </article>
            </aside>
            <!--End of Aside-->
            <!--Purchase Section-->
            <div class="purchase-section">
                <div>
                        <h2 id="purchase-header">Purchase Flowers</h2>
                        <div id="view-cart-button">
                                <a href="ViewCart.php">View Cart</a>
                                <?php
                                if(isset($_SESSION['cart'])){
                                    $numItems = count($_SESSION['cart']);
                                    echo "<span>$numItems</span>";
                                }else{
                                    echo "<span>0</span>";
                                }
                                ?>
                        </div>
                            
                            <div id="category-dropdown">
                                <h6 id="category-title">Select a Category</h6>
                                <select name="category">
                                    <option value ="fotm">Flowers of the Month</option>
                                    <option value ="alpha">Alphabetical</option>
                                    <option value ="events">Events</option>
                                    <option value ="bouquet">Bouquet</option>
                                </select>
                            </div>
                </div>
              
                <div id="purchase-window">
                    <?php
                    include("AddCart.php");
                    $resultsPerPage = 15;
                    $startQuery = "SELECT * FROM item where itemStock > 0";
                    $startRS = mysqli_query($conn,$startQuery);
                    $numRS = mysqli_num_rows($startRS);
                    $numPages = ceil($numRS/$resultsPerPage);
                    $startingNum = ($page-1)*$resultsPerPage;
                    $query = "SELECT * FROM item ORDER BY itemName ASC LIMIT ".$startingNum. ',' .$resultsPerPage;
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$query)){
                        echo "SQL statement failed!";
                    }else{
                        mysqli_stmt_execute($stmt);
                        $rs = mysqli_stmt_get_result($stmt);
                        while($row = mysqli_fetch_assoc($rs)){
                            $currentItem = $row["itemID"];
                              echo '<div class="item-entity col-md-3">
                                    <h3 class="item-title">'.$row["itemName"].'</h3>
                                    <img src="../Images/Shop/'.$row["itemPic"].'" class="item-image" alt="Item Image">
                                    <p class="item-desc">'.$row["itemDesc"].'</p>
                                    <span class="item-price">Price:P'.$row["itemPrice"].'</span>
                                    <form method="POST" action="FlowerStore.php?added" class="quick-purchase-qty">
                                        <input type="hidden" name="itemID" value="'.$row["itemID"].'">
                                        <button type="submit" class="quick-purchase-btn" name="add">Add to Cart</button>
                                    </form>
                                    <div>
                                    Tags:';
                                    $queryAllTags = "SELECT * FROM category ORDER BY cat_name ASC";
                                            $resultAllTags = mysqli_query($conn, $queryAllTags);
                                            $queryItemTags = "SELECT * FROM item_category WHERE item_id = '$currentItem'";
                                            $resultItemTags = mysqli_query($conn, $queryItemTags);
                                            $rowTag = mysqli_fetch_assoc($resultItemTags);
                                             while($rowAll = mysqli_fetch_assoc($resultAllTags))
                                            {
                                                if($rowAll["category_id"] == $rowTag["category_id"]){
                                                    echo "     ".$rowAll["cat_name"];
                                                    $rowTag = mysqli_fetch_assoc($resultItemTags);
												}
                                            }
                                    echo '
                                    </div>
                                </div>';
                        }
                    }
                ?>
                </div>
                <div class="pagination">
							<a href="#"> &laquo; </a>
							<?php
							for($page=1;$page <= $numPages; $page++){
								echo '<a href="FlowerStore.php?page=' . $page . '">' .$page. '</a>';
							}						
							?>
							<a href="#"> &raquo; </a>
						</div>           
            </div>
            <!--End of Purchase Section-->
            <!--Footer-->
            <!--End of Footer--> 
            </div>   
        </div>
        <?php include("Footer.php"); ?>
        <!--End of Content-->
    </body>
</html>
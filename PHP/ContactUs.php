<?php
$activePage = 'Contact Us'
?>
<?php
include("NavBar.php");
if(isset($_GET['sent'])){
    echo "<script> alert('Thank you for your feedback!') </script>";
}
?>
<head>
<link rel="stylesheet" type="text/css" href="../Styles/ContactUs.css">
</head>
            <!--Contact Us-->
                <section class = "contact-us-section">
                    <h2 id="contact-header">Contact Us</h2>
                    <div class="contact-soc-med">
                        <a href="http://www.facebook.com"><img src="../Images/Icons/facebook.png" class="contact-soc-med-item" alt="Facebook"></a>
                        <a href="www.twitter.com"><img src="../Images/Icons/twitter.png" class="contact-soc-med-item" alt="Twitter"></a>
                        <a href="www.instagram.com"><img src="../Images/Icons/instagram.png" class="contact-soc-med-item" alt="Instagram"></a>
                    </div>
                   <div class="contact-body">
                    <div id="contact-form"><h3 id="feedback-header">Send us Feedback</h3>
                        <form action="FeedBack.php" method="POST">
                          <span class="feedback-title">Feedback</span>
                          <textarea name="feedback" class="contact-input" name="feedback" cols="50" rows="10" required></textarea>
                          <input type="submit" value="Submit" class="contact-submit" name="submit"/>
                        </form>
                    </div>
               </section>
             <!--End of Contact Us Section-->
             <!--Footer-->
            <footer class="footer">
                <span class="copyright"><h4>Awesome Blossoms Copyright (c) 2019</h4></span>
                <a href="#" class="to-top">Back to Top</a>
                <div class="footer-soc-med">
                    <a href="http://www.facebook.com"><img src="../Images/Icons/facebook.png" class="footer-soc-med-item" alt="Facebook"></a>
                    <a href="www.twitter.com"><img src="../Images/Icons/twitter.png" class="footer-soc-med-item" alt="Twitter"></a>
                    <a href="www.instagram.com"><img src="../Images/Icons/instagram.png" class="footer-soc-med-item" alt="Instagram"></a>
                </div>
            </footer>
            <!--End of Footer-->    
        </div>
        <!--End of Content-->
    </body>
</html>
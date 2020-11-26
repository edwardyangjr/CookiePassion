<?php
require("lib/getProjectBrowse.php");
$cookieList = getAllCookie();
include("header.html");
?>

<!-- TODO: create loop to only display items that are available in database -->
<!-- classes have been created for item attributes, with attached js -->
<section class="container content-section">
    <h2 class="section-header">COOKIES</h2>
    <div class="shop-items">
        <?php
        foreach ($cookieList as $cookie) {
            echo "<div class='shop-item'>";
            echo "<span class='shop-item-title'>", $cookie['name'], "</span>";
            echo "<img class='shop-item-image' src=", $cookie['imageLocation'], ">";
            echo "<div class='shop-item-details'>";
            echo "<span class='shop-item-price'>$", $cookie['price'], "</span>";
            echo "<button class='btn btn-primary shop-item-button' type='button'>ADD TO CART</button>";
            echo "</div>";
            if($cookie['description']) {
                echo "<p>", $cookie['description'],"</p>";
            }
            if($cookie['ingredients']) {
                echo "<p>", "Contain: ", $cookie['ingredients'],"</p>";
            }
            echo "</div>";
        }
        ?>
        <!-- 
                <div class="shop-item">
                    <span class="shop-item-title">Chocolate Chip</span>
                    <img class="shop-item-image" src="images/floating_chocolate_chip_cookies.png">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$12.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Chocolate Chip / Peanut Butter</span>
                    <img class="shop-item-image" src="Images/chocolate_chip_peanut_butter_cookie.png">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$14.99</span>
                        <button class="btn btn-primary shop-item-button"type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Biscuit</span>
                    <img class="shop-item-image" src="Images/biscuit.png">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$9.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Peanut Butter</span>
                    <img class="shop-item-image" src="Images/floating_peanut_butter_cookie.png">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$19.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                -->
    </div>
</section>
<section class="container content-section">
    <h2 class="section-header">COMBOS</h2>
    <div class="shop-items">
        <div class="shop-item">
            <span class="shop-item-title">Assorted Cookies (10 pieces)</span>
            <img class="shop-item-image" src="Images/assorted_cookies_line.png">
            <div class="shop-item-details">
                <span class="shop-item-price">$19.99</span>
                <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
            </div>
        </div>
        <div class="shop-item">
            <span class="shop-item-title">Chocolate Chip Cookies Pack (5 pieces)</span>
            <img class="shop-item-image" src="Images/stacked_chocolate_chip_cookies.png">
            <div class="shop-item-details">
                <span class="shop-item-price">$6.99</span>
                <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
            </div>
        </div>
    </div>
</section>

<!-- responsive cart with js -->
<section class="container content-section">
    <h2 class="section-header">CART</h2>
    <div class="cart-row">
        <span class="cart-item cart-header cart-column">ITEM</span>
        <span class="cart-price cart-header cart-column">PRICE</span>
        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
    </div>
    <div class="cart-items">
    </div>
    <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        <span class="cart-total-price">$0</span>
    </div>
    <!-- TODO: clicking puchase will display notif. need new page to make payment -->
    <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
</section>


<!--
        <footer class="main-footer">
            <div class="container main-footer-container">
                <h3 class="band-name">The Generics</h3>
                <ul class="nav footer-nav">
                    <li>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="Images/YouTube Logo.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.spotify.com" target="_blank">
                            <img src="Images/Spotify Logo.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="Images/Facebook Logo.png">
                        </a>
                    </li>
                </ul>
            </div>
        </footer>-->
</body>

</html>
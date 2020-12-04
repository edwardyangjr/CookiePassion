<?php
require("lib/getProjectBrowse.php");
$cookieList = getAllCookie();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cookie Passion</title>

    <!-- external files -->
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="js/store.js" async></script>
    <script src="js/edit.js" async></script>
</head>

<body>
    <?php
    include("headerNavbar.html");
    ?>
    <section class="container content-section">
        <h2 class="section-header">COOKIES</h2>
        <br />
        <button class='btn btn-primary shop-item-edit-button btn-center' type='button' data-id='new'>Add New Cookie</button>
        <div class="shop-items">
            <?php
            foreach ($cookieList as $cookie) {
                echo "<div class='shop-item' id=", $cookie['id'], ">";
                echo "<span class='shop-item-title'>", $cookie['name'], "</span>";
                echo "<img class='shop-item-image' src=", $cookie['imageLocation'], ">";
                echo "<div class='shop-item-details'>";
                echo "<span class='shop-item-price'>$", $cookie['price'], "</span>";
                echo "<button class='btn btn-primary shop-item-button' type='button'>ADD TO CART</button>";
                echo "</div>";
                if ($cookie['description']) {
                    echo "<p>", $cookie['description'], "</p>";
                }
                if ($cookie['ingredients']) {
                    echo "<p>", "Contain: ", $cookie['ingredients'], "</p>";
                }
                echo "<button class='btn btn-primary shop-item-edit-button' type='button'
                    data-id='", $cookie['id'], "',
                    data-name='", $cookie['name'], "',
                    data-description='", $cookie['description'], "',
                    data-price='", $cookie['price'], "',
                    data-inventory='", $cookie['inventory'], "',
                    data-ingredients='", $cookie['ingredients'], "',
                    data-imageLocation='", $cookie['imageLocation'], "',
                    data-del='", $cookie['del'], "'>EDIT</button>";
                echo "</div>";
            }
            ?>
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="cookie-name" class="col-form-label">Name:</label>
                                    <input type="text" class="form-control" id="cookie-name">
                                </div>
                                <div class="form-group">
                                    <label for="description-text" class="col-form-label">Description:</label>
                                    <textarea class="form-control" id="description-text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price-text" class="col-form-label">Price:</label>
                                    <input type="text" class="form-control" id="price-text"></input>
                                </div>
                                <div class="form-group">
                                    <label for="inventory-num" class="col-form-label">Inventory:</label>
                                    <input type="number" class="form-control" id="inventory-num"></input>
                                </div>
                                <div class="form-group">
                                    <label for="ingredients-text" class="col-form-label">Ingredients:</label>
                                    <textarea class="form-control" id="ingredients-text"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imageLocation-text" class="col-form-label">Image Location:</label>
                                    <input type="text" class="form-control" id="imageLocation-text">
                                </div>
                                <div class="form-group">
                                    <label for="del-num" class="col-form-label">Del:</label>
                                    <input type="number" class="form-control" id="del-num"></input>
                                    <spam>Use 1 for normal and 0 for soft deletion.</spam>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button id="editDoneButton" type="button" class="btn btn-primary">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<section class="container content-section">
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
    </section>-->

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
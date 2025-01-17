<?php
    require("lib/getProjectBrowse.php"); // main external php with functions 
    if (session_status() == PHP_SESSION_NONE) { // initialize session to retain shopping cart info
        session_start();
    }

    $cookieList = getAllCookie(); // cookies with limit paramter (based on current page)
    
    $results_per_page = 5; // number of results per page
    $cookieCountList = getCookieCount(); 
    $cookie_count = count($cookieCountList); // number of cookies (rows) returned
    $total_pages = ceil(count($cookieCountList) / $results_per_page); // number of pages available for user interaction
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
    <script src="js/jquery.cookie.js"></script>
</head>

<body>
    <?php
    include("headerNavbar.php");
    ?>

    <!-- keyword search and price range filter -->
    <form action="#" method="post">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-lg">Search and Filter</span>
        </div>
        <?php
            echo '<input id="search1" type="text" name="search" class="form-control" style="width: 50%;"';
            if (isset($_SESSION["searchTermSaved"])) {
                echo 'value="', $_SESSION["searchTermSaved"], '"';
            }
            echo '/>';
        ?>
        <div class="input-group-append">
        <select id="search2" name="filter_price" placeholder="price">
            <?php
                echo '<option value=""';
                if (!isset($_SESSION["filter_priceSaved"])) {
                    echo 'selected="selected"';
                }
                echo '>None</option>';
                echo '<option value="1"';
                if (isset($_SESSION["filter_priceSaved"])) {
                    if ($_SESSION["filter_priceSaved"] == 1) {
                        echo 'selected="selected"';
                    }
                }
                echo '><$1</option>';
                echo '<option value="2"';
                if (isset($_SESSION["filter_priceSaved"])) {
                    if ($_SESSION["filter_priceSaved"] == 2) {
                        echo 'selected="selected"';
                    }
                }
                echo '>$1-$5</option>';
                echo '<option value="3"';
                if (isset($_SESSION["filter_priceSaved"])) {
                    if ($_SESSION["filter_priceSaved"] == 3) {
                        echo 'selected="selected"';
                    }
                }
                echo '>$5</option>';
            ?>
        </select>
        
		<input type="submit" id="submit" value="Search" name="searchsubmit" class="btn btn-outline-secondary"> <!-- submit button -->
        </div>
    </div>
	</form>
 
    <?php
        // display page links for product browsing 
        /*echo "<- Previous ";
        for ($i=1; $i<=$total_pages; $i++) {  // dynamic page links per cookie list
            echo "<a href='project_browse.php?page=".$i."'";
            if ($i == $page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
        }; 
        echo " Next ->";*/
        if (isset($_GET["page"])) { 
            $page  = $_GET["page"]; 
        }
        echo '<nav> <ul class="pagination justify-content-center">';
        echo "<li class='page-item";
        if ($page <= 1){
            echo ' disabled';
        }
        $tempPageVar = $page - 1;
        echo "'><a class='page-link' href='project_browse.php?page=".$tempPageVar."'>Previous</a></li>";
        for ($i=1; $i<=$total_pages; $i++) {  // dynamic page links per cookie list
            echo "<li class='page-item'><a class='page-link' href='project_browse.php?page=", $i, "'>", $i;
            if ($i == $page){
                echo '<span class="sr-only">(current)</span>';
            }
            echo '</a></li>';
        };
        echo "<li class='page-item";
        if ($page >= $total_pages){
            echo ' disabled';
        }
        $tempPageVar = $page + 1;
        echo "'><a class='page-link' href='project_browse.php?page=".$tempPageVar."'>Next</a></li>";
        echo '</ul></nav>';
    ?>

    <!-- table: cookies and shopping cart display sections -->
    <table> 
        <tr> 
        <td class="container browse-section">  <!-- left column: cookies display -->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" >COOKIES</h2>
                
            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <br />
            <?php
                if (isset($_SESSION["privilege"])) {
                    if($_SESSION["privilege"] == "admin") {
                        echo "<button class='btn btn-primary shop-item-edit-button btn-center' type='button' data-id='new'>Add New Cookie</button>";
                        echo "<br/>";
                        echo '<form action="lib/uploadImage.php" method="post" enctype="multipart/form-data" class="md-form">';
                        echo '<div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileToUpload" id="fileToUpload">
                            <label class="custom-file-label" for="fileToUpload">Upload New Image</label>
                            </div>';
                        echo '<button type="submit" class="btn btn-primary btn-center2">Upload New Image</button>';
                        echo '</form>';
                    }

                    if (isset($_SESSION['newImageLocation'])) {
                        echo "<script> alert('Uploaded at: ", $_SESSION['newImageLocation'], "');</script>";
                        $_SESSION['newImageLocation'] = null;
                    }
                }
            ?>
            <div class="shop-items">
                <?php
                    foreach ($cookieList as $cookie) {
                        echo "<div class='shop-item' id=", $cookie['id'], ">";
                        echo "<span class='shop-item-title' id=", $cookie['id'], ">", $cookie['name'], "</span>";
                        echo "<img class='shop-item-image' src=", $cookie['imageLocation'], ">";
                        echo "<div class='shop-item-details'>";
                        echo "<span class='shop-item-price'>$", $cookie['price'], "</span>";
                        if($cookie['inventory'] <= 0) {
                            echo '<button type="button" class="btn btn-secondary btn-lg" disabled>Out of Stock</button>';
                        }
                        else {
                            echo "<button class='btn btn-primary shop-item-button' type='button'>ADD TO CART</button>";
                        }
                        echo "</div>";
                        if($cookie['inventory'] <= 0) {
                            echo "<p>Out of Stock!!!</p>";
                        }
                        else {
                            echo "<p id='", $cookie['inventory'], "' class='shop-item-inventory'>", "Only ", $cookie['inventory'], " left!!!</p>";
                        }
                        if ($cookie['description']) {
                            echo "<p>", $cookie['description'], "</p>";
                        }
                        if ($cookie['ingredients']) {
                            echo "<p>", "Contain: ", $cookie['ingredients'], "</p>";
                        }
                        if (isset($_SESSION["privilege"])) {
                            if($_SESSION["privilege"] == "admin") {
                                echo "<button class='btn btn-primary shop-item-edit-button' type='button'
                                    data-id='", $cookie['id'], "',
                                    data-name='", $cookie['name'], "',
                                    data-description='", $cookie['description'], "',
                                    data-price='", $cookie['price'], "',
                                    data-inventory='", $cookie['inventory'], "',
                                    data-ingredients='", $cookie['ingredients'], "',
                                    data-imageLocation='", $cookie['imageLocation'], "',
                                    data-del='", $cookie['del'], "'>EDIT</button>";
                            }
                        }
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
                                        <spam>Format "images/cookies/" + image name.</spam>
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
        
        </td > <!-- left column end -->

        <!-- right columns: responsive cart with js -->
        <td  class="container cart-section">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" >CART</h2>
                <!-- Icon Divider -->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
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
            
            <?php
            if (isset($_SESSION["privilege"]) && isset($_SESSION["userName"]) && isset($_SESSION["isMember"])) {
                if($_SESSION["isMember"]) {
                    echo '<button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>';
                }
                else {
                    echo '<button class="btn btn-secondary btn-purchase" type="button" disabled>PURCHASE</button>';
                }
            }
            else {
                echo '<button class="btn btn-secondary btn-purchase" type="button" disabled>PURCHASE</button>';
            }
            ?>
            
        </td > <!-- right column end -->
        </tr> 
    </table> 
</body>

</html>
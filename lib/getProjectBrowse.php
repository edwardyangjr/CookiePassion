<?php

// database connection attributes 
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DSN', 'mysql:host=localhost;dbname=cookiepassion');
$page = 1;
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/* 
    FUNCTION: return cookie list without limit paramter 
    This will return full database results, so count may be calculated for page numbers 

*/
function getCookieCount() { 
    
    try { // connect to DB
        $db = new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        exit();
    }

    // search and filter handles 
    if (isset($_POST["search"])) { // check for null value for search keyword
        $data1=$_POST["search"];
    }
	else {
        $data1='';
    }

    if (isset($_POST['filter_price'])) { // check for null value in price range filter
        $data2=$_POST['filter_price'];
    }
    else {
        $data2='';
    }

    // default query for displaying list of cookies
    $query = "select * from cookie 
        where (name like '%$data1%' or description like '%$data1%') 
        and del = 1 
        and inventory > 0";
 
    // display options based on search and filter selection        
    if ($data2== '1') { // cookies <$1 selected
        $query = "select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
            and del = 1 
            and price < 1 
            and inventory > 0 ";
    } else if ($data2== '2') { // cookies $1-5 selected
        $query = "select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
                and del = 1 
                and price >= 1 and price < 5 
                and inventory > 0";
    } else if ($data2=='3') { // cookies >$5 selected
        $query="select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
                and del = 1 
                and price >= 5 
                and inventory > 0";
    }

    // run query 
    $statement = $db->prepare($query);
    $statement->execute();
    $cookieCountList = $statement->fetchAll();
    $statement->closeCursor();

    return $cookieCountList; // return cookies list without limit parameter 
}

/* 
    FUNCTION: return cookie list with limit paramter 
    Limited number of database results will be returned based on what page user is on
*/
function getAllCookie() { // get cookie info for display
    
    try { // connect to DB
        $db = new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        exit();
    }

    // search and filter handles
    if (isset($_POST["search"])) { // check for null value for search keyword
        $data1=$_POST["search"];
    }
	else {
        $data1='';
    }

    if (isset($_POST['filter_price'])) { // check for null value in price range filter
        $data2=$_POST['filter_price'];
    }
    else {
        $data2='';
    }

    // page var from project_browse php, which determines what results are returned 
    if (isset($_GET["page"])) { 
        $page  = $_GET["page"]; 
    } 
    else { 
        $page = 1; // default on page 1
    }
    
    $results_per_page = 5; // number of results per page
    $start_from = ($page-1) * $results_per_page;

    // default query for displaying list of cookies
    $query = "select * from cookie 
        where (name like '%$data1%' or description like '%$data1%') 
        and del = 1 
        and inventory > 0
        order by name asc limit $start_from, ".$results_per_page;
 
    // display options based on search and filter selection        
    if ($data2== '1') { // cookies <$1 selected
        $query = "select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
            and del = 1 
            and price < 1 
            and inventory > 0 
            order by name asc
            limit $start_from, ".$results_per_page;
    } else if ($data2== '2') { // cookies $1-5 selected
        $query = "select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
                and del = 1 
                and price >= 1 and price < 5 
                and inventory > 0
                order by name asc
                limit $start_from, ".$results_per_page;
    } else if ($data2=='3') { // cookies >$5 selected
        $query="select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
                and del = 1 
                and price >= 5 
                and inventory > 0
                order by name asc
                limit $start_from, ".$results_per_page;
    }

    // run query 
    $statement = $db->prepare($query);
    $statement->execute();
    $cookieList = $statement->fetchAll();
    $statement->closeCursor();

    return $cookieList; // return cookies list
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $db = new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        exit();
    }
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "addCookie"){
            $query = 'INSERT INTO cookie (name, description, price, inventory, ingredients, imageLocation, del)
            VALUES (:name, :description, :price, :inventory, :ingredients, :imageLocation, :del);';
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $_POST['cookieName']);
            $statement->bindValue(':description', $_POST['description']);
            $statement->bindValue(':price', $_POST['price']);
            $statement->bindValue(':inventory', $_POST['inventory']);
            $statement->bindValue(':ingredients', $_POST['ingredients']);
            $statement->bindValue(':imageLocation', $_POST['imageLocation']);
            $statement->bindValue(':del', $_POST['del']);
            $statement->execute();
        }
        else if ($_POST['action'] == "updateCookie"){
            $query = 'UPDATE cookie SET 
            name = :name, description = :description, price = :price, inventory = :inventory, ingredients = :ingredients, imageLocation = :imageLocation, del = :del
            WHERE id = :id;';
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $_POST['cookieName']);
            $statement->bindValue(':description', $_POST['description']);
            $statement->bindValue(':price', $_POST['price']);
            $statement->bindValue(':inventory', $_POST['inventory']);
            $statement->bindValue(':ingredients', $_POST['ingredients']);
            $statement->bindValue(':imageLocation', $_POST['imageLocation']);
            $statement->bindValue(':del', $_POST['del']);
            $statement->bindValue(':id', $_POST['id']);
            $statement->execute();
        }
        else if ($_POST['action'] == "purchase"){
            $query = 'INSERT INTO userorder (username, total) VALUES (:username, :total);';
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $_SESSION["userName"]);
            $statement->bindValue(':total', $_POST['totalPost']);
            $statement->execute();

            $query = 'SELECT LAST_INSERT_ID();';
            $statement = $db->prepare($query);
            $statement->execute();
            $lastID = $statement->fetch();
            
            foreach ($_POST['cookies'] as $cookie) {
                $query = 'INSERT INTO orderdetail (orderid, cookieID, amount) VALUES (:orderid, :cookieID, :amount);';
                $statement = $db->prepare($query);
                $statement->bindValue(':orderid', $lastID[0]);
                $statement->bindValue(':cookieID', $cookie["cookieID"]);
                $statement->bindValue(':amount', $cookie['amount']);
                $statement->execute();
            }
        }
    }
  }

?>
<!-- 
    php handles SHOP page; display cookies available to add to cart, edit, and purchase
-->

<?php

// database connection attributes 
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DSN', 'mysql:host=localhost;dbname=cookiepassion');

function getAllCookie() { // connect to database
    try {
        $db = new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        exit();
    }

    if (isset($_POST["search"])) // check for null value for search keyword
		{$data1=$_POST["search"];}
	else{
        $data1='';}

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
            and inventory > 0";
    } else if ($data2== '2') { // cookies $1-5 selected
        $query = "select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
                and del = 1 
                and price >= 1 and price < 5 
                and inventory > 0";
    } else if ($data2=='3') {
        $query="select * from cookie 
            where (name like '%$data1%' or description like '%$data1%') 
                and del = 1 
                and price >= 5 
                and inventory > 0";
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
  }

?>
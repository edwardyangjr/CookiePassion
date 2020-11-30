<?php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DSN', 'mysql:host=localhost;dbname=cookiepassion');

function getAllCookie() {
    try {
        $db = new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        exit();
    }

    $query = "SELECT * FROM cookie WHERE del = 1";
    $statement = $db->prepare($query);
    $statement->execute();
    $cookieList = $statement->fetchAll();
    $statement->closeCursor();

    return $cookieList;
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
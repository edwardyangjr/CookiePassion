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

?>
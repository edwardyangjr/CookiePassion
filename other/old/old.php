<?php

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');


function loginAuth(string $email, string $password) {
    $dsn = 'mysql:host=localhost;dbname=cookiepassion';
    try {
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        exit();
    }
    $query = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
    $statement = $db->prepare($query);
    $statement->execute();
    $authUser = $statement->fetchAll();
    $statement->closeCursor();

    $count = mysqli_num_rows($authUser);

    if($count >= 1) {
        return "";
    }else {
        return "Your Login Name or Password is invalid";
    }
}

  
?>
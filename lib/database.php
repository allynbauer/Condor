<?php

$hostname = 'host';
$username = 'username';
$password = 'password';
$database = 'db';

try {
    if ($hostname != 'host') { 
        $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    }
} catch (PDOException $e) {
    echo 'A database connection error has occured.<br />';
    echo 'Please try again later or contact the <a href="mailto:' . $_SERVER['SERVER_ADMIN'] . '">system administrator.</a>';
    echo $e->getMessage();
    die();
}

unset($hostname);
unset($username);
unset($password);
unset($database);

?>
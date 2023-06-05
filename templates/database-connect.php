<?php
try {
    $dsn = 'mysql:host=localhost;dbname=videodb;charset=utf8mb4';
    $username = 'root';
    $password = '';
    $dbh = new \PDO($dsn, $username, $password);
} catch (\Exception $e) {
    die('Interner Fehler: Die Datenbank-Verbindung konnte nicht aufgebaut werden.');
}
<?php

// Database connection
$host     = "localhost";
$dbname   = "blog1";
$charset  = "utf8";
$user     = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset;", $user, $password);
    // echo "Bağlantı başarılı!";
} catch (PDOException $error) {
    echo "Bağlantı hatası: " . $error->getMessage();
}

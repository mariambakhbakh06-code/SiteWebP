<?php
session_start();

$host = 'localhost';
$dbname = 'dbprojet';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    echo "Connexion réussie à la base de données!";
} catch (Exception $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>


<?php

require_once '../vendor/autoload.php';

use Dotenv\Dotenv;

// Dotenv a besoin de savoir où est le fichier .env
// Dans ce cas, à la racine du projet 
$dotenv = Dotenv::createImmutable("../");
// Maintenant que dotenv sait où est le fichier, il le charge
$dotenv->load();

$host = $_ENV['DB_HOST'];
$name = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$psw = $_ENV['DB_PSW'];

$pdo = new PDO("mysql:host=$host;dbname=$name", $user, $psw);
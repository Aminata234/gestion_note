<?php

function connexionDB(){
    static $pdo = null;
    if ($pdo === null) {
        $pdo = new PDO("pgsql:host=localhost; port=5432; dbname=gestion_notes", "postgres", "12345");
        $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $pdo;
}

function deconnexionDB(){
    $pdo = connexionDB();
    $pdo = null;
}



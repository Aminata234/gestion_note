<?php

require_once __DIR__ . '/../Core/database.php';

function getElevesByClasse(int $classe_id)
{
    $pdo = connexionDB();

    $sql = "
        SELECT e.*, i.id AS inscription_id
        FROM eleves e
        INNER JOIN inscriptions i ON e.id = i.eleve_id
        
        WHERE i.classe_id = :classe_id
    ";

    $query = executeQuery(
        $pdo, $sql, ['classe_id' => $classe_id]);

    $pdo = null;

    return $query;
}
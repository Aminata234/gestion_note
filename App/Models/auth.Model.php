<?php

require_once __DIR__ . '/../Core/Database.php';

function getUserByEmail(string $email)
{
    $pdo = connexionDB();

    $sql = "
        SELECT u.*, r.nomRole
        FROM utilisateurs u
        INNER JOIN roles r ON u.role_id = r.id
        WHERE u.email = :email";

    $query = executeQuery($pdo, $sql, ['email' => $email]);

    $pdo = null;

    return $query;
}
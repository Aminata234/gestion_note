<?php


function connexionDB(): PDO {
    static $pdo = null;

    if ($pdo === null) {
        try {
            $pdo = new PDO("pgsql:host=localhost; port=5432; dbname=gestion_notes", "postgres", "12345");
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die('Erreur:' . $ex->getMessage());
        }
    }
    return $pdo;
}

function deconnecteDB(?PDO &$pdo = null): void {
    $pdo = null;
}



function query(PDO $pdo, string $sql, bool $single = true): array
{
    $query = $pdo->query($sql);
    return $single ? $query->fetch() : $query->fetchAll();


}

function prepare(PDO $pdo, string $sql, array $datas)
{
    $prepare = $pdo->prepare($sql);
    $prepare->execute($datas);
    return $prepare;
}

function executeQuery(PDO $pdo, string $sql, array $datas, bool $single = true): array
{
    $statement = prepare($pdo, $sql, $datas);

    return $single ? $statement->fetch() : $statement->fetchAll();
}

function executeUpdate(PDO $pdo, string $sql, array $datas): int
{
    prepare($pdo, $sql, $datas);

    return (str_starts_with(strtoupper($sql), 'INSERT')) ? $pdo->lastInsertId() : $prepare->rowCount();
}

function getAllTables(string $tableName){
     $pdo = connexionDB();
    $sql = "
        SELECT * FROM $tableName";
    $query = query($pdo, $sql, false);
    $pdo = null;
    return $query;
}
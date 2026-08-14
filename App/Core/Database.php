<?php

class Database
{
    public function connexionDB(): PDO
    {
        static $pdo = null;

        if ($pdo === null) {
            try {
                $pdo = new PDO(
                    "pgsql:host=localhost;port=5432;dbname=gestion_notes",
                    "postgres",
                    "12345"
                );

                $pdo->setAttribute(
                    PDO::ATTR_DEFAULT_FETCH_MODE,
                    PDO::FETCH_ASSOC
                );

                $pdo->setAttribute(
                    PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION
                );

            } catch (Exception $ex) {
                die("Erreur : " . $ex->getMessage());
            }
        }

        return $pdo;
    }


    public function deconnecteDB(): void
    {
        $pdo = null;
    }


    public function query(string $sql, bool $single = true): array
    {
        $pdo = $this->connexionDB();

        $query = $pdo->query($sql);

        return $single
            ? $query->fetch()
            : $query->fetchAll();
    }


    public function prepare(string $sql, array $datas = []): PDOStatement
    {
        $pdo = $this->connexionDB();

        $prepare = $pdo->prepare($sql);
        $prepare->execute($datas);

        return $prepare;
    }


    public function executeQuery(
        string $sql,
        array $datas,
        bool $single = true
    ): array {

        $statement = $this->prepare($sql, $datas);

        return $single
            ? $statement->fetch()
            : $statement->fetchAll();
    }


    public function executeUpdate(
        string $sql,
        array $datas
    ): int {

        $statement = $this->prepare($sql, $datas);

        return $statement->rowCount();
    }


    public function getAllTables(string $tableName): array
    {
        $sql = "SELECT * FROM $tableName";

        return $this->query($sql, false);
    }
}
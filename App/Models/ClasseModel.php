<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/Classe.php';

class ClasseModel
{
    public Database $database;

        public function __construct()
        {
            $this->database = new Database();
        }

        public function getAllClasse(): array
        {
            $sql = "SELECT * FROM classes";

            return $this->database->query($sql, false);
        }
}
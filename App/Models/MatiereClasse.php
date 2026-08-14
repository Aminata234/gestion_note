<?php

class MatiereClasse
{
    public int $id;
    public int $classe_id;
    public int $matiere_id;

        public function __construct(
            int $id = 0,
            int $classe_id = 0,
            int $matiere_id = 0
        ) {
            $this->id = $id;
            $this->classe_id = $classe_id;
            $this->matiere_id = $matiere_id;
        }
}
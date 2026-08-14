<?php

class Inscription
{
    public int $id;
    public int $annee_id;
    public int $eleve_id;
    public int $classe_id;

        public function __construct(
            int $id = 0,
            int $annee_id = 0,
            int $eleve_id = 0,
            int $classe_id = 0
        ) {
            $this->id = $id;
            $this->annee_id = $annee_id;
            $this->eleve_id = $eleve_id;
            $this->classe_id = $classe_id;
        }
}
<?php

class AnneScolaire
{
    public int $id;
    public string $nom;
    public string $date;
    public int $actif;

        public function __construct(
            int $id = 0,
            string $nom = "",
            string $date = "",
            int $actif = 0
        ) {
            $this->id = $id;
            $this->nom = $nom;
            $this->date = $date;
            $this->actif = $actif;
        }
}
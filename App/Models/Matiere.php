<?php

class Matiere
{
    public int $id;
    public string $nomMatiere;

    public function __construct(
        int $id = 0,
        string $nomMatiere = ""
    ) {
        $this->id = $id;
        $this->nomMatiere = $nomMatiere;
    }
}
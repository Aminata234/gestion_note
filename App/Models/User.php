<?php

class Utilisateur
{
    public int $id;
    public string $nom;
    public string $prenom;
    public string $telephone;
    public string $email;
    public int $role_id;
    public string $password;

        public function __construct(
            int $id = 0,
            string $nom = "",
            string $prenom = "",
            string $telephone = "",
            string $email = "",
            int $role_id = 0,
            string $password = ""
        ) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->telephone = $telephone;
            $this->email = $email;
            $this->role_id = $role_id;
            $this->password = $password;
        }
}
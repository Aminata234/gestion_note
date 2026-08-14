<?php

class Role
{
    public int $id;
    public string $nomRole;

        public function __construct(
            int $id = 0,
            string $nomRole = ""
        ) {
            $this->id = $id;
            $this->nomRole = $nomRole;
        }
}
<?php

function connexion(){

    if (!isset($_SESSION)) {
        header('Location: /');
        exit;
    }

require_once __DIR__.'/../Views/diangecole-connexion.html.php';

}

function deconnexion(){

require_once __DIR__.'/../Views/diangecole-connexion.html.php';

}
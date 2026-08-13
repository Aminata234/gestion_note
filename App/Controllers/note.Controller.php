<?php

require_once __DIR__ . '/../Core/sessionManager.php';

function acceuil()
{
    $user = get_session('connexion');

    if (!$user) {
        header('Location: /');
        exit;
    }

    require_once __DIR__ . '/../Views/saisie-des-notes.html.php';
}
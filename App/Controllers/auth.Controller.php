<?php

require_once __DIR__ . '/../Models/auth.Model.php';
require_once __DIR__ . '/../Core/sessionManager.php';

function connexion()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = getUserByEmail($email);

        if ($result && $password === $result['password']) {

            set_session('connexion', $result);

            header('Location: /acceuil');
            exit;
        }
    }

    require_once __DIR__ . '/../Views/diangecole-connexion.html.php';
}


function deconnexion()
{
    destroy_session();

    header('Location: /');
    exit;
}
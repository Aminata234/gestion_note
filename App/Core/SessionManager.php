<?php

class SessionManager
{
    public function initSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }


    public function setSession(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }


    public function getSession(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }


    public function unsetSession(string $key): void
    {
        unset($_SESSION[$key]);
    }


    public function destroySession(): void
    {
        session_unset();
        session_destroy();
    }
}
<?php

session_start();
function redirectTo(string $url, array $data = []): void {
    foreach ($data as $key => $value) {
        $_SESSION[$key] = $value;
    }
    header('Location: ' . $url);
    exit();
}

function renderPage(string $page, array $data = []): void {
    extract($data, EXTR_PREFIX_SAME, '__var__');
    require __DIR__ . '/../Views' . $page;
}

function getPrefixUrl(): string {
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    return explode('/', $uri)[1];
}


function htmlEscape(string|null $string): string {
    if (!$string) {
        return '';
    }
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function removeFromSession(string $key): void {
    unset($_SESSION[$key]);
}

function getFormErrorFromSession(string $key): string {
    $value = $_SESSION['errors'][$key] ?? '';
    unset($_SESSION['errors'][$key]);
    return htmlEscape($value);
}

function setIntoSession(string $key, string|array $value): void {
    $_SESSION[$key] = $value;
}

function isLogged(): bool {
    return isset($_SESSION['username']);
}

function isAdmin(): bool {
    return $_SESSION['username']['role'] === 'admin';
}

function formatDate(string $date): string {
    return date('d M Y', strtotime($date));
}
function getOnceFromSession(string $key): string
{
    $value = $_SESSION[$key] ?? '';
    unset($_SESSION[$key]);
    return htmlEscape($value);
}
<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
//
function isAdmin() : void {
    if(!isset($_SESSION['admin'])){
        header('Location: /'); //Redirijir si no es un admin
    }
}

function SessionStarted() : void {
    if (isset($_SESSION['login']) && $_SESSION['login']) {
        header('Location: /'); // Redirige si ya hay una sesión
        exit();
    }
}
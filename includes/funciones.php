<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function is_auth() {
    
    if( !$_SESSION ) {
        header('Location: /login');
    }
}

function pagina_actual($path) {
    return str_contains($_SERVER['REQUEST_URI'], $path) ? true : false;
}
<?php

// Evita que usuários acesse este arquivo diretamente
if (!defined('ABSPATH'))
    exit;

// Inicia a sessão
session_start();

// Verifica o modo para debugar
if (!defined('DEBUG') || DEBUG === false) {

    // Esconde todos os erros
    error_reporting(0);
    ini_set("display_errors", 0);
} else {

    // Mostra todos os erros
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

function __autoload($class_name) {
    
    $file = ABSPATH_REPOSITORIO . '/classes/class-' . $class_name . '.php';
     
    if (!file_exists($file)) {
        require_once ABSPATH . '/views/_erros/404.php';
        return;
    }

    // Inclui o arquivo da classe
    require_once $file;
}

// Carrega a aplicação
$mvc = new MVC();
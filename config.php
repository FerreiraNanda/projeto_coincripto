<?php
if (!defined('HOST')) {
    define('HOST', 'localhost');
}

if (!defined('USER')) {
    define('USER', 'root');
}

if (!defined('PASS')) {
    define('PASS', '');
}

if (!defined('BASE')) {
    define('BASE', 'projeto_carros');
}

$conn = new mysqli(HOST, USER, PASS, BASE);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
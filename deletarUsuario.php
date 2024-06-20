<?php
require_once "banco.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';

    if (!empty($usuario)) {
        deletarUsuario($usuario);
    } else {
        echo "Por favor, forneça o nome do usuário.";
    }
}
?>

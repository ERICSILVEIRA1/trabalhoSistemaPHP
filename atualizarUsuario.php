<?php
require_once "banco.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $novaSenha = $_POST['novaSenha'] ?? '';

    if (!empty($usuario) && !empty($novaSenha)) {
        echo atualizarUsuario($usuario, null, $novaSenha);
    } else {
        echo "Por favor, forneça todos os dados necessários.";
    }
}
?>

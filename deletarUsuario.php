<?php

require_once "banco.php";

$usuario = $_POST["usuario"] ?? null;

if ($usuario) {
    $mensagem = deletarUsuario($usuario);
    echo $mensagem;
} else {
    echo "Usuário não especificado.";
}


?>
<?php
session_start();
require_once "banco.php";

$usuario = $_POST["usuario"] ?? null;

if (!is_null($usuario)) {
    // Realizar a busca e exibir os dados do usuário
    if (usuarioCadastrado($usuario)) {
        // Buscar os dados do usuário
        $stmt = $banco->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "Usuário encontrado: <br>";
            echo "ID: " . htmlspecialchars($user['id']) . "<br>";
            echo "Usuário: " . htmlspecialchars($user['usuario']) . "<br>";
            echo "Nome: " . htmlspecialchars($user['nome']) . "<br>";
        } else {
            echo "Usuário não encontrado.";
        }
        $stmt->close();
    } else {
        echo "Usuário não cadastrado.";
    }
} else {
    echo "Por favor, forneça o nome do usuário.";
}
?>

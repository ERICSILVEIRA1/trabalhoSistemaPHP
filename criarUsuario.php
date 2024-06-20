<?php
require 'banco.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'] ?? null;
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;

    // Validação dos dados
    if (empty($nome) || empty($usuario) || empty($senha)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        // Verifica se o usuário já está cadastrado
        if (usuarioCadastrado($usuario)) {
            echo "Usuário já cadastrado.";
        } else {
            // Inserção segura usando prepared statement (exemplo)
            global $banco; // Adiciona esta linha para acessar a variável global $banco
            $stmt = $banco->prepare("INSERT INTO usuarios (nome, usuario, senha) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $nome, $usuario, $senha);
            if ($stmt->execute()) {
                echo "Usuário criado com sucesso.";
                // Redireciona após o sucesso (opcional)
                header("Location: app.php");
                exit();
            } else {
                echo "Erro ao criar usuário.";
                // Log de erro
                // error_log("Erro ao criar usuário: " . $stmt->error);
            }
        }
    }
}
?>

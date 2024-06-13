<?php
$banco = new mysqli("localhost:3307", "root", "", "db_trabalhosistemaphp");

function usuarioCadastrado($usuario) {
    global $banco;

    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    
    $result = $banco->query($query);

    if ($result && $result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function verificaSenha($usuario, $senha) {
    global $banco;

    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    
    $result = $banco->query($query);

    if ($result && $result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

function atualizarUsuario($usuario, $nome, $senha) {
    global $banco;

    if (usuarioCadastrado($usuario)) {
        if (!empty($nome)) {
            $query = "UPDATE usuarios SET nome = '$nome' WHERE usuario = '$usuario'";
            $result = $banco->query($query);

            if (!$result) {
                return "Erro ao atualizar o nome do usuário.";
            }
        }

        if (!empty($senha)) {
            $query = "UPDATE usuarios SET senha = '$senha' WHERE usuario = '$usuario'";
            $result = $banco->query($query);

            if (!$result) {
                return "Erro ao atualizar a senha do usuário.";
            }
        }

        return "Usuário atualizado com sucesso.";
    } else {
        return "Usuário não cadastrado.";
    }
}
?>

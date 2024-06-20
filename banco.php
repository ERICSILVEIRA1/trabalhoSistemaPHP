<?php
$banco = new mysqli("localhost:3307", "root", "", "db_trabalhosistemaphp");

// Função para verificar se um usuário está cadastrado no banco de dados
function usuarioCadastrado($usuario) {
    global $banco;

    $stmt = $banco->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    return $stmt->num_rows > 0;
}

// Função para buscar todos os usuários do banco de dados
function buscarUsuariosDoBanco() {
    global $banco;

    $query = "SELECT * FROM usuarios";
    $result = $banco->query($query);

    if (!$result) {
        die("Erro ao buscar usuários: " . $banco->error);
    }

    $usuarios = array();
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }

    return $usuarios;
}

// Função para verificar se a senha está correta para um determinado usuário
function verificaSenha($usuario, $senha) {
    global $banco;

    $stmt = $banco->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $stmt->store_result();

    return $stmt->num_rows > 0;
}

// Função para atualizar os dados de um usuário no banco de dados
function atualizarUsuario($usuario, $nome, $senha) {
    global $banco;

    if (usuarioCadastrado($usuario)) {
        $updates = array();
        $types = "";
        $params = array(&$types);

        if (!empty($nome)) {
            $updates[] = "nome = ?";
            $types .= "s";
            $params[] = &$nome;
        }

        if (!empty($senha)) {
            $updates[] = "senha = ?";
            $types .= "s";
            $params[] = &$senha;
        }

        $updateFields = implode(", ", $updates);
        $stmt = $banco->prepare("UPDATE usuarios SET $updateFields WHERE usuario = ?");
        $params[] = &$usuario;
        $stmt->bind_param($types . "s", ...$params);
        $result = $stmt->execute();

        if (!$result) {
            return "Erro ao atualizar os dados do usuário.";
        }

        return "Usuário atualizado com sucesso.";
    } else {
        return "Usuário não cadastrado.";
    }
}
?>

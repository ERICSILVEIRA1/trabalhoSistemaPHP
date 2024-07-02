<?php
$banco = new mysqli("localhost:3307", "root", "", "db_trabalhosistemaphp");

// Verificar a conexão
if ($banco->connect_error) {
    die("Conexão falha: " . $banco->connect_error);
}

// Função para criar a tabela e inserir usuários padrão
function criarTabelaEInserirUsuarios() {
    global $banco;

    // SQL para criar a tabela se ela não existir
    $sql = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        usuario VARCHAR(50) NOT NULL,
        senha VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($banco->query($sql) === TRUE) {
        echo "Tabela 'usuarios' criada com sucesso.<br>";
    } else {
        echo "Erro ao criar tabela: " . $banco->error . "<br>";
    }

    // Verificar se os usuários já existem antes de inserir
    $stmt = $banco->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario IN (?, ?, ?)");
    $usuario1 = 'jaozin';
    $usuario2 = 'carlin';
    $usuario3 = 'maicon';
    $stmt->bind_param("sss", $usuario1, $usuario2, $usuario3);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 0) {
        // Criptografar senhas
        $senha1 = password_hash('senha1', PASSWORD_BCRYPT);
        $senha2 = password_hash('321', PASSWORD_BCRYPT);
        $senha3 = password_hash('123', PASSWORD_BCRYPT);

        // SQL para inserir dados
        $sql = "INSERT INTO usuarios (nome, usuario, senha) VALUES 
            ('João', 'jaozin', '$senha1'), 
            ('Carlos', 'carlin', '$senha2'), 
            ('Maicon', 'maicon', '$senha3')";

        if ($banco->query($sql) === TRUE) {
            echo "Usuários padrão inseridos com sucesso.<br>";
        } else {
            echo "Erro ao inserir usuários: " . $banco->error . "<br>";
        }
    } else {
        echo "Usuários padrão já existem na tabela.<br>";
    }
}

// Chamar a função para criar a tabela e inserir os usuários padrão
criarTabelaEInserirUsuarios();

// Função para verificar se um usuário está cadastrado no banco de dados
function usuarioCadastrado($usuario) {
    global $banco;

    $stmt = $banco->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    return $stmt->num_rows > 0;
}

// Função para deletar um usuário do banco de dados
function deletarUsuario($usuario) {
    global $banco; // Acessa a variável de conexão global

    // Verifica se o usuário existe
    if (usuarioCadastrado($usuario)) {
        $stmt = $banco->prepare("DELETE FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        
        if ($stmt->execute()) {
            echo "Usuário deletado com sucesso.";
        } else {
            echo "Erro ao deletar usuário: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Usuário não encontrado.";
    }
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

    $stmt = $banco->prepare("SELECT senha FROM usuarios WHERE usuario = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    if ($hashedPassword && password_verify($senha, $hashedPassword)) {
        return true;
    }

    return false;
}

// Outras funções omitidas para brevidade...

// Função para atualizar os dados de um usuário no banco de dados
function atualizarUsuario($usuario, $nome, $senha) {
    global $banco;

    if (usuarioCadastrado($usuario)) {
        $updates = array();
        $types = "";
        $params = array();

        if (!empty($nome)) {
            $updates[] = "nome = ?";
            $types .= "s";
            $params[] = $nome;
        }

        if (!empty($senha)) {
            $senhaHashed = password_hash($senha, PASSWORD_BCRYPT);
            $updates[] = "senha = ?";
            $types .= "s";
            $params[] = $senhaHashed;
        }

        if (empty($updates)) {
            return "Nenhuma atualização fornecida.";
        }

        $updateFields = implode(", ", $updates);
        $stmt = $banco->prepare("UPDATE usuarios SET $updateFields WHERE usuario = ?");
        $types .= "s";
        $params[] = $usuario;
        $stmt->bind_param($types, ...$params);
        $result = $stmt->execute();

        if (!$result) {
            return "Erro ao atualizar os dados do usuário: " . $stmt->error;
        }

        return "Usuário atualizado com sucesso.";
    } else {
        return "Usuário não cadastrado.";
    }
}
?>

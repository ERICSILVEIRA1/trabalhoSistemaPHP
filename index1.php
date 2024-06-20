<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Index</title>
</head>
<body>

<form method="post">
    <ul>
        <li><input type="radio" name="opcao" value="1"> 1. Criar Usuário</li>
        <li><input type="radio" name="opcao" value="2"> 2. Atualizar Usuário</li>
        <li><input type="radio" name="opcao" value="3"> 3. Ver Usuário</li>
        <li><input type="radio" name="opcao" value="4"> 4. Deletar Usuário</li>
    </ul>
    <input type="submit" value="Escolher">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opcao = $_POST['opcao'] ?? '';

    switch ($opcao) {
        case '1':
            echo '<h2>Criar Usuário</h2>';
            echo '<form action="criarUsuario.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required><br>
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario" required><br>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required><br>
                <input type="submit" value="Criar Usuário">
            </form>';
            break;
        case '2':
            echo '<h2>Atualizar Usuário</h2>';
            echo '<form action="atualizarUsuario.php" method="post">
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario" required><br>
                <label for="novaSenha">Nova Senha:</label>
                <input type="password" name="novaSenha" id="novaSenha" required><br>
                <input type="submit" value="Atualizar Usuário">
            </form>';
            break;
        case '3':
            echo '<h2>Ver Usuário</h2>';
            echo '<form action="verUsuario.php" method="post">
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario" required><br>
                <input type="submit" value="Ver Usuário">
            </form>';
            break;
        case '4':
            echo '<h2>Deletar Usuário</h2>';
            echo '<form action="deletarUsuario.php" method="post">
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario" required><br>
                <input type="submit" value="Deletar Usuário">
            </form>';
            break;
        default:
            echo '<p>Opção inválida.</p>';
            break;
    }
}
?>

</body>
</html>

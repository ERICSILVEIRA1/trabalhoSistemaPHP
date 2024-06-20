<?php 
session_start();
require_once "admin.php";

$usuarioSes = $_SESSION["usuario"] ?? null;

$nome = $_POST["nome"] ?? null;
$usuario = $_POST["usuario"] ?? null;
$senha = $_POST["senha"] ?? null;

if (is_null($nome) && is_null($usuario) && is_null($senha)) {
    // Formulário de login
    echo '<form action="formulario.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" id="usuario">
        
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">  
        
            <input type="submit" value="Login">
        </form>';
} else {
    if (verificaSenha($usuario, $senha)) {
        // Login bem-sucedido
        $_SESSION["usuario"] = $usuario;
        echo "<h1>Login realizado com sucesso!</h1>";
        echo "<p>Seu login é: <strong>$nome</strong></p>";
        echo "<p>Seu usuário é: <strong>$usuario</strong></p>";
        echo "<p>Sua senha é: <strong>$senha</strong></p>";
        echo "<p>Para segurança, recomendamos que você altere sua senha.</p>";
        echo "<a href='Loguin/index1.php'>Index</a>";
        echo '<form action="http://localhost/trabalhoSistemaPHP/index1.php" method="get" target="_blank">
                <input type="submit" value="Abrir Google em nova guia">
            </form>';
    } else {
        // Credenciais inválidas, mostrar formulário de login novamente
        echo '<form action="formulario.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome">
            
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" id="usuario">
            
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha">
            
                <input type="submit" value="Login">
            </form>';
        echo "Tentar Novamente";
    }
}
?>

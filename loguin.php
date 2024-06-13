<?php
session_start();
require_once "banco.php";

$usuario = $_POST["usuario"] ?? null;
$senha = $_POST["senha"] ?? null;

if (!is_null($usuario) && !is_null($senha)) {
    if (usuarioCadastrado($usuario)) {
        if (verificaSenha($usuario, $senha)) {
            $_SESSION["usuario"] = $usuario;
            header("Location: app.php");
            exit(); 
        } else {
            echo '<div class="alert alert-danger" role="alert">Senha incorreta. Tente novamente.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Usuário não cadastrado. Entre em contato com o administrador.</div>';
    }
}
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<body>

    <div class="card mx-auto mt-5" style="max-width: 400px;">
        <div class="card-body">
            <?php
            if (isset($error_message)) {
                echo $error_message;
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="usuario">Usuário:</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>
                <input type="submit" value="Login" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

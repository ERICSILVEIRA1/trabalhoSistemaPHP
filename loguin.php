<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
    
        require_once "usuarios1.php";
        $usyarioioSes = $_SESSION["usuario"]?? null;
        //echo "Deu certo?";

        // echo print_r($_POST);
        $nome = $_POST["nome"] ?? null;
        $usuario = $_POST["usuario"] ?? null;
        $senha = $_POST["senha"] ?? null;

       // echo "$nome -- $usuario -- $senha";
           
                    

        if(is_null($usuario) && is_null($senha)){
            echo "Fazer Login";
           
            echo '<form action="" method="post">

            <label for="">Nome:</label>
            <input type="text" name="nome" id="">
        
            <label for="">Usuario:</label>
            <input type="text" name="usuariuo" id="">
        
            <label for="">Senha:</label>
            <input type="text" name="senha" id="">  
        
            <input type="submit" value="Login">
        
        </form>';
           

        }else{
            require_once "verUsuarios.php";
            if(verUsuarios($nome, $usuario, $senha)){
                $_SESSION["usuario"] = $usuario;
                echo "<script>document.getElementById('login-form').style.display = 'none';</script>";
                echo "";
                echo "<h1>Login realizado com sucesso!</h1>";
                echo "<script>document.getElementById('login-form').style.display = 'none';</script>";
                echo "<p>Seu login é: <strong>" . $nome . "</strong></p>";
                echo "<p>Seu login é: <strong>" . $usuario . "</strong></p>";
                echo "<p>Sua senha é: <strong>" . $senha . "</strong></p>";
                echo "<p>Para segurança, recomendamos que você altere sua senha.</p>";
            
                echo "<a href='Loguin/app.php'>Jogo da Velha</a>";
                echo'<form action= "http://localhost/trabalhoSistemaPHP/app.php" method="get" target="_blank">
                <input type="submit" value="Abrir Google em nova guia">
                </form>';
            }else{
                echo '<form action="" method="post">

                <label for="">Nome:</label>
                <input type="text" name="nome" id="">
            
                <label for="">Usuario:</label>
                <input type="text" name="usuariuo" id="">
            
                <label for="">Senha:</label>
                <input type="text" name="senha" id="">
            
                <input type="submit" value="Login">
            
            </form>

</form>';
                echo "Tentar Novamente";
            }

        }
        
    ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1><c>Bem vindo ao Jogo mais divertido de todos os tempos!</c></h1>
    <h1><c>Faça seu loguin e começe já a jogatina!</c></h1>
</body>
</html>

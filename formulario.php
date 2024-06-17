<?php 
    
        require_once "admin.php";
        $usuarioSes = $_SESSION["usuario"]?? null;
        //echo "Deu certo?";

        // echo print_r($_POST);
        $nome = $_POST["nome"] ?? null;
        $usuario = $_POST["usuario"] ?? null;
        $senha = $_POST["senha"] ?? null;

       // echo "$nome -- $usuario -- $senha";
           
                    

        if(is_null($usuario) && is_null($senha)){
            echo "Fazer Login";
           
            echo '<form action="index1.php" method="post">

            <label for="">Nome:</label>
            <input type="text" name="nome" id="">
        
            <label for="">Usuario:</label>
            <input type="text" name="usuariuo" id="">
        
            <label for="">Senha:</label>
            <input type="text" name="senha" id="">  
        
            <input type="submit" value="Login">
        
        </form>';
           

        }else{
            require_once "admin.php";
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
            
                echo "<a href='Loguin/index1.php'>Index</a>";
                echo'<form action= "http://localhost/trabalhoSistemaPHP/index1.php" method="get" target="_blank">
                <input type="submit" value="Abrir Google em nova guia">
                </form>';
            }else{
                echo '<form action="index1.php" method="post">

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


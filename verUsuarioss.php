<?php

require_once "banco.php";

echo "--------NAO LOGADO--------";

function verUsuarios($usr, $sen){
    global $usuarios;
    
    for ($i=0; $i < count($usuarios); $i++) { 
        if($usuarios[$i]["usu"] == $usr){
            if($usuarios[$i]["senha"] == $sen){
                $_SESSION["usuario"] = $usuarios[$i]["usu"];
                $_SESSION["nome"] = $usuarios[$i]["nome"];
                
                // Redirecionar para a página do phpMyAdmin
                header("Location: http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=db_trabalhosistemaphp&table=db_trabalhophp");
                exit;
            }else {
                echo "Senha incorreta!";
            }
        }
    }
    
    echo "Usuario nao existe!";
}

// Verificar se o usuário digitou admin e admin como credenciais
if ($_POST["usr"] == "admin" && $_POST["sen"] == "admin") {
    if (verUsuarios($_POST["usr"], $_POST["sen"])) {
        // Se o login for bem-sucedido, redirecionar para a página do phpMyAdmin
    } else {
        echo "Erro ao logar!";
    }
} else {
    echo "Credenciais inválidas!";
}

?>
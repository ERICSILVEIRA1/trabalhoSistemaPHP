<?php

require_once "banco.php";

echo "--------NAO LOGADO--------";

$usuario = $_POST["usuario"]?? null;
$nome = $_POST["nome"]?? null;
$senha = $_POST["senha"]?? null;


if(is_null($usuario) && is_null($senha) && is_null ($nome)){
    echo "deleta la";
    require_once "formulario.php";
}else{
    deletarUsuario($usuario, $nome, $senha);
}
?>
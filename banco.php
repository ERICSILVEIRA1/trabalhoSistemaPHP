<pre>
<?php 

    $banco = new mysqli("localhost", "root", "", "db_aula_quinta_manha");
 



    function createOnDB (string $into, string $values, bool $debug = false): void
    {
        global $banco;
        $q = "INSERT INTO $into VALUES $values";

        $resp = $banco->query($q);

        if ($debug) {
            echo "<br>Query: $q";
            echo "<br>Resp: $resp";

        }   
    }
function updateOnDB(string $into, string $values, bool $debug = false): void{

}

function criarUsuario($usuario, $nome, $senha)
{
    global $banco;

    $q = "INSERT INTO $usuario VALUES (NULL, '$usuario', '$nome', '$senha')";

    $resp = $banco->query($q);
    echo "<br>Query: $q";
    echo "<br>Resp: $resp";
}

function atualizarUsuario($usuario, $nome, $senha, $debug)
{
    global $banco;

    $set = "";
    if ($nome != "" && $senha != "") {
        }else if($nome != ""){
        }else if($senha != ""){

    }

    $q = "UPDATE usuarios SET senha='$senha' WHERE usuario='$usuario', $debug=false";

    $resp = $banco->query($q);
    if($debug){
    echo "<br>Query: $q";
    echo "<br>Resp: $resp";
    }
}

function verUsuario($usuario, $nome, $senha, $debug)
{
    global $banco;

    $set = "";
    if ($nome != "" && $senha != "") {
        }else if($nome != ""){
        }else if($senha != ""){

    }

    $q = "UPDATE usuarios SET senha='$senha' WHERE usuario='$usuario', $debug=false";

    $resp = $banco->query($q);
    if($debug){
    echo "<br>Query: $q";
    echo "<br>Resp: $resp";
    }
}

function deletarUsuario($usuario, $nome, $senha)
{
    global $banco;

    $set = "";
    if ($nome != "" && $senha != "") {
        }else if($nome != ""){
        }else if($senha != ""){

    }

    $q = "UPDATE usuarios SET senha='$senha' WHERE usuario='$usuario'";

    $resp = $banco->query($q);
    echo "<br>Query: $q";
    echo "<br>Resp: $resp";
}
?>
</pre>
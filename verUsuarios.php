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

                    return true;
                }else {
                    echo "Usuario nao existe!";
                }
            }
            
        }
        
        return false;

    }


?>
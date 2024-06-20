<?php
require 'banco.php'; // Inclui o arquivo de conexão com o banco de dados

$query = "SELECT * FROM usuarios";
$result = $banco->query($query);

if ($result->num_rows > 0) {
    echo "<h1>Lista de Usuários</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Nome</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        // Sanitize data
        $id = htmlspecialchars($row['id']);
        $usuario = htmlspecialchars($row['usuario']);
        $nome = htmlspecialchars($row['nome']);

        echo "<tr>
                <td>$id</td>
                <td>$usuario</td>
                <td>$nome</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}
?>

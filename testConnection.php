<?php
$banco = new mysqli("localhost:3307", "root", "", "db_trabalhosistemaphp");


if ($banco->connect_error) {
    die("Connection failed: " . $banco->connect_error);
} else {
    echo "Connected successfully";
}


?>

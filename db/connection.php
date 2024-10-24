<?php
$conn = new mysqli('localhost', 'username', 'password', 'test');

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>
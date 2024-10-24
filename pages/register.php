<?php
include('../db/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $code = $_POST['code'];

    $api_url = "https://jsonplaceholder.typicode.com/posts/1";
    $response = file_get_contents($api_url);
    $response_data = json_decode($response, true);
    $title = $response_data['title'];

    $query = "INSERT INTO users (name_user, email_user, password_user, title_user, code_user) VALUES ('$name', '$email', '$password', '$title', '$code')";

    if ($conn->query($query) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
}

$conn->close();
?>

<form method="POST" action="">
    Nome: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Código Único: <input type="text" name="code" required><br>
    Senha: <input type="password" name="password" required><br>
    <button type="submit">Cadastrar</button>
</form>
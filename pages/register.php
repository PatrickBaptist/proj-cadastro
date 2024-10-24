<?php
include('../db/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $api_url = 'https://jsonplaceholder.typicode.com/posts/1';
    $api_response = file_get_contents($api_url);
    $api_data = json_decode($api_response, true);
    $title = $api_data['title'];

    $stmt = $conn->prepare("INSERT INTO users (name_user, email_user, password_user, title_user, code_user) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $hashed_password, $title, $code);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/proj-cadastro/assets/styles.css">
</head>
<body>
    <div class="container">
        <h2>Cadastro</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Nome" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="text" name="code" placeholder="Código Único" required><br>
            <input type="password" name="password" placeholder="Senha" required><br>
            <button type="submit">Cadastrar</button>
            <a href="/proj-cadastro/pages/login.php">Fazer login</a>
        </form>
    </div>
</body>
</html>
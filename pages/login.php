<?php
include('../db/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email_user = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
   
        if (password_verify($password, $user['password_user'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user'] = $user['name_user'];
            header('Location: private.php');
            exit();
        } else {
            echo "Credenciais inválidas!";
        }
    } else {
        echo "Credenciais inválidas!";
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
    <title>Login</title>
    <link rel="stylesheet" href="/proj-cadastro/assets/styles.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Senha" required><br>
            <button type="submit">Login</button>
            <a href="/proj-cadastro/pages/register.php">Cadastrar</a>
        </form>
    </div>
</body>
</html>
<?php
include('../db/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email_user = '$email' AND password_user = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        header('Location: private.php');
        exit();
    } else {
        echo "Credenciais inválidas!";
    }
}

$conn->close();
?>

<form method="POST" action="">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Privada</title>
    <link rel="stylesheet" href="/proj-cadastro/assets/styles.css">
</head>
<body>
    <div class="container">
        <h2>Bem-vindo, <?php echo $_SESSION['user']; ?>!</h2>
        <form method="POST">
            <button type="submit" name="logout" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
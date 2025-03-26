<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = 'Parolele nu se potrivesc!';
    } else {
        $users = json_decode(file_get_contents('users.json'), true);
        
        foreach ($users as $user) {
            if ($user['username'] == $username) {
                $error = 'Username-ul este deja luat!';
                break;
            }
        }

        if (!isset($error)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $users[] = ['username' => $username, 'password' => $hashed_password];

            file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

            $_SESSION['username'] = $username;

            header('Location: index.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare</title>
    <link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="square-container">
        <h1>Înregistrare</h1>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Username" required>

            <input type="password" id="password" name="password" placeholder="Parolă" required>

            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmă parola" required>

            <button type="submit">Înregistrează-te</button>
        </form>

        <p>Ai deja un cont? <a href="login.php">Autentifică-te aici</a></p>
    </div>
</body>
</html>

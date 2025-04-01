
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Înregistrare</title>
    <link rel="stylesheet" href="style/register.css">
    
    <!-- Adaugă jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="register.js"></script>
</head>
<body>
    <div class="square-container">
        <h1>Înregistrare</h1>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form id="registerForm">
            <input type="text" id="username" name="username" placeholder="Username" required>

            <input type="password" id="password" name="password" placeholder="Parolă" required>

            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmă parola" required>

            <button type="submit">Înregistrează-te</button>
        </form>

        <p>Ai deja un cont? <a href="login.php">Autentifică-te aici</a></p>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificare</title>
    <link rel="stylesheet" href="style/login.css">
    
    <!-- Adaugă jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="login.js"></script>
</head>

<body>
    <div class="square-container">
        <h1>Autentificare</h1>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form id="loginForm">
            <input type="text" id="username" name="username" placeholder="Username" required>

            <input type="password" id="password" name="password" placeholder="Parolă" required>

            <button type="submit">Autentificare</button>
        </form>

        <p>Nu ai cont? <a href="register_page.php">Înregistrează-te aici</a></p>
    </div>
</body>
</html>

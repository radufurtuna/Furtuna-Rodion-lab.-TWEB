<?php
session_start();
$isLoggedIn = isset($_SESSION['username']); 
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <link rel="stylesheet" href="style/Principal.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="java.js"></script>
    <title>ChipSet</title>
</head>

<body>
    <div class="header-container"> 
        <div class="logo">
            <img src="images/logo.png" alt="ChipSet">
        </div>
        
        <header>
            <nav class="menu">
                <h1>Pagina principală</h1>
                <ul>
                    <li><a href="tutoriale.html">Tutoriale</a></li>
                    <li><a href="microcontrolere.html">Microcontrolere</a></li>
                    <li><a href="circuite.html">Circuite</a></li>
                </ul>
            </nav>
                    <button id="authButton" onclick="handleAuth()">
                <?php echo $isLoggedIn ? 'Ieșire' : 'Logare'; ?>
            </button>
        </header>
    </div>

    <div id="searchContainer">
        <input type="text" id="searchBar" placeholder="Căutați informații...">
        <button id="searchButton">Caută</button>
    </div>

    <main>
        <section>
            <h2>Lansări noi</h2>
            <div class="photo-section">
                <div class="photo-frame">
                    <img src="images/Majorana.jpg" alt="Exemplu 1" class="photo">
                    <div class="photo-info">
                        <h3>Majorana-1</h3>
                        <p>Cercetătorii de la Microsoft au anunțat crearea primilor „qubiți topologici”...</p>
                    </div>
                </div>
                
                <div class="photo-frame">
                    <img src="images/edge AI.jpg" alt="Exemplu 2" class="photo">
                    <div class="photo-info">
                        <h3>Edge AI</h3>
                        <p>Inteligența artificială Edge se referă la implementarea algoritmilor AI...</p>
                    </div>
                </div>
                
                <div class="photo-frame">
                    <img src="images/jetson nano.jpg" alt="Exemplu 3" class="photo">
                    <div class="photo-info">
                        <h3>Jetson nano</h3>
                        <p>Modulul Jetson Nano este un mic computer AI...</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>© 2025</p>
        <p>Contacte: </p>
        <p>https://jlcpcb.com/</p>
        <p>https://www.pcbway.com</p>
        <p>https://robotica.md</p>
    </footer>

    <script>
        function handleAuth() {
            <?php if ($isLoggedIn): ?>
                window.location.href = 'logout.php';
            <?php else: ?>
                window.location.href = 'login.php';
            <?php endif; ?>
        }
    </script>
</body>
</html>
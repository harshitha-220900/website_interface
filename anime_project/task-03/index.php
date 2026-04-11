<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>An!mStream | Task 03 Interactive</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <a href="../index.php" class="logo">An!mStream</a>
        <nav class="nav-links">
            <a href="../index.php">Home</a>
            <a href="#" onclick="showDocumentation()">JS Docs</a>
            <a href="documentation.php">📄 Docs</a>
            <?php if (isset($_SESSION['username'])): ?>
                <span class="user-greet">Hi, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
            <?php endif; ?>
        </nav>
    </header>

    <main>
        <div class="interactive-hero">
            <div class="container">
                <div class="badge">JavaScript Interactivity</div>
                <h1 id="main-greeting">Welcome to the <span>Interactive Explorer</span></h1>
                <p>This page demonstrates core JavaScript concepts: variables, functions, objects, and pop-up interactions.</p>
                
                <div class="action-bar">
                    <button class="btn btn-primary" onclick="initGreeting()">Personalize Page</button>
                    <button class="btn btn-secondary" onclick="resetPage()">Clear Data</button>
                </div>
            </div>
        </div>

        <section class="explorer-section">
            <div class="container">
                <div class="section-header">
                    <h2>Anime Database <span>(Object-Oriented)</span></h2>
                    <p>Interact with our anime objects stored in JavaScript.</p>
                </div>

                <div id="anime-grid" class="grid-container">
                    <!-- Loaded via JS -->
                </div>
            </div>
        </section>

        <section class="stats-section">
            <div class="container">
                <div class="stats-card">
                    <h3>Session Statistics</h3>
                    <div class="stats-grid">
                        <div class="stat-item">
                            <span class="stat-label">Favorites</span>
                            <span id="fav-count" class="stat-value">0</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-label">Interactions</span>
                            <span id="click-count" class="stat-value">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2026 An!mStream Task-03. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

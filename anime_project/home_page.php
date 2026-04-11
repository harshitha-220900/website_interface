<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$username = $isLoggedIn ? htmlspecialchars($_SESSION['username']) : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>An!mStream | Watch Anime Online</title>
    <meta name="description" content="Stream the best anime in Ultra HD. Discover trending series, movies, and simulcasts on An!mStream.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    <LINK REL="STYLESHEET" HREF="css/external.css" TYPE="TEXT/CSS">
</head>

<body>

    <!-- ============================
         UNIFIED HEADER (nav adapts)
    ============================ -->
    <header>
        <div class="logo">An!mStream</div>
        <nav>
            <a href="home_page.php" class="active">Home</a>
            <a href="#">Top Anime</a>
            <a href="#">My List</a>
            <?php if ($isLoggedIn): ?>
                <span style="color: var(--accent-blue); margin-left: 10px;">
                    Hello, <strong><?php echo $username; ?></strong>
                </span>
                <a href="task-04/logout.php" style="color: #ff4757;">Logout</a>
            <?php else: ?>
                <a href="task-04/sign_in.html">Login</a>
                <a href="task-04/register.html" style="
                    background: linear-gradient(45deg, var(--accent-blue), var(--accent-purple));
                    padding: 8px 20px;
                    border-radius: 8px;
                    color: #fff;
                    font-weight: 700;
                    font-size: 0.9rem;
                ">Sign Up</a>
            <?php endif; ?>
        </nav>

        <form class="nav-form" onsubmit="return false;">
            <select id="genre-filter">
                <option value="">Genres</option>
                <option value="action">Action</option>
                <option value="adventure">Adventure</option>
                <option value="comedy">Comedy</option>
                <option value="drama">Drama</option>
                <option value="fantasy">Fantasy</option>
                <option value="horror">Horror</option>
            </select>
            <input type="text" id="search-input" placeholder="Search anime..." />
            <button type="button" onclick="doSearch()">GO</button>
        </form>
    </header>

    <!-- ============================
         HERO SECTION
    ============================ -->
    <section class="hero">
        <h1>WATCH <span>ANIME</span> ONLINE</h1>
        <p>Dive into the world of high-quality anime streaming. Explore the latest and greatest series, movies, and more.</p>
        <?php if (!$isLoggedIn): ?>
            <div style="margin-top: 2rem; display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="task-04/register.html" style="
                    padding: 14px 32px;
                    border-radius: 8px;
                    background: linear-gradient(45deg, var(--accent-blue), var(--accent-purple));
                    color: #fff;
                    font-weight: 700;
                    font-size: 1rem;
                    text-decoration: none;
                    transition: all 0.3s;
                " onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''"
                >Start Watching Free</a>
                <a href="task-04/sign_in.html" style="
                    padding: 14px 32px;
                    border-radius: 8px;
                    background: rgba(255,255,255,0.05);
                    color: #fff;
                    font-weight: 700;
                    font-size: 1rem;
                    text-decoration: none;
                    border: 1px solid rgba(255,255,255,0.2);
                    transition: all 0.3s;
                " onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform=''"
                >Login</a>
            </div>
        <?php endif; ?>
    </section>

    <!-- ============================
         TRENDING ANIME
    ============================ -->
    <section class="section">
        <h2>TRENDING ANIME</h2>
        <div class="grid" id="anime-grid">
            <div class="card">
                <img src="task-01/onepiece.jpg" alt="One Piece" />
                <div class="card-content">
                    <a href="#">ONE PIECE</a>
                    <p class="genre">Action • Adventure</p>
                    <audio controls>
                        <source src="task-01/onepiece.mpeg" type="audio/mpeg" />
                    </audio>
                </div>
            </div>
            <div class="card">
                <img src="task-01/naruto.jpg" alt="Naruto" />
                <div class="card-content">
                    <a href="#">NARUTO: CLASSIC</a>
                    <p class="genre">Action • Ninja</p>
                    <video class="naruto-video" controls muted>
                        <source src="task-01/Blue_bird.mp4" type="video/mp4" />
                    </video>
                </div>
            </div>
            <div class="card">
                <img src="task-01/images.jpg" alt="Naruto Shippuden" />
                <div class="card-content">
                    <a href="#">NARUTO: SHIPPUDEN</a>
                    <p class="genre">Action • Drama</p>
                </div>
            </div>
            <div class="card">
                <img src="task-01/download.jpg" alt="Demon Slayer" />
                <div class="card-content">
                    <a href="#">DEMON SLAYER</a>
                    <p class="genre">Action • Adventure</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================
         ANIME MOVIES
    ============================ -->
    <section class="section">
        <h2>ANIME MOVIES</h2>
        <div class="grid">
            <div class="card">
                <img src="task-01/yourname.jpg" alt="Your Name" />
                <div class="card-content">
                    <a href="#">YOUR NAME</a>
                    <p class="genre">Romance • Fantasy</p>
                </div>
            </div>
            <div class="card">
                <img src="task-01/cmpersec.jpg" alt="5 Centimeters Per Second" />
                <div class="card-content">
                    <a href="#">5 CM PER SECOND</a>
                    <p class="genre">Drama • Slice of Life</p>
                </div>
            </div>
            <div class="card">
                <img src="task-01/suzume.jpg" alt="Suzume" />
                <div class="card-content">
                    <a href="#">SUZUME</a>
                    <p class="genre">Fantasy • Adventure</p>
                </div>
            </div>
            <div class="card">
                <img src="task-01/FIREFLIES.jpg" alt="Grave of the Fireflies" />
                <div class="card-content">
                    <a href="#">GRAVE OF FIREFLIES</a>
                    <p class="genre">War • Drama</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================
         FEATURED TRAILER
    ============================ -->
    <section class="section">
        <h2>FEATURED TRAILER</h2>
        <div class="video-featured">
            <iframe width="100%" height="500"
                src="https://www.youtube.com/embed/pmanD_s7G3U?si=92G1s1VbgqJ4hPmI"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </section>

    <!-- ============================
         ANIME INSIGHTS (Tables)
    ============================ -->
    <section class="section">
        <h2>ANIME INSIGHTS</h2>

        <div class="internal">
            <table>
                <caption><h2>Ratings Overview</h2></caption>
                <thead>
                    <tr><th>ANIME</th><th>RATING</th><th>GENRE</th><th>DIRECTOR</th></tr>
                </thead>
                <tbody>
                    <tr><td>NARUTO: CLASSIC</td><td>9.5</td><td>NINJA</td><td>HAYATO DATE</td></tr>
                    <tr><td>NARUTO: SHIPPUDEN</td><td>9.5</td><td>NINJA</td><td>HAYATO DATE</td></tr>
                    <tr><td>DEMON SLAYER</td><td>9.5</td><td>ACTION, ADVENTURE</td><td>HARUO SOTOZAKI</td></tr>
                    <tr><td>DEATH NOTE</td><td>8.5</td><td>THRILLER</td><td>TETSURO ARAKI</td></tr>
                    <tr><td>ATTACK ON TITAN</td><td>10</td><td>ADVENTURE</td><td>SHINJI HIGUCHI</td></tr>
                </tbody>
            </table>
        </div>

        <div class="external">
            <table>
                <caption><h2>Genre-wise Popularity</h2></caption>
                <thead>
                    <tr><th>GENRE</th><th>POPULAR ANIME</th><th>AVG RATING</th></tr>
                </thead>
                <tbody>
                    <tr><td>ACTION</td><td>ONE PIECE</td><td>10</td></tr>
                    <tr><td>ADVENTURE</td><td>ATTACK ON TITAN</td><td>9.8</td></tr>
                    <tr><td>NINJA</td><td>NARUTO: CLASSIC</td><td>9.5</td></tr>
                    <tr><td>CRIME</td><td>DEATH NOTE</td><td>9.0</td></tr>
                    <tr><td>THRILLER</td><td>TOKYO GHOUL</td><td>9.8</td></tr>
                </tbody>
            </table>
        </div>

        <div class="external">
            <table>
                <caption><h2>Studio Portfolio</h2></caption>
                <thead>
                    <tr><th>STUDIO</th><th>FAMOUS WORKS</th><th>STYLE</th><th>RATING</th></tr>
                </thead>
                <tbody>
                    <tr><td>UFOTABLE</td><td>DEMON SLAYER</td><td>CINEMATIC ACTION</td><td>9.8</td></tr>
                    <tr><td>MAPPA</td><td>ATTACK ON TITAN</td><td>DYNAMIC CAMERA</td><td>9.7</td></tr>
                    <tr><td>STUDIO GHIBLI</td><td>SPIRITED AWAY</td><td>ENVIRONMENTAL DEPTH</td><td>10</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <footer style="padding: 3rem 5%; text-align: center; border-top: 1px solid var(--glass-border); color: var(--text-secondary);">
        <p>&copy; 2026 An!mStream. All rights reserved.</p>
    </footer>

    <!-- Task 03: JS Interactivity -->
    <script src="js/home_interactivity.js"></script>

    <script>
        // Search function for the GO button
        function doSearch() {
            const query = document.getElementById('search-input').value.toLowerCase();
            const cards = document.querySelectorAll('#anime-grid .card');
            cards.forEach(card => {
                const title = card.querySelector('.card-content a').textContent.toLowerCase();
                card.style.display = title.includes(query) ? 'block' : 'none';
            });
        }

        // Enter key triggers search
        document.getElementById('search-input').addEventListener('keydown', function(e) {
            if (e.key === 'Enter') doSearch();
        });
    </script>

</body>
</html>
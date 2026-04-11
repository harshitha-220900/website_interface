<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 03 – Documentation | An!mStream</title>
    <meta name="description" content="Documentation for Task 03: JavaScript Interactive Features including Variables, Functions, Objects, Methods, and Pop-up Boxes.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary:      #00eaff;
            --secondary:    #bd00ff;
            --bg-color:     #0d1117;
            --card-bg:      rgba(22, 27, 34, 0.85);
            --text-main:    #f0f6fc;
            --text-dim:     #8b949e;
            --glass-border: rgba(255, 255, 255, 0.1);
            --accent-green: #3fb950;
            --accent-yellow:#d29922;
            --accent-red:   #ff4a4a;
        }

        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            font-family: 'Outfit', sans-serif;
            line-height: 1.7;
            overflow-x: hidden;
        }

        /* ── HEADER ─────────────────────────────────── */
        header {
            padding: 18px 0;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--glass-border);
            position: sticky; top: 0; z-index: 1000;
        }
        .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
        header .container { display:flex; justify-content:space-between; align-items:center; }

        .logo {
            font-size: 26px; font-weight: 800; text-decoration: none;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .nav-links { display:flex; gap:24px; align-items:center; }
        .nav-links a {
            color: var(--text-main); text-decoration:none;
            font-weight:500; transition: color .3s;
        }
        .nav-links a:hover { color: var(--primary); }

        /* ── HERO ────────────────────────────────────── */
        .doc-hero {
            padding: 90px 0 60px;
            text-align: center;
            background:
                radial-gradient(circle at top right,  rgba(189,0,255,.12), transparent),
                radial-gradient(circle at bottom left, rgba(0,234,255,.10), transparent);
        }
        .tag {
            display: inline-block; padding: 6px 18px;
            background: rgba(0,234,255,.1); color: var(--primary);
            border: 1px solid rgba(0,234,255,.25); border-radius: 20px;
            font-size: 13px; letter-spacing: 1px; text-transform: uppercase;
            margin-bottom: 22px;
        }
        .doc-hero h1 {
            font-size: 52px; font-weight: 800; margin-bottom: 18px;
        }
        .doc-hero h1 span {
            background: linear-gradient(90deg, var(--primary), #5effff);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .doc-hero p { color: var(--text-dim); font-size: 18px; max-width: 680px; margin: 0 auto; }

        /* ── SECTIONS ────────────────────────────────── */
        .doc-body { padding: 70px 0 100px; }

        .section-block {
            background: var(--card-bg);
            border: 1px solid var(--glass-border);
            border-radius: 18px;
            padding: 44px 48px;
            margin-bottom: 36px;
            position: relative;
            overflow: hidden;
            transition: border-color .3s, box-shadow .3s;
        }
        .section-block::before {
            content: '';
            position: absolute; top: 0; left: 0;
            width: 4px; height: 100%;
            border-radius: 18px 0 0 18px;
        }
        .section-block.aim::before    { background: linear-gradient(180deg, var(--primary), #5effff); }
        .section-block.task::before   { background: linear-gradient(180deg, var(--secondary), #e040fb); }
        .section-block.desc::before   { background: linear-gradient(180deg, var(--accent-green), #56d364); }
        .section-block.def::before    { background: linear-gradient(180deg, var(--accent-yellow), #e3b341); }

        .section-block:hover {
            border-color: rgba(255,255,255,.2);
            box-shadow: 0 8px 40px rgba(0,0,0,.4);
        }

        .section-label {
            font-size: 11px; font-weight: 600; letter-spacing: 2px;
            text-transform: uppercase; margin-bottom: 10px;
        }
        .aim  .section-label  { color: var(--primary); }
        .task .section-label  { color: var(--secondary); }
        .desc .section-label  { color: var(--accent-green); }
        .def  .section-label  { color: var(--accent-yellow); }

        .section-block h2 { font-size: 26px; font-weight: 700; margin-bottom: 20px; }

        .section-block p  { color: var(--text-dim); font-size: 16px; margin-bottom: 14px; }
        .section-block p:last-child { margin-bottom: 0; }

        /* ── TASK LIST ───────────────────────────────── */
        .task-list { list-style: none; padding: 0; }
        .task-list li {
            display: flex; align-items: flex-start; gap: 14px;
            color: var(--text-dim); font-size: 16px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255,255,255,.05);
        }
        .task-list li:last-child { border-bottom: none; }
        .task-list li .num {
            min-width: 28px; height: 28px; border-radius: 50%;
            background: rgba(0,234,255,.12); color: var(--primary);
            font-size: 13px; font-weight: 700;
            display: flex; align-items:center; justify-content:center;
            flex-shrink: 0;
        }

        /* ── DEFINITION CARDS ────────────────────────── */
        .def-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 20px;
            margin-top: 10px;
        }
        .def-card {
            background: rgba(255,255,255,.03);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 24px;
            transition: transform .3s, border-color .3s;
        }
        .def-card:hover {
            transform: translateY(-4px);
            border-color: rgba(210,153,34,.35);
        }
        .def-card .def-icon { font-size: 28px; margin-bottom: 12px; }
        .def-card h3 { font-size: 17px; font-weight: 700; margin-bottom: 8px; }
        .def-card p  { color: var(--text-dim); font-size: 14px; line-height: 1.6; }

        /* ── CODE SNIPPET ────────────────────────────── */
        .code-block {
            background: #161b22;
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            padding: 20px 24px;
            margin-top: 18px;
            overflow-x: auto;
        }
        .code-block pre {
            font-family: 'JetBrains Mono', monospace;
            font-size: 13px;
            color: #c9d1d9;
            white-space: pre;
        }
        .kw  { color: #ff7b72; }   /* keywords */
        .fn  { color: #d2a8ff; }   /* functions */
        .str { color: #a5d6ff; }   /* strings  */
        .cm  { color: #8b949e; font-style:italic; } /* comments */
        .nm  { color: #79c0ff; }   /* numbers  */

        /* ── BACK BUTTON ─────────────────────────────── */
        .back-bar { text-align: center; margin-top: 50px; }
        .btn-back {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 13px 32px; border-radius: 10px;
            background: transparent; color: var(--primary);
            border: 1px solid rgba(0,234,255,.3);
            font-family: 'Outfit', sans-serif; font-size: 15px;
            font-weight: 600; text-decoration: none; cursor: pointer;
            transition: all .3s;
        }
        .btn-back:hover {
            background: rgba(0,234,255,.1);
            box-shadow: 0 4px 20px rgba(0,234,255,.2);
            transform: translateY(-2px);
        }

        /* ── FOOTER ──────────────────────────────────── */
        footer {
            padding: 36px 0;
            text-align: center;
            color: var(--text-dim);
            border-top: 1px solid var(--glass-border);
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .doc-hero h1 { font-size: 34px; }
            .section-block { padding: 30px 24px; }
            .def-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- ══════════════════ HEADER ══════════════════ -->
<header>
    <div class="container">
        <a href="../index.php" class="logo">An!mStream</a>
        <nav class="nav-links">
            <a href="../index.php">Home</a>
            <a href="index.php">Task 03</a>
            <?php if (isset($_SESSION['username'])): ?>
                <span style="color:var(--primary); font-weight:600;">
                    Hi, <?php echo htmlspecialchars($_SESSION['username']); ?>
                </span>
            <?php endif; ?>
        </nav>
    </div>
</header>

<!-- ══════════════════ HERO ══════════════════ -->
<section class="doc-hero">
    <div class="container">
        <div class="tag">Documentation</div>
        <h1>Task 03 – <span>JavaScript Interactivity</span></h1>
        <p>Comprehensive documentation covering the aim, tasks, description, and key definitions
           of all JavaScript concepts used in this module.</p>
    </div>
</section>

<!-- ══════════════════ BODY ══════════════════ -->
<main class="doc-body">
    <div class="container">

        <!-- ── AIM ──────────────────────────────────── -->
        <div class="section-block aim">
            <p class="section-label">01 · Aim</p>
            <h2>🎯 Aim of the Task</h2>
            <p>
                The aim of Task 03 is to understand and implement core <strong>client-side JavaScript</strong>
                concepts within an interactive web page built for the An!mStream anime project.
            </p>
            <p>
                By the end of this task, students should be able to declare and use <em>variables</em>,
                write reusable <em>functions</em>, model real-world data using <em>objects and methods</em>,
                and interact with the user through JavaScript's built-in <em>pop-up dialog boxes</em>
                — all within a fully styled, session-aware PHP environment.
            </p>
        </div>

        <!-- ── TASK ──────────────────────────────────── -->
        <div class="section-block task">
            <p class="section-label">02 · Task</p>
            <h2>📋 Tasks to Complete</h2>
            <ul class="task-list">
                <li>
                    <span class="num">1</span>
                    <span>Declare JavaScript <strong>variables</strong> to store application state
                    (user name, favourite count, interaction count).</span>
                </li>
                <li>
                    <span class="num">2</span>
                    <span>Create a JavaScript <strong>constructor function</strong> (<code>Anime</code>)
                    to model anime objects with properties: id, title, genre, rating, image, and description.</span>
                </li>
                <li>
                    <span class="num">3</span>
                    <span>Attach <strong>methods</strong> to the object — <code>logDetails()</code>
                    (logs to console) and <code>toggleFavorite()</code> (toggles favorite status).</span>
                </li>
                <li>
                    <span class="num">4</span>
                    <span>Populate an anime <strong>data array</strong> using the constructor and dynamically
                    render anime cards onto the page using <code>renderAnime()</code>.</span>
                </li>
                <li>
                    <span class="num">5</span>
                    <span>Implement a <strong>personalization feature</strong> using <code>prompt()</code>
                    to ask for the user's name and update the greeting with <code>alert()</code>.</span>
                </li>
                <li>
                    <span class="num">6</span>
                    <span>Implement a <strong>session reset feature</strong> with a <code>confirm()</code>
                    dialog that resets all counters and favorites after user confirmation.</span>
                </li>
                <li>
                    <span class="num">7</span>
                    <span>Track and display <strong>session statistics</strong> — Favourites count and
                    Interaction count — in real time on the page.</span>
                </li>
                <li>
                    <span class="num">8</span>
                    <span>Integrate the task page with the <strong>PHP session</strong> to display a
                    personalised greeting when the user is logged in.</span>
                </li>
            </ul>
        </div>

        <!-- ── DESCRIPTION ───────────────────────────── -->
        <div class="section-block desc">
            <p class="section-label">03 · Description</p>
            <h2>📝 Project Description</h2>
            <p>
                Task 03 is an <strong>interactive JavaScript explorer</strong> page embedded in the
                An!mStream website. The page lives at <code>task-03/index.php</code> and is supported
                by <code>script.js</code> (logic) and <code>style.css</code> (dark-mode design).
            </p>
            <p>
                On load, the script instantiates six <code>Anime</code> objects and renders them as
                responsive cards inside a CSS Grid layout. Each card displays the anime's poster image,
                title, rating, and genre, along with two interactive controls:
            </p>
            <ul class="task-list" style="margin-bottom:16px;">
                <li>
                    <span class="num">→</span>
                    <span><strong>Details button</strong> — calls <code>viewDetails(index)</code>,
                    which invokes <code>anime.logDetails()</code> and shows a formatted <code>alert()</code>.</span>
                </li>
                <li>
                    <span class="num">→</span>
                    <span><strong>Favourite button</strong> — calls <code>toggleFav(index)</code>,
                    which calls <code>anime.toggleFavorite()</code> and updates the heart icon and counter.</span>
                </li>
            </ul>
            <p>
                A <strong>"Personalize Page"</strong> button triggers <code>initGreeting()</code>,
                prompting the visitor to enter their name and then welcoming them with an alert.
                A <strong>"Clear Data"</strong> button uses <code>confirm()</code> to safely reset all
                session-level state without a full page reload.
            </p>
            <p>
                The live <strong>Session Statistics</strong> panel at the bottom reflects the current
                favourites and interaction counts, updating instantly on every user action.
            </p>
            <p>
                The page is styled with a dark glassmorphism theme (CSS custom properties, radial
                gradients, backdrop-filter), uses the <em>Outfit</em> Google Font, and is fully
                responsive down to 768 px breakpoints.
            </p>

            <!-- Code sample -->
            <div class="code-block">
<pre><span class="cm">// Anime constructor (Object)</span>
<span class="kw">function</span> <span class="fn">Anime</span>(id, title, genre, rating, image, description) {
    <span class="kw">this</span>.title  = title;
    <span class="kw">this</span>.rating = rating;
    <span class="kw">this</span>.isFavorite = <span class="nm">false</span>;

    <span class="cm">// Method: toggle favourite</span>
    <span class="kw">this</span>.<span class="fn">toggleFavorite</span> = <span class="kw">function</span>() {
        <span class="kw">this</span>.isFavorite = !<span class="kw">this</span>.isFavorite;
        <span class="kw">if</span> (<span class="kw">this</span>.isFavorite) favoritesCount++;
        <span class="kw">else</span>             favoritesCount--;
        <span class="fn">updateStats</span>();
    };
}

<span class="cm">// Pop-up: prompt → alert → confirm</span>
<span class="kw">function</span> <span class="fn">initGreeting</span>() {
    <span class="kw">const</span> name = <span class="fn">prompt</span>(<span class="str">"What is your name?"</span>);
    <span class="kw">if</span> (name) <span class="fn">alert</span>(<span class="str">`Welcome, ${name}!`</span>);
}</pre>
            </div>
        </div>

        <!-- ── DEFINITIONS ────────────────────────────── -->
        <div class="section-block def">
            <p class="section-label">04 · Definitions</p>
            <h2>📖 Key Definitions</h2>
            <p style="margin-bottom:28px;">
                The following JavaScript concepts are demonstrated throughout Task 03.
            </p>
            <div class="def-grid">

                <div class="def-card">
                    <div class="def-icon">📦</div>
                    <h3>Variable</h3>
                    <p>
                        A named container that stores a value in memory.
                        In Task 03, <code>let</code> is used for mutable state such as
                        <code>userName</code>, <code>favoritesCount</code>, and
                        <code>interactionCount</code>, while <code>const</code> is used for the
                        immutable <code>animeData</code> array reference.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">⚙️</div>
                    <h3>Function</h3>
                    <p>
                        A reusable block of code that performs a specific task.
                        Functions like <code>renderAnime()</code>, <code>initGreeting()</code>,
                        <code>toggleFav()</code>, and <code>resetPage()</code> encapsulate
                        logic that can be called on demand (e.g., on button click).
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">🗂️</div>
                    <h3>Object</h3>
                    <p>
                        A collection of related properties (data) and methods (behaviour)
                        grouped under one name. Task 03 defines an <code>Anime</code>
                        constructor that creates objects with properties like
                        <code>title</code>, <code>genre</code>, and <code>rating</code>.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">🔧</div>
                    <h3>Method</h3>
                    <p>
                        A function that belongs to an object. In Task 03,
                        <code>anime.logDetails()</code> prints information to the browser
                        console, and <code>anime.toggleFavorite()</code> flips the favourite
                        state and updates the UI counter.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">💬</div>
                    <h3>alert()</h3>
                    <p>
                        A built-in browser pop-up that displays a message to the user with
                        an <em>OK</em> button. Used in Task 03 to greet the user after
                        name entry and to show anime details.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">✏️</div>
                    <h3>prompt()</h3>
                    <p>
                        A built-in browser pop-up that displays a message and an input field,
                        returning the user's typed value (or <code>null</code> if cancelled).
                        Used in <code>initGreeting()</code> to capture the visitor's name.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">✅</div>
                    <h3>confirm()</h3>
                    <p>
                        A built-in browser pop-up with <em>OK</em> and <em>Cancel</em> buttons
                        that returns a boolean. Used in <code>resetPage()</code> to ask the
                        user to confirm before wiping favourites and interaction data.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">🔁</div>
                    <h3>Array &amp; forEach</h3>
                    <p>
                        <code>animeData</code> is a JavaScript <code>Array</code> holding all
                        six Anime objects. <code>forEach()</code> iterates over each element to
                        dynamically build and inject HTML cards into the DOM grid.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">🖥️</div>
                    <h3>DOM Manipulation</h3>
                    <p>
                        The Document Object Model (DOM) represents the page as a tree of nodes.
                        Task 03 reads and writes DOM elements
                        via <code>document.getElementById()</code>,
                        <code>innerHTML</code>, and <code>textContent</code> to update the
                        UI without a page reload.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">⏱️</div>
                    <h3>window.onload &amp; setTimeout</h3>
                    <p>
                        <code>window.onload</code> fires after the entire page has loaded,
                        allowing the script to call <code>renderAnime()</code> safely.
                        <code>setTimeout()</code> delays the auto-initialization log by
                        1 000 ms without blocking the UI.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">🎨</div>
                    <h3>CSS Custom Properties</h3>
                    <p>
                        Variables defined with <code>--name: value</code> inside <code>:root</code>
                        that are reused via <code>var(--name)</code>. Task 03's design system uses
                        tokens such as <code>--primary</code>, <code>--secondary</code>, and
                        <code>--card-bg</code> to enforce visual consistency.
                    </p>
                </div>

                <div class="def-card">
                    <div class="def-icon">🔒</div>
                    <h3>PHP Session</h3>
                    <p>
                        Server-side mechanism (<code>session_start()</code>,
                        <code>$_SESSION</code>) that persists user data across page requests.
                        Task 03 checks <code>$_SESSION['username']</code> to display a
                        personalised greeting in the navigation bar when logged in.
                    </p>
                </div>

            </div><!-- /def-grid -->
        </div><!-- /def block -->

        <!-- back button -->
        <div class="back-bar">
            <a href="index.php" class="btn-back">← Back to Task 03</a>
        </div>

    </div><!-- /container -->
</main>

<footer>
    <p>&copy; 2026 An!mStream · Task 03 Documentation</p>
</footer>

</body>
</html>

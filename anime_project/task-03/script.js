/**
 * Task 03: JavaScript Interactive Features
 * Demonstrating: Variables, Functions, Objects, Methods, and Pop-up Boxes
 */

// 1. VARIABLES (Application State)
let userName = "Explorer";
let favoritesCount = 0;
let interactionCount = 0;
let isInitialized = false;

// 2. OBJECTS & METHODS
// Defining an Anime class/constructor
function Anime(id, title, genre, rating, image, description) {
    this.id = id;
    this.title = title;
    this.genre = genre;
    this.rating = rating;
    this.image = image;
    this.description = description;
    this.isFavorite = false;

    // Method: log details to console
    this.logDetails = function() {
        console.log(`Anime: ${this.title} | Rating: ${this.rating}`);
    };

    // Method: toggle favorite status
    this.toggleFavorite = function() {
        this.isFavorite = !this.isFavorite;
        if (this.isFavorite) {
            favoritesCount++;
        } else {
            favoritesCount--;
        }
        updateStats();
        return this.isFavorite;
    };
}

// Data Array of Anime Objects
const animeData = [
    new Anime(1, "Naruto: Classic", "Action, Ninja", 9.5, "../task-01/naruto.jpg", "A young ninja who seeks recognition from his peers and dreams of becoming the Hokage."),
    new Anime(2, "One Piece", "Adventure, Action", 10, "../task-01/onepiece.jpg", "Monkey D. Luffy and his pirate crew in search of the ultimate treasure."),
    new Anime(3, "Demon Slayer", "Action, Fantasy", 9.5, "../task-01/download.jpg", "A boy becomes a demon slayer after his family is slaughtered and his sister turned into a demon."),
    new Anime(4, "Your Name", "Romance, Fantasy", 9.8, "../task-01/yourname.jpg", "Two strangers find themselves linked in a bizarre way after a cosmic event."),
    new Anime(5, "Suzume", "Adventure, Fantasy", 9.7, "../task-01/suzume.jpg", "A girl teams up with a mysterious young man to prevent disasters across Japan."),
    new Anime(6, "5cm Per Second", "Drama, Romance", 8.8, "../task-01/cmpersec.jpg", "A story of two people who grow apart over time despite their deep connection.")
];

// 3. FUNCTIONS

// Initialize page and greet user
function initGreeting() {
    // 4. POP-UP BOXES: prompt()
    const response = prompt("Welcome to An!mStream Interactive! What is your name?", userName);
    
    if (response !== null && response.trim() !== "") {
        userName = response;
        document.getElementById('main-greeting').innerHTML = `Hello, <span>${userName}</span>! Welcome back.`;
        
        // 4. POP-UP BOXES: alert()
        alert(`Welcome, ${userName}! Enjoy exploring our interactive anime database.`);
        
        incrementInteractions();
    }
}

// Render anime cards to the grid
function renderAnime() {
    const grid = document.getElementById('anime-grid');
    grid.innerHTML = '';

    animeData.forEach((anime, index) => {
        const card = document.createElement('div');
        card.className = 'anime-card';
        card.innerHTML = `
            <img src="${anime.image}" alt="${anime.title}" class="anime-img">
            <div class="anime-content">
                <h3 class="anime-title">${anime.title}</h3>
                <div class="anime-meta">
                    <span>⭐ ${anime.rating}</span>
                    <span>🎭 ${anime.genre}</span>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary" onclick="viewDetails(${index})">Details</button>
                    <button id="fav-${index}" class="fav-btn ${anime.isFavorite ? 'active' : ''}" onclick="toggleFav(${index})">
                        ${anime.isFavorite ? '❤️' : '🤍'}
                    </button>
                </div>
            </div>
        `;
        grid.appendChild(card);
    });
}

// Function with index parameter
function viewDetails(index) {
    const anime = animeData[index];
    anime.logDetails(); // Calling object method
    
    // 4. POP-UP BOXES: alert() for information
    alert(`[ ${anime.title} ]\n\nGenre: ${anime.genre}\nRating: ${anime.rating}/10\n\nDescription: ${anime.description}`);
    
    incrementInteractions();
}

function toggleFav(index) {
    const anime = animeData[index];
    const isNowFav = anime.toggleFavorite();
    
    // Update the heart icon
    const btn = document.getElementById(`fav-${index}`);
    btn.innerHTML = isNowFav ? '❤️' : '🤍';
    btn.classList.toggle('active');
    
    incrementInteractions();
}

// Update stats UI
function updateStats() {
    document.getElementById('fav-count').textContent = favoritesCount;
}

// Function to increment interaction counter
function incrementInteractions() {
    interactionCount++;
    document.getElementById('click-count').textContent = interactionCount;
}

// Reset page data
function resetPage() {
    // 4. POP-UP BOXES: confirm()
    const confirmReset = confirm("Are you sure you want to reset your session data? This will clear your interactions and favorites.");
    
    if (confirmReset) {
        favoritesCount = 0;
        interactionCount = 0;
        userName = "Explorer";
        
        // Reset objects
        animeData.forEach(anime => anime.isFavorite = false);
        
        // Update UI
        document.getElementById('main-greeting').innerHTML = `Welcome to the <span>Interactive Explorer</span>`;
        updateStats();
        document.getElementById('click-count').textContent = '0';
        renderAnime();
        
        alert("Session has been reset successfully.");
    }
}

// Documentation helper
function showDocumentation() {
    alert("Task 03 Implementation Details:\n\n" +
          "1. Variables: userName, favoritesCount, interactionCount\n" +
          "2. Functions: renderAnime(), initGreeting(), toggleFav(), etc.\n" +
          "3. Objects: Anime constructor used for data items\n" +
          "4. Methods: anime.logDetails() and anime.toggleFavorite()\n" +
          "5. Pop-ups: prompt() for name, alert() for data, confirm() for reset");
}

// Initialize on load
window.onload = function() {
    renderAnime();
    
    // Optional: auto-prompt on first visit
    setTimeout(() => {
        if (!isInitialized) {
            console.log("Auto-initializing interactive session...");
            isInitialized = true;
        }
    }, 1000);
};

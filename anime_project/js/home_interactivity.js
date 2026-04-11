/**
 * Task 03: Home Page Interactivity
 * Using: Variables, Functions, Objects, Methods, and Pop-ups
 */

// 1. VARIABLES
let userName = "Valued User";
let interactionCount = 0;

// 2. OBJECT CONSTRUCTOR & METHODS
function Anime(title, genre, rating, description) {
    this.title = title;
    this.genre = genre;
    this.rating = rating;
    this.description = description;
    this.isBookmarked = false;

    // Method to show detailed alert
    this.showInfo = function() {
        alert(`[ ${this.title} ]\n\nGenre: ${this.genre}\nRating: ${this.rating}/10\n\nDescription: ${this.description}`);
    };

    // Method to toggle bookmark with confirmation
    this.toggleBookmark = function() {
        const action = this.isBookmarked ? "remove from" : "add to";
        const confirmed = confirm(`Do you want to ${action} your watchlist: ${this.title}?`);
        
        if (confirmed) {
            this.isBookmarked = !this.isBookmarked;
            alert(`${this.title} has been ${this.isBookmarked ? 'added to' : 'removed from'} your list.`);
            return true;
        }
        return false;
    };
}

// 3. INITIALIZATION & DATA
const trendingAnime = {
    "ONE PIECE": new Anime("One Piece", "Action, Adventure", 10, "Monkey D. Luffy and his pirate crew in search of the ultimate treasure."),
    "NARUTO: CLASSIC": new Anime("Naruto: Classic", "Action, Ninja", 9.5, "A young ninja who seeks recognition from his peers and dreams of becoming the Hokage."),
    "NARUTO: SHIPPUDEN": new Anime("Naruto: Shippuden", "Action, Drama", 9.5, "Older and more skilled Naruto continues his journey to save his friend Sasuke."),
    "DEMON SLAYER": new Anime("Demon Slayer", "Action, Adventure", 9.5, "Tanjiro Kamado's journey to turn his sister back into a human and avenge his family."),
    "YOUR NAME": new Anime("Your Name", "Romance, Fantasy", 9.8, "A mystical bond forms between two teenagers who begin swapping bodies."),
    "5 CM PER SECOND": new Anime("5 CM Per Second", "Drama, Slice of Life", 8.8, "A story of young love and the physical and emotional distances that grow between people."),
    "SUZUME": new Anime("Suzume", "Fantasy, Adventure", 9.7, "A high school student and a mysterious young man travel across Japan closing doors to prevent disasters."),
    "GRAVE OF FIREFLIES": new Anime("Grave of Fireflies", "War, Drama", 10, "A tragic survival story of two siblings in Japan during the final months of WWII.")
};

// 4. FUNCTIONS

// SEARCH FUNCTIONALITY (Using variables and conditions)
function setupSearchBar() {
    const searchInput = document.querySelector('.nav-form input');
    const searchForm = document.querySelector('.nav-form');
    const cards = document.querySelectorAll('.card');

    if (searchForm) {
        searchForm.addEventListener('submit', (e) => e.preventDefault());
    }

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.querySelector('.card-content a').textContent.toLowerCase();
                if (title.includes(query)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            incrementInteractions();
            console.log(`Filtering: ${query} | Found: ${visibleCount}`);
        });
    }
}

// STUDIO OBJECTS & TABLE INTERACTIVITY
function Studio(name, works, style, rating) {
    this.name = name;
    this.works = works;
    this.style = style;
    this.rating = rating;

    // Method to show studio details
    this.alertProfile = function() {
        alert(`${this.name} Studio Profile\n\nStyle: ${this.style}\nFamous Works: ${this.works}\nAvg Rating: ${this.rating}/10`);
    };
}

const studioData = {
    "UFOTABLE": new Studio("Ufotable", "Demon Slayer", "Cinematic Action", 9.8),
    "MAPPA": new Studio("MAPPA", "Attack on Titan, Jujutsu Kaisen", "Dynamic Camera", 9.7),
    "STUDIO GHIBLI": new Studio("Studio Ghibli", "Spirited Away, My Neighbor Totoro", "Environmental Depth", 10.0)
};

function setupTableInteractivity() {
    const tableRows = document.querySelectorAll('table tbody tr');
    
    tableRows.forEach(row => {
        row.style.cursor = "pointer";
        row.addEventListener('click', () => {
            const firstCell = row.cells[0].textContent.trim().toUpperCase();
            
            // Interaction with Studio objects
            if (studioData[firstCell]) {
                studioData[firstCell].alertProfile();
            } else {
                // Default interaction for other tables (Anime/Genre)
                const name = row.cells[0].textContent;
                const detail = row.cells[1].textContent;
                alert(`Insight: ${name}\nDetails: ${detail}`);
            }
            incrementInteractions();
        });
    });
}

function greetUser() {
    const response = prompt("Welcome to your Dashboard! What is your name?", userName);
    if (response) {
        userName = response;
        const greetingSpan = document.querySelector('header span[style*="accent"]');
        if (greetingSpan) {
            greetingSpan.innerHTML = `Welcome back, <strong style="cursor:help" title="Click for Session Stats">${userName}</strong>!`;
            // Make greeting interactive
            greetingSpan.addEventListener('click', showSessionStats);
        }
    }
}

function incrementInteractions() {
    interactionCount++;
}

// Attach listeners to cards
function setupInteractivity() {
    const cards = document.querySelectorAll('.card');
    
    cards.forEach(card => {
        const titleLink = card.querySelector('.card-content a');
        if (titleLink) {
            const titleText = titleLink.textContent.trim().toUpperCase();
            const animeObj = trendingAnime[titleText];

            if (animeObj) {
                card.style.cursor = "pointer";
                card.addEventListener('click', (e) => {
                    if (e.target.tagName === 'AUDIO' || e.target.tagName === 'VIDEO' || e.target.tagName === 'SOURCE') return;
                    
                    incrementInteractions();
                    
                    if (e.shiftKey) {
                        animeObj.toggleBookmark();
                    } else {
                        animeObj.showInfo();
                    }
                });
                card.title = "Click for Details | Shift+Click to Bookmark";
            }
        }
    });
}

// Modal for stats
function showSessionStats() {
    // Pop-up box: alert
    alert(`[ Session Stats ]\n\nUser: ${userName}\nTotal Interactions: ${interactionCount}\nStatus: Active Explorer`);
}

// Start everything
window.onload = () => {
    greetUser();
    setupInteractivity();
    setupSearchBar();
    setupTableInteractivity();
    
    // Alt + S shortcut
    window.addEventListener('keydown', (e) => {
        if (e.key === 's' && e.altKey) {
            showSessionStats();
        }
    });
};

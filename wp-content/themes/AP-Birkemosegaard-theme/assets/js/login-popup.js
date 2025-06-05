// Hent profil-ikonet i headeren
var profileIcon = document.getElementById("profile-icon");

// Hent popup-elementet til login
var loginPopup = document.querySelector(".login-popup");

// Funktion til at vise eller skjule popup'en baseret på boolean
var toggleLoginPopup = (show) => {
    loginPopup.style.display = show ? "block" : "none";
};

// Når man klikker på profil-ikonet, toggles popup'en
profileIcon.addEventListener("click", () => {
    // Tjek om popup'en allerede er synlig
    var isVisible = loginPopup.style.display === "block";
    toggleLoginPopup(!isVisible); // Vis eller skjul afhængigt af nuværende tilstand
});

// Klik udenfor popup og ikon lukker popup'en
window.addEventListener("click", (e) => {
    // Hvis der klikkes udenfor popup'en og ikke på ikonet, skjules popup'en
    if (!loginPopup.contains(e.target) && e.target !== profileIcon) {
        toggleLoginPopup(false);
    }
});

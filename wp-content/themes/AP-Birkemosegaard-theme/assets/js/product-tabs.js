// Find elementet, der indeholder alle faneknapperne
var tabContainer = document.querySelector(".tabs");

// Lyt efter klik på faneknapperne
tabContainer.addEventListener("click", (e) => {
    // Tjek om det klikker element har klassen "tab-btn" (altså en fane-knap)
    if (e.target.classList.contains("tab-btn")) {
        // Hent hvilken fane der blev klikket på (via data-tab attributten)
        var selectedTab = e.target.dataset.tab;

        // Gennemgå alle faneknapper og tilføj/fjern klassen "active-tab"
        document.querySelectorAll(".tab-btn").forEach(btn =>
            // Gør kun den klikkede fane aktiv
            btn.classList.toggle("active-tab", btn.dataset.tab == selectedTab)
        );

        // Gennemgå alt tab-indhold og vis/skjul baseret på den valgte fane
        document.querySelectorAll(".tab-content").forEach(content =>
            // Vis kun det indhold der matcher den valgte fane
            content.classList.toggle("active-tab", content.dataset.content == selectedTab)
        );
    }
});
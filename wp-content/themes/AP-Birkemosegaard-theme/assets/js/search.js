// Live søgning: Når brugeren taster i søgefeltet
document.getElementById('live-search').addEventListener('keyup', function () {
  let searchQuery = this.value;

  // Stop hvis brugeren har skrevet mindre end 2 tegn
  if (searchQuery.length < 2) return;

  // Send forespørgsel til WordPress via AJAX (admin-ajax.php)
  fetch('/wp-admin/admin-ajax.php?action=live_search&query=' + encodeURIComponent(searchQuery))
    .then(response => response.json())
    .then(results => {
      let resultsDiv = document.getElementById('search-results');

      if (results.length) {
        // Vis søgeresultater som klikbare <div>'s
        resultsDiv.innerHTML = results
          .map(item => `<div onclick="window.location.href='${item.link}'">${item.title}</div>`)
          .join("");
      } else {
        // Ingen resultater fundet
        resultsDiv.innerHTML = `<div>Ingen produkter fundet.</div>`;
      }

      // Gør resultatcontainer synlig
      resultsDiv.classList.remove("hidden");
    });
});

// Reference til input og resultatboks
let searchInput = document.querySelector("#live-search");
let searchResults = document.querySelector("#search-results");

// Når inputfeltet får fokus, vis resultater igen hvis der er indhold
searchInput.addEventListener("focus", () => {
  if (searchResults.innerHTML.trim() !== "") {
    searchResults.classList.remove("hidden");
  }
});

// Når inputfeltet mister fokus, skjul resultater efter kort forsinkelse
// (så brugeren kan nå at klikke på et resultat)
searchInput.addEventListener("blur", () => {
  setTimeout(() => {
    searchResults.classList.add("hidden");
  }, 150);
});

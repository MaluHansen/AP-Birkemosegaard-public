document.getElementById('live-search').addEventListener('keyup', function () {
  let searchQuery = this.value;

  if (searchQuery.length < 2) return;

  fetch('/wp-admin/admin-ajax.php?action=live_search&query=' + encodeURIComponent(searchQuery))
    .then(response => response.json())
    .then(results => {
      let resultsDiv = document.getElementById('search-results');
      if (results.length) {
        resultsDiv.innerHTML = results
        .map(item => `<div onclick="window.location.href='${item.link}'">${item.title}</div>`)
        .join("")
      } else {
        resultsDiv.innerHTML = `<div>Ingen produkter fundet.</div>`
      }
      resultsDiv.classList.remove("hidden")
    });
});
let searchInput = document.querySelector("#live-search")
let searchResults = document.querySelector("#search-results")

searchInput.addEventListener("focus", () => {
  if (searchResults.innerHTML.trim() !== "") {
    searchResults.classList.remove("hidden")
  }
})

searchInput.addEventListener("blur", () => {
  // vent lidt, så klik på et resultat kan registreres
  setTimeout(() => {
    searchResults.classList.add("hidden")
  }, 150)
})

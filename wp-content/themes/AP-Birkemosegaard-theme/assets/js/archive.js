// Vent til hele DOM'en er indlæst, før koden køres
document.addEventListener('DOMContentLoaded', function () {
    // Hent relevante HTML-elementer, som vi skal manipulere med
    let filterToggleBtn = document.querySelector('#filter-toggle-btn'); // Knap til at åbne/lukke filtre
    let filtersEl = document.querySelector('.product-filters'); // Containeren med alle filterbokse
    let productsGridEl = document.querySelector('.product-grid'); // Produktgitteret på siden
    let btnText = document.querySelector('.btn-text'); // Element hvor tekst som "Vis filtre" vises
    let products = document.querySelector('.products'); // Hele produktsektionen (til ekstra styling)

    // Tilføj klik-event på filterknappen
    filterToggleBtn.addEventListener('click', function () {
        // Skift mellem at vise/skjule filtersektionen
        filtersEl.classList.toggle('show');

        // Skift visuel stil på knappen
        filterToggleBtn.classList.toggle('btn-outline');

        // Gør produktgitteret smallere hvis filtre vises
        productsGridEl.classList.toggle('product-grid-small');

        // Tilføj ekstra padding/margin når filtre vises
        products.classList.toggle('products-w-filters');

        // Opdater knaptekst alt efter om filtrene vises
        let isVisible = filtersEl.classList.contains('show');
        if (isVisible) {
            btnText.textContent = 'Skjul filtre';
        } else {
            btnText.textContent = 'Vis filtre';
        }
    });
});

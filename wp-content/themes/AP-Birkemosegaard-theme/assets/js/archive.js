document.addEventListener('DOMContentLoaded', function () {
    let filterToggleBtn = document.querySelector('#filter-toggle-btn');
    let filtersEl = document.querySelector('.product-filters');
    let productsGridEl = document.querySelector('.product-grid');
    let btnText = document.querySelector('.btn-text');

    filterToggleBtn.addEventListener('click', function () {
        filtersEl.classList.toggle('show');
        filterToggleBtn.classList.toggle('btn-outline');
        productsGridEl.classList.toggle('product-grid-small');
        let isVisible = filtersEl.classList.contains('show');

        if (isVisible) {
            
            btnText.textContent = 'Skjul filtre';
        } else {

            btnText.textContent = 'Vis filtre';
        }
    });
});

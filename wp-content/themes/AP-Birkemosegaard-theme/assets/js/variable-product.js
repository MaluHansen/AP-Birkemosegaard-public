document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".variation-button");
    const priceEl = document.querySelector(".vaegt-pris");
    const vaegtEl = document.querySelector(".selected-vaegt");
    const variationInput = document.querySelector(".variation_id");
    const vaegtInput = document.querySelector(".selected_vaegt_input");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            buttons.forEach(btn => btn.classList.remove("selected"));
            this.classList.add("selected");

            const pris = this.getAttribute("data-price");
            const vaegt = this.getAttribute("data-vaegt");
            const variationID = this.getAttribute("data-variation-id");

            if (priceEl) priceEl.innerHTML = pris;
            if (vaegtEl) vaegtEl.innerHTML = vaegt;

            if (variationInput) variationInput.value = variationID;
            if (vaegtInput) vaegtInput.value = vaegt;
        });
    });
});
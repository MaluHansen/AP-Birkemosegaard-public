
var cartIcon = document.getElementById("cart-icon");

var closeModalIcon = document.getElementById("cart-modal-close");

var cartModal = document.querySelector(".cart-modal");

var toggleModal = (show) => {
    cartModal.style.display = show ? "block" : "none";
};

cartIcon.addEventListener("click", () => toggleModal(true));
closeModalIcon.addEventListener("click", () => toggleModal(false));

window.addEventListener("click", (e) => {
    if (e.target === cartModal) {
        toggleModal(false);
    } 
});


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".quantity-wrapper").forEach(wrapper => {
        const display = wrapper.querySelector(".qty-display");
        const input = wrapper.querySelector("input[name='quantity']");

        wrapper.addEventListener("click", function (e) {
            if (!e.target.classList.contains("qty-btn")) return;

            let qty = parseInt(input.value);
            qty = isNaN(qty) ? 1 : qty;

            if (e.target.classList.contains("plus")) qty++;
            if (e.target.classList.contains("minus") && qty > 1) qty--;

            input.value = qty;
            display.textContent = qty;
        });
    });
});

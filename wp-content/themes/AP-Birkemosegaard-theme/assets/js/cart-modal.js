
var cartIcon = document.getElementById("cart-icon");

var closeModalIcon = document.getElementById("cart-modal-close");

var cartModal = document.querySelector(".cart-modal");

var toggleCartModal = (show) => {
    cartModal.style.display = show ? "block" : "none";
};

cartIcon.addEventListener("click", () => toggleCartModal(true));
closeModalIcon.addEventListener("click", () => toggleCartModal(false));

window.addEventListener("click", (e) => {
    if (e.target === cartModal) {
        toggleCartModal(false);
    } 
});


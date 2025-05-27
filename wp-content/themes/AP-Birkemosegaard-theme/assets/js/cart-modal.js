
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
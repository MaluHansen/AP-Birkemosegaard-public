
let cartIcon = document.querySelector("#cart-icon");

let closeModalIcon = document.querySelector("#cart-modal-close");

let cartModal = document.querySelector(".cart-modal");

let toggleCartModal = (show) => {
  cartModal.style.display = show ? "block" : "none";

  // Lås body scroll
  if (show) {
    document.body.classList.add("modal-open");
  } else {
    document.body.classList.remove("modal-open");
  }
};
cartIcon.addEventListener("click", () => toggleCartModal(true));
closeModalIcon.addEventListener("click", () => toggleCartModal(false));

window.addEventListener("click", (e) => {
    if (e.target === cartModal) {
        toggleCartModal(false);
    } 
});

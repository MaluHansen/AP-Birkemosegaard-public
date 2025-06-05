// Hent elementet der fungerer som ikon for kurven (øverst i header)
let cartIcon = document.querySelector("#cart-icon");

// Hent luk-ikonet inde i kurv-modalen
let closeModalIcon = document.querySelector("#cart-modal-close");

// Hent selve modalboksen som viser kurvens indhold
let cartModal = document.querySelector(".cart-modal");

// Funktion til at åbne/lukke kurvmodalen
// Parametret `show` styrer om modalen vises (true) eller skjules (false)
let toggleCartModal = (show) => {
  cartModal.style.display = show ? "block" : "none";

  // Lås scroll på selve siden, når modalen er åben
  if (show) {
    document.body.classList.add("modal-open");
  } else {
    document.body.classList.remove("modal-open");
  }
};

// Når brugeren klikker på kurvikonet, vis modalen
cartIcon.addEventListener("click", () => toggleCartModal(true));

// Når brugeren klikker på krydset (luk-ikon), skjul modalen
closeModalIcon.addEventListener("click", () => toggleCartModal(false));

// Hvis brugeren klikker udenfor modalens indhold (på overlay-baggrunden), lukkes modalen
window.addEventListener("click", (e) => {
    if (e.target === cartModal) {
        toggleCartModal(false);
    } 
});

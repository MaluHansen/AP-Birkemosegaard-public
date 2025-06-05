// Vent til hele dokumentet er indlæst
document.addEventListener("DOMContentLoaded", function () {
  // Find alle formularer med klassen "custom-cart-form"
  const forms = document.querySelectorAll(".custom-cart-form");

  forms.forEach((form) => {
    // Hent elementer inden for hver formular
    const qtyDisplay = form.querySelector(".qty-display"); // Viser valgt antal
    const inputQty = form.querySelector('input[name="quantity"]'); // Antals-inputfelt
    const addToCartBtn = form.querySelector(".custom-add-to-cart"); // Tilføj til kurv-knap
    const variationInput = form.querySelector(".variation_id"); // Skjult felt til variation ID
    const vaegtInput = form.querySelector(".selected_vaegt_input"); // Skjult felt til vægt
    const variationButtons = form.querySelectorAll(".variation-button"); // Knapper til at vælge variant

    // --- Justér antal produkter ---
    const btnMinus = form.querySelector(".qty-btn.minus");
    const btnPlus = form.querySelector(".qty-btn.plus");

    if (btnMinus && btnPlus && inputQty && qtyDisplay) {
      // Når der trykkes minus
      btnMinus.addEventListener("click", () => {
        let qty = parseInt(inputQty.value) || 1;
        if (qty > 1) {
          qty--;
          inputQty.value = qty;
          qtyDisplay.textContent = qty;
        }
      });

      // Når der trykkes plus
      btnPlus.addEventListener("click", () => {
        let qty = parseInt(inputQty.value) || 1;
        qty++;
        inputQty.value = qty;
        qtyDisplay.textContent = qty;
      });
    }

    // --- Håndtering af variant-valg ---
    variationButtons.forEach((button) => {
      button.addEventListener("click", function () {
        // Fjern "selected" fra alle knapper og tilføj til den valgte
        variationButtons.forEach((btn) => btn.classList.remove("selected"));
        this.classList.add("selected");

        // Hent pris, vægt og variation ID fra den valgte knap
        const pris = this.getAttribute("data-price");
        const vaegt = this.getAttribute("data-vaegt");
        const variationID = this.getAttribute("data-variation-id");

        // Opdater visningen af pris og vægt
        const priceEl = document.querySelector(".vaegt-pris");
        const vaegtEl = document.querySelector(".selected-vaegt");

        if (priceEl) priceEl.innerHTML = pris;
        if (vaegtEl) vaegtEl.innerHTML = vaegt;

        // Opdater skjulte inputfelter
        if (variationInput) variationInput.value = variationID;
        if (vaegtInput) vaegtInput.value = vaegt;
      });
    });

    // --- Tilføj til kurv funktionalitet ---
    if (addToCartBtn) {
      addToCartBtn.addEventListener("click", function (e) {
        e.preventDefault(); // Forhindre formularens standard-opførsel

        // Hent data
        const productId = this.getAttribute("data-product-id");
        const quantity = inputQty ? inputQty.value : 1;
        const variationID = variationInput ? variationInput.value : null;
        const variationKey = vaegtInput ? "pa_vaegt" : null;
        const vaegt = vaegtInput ? vaegtInput.value : null;

        // Byg URL til WooCommerce add-to-cart
        let url = `/?add-to-cart=${productId}&quantity=${quantity}`;
        if (variationID && vaegt) {
          url += `&variation_id=${variationID}&variation[${variationKey}]=${encodeURIComponent(vaegt)}`;
        }

        // Send GET-request og opdater kurv-fragment
        fetch(url, {
          method: "GET",
          credentials: "same-origin",
        }).then(() => {
          document.body.dispatchEvent(new Event("wc_fragment_refresh"));
        });
      });
    }
  });

  // --- "Tilføj til kurv"-knapper uden formular (f.eks. på arkiv-side) ---
  document.querySelectorAll(".custom-add-to-cart:not(form *)").forEach((button) => {
    button.addEventListener("click", function (e) {
      e.preventDefault();
      const productId = this.getAttribute("data-product-id");

      fetch(`/?add-to-cart=${productId}`, {
        method: "GET",
        credentials: "same-origin",
      }).then(() => {
        document.body.dispatchEvent(new Event("wc_fragment_refresh"));
      });
    });
  });
});

// --- Swiper initialisering når siden er indlæst ---
document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.product-swiper', {
    slidesPerView: 4, // Viser 4 slides som standard
    spaceBetween: 20, // Afstand mellem slides
    loop: true, // Looper slides
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    breakpoints: {
      // Responsiv visning af antal slides
      0: {
        slidesPerView: 1
      },
      400: {
        slidesPerView: 1.5
      },
      640: {
        slidesPerView: 2
      },
      1024: {
        slidesPerView: 4
      }
    }
  });
});

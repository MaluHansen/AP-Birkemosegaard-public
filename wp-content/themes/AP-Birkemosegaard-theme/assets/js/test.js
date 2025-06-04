document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll(".custom-cart-form");

  forms.forEach((form) => {
    const qtyDisplay = form.querySelector(".qty-display");
    const inputQty = form.querySelector('input[name="quantity"]');
    const addToCartBtn = form.querySelector(".custom-add-to-cart");
    const variationInput = form.querySelector(".variation_id");
    const vaegtInput = form.querySelector(".selected_vaegt_input");
    const variationButtons = form.querySelectorAll(".variation-button");

    // --- Quantity justering ---
    const btnMinus = form.querySelector(".qty-btn.minus");
    const btnPlus = form.querySelector(".qty-btn.plus");

    if (btnMinus && btnPlus && inputQty && qtyDisplay) {
      btnMinus.addEventListener("click", () => {
        let qty = parseInt(inputQty.value) || 1;
        if (qty > 1) {
          qty--;
          inputQty.value = qty;
          qtyDisplay.textContent = qty;
        }
      });

      btnPlus.addEventListener("click", () => {
        let qty = parseInt(inputQty.value) || 1;
        qty++;
        inputQty.value = qty;
        qtyDisplay.textContent = qty;
      });
    }

    // --- Variant-knapper ---
    variationButtons.forEach((button) => {
      button.addEventListener("click", function () {
        variationButtons.forEach((btn) => btn.classList.remove("selected"));
        this.classList.add("selected");

        const pris = this.getAttribute("data-price");
        const vaegt = this.getAttribute("data-vaegt");
        const variationID = this.getAttribute("data-variation-id");

        const priceEl = document.querySelector(".vaegt-pris");
        const vaegtEl = document.querySelector(".selected-vaegt");

        if (priceEl) priceEl.innerHTML = pris;
        if (vaegtEl) vaegtEl.innerHTML = vaegt;

        if (variationInput) variationInput.value = variationID;
        if (vaegtInput) vaegtInput.value = vaegt;
      });
    });

    // --- Add to cart ---
    if (addToCartBtn) {
      addToCartBtn.addEventListener("click", function (e) {
        e.preventDefault();

        const productId = this.getAttribute("data-product-id");
        const quantity = inputQty ? inputQty.value : 1;
        const variationID = variationInput ? variationInput.value : null;
        const variationKey = vaegtInput ? "pa_vaegt" : null;
        const vaegt = vaegtInput ? vaegtInput.value : null;

        // Hvis det er en variable form og ingen variant er valgt
        if (variationInput && variationID === "") {
          variationButtons.forEach((btn) => btn.classList.add("shake"));
          setTimeout(() => {
            variationButtons.forEach((btn) => btn.classList.remove("shake"));
          }, 500);
          return;
        }

        // Byg URL
        let url = `/?add-to-cart=${productId}&quantity=${quantity}`;
        if (variationID && vaegt) {
          url += `&variation_id=${variationID}&variation[${variationKey}]=${encodeURIComponent(vaegt)}`;
        }

        fetch(url, {
          method: "GET",
          credentials: "same-origin",
        }).then(() => {
          document.body.dispatchEvent(new Event("wc_fragment_refresh"));
        });
      });
    }
  });

  // --- Arkiv knapper uden form (fx ikke single) ---
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


document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.product-swiper', {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    breakpoints: {
        // Mobilvenlig opsætning
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

window.onscroll = function () {
  const btn = document.getElementById("toTopBtn");
  if (window.scrollY > 200) {
    btn.classList.add("visible");
  } else {
    btn.classList.remove("visible");
  }
};

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}




document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.test');

  if (container && typeof themeData !== 'undefined') {
    const img = document.createElement('img');
    img.src = themeData.imgUrl + 'catering.jpg';
    img.alt = 'Catering billede';
    container.appendChild(img);
  } else {
    console.log('Fejl: div.test findes ikke eller themeData er ikke defineret.');
  }
});
document.addEventListener('DOMContentLoaded', function () {
  // --- Arkiv-knapper ---
  document.querySelectorAll('.custom-add-to-cart').forEach(function (button) {
    button.addEventListener('click', function () {
      const productId = this.getAttribute('data-product-id');

      fetch(`/?add-to-cart=${productId}`, {
        method: 'GET',
        credentials: 'same-origin'
      }).then(() => {
        document.body.dispatchEvent(new Event('wc_fragment_refresh'));
        // TODO: Vis evt. brugerfeedback her
      });
    });
  });

  // --- Single product med quantity ---
  const form = document.querySelector('.custom-cart-form');
  if (form) {
    const qtyDisplay = form.querySelector('.qty-display');
    const inputQty = form.querySelector('input[name="quantity"]');
    const addToCartBtn = form.querySelector('.custom-single-add-to-cart');

    // Quantity justering
    form.querySelector('.qty-btn.minus').addEventListener('click', () => {
      let qty = parseInt(inputQty.value);
      if (qty > 1) {
        qty--;
        inputQty.value = qty;
        qtyDisplay.textContent = qty;
      }
    });

    form.querySelector('.qty-btn.plus').addEventListener('click', () => {
      let qty = parseInt(inputQty.value);
      qty++;
      inputQty.value = qty;
      qtyDisplay.textContent = qty;
    });

    // Tilføj til kurv med qty
    addToCartBtn.addEventListener('click', () => {
      const productId = form.getAttribute('data-product-id');
      const qty = inputQty.value;

      fetch(`/?add-to-cart=${productId}&quantity=${qty}`, {
        method: 'GET',
        credentials: 'same-origin'
      }).then(() => {
        document.body.dispatchEvent(new Event('wc_fragment_refresh'));
        // TODO: Feedback til bruger
      });
    });
  }
});

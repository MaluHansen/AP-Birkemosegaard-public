document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".variation-button");
  const priceEl = document.querySelector(".vaegt-pris");
  const vaegtEl = document.querySelector(".selected-vaegt");
  const variationInput = document.querySelector(".variation_id");
  const vaegtInput = document.querySelector(".selected_vaegt_input");
  const addToCartBtn = document.querySelector('.custom-add-to-cart');
  const errorMsg = document.querySelector('.variant-error-message');

  buttons.forEach(button => {
    button.addEventListener("click", function () {
        buttons.forEach(btn => btn.classList.remove("selected"));
        this.classList.add("selected");

        priceEl.innerHTML = this.getAttribute("data-price");
        vaegtEl.innerHTML = this.getAttribute("data-vaegt");
        variationInput.value = this.getAttribute("data-variation-id");
        vaegtInput.value = this.getAttribute("data-vaegt");
    });
  });


  if (addToCartBtn) {
    addToCartBtn.addEventListener('click', function (e) {
      if (!variationInput || variationInput.value === '') {
        e.preventDefault();

        buttons.forEach(button => button.classList.add('shake'));
        setTimeout(() => {
          buttons.forEach(button => button.classList.remove('shake'));
        }, 500);

        errorMsg.classList.add('error-message-show')
        setTimeout(() => {
          errorMsg.classList.remove('error-message-show')
        }, 2000);
      }
    });
  }
  
});

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

  let form = document.querySelector('.custom-cart-form')
  // Hvis det er et variabelt produkt, og ingen variation er valgt
  if (variationInput && variationInput.value === '' && form.classList.contains('variable')) {

    
    // Tilføj shake for at vise, at en variation skal vælges
    buttons.forEach(button => {
        button.classList.add('shake'); 
    });

    // Fjern shake efter 500ms
    setTimeout(() => {
        buttons.forEach(button => {
            button.classList.remove('shake'); 
        });
    }, 500); 

    return;
  }
  
});


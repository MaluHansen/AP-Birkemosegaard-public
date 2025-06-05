// Gennemgår alle knapper med klassen .custom-add-to-cart
document.querySelectorAll('.custom-add-to-cart').forEach(button => {
  button.addEventListener('click', () => {

    // Find det nærmeste overordnede .card-element (det produktkort knappen tilhører)
    const card = button.closest('.card');

    // Find billedet i kortet – bruges som udgangspunkt for animationen
    const img = card.querySelector('.card-img');

    // Find kurv-ikonet øverst på siden – destination for animationen
    const cart = document.querySelector('.cart');

    // Hent placering og størrelse af billedet og kurvikonet i forhold til viewporten
    const imgRect = img.getBoundingClientRect();
    const cartRect = cart.getBoundingClientRect();

    // Klon billedet så det ikke påvirker det oprindelige billede
    const flyingImg = img.cloneNode(true);
    flyingImg.classList.add('fly-img');

    // Opsæt startposition, størrelse og z-index for det flyvende billede
    flyingImg.style.position = 'fixed';
    flyingImg.style.zIndex = '9999';
    flyingImg.style.width = `${imgRect.width}px`;
    flyingImg.style.height = `${imgRect.height}px`;
    flyingImg.style.left = `${imgRect.left}px`;
    flyingImg.style.top = `${imgRect.top}px`;
    flyingImg.style.transition = 'all 0.8s ease-in-out';

    // Tilføj det klonede billede til DOM'en
    document.body.appendChild(flyingImg);

    // Næste frame: Flyt billedet hen mod kurven, og lav det mindre og gennemsigtigt
    requestAnimationFrame(() => {
      flyingImg.style.left = `${cartRect.left + 5}px`;   // Målret mod kurvens position
      flyingImg.style.top = `${cartRect.top + 5}px`;
      flyingImg.style.width = '20px';
      flyingImg.style.height = '20px';
      flyingImg.style.opacity = '0.3';
      flyingImg.style.borderRadius = '50%'; // Giver et rundt udtryk som ikon
    });

    // Når animationen er færdig (transition ender), fjern det flyvende billede
    flyingImg.addEventListener('transitionend', () => {
      flyingImg.remove();
    });
  });
});

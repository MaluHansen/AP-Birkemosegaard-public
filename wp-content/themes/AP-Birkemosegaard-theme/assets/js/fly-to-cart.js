document.querySelectorAll('.custom-add-to-cart').forEach(button => {
  button.addEventListener('click', () => {

    const card = button.closest('.card'); // Find kortet der hører til knappen
    const img = card.querySelector('.card-img'); // Find billedet i det kort

    const cart = document.querySelector('.cart');

    const imgRect = img.getBoundingClientRect();
    const cartRect = cart.getBoundingClientRect();

    const flyingImg = img.cloneNode(true);
    flyingImg.classList.add('fly-img');

    flyingImg.style.position = 'fixed';
    flyingImg.style.zIndex = '9999';
    flyingImg.style.width = `${imgRect.width}px`;
    flyingImg.style.height = `${imgRect.height}px`;
    flyingImg.style.left = `${imgRect.left}px`;
    flyingImg.style.top = `${imgRect.top}px`;
    flyingImg.style.transition = 'all 0.8s ease-in-out';

    document.body.appendChild(flyingImg);

    requestAnimationFrame(() => {
      flyingImg.style.left = `${cartRect.left + 5}px`;
      flyingImg.style.top = `${cartRect.top + 5}px`;
      flyingImg.style.width = '20px';
      flyingImg.style.height = '20px';
      flyingImg.style.opacity = '0.3';
      flyingImg.style.borderRadius = '50%';
    });

    flyingImg.addEventListener('transitionend', () => {
      flyingImg.remove();
    });
  });
});

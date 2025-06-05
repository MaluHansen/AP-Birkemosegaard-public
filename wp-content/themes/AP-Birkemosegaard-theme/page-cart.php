<?php get_header(); ?>
<main>
<section class="progress-breadcrumb" data-step="1">
  <div class="step">
    <span class="label">Kurv</span>
    <span class="bar"></span>
  </div>
  <div class="step">
    <span class="label">Levering</span>
    <span class="bar"></span>
  </div>
  <div class="step">
    <span class="label">Betal</span>
    <span class="bar"></span>
  </div>
  <div class="step">
    <span class="label">Bekræft</span>
    <span class="bar"></span>
  </div>
</section>
<div class="cart-wrapper"> 
    <section class="cart-items">
    <div class="cart-header">
      <span>PRODUKT</span>
      <span>PRIS</span>
      <span>ANTAL</span>
      <span>SUBTOTAL</span>
    </div>

    <div class="cart-item">
      <div class="product-info">
        <img src="assets/img/agurk.jpg" alt="agurk">
        <span class="product-title">Agurk</span>
      </div>
      <span class="product-price">38,00DKK</span>
      <div class="product-qty">
        <button>-</button>
        <span>1</span>
        <button>+</button>
      </div>
      <span class="product-subtotal">38,00DKK</span>
    </div>

    <div class="cart-item">
      <div class="product-info">
        <img src="assets/img/agurk.jpg" alt="agruk">
        <span class="product-title">Agurk</span>
      </div>
      <span class="product-price">40,00DKK</span>
      <div class="product-qty">
        <button>-</button>
        <span>1</span>
        <button>+</button>
      </div>
      <span class="product-subtotal">40,00DKK</span>
    </div>
     <div class="cart-item">
      <div class="product-info">
        <img src="assets/img/agurk.jpg" alt="agurk">
        <span class="product-title">Agurk</span>
      </div>
      <span class="product-price">40,00DKK</span>
      <div class="product-qty">
        <button>-</button>
        <span>1</span>
        <button>+</button>
      </div>
      <span class="product-subtotal">40,00DKK</span>
    </div>
    
  </section>

  <aside class="cart-summary">
    <h2>Total</h2>
    <div class="summary-line">
      <span>Subtotal</span>
      <span>78,00DKK</span>
    </div>
    <div class="summary-line">
      <span>Moms</span>
      <span>15,60DKK</span>
    </div>
    <div class="summary-total">
      <strong>Ordretotal</strong>
      <strong>78,00DKK</strong>
    </div>
    <div class="input-with-button">
    <input type="text" placeholder="Rabatkode">
    <button class="btn-filled">Anvend</button>
  </div>

  <div class="btn-filled-kurv"> 
 <a href="./checkout_levering.html" class="btn-filled">Gå til Levering <span class="material-symbols-rounded">
chevron_right
</span></a>
  </div>
  </aside>
</div>
</main>
<?php get_footer(); ?>

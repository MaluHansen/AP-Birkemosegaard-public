<?php get_header(); ?>
<main>
  <section class="progress-breadcrumb" data-step="2">
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

<section class="checkout-wrapper">
  <div class="checkout-left">
    <h2>Leveringsoplysninger</h2>
    <form class="delivery-form">
      <label for="name">Fulde navn</label>
      <input type="text" id="name" name="name" placeholder="Navn" required>

      <label for="address">Adresse</label>
      <input type="text" id="address" name="address" placeholder="Adresse" required>

      <label for="postal">Postnummer</label>
      <input type="text" id="postal" name="postal" placeholder="Postnummer" required>

      <label for="city">By</label>
      <input type="text" id="city" name="city" placeholder="By" required>

      <label for="phone">Telefonnummer</label>
      <input type="tel" id="phone" name="phone" placeholder="Telefonnummer" required>

      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" placeholder="Email" required>

      <label for="note">Bemærkning til levering</label>
      <textarea id="note" name="note" rows="3" placeholder="F.eks. stil kassen ved hoveddøren."></textarea>
    </form>
  </div>

  <div class="checkout-right">
    <h3>Din ordre</h3>
   <ul class="order-summary">
  <li class="order-item">
    <img src="/assets/img/agurk.jpg" alt="Agurk">
    <div class="order-info">
      <p>Agurk × 3</p>
      <span>118,00 DKK</span>
    </div>
  </li>
</ul>
    <div class="summary-totals">
      <p>Subtotal <span>118,00 DKK</span></p>
      <p>Moms <span>23,60 DKK</span></p>
      <p class="grand-total"><strong> Total</strong><span><strong>141,6 DKK</strong></span></p>
    </div>
   <div class="button-row">
      <a href="./checkout_betaling.html" class="btn-filled">Gå til betaling <span class="material-symbols-rounded">
chevron_right
</span> </a>
  <a href="./kurv.html" class="btn-filled secondary">← Tilbage</a>
  
</div>
  </div>
</section>
</main>
<?php get_footer(); ?>
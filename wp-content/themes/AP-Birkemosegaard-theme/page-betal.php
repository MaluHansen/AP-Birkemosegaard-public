<?php get_header(); ?>
<section class="progress-breadcrumb" data-step="3">
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
    <h2>Betalingsoplysninger</h2>
    <form class="payment-form">
      <label for="card-name">Navn på kort</label>
      <input type="text" id="card-name" name="card-name" placeholder="F.eks. Anna Jensen" required>

      <label for="card-number">Kortnummer</label>
      <input type="text" id="card-number" name="card-number" placeholder="1234 5678 9012 3456" required>

      <label for="expiry">Udløbsdato</label>
      <input type="text" id="expiry" name="expiry" placeholder="MM/ÅÅ" required>

      <label for="cvv">CVV</label>
      <input type="text" id="cvv" name="cvv" placeholder="123" required>
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
        <a href="./checkout_tak.html" class="btn-filled">Gå til bekræftelse →</a>
      <a href="./checkout_levering.html" class="btn-filled secondary">← Tilbage</a>
      
    </div>
  </div>
</section>
<?php get_footer(); ?>
<?php get_header(); ?>
<main>
  <section class="contact-section-kontaktside">
    <div class="contact-form-kontaktside">
      <h2> Skriv til os</h2>
      <form id="kontaktForm-kontaktside">

        <div class="form-field">
          <input type="text" id="navn" name="navn" placeholder=" " required />
          <label for="navn">Navn *</label>
        </div>

        <div class="form-field">
          <input type="email" id="email" name="email" placeholder=" " required />
          <label for="email">E-mail *</label>
        </div>

        <div class="form-field">
          <input type="tel" id="telefon" name="telefon" placeholder=" " />
          <label for="telefon">Telefonnummer</label>
        </div>

        <div class="form-field">
          <textarea id="besked" name="besked" placeholder=" " required></textarea>
          <label for="besked">Skriv en besked *</label>
        </div>

        <button type="submit" class="btn-filled">Send</button>
      </form>
    </div>

    <div class="contact-details-kontaktside">
      <h2>Kontaktoplysninger</h2>

      <div class="kontakt-item-kontaktside">
        <div class="ikon-wrapper-kontaktside">
          <svg xmlns="http://www.w3.org/2000/svg" class="ikon-kontaktside" viewBox="0 0 24 24" fill="white">
            <path d="M6.62 10.79a15.054 15.054 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.21 11.72 11.72 0 003.6.57 1 1 0 011 1v3.42a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.43a1 1 0 011 1 11.72 11.72 0 00.57 3.6 1 1 0 01-.21 1.11l-2.17 2.18z" />
          </svg>
        </div>
        <div class="kontakt-tekst-kontaktside">
          <strong>Telefon:</strong><br>
          59 32 72 41<br>
          26 23 82 33
        </div>
      </div>

      <div class="kontakt-item-kontaktside">
        <div class="ikon-wrapper-kontaktside">
          <svg xmlns="http://www.w3.org/2000/svg" class="ikon-kontaktside" viewBox="0 0 24 24" fill="white">
            <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 18V8.99l8 6 8-6V18H4z" />
          </svg>
        </div>
        <div class="kontakt-tekst-kontaktside">
          <strong>Email:</strong><br>
          <a href="mailto:info@birkemosegaard.dk">info@birkemosegaard.dk</a>
        </div>
      </div>

      <div class="kontakt-item-kontaktside">
        <div class="ikon-wrapper-kontaktside">
          <svg xmlns="http://www.w3.org/2000/svg" class="ikon-kontaktside" viewBox="0 0 24 24" fill="white">
            <path d="M20 4H4a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V6a2 2 0 00-2-2zm0 2v.01L12 13 4 6.01V6h16zM4 18V8.99l8 6 8-6V18H4z" />
          </svg>
        </div>
        <div class="kontakt-tekst-kontaktside">
          <strong>Tekniske spørgsmål:</strong><br>
          <a href="mailto:support@birkemosegaard.dk">support@birkemosegaard.dk</a>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
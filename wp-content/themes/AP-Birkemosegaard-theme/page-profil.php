<?php get_header(); ?>
<main class="profilIndhold">
    <aside class="menu">
        <h1>Hans Hansen</h1>
        <nav>
          <ul>
            <li class="link active" data-tab="mine-oplysninger">
              <i class="fa-regular fa-user"></i> Mine oplysninger
            </li>
            <li class="link" data-tab="mine-favoritter">
              <i class="fa-regular fa-heart"></i> Mine favoritter
            </li>
            <li class="link" data-tab="ordrer">
              <i class="fa-regular fa-clipboard"></i> Ordrer
            </li>
            <li class="link" data-tab="indstillinger">
              <i class="fa-solid fa-gear"></i> Indstillinger
            </li>
            <li class="logout">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
              <span>Log ud</span>
            </li>
          </ul>
        </nav>
      </aside>
      <section class="profil-section-content">
        <div class="content active" id="mine-oplysninger">
          <h2>Mine oplysninger</h2>
          <form class="user-info-form">
            <div class="form-row">
              <div class="form-group">
                <label for="fornavn1">Fornavn</label>
                <input type="text" id="fornavn1" name="fornavn1" />
              </div>
              <div class="form-group">
                <label for="efternavn">Efternavn</label>
                <input type="text" id="efternavn" name="efternavn" />
              </div>
            </div>
          </form>
          <section class="saved-address">
            <h3>Gemte adresser</h3>
            <p>Hans Hansen<br />Gadevej 12<br />9000 Aalborg</p>
            <div class="primary-address">
              <input type="checkbox" id="primary" checked />
              <label for="primary">Dette er min primære adresse</label>
            </div>
            <button class="btn-filled">Rediger</button>
            <button class="btn-outline">
              <i class="fa-solid fa-plus"></i>Tilføj adresse
            </button>
          </section>
          <section class="saved-card">
            <h3>Gemte betalingskort</h3>
            <p>Du har ingen gemte betalingskort</p>
            <button class="btn-outline">
              <i class="fa-solid fa-plus"></i>Tilføj betalingskort
            </button>
          </section>
        </div>

        <div class="content" id="mine-favoritter" hidden>
          <h2>Mine favoritter</h2>
          <div class="produktGrid-container">
            <div class="produktCard-favoritter">
              <div class="image-wrapper-favoritter">
                <a href="#" class="zoom-billede">
                  <img
                    src="/assets/img/agurk.jpg"
                    alt="Havremel - glutenfri"
                    class="produkt-billede-favoritter"
                  />
                </a>
                <button class="wishlist active">
                  <img
                    src="./assets/icons/Roodhjerte.png"
                    alt="Fjern fra favoritter"
                  />
                </button>
              </div>
              <h3>Havremel - glutenfri</h3>
              <p class="vaegt">800 g</p>
              <div class="ikoner">
                <img src="/assets/img/demeter.png" alt="Demeter" />
                <img src="/assets/img/organic_eu.png" alt="Økologisk" />
                <img
                  src="/assets/img/okologi.png"
                  alt="Statskontrolleret økologi"
                />
              </div>
              <p class="pris">52,50 kr.</p>
              <div class="center-btn-favoritter">
                <button class="btn-filled-favoritter">Tilføj til kurv</button>
              </div>
            </div>
            <div class="produktCard-favoritter">
              <div class="image-wrapper-favoritter">
                <a href="#" class="zoom-billede">
                  <img
                    src="/assets/img/agurk.jpg"
                    alt="Havremel - glutenfri"
                    class="produkt-billede-favoritter"
                  />
                </a>
                <button class="wishlist active">
                  <img
                    src="./assets/icons/Roodhjerte.png"
                    alt="Fjern fra favoritter"
                  />
                </button>
              </div>
              <h3>Havremel - glutenfri</h3>
              <p class="vaegt">800 g</p>
              <div class="ikoner">
                <img src="/assets/img/demeter.png" alt="Demeter" />
                <img src="/assets/img/organic_eu.png" alt="Økologisk" />
                <img
                  src="/assets/img/okologi.png"
                  alt="Statskontrolleret økologi"
                />
              </div>
              <p class="pris">52,50 kr.</p>
              <div class="center-btn-favoritter">
                <button class="btn-filled-favoritter">Tilføj til kurv</button>
              </div>
            </div>
            <div class="produktCard-favoritter">
              <div class="image-wrapper-favoritter">
                <a href="#" class="zoom-billede">
                  <img
                    src="/assets/img/agurk.jpg"
                    alt="Havremel - glutenfri"
                    class="produkt-billede-favoritter"
                  />
                </a>
                <button class="wishlist active">
                  <img
                    src="./assets/icons/Roodhjerte.png"
                    alt="Fjern fra favoritter"
                  />
                </button>
              </div>
              <h3>Havremel - glutenfri</h3>
              <p class="vaegt">800 g</p>
              <div class="ikoner">
                <img src="/assets/img/demeter.png" alt="Demeter" />
                <img src="/assets/img/organic_eu.png" alt="Økologisk" />
                <img
                  src="/assets/img/okologi.png"
                  alt="Statskontrolleret økologi"
                />
              </div>
              <p class="pris">52,50 kr.</p>
              <div class="center-btn-favoritter">
                <button class="btn-filled-favoritter">Tilføj til kurv</button>
              </div>
            </div>
            <div class="produktCard-favoritter">
              <div class="image-wrapper-favoritter">
                <a href="#" class="zoom-billede">
                  <img
                    src="/assets/img/agurk.jpg"
                    alt="Havremel - glutenfri"
                    class="produkt-billede-favoritter"
                  />
                </a>
                <button class="wishlist active">
                  <img
                    src="./assets/icons/Roodhjerte.png"
                    alt="Fjern fra favoritter"
                  />
                </button>
              </div>
              <h3>Havremel - glutenfri</h3>
              <p class="vaegt">800 g</p>
              <div class="ikoner">
                <img src="/assets/img/demeter.png" alt="Demeter" />
                <img src="/assets/img/organic_eu.png" alt="Økologisk" />
                <img
                  src="/assets/img/okologi.png"
                  alt="Statskontrolleret økologi"
                />
              </div>
              <p class="pris">52,50 kr.</p>
              <div class="center-btn-favoritter">
                <button class="btn-filled-favoritter">Tilføj til kurv</button>
              </div>
            </div>
            <div class="produktCard-favoritter">
              <div class="image-wrapper-favoritter">
                <a href="#" class="zoom-billede">
                  <img
                    src="/assets/img/agurk.jpg"
                    alt="Havremel - glutenfri"
                    class="produkt-billede-favoritter"
                  />
                </a>
                <button class="wishlist active">
                  <img
                    src="./assets/icons/Roodhjerte.png"
                    alt="Fjern fra favoritter"
                  />
                </button>
              </div>
              <h3>Havremel - glutenfri</h3>
              <p class="vaegt">800 g</p>
              <div class="ikoner">
                <img src="/assets/img/demeter.png" alt="Demeter" />
                <img src="/assets/img/organic_eu.png" alt="Økologisk" />
                <img
                  src="/assets/img/okologi.png"
                  alt="Statskontrolleret økologi"
                />
              </div>
              <p class="pris">52,50 kr.</p>
              <div class="center-btn-favoritter">
                <button class="btn-filled-favoritter">Tilføj til kurv</button>
              </div>
            </div>
          </div>
        </div>

        <div class="content" id="ordrer" hidden>
          <h2>Ordrer</h2>

          <div class="orders-tabs">
            <button class="tab-btn active">Alle (1)</button>
            <button class="tab-btn">Igang (0)</button>
            <button class="tab-btn">Afsluttet (1)</button>
          </div>

          <table class="orders-table">
            <thead>
              <tr>
                <th>Ordre nummer</th>
                <th>Dato</th>
                <th>I alt</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tr>
              <td class="order-info">
                <img
                  src="/assets/img/agurk.jpg"
                  alt="Ordre billede"
                  class="order-thumbnail"
                />
                <div class="order-text">
                  <div class="order-id">#12345678</div>
                  <div class="order-products">4 produkter</div>
                  <div class="order-link">Se detaljer &gt;</div>
                </div>
              </td>
              <td>12-12-24</td>
              <td>40,00 kr.</td>
              <td class="order-status">leveret</td>
            </tr>
          </table>
        </div>

        <div class="content" id="indstillinger" hidden>
          <h2>Indstillinger</h2>

          <section class="settings-section">
            <h3>Adgangskode</h3>
            <label for="current-password">Nuværende adgangskode</label>
            <input
              type="password"
              id="current-password"
              class="settings-input"
              value="********************"
              readonly
            />
            <br />
            <button class="btn-filled btn-icon">
              <i class="fa-solid fa-pen"></i>
              Ændre adgangskode
            </button>
          </section>
          <section class="settings-section">
            <h3>Slet profil</h3>
            <p>Handlingen kan ikke fortrydes</p>
            <button class="btn-delete">Slet profil</button>
          </section>
        </div>
      </section>
</main>
<?php get_footer(); ?>
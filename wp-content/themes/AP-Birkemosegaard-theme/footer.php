<footer>
    <div class="footer-columns-container">
        <div class="footer-column">
            <div class="logo">
                <a href="<?php echo esc_url(site_url());?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/Birkemosegaard-logo.svg" alt="Birkemosegaard logo"></a>
            </div>
            <div>
                <span class="material-symbols-rounded footer-icon">location_on</span>
                <p>Oddenvej 165,  4583 Sjællands Odde</p>
            </div>

            <div>
                <span class="material-symbols-rounded footer-icon">call</span>
                <p>
                Generel info: <a href="tel:+4559327241"> 59 32 72 41</a> / <a href="tel:+4526238233">26 23 82 33</a>
                <br>
                Produktion - Drift og Landbrug: <a href="tel:+4520458233">20 45 82 33</a>
                </p>
                
            </div>

            <div>
                <span class="material-symbols-rounded footer-icon">mail</span>
                <p><a href="mailto:info@birkemosegaard.dk">info@birkemosegaard.dk</a></p>
            </div>
            
            <p><b>CVR:</b> DK71299457</p>
        </div>
        
        <div class="footer-column">
            <h4>Information</h4>
            <ul class="footer-nav">
                <li><a href="#">Om Birkemosegaard</a></li>
                <li><a href="#">Kontakt</a></li>
                <li><a href="#">For erhvervskunder</a></li>
                <li><a href="#">Afhentning & Levering</a></li>
                <li><a href="#">Handelsbetingelser</a></li>
                <li><a href="#">Privatlivspolitik</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Nyhedsbrev</h4>
            
            <form class="news-form-footer" action="#">
                <p>Tilmeld dig vores nyhedsbrev og gå aldrig glip af nyheder om gården, vores produkter og ugens torsdagskasse</p>
                <!-- <div class="form-field">
                    <input type="text" id="email" placeholder=" " required>
                    <label for="email">E-mail</label>
                </div> -->

                <p><b>Jeg vil have nyheder om:</b></p>
                <label class="checkbox-custom">
                    <input type="checkbox">
                    <span class="material-symbols-rounded checkbox-icon"></span>
                    Torsdagskassen
                </label>
                <label class="checkbox-custom">
                    <input type="checkbox">
                    <span class="material-symbols-rounded checkbox-icon"></span>
                    Nyheder og levering
                </label>
                <label class="checkbox-custom">
                    <input type="checkbox">
                    <span class="material-symbols-rounded checkbox-icon"></span>
                    Kun for erhvervskunder
                </label>
                <button class="btn-filled" type="submit">Tilmeld nyhedsbrev</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="footer-bottom">
        <div class="socials">
            <img src="./assets/icons/icons8-facebook (1).svg" alt="">
            <img src="./assets/icons/icons8-instagram (1).svg" alt="">
        </div>
        <p class="copyright">&copy; 2025 Birkemosegaard</p>
        <img class="payment-icons" src="<?php echo get_template_directory_uri(); ?>/assets/img/betalingsmetoder.png" alt="">
    </div>

</footer>
<div id="variant-modal" class="variant-modal hidden">
    <div class="variant-modal-inner">
        <button class="close-variant-modal">×</button>
        <div class="variant-modal-content">
            <p>Indlæser...</p>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
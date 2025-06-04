<?php get_header(); ?>

<main>
<section class="heroForside">
  <div class="heroBackground" style="background-image: url(<?php echo get_theme_file_uri('/assets/img/Gårdbutik-udefra.jpg') ?>);"></div>
  <div class="heroContent">
    <h1 class="heroH1">Velkommen til Birkemosegaard</h1>
    <br>
    <p>Økologi, fællesskab og kærlighed til naturen -<br> fra jord til bord</p>
    <a href="<?php echo esc_url(site_url('/shop'));?>" class="btn-filled">Udforsk vores produkter</a>
  </div>
</section>
<?php get_template_part('template-parts/to-top-btn'); ?>
<section class="omgaardenForside">
  <div class="omgaardenImg">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Ejere-mark.jpg" alt="Kung og Jesper i marken">
  </div>
  <div class="omgaardenContent">
    <h2>Hvem er vi?</h2>
    <p>
      Hos Birkemosegaard er vi mere end bare et landbrug - vi er en økologisk helhedsoplevelse, drevet af passion for bæredygtighed, ægte råvarer og respekt for naturen. Gården har været i familien i generationer, og i dag arbejder vi hver dag for at kombinere traditionelle metoder med moderne løsninger, der skåner miljøet og styrker biodiversiteten.
    </p>
    <p>
      Vi tror på gennemsigtighed, kvalitet og det nære møde mellem jord og bord. Derfor inviterer vi også dig til at komme tættere på, hvad vi laver - om det er gennem vores gårdbutik, markvandringer, events eller samarbejder med lokale aktører.
    </p>
    <a href="<?php echo esc_url(site_url('/om-gaarden'));?>" class="btn-filled">Læs mere om gården</a>
  </div>
</section>
<section class="bannerForside">
  <div class="ikonItem">
    <img src="/assets/icons/eco_24dp_849A28_FILL0_wght200_GRAD0_opsz24.svg" alt="Bæredygtighed ikon">
    <p>Bæredygtighed</p>
  </div>
  <div class="ikonItem">
    <img src="/assets/icons/eco_24dp_849A28_FILL0_wght200_GRAD0_opsz24.svg" alt="Økologi ikon">
    <p>Økologi</p>
  </div>
  <div class="ikonItem">
    <img src="/assets/icons/eco_24dp_849A28_FILL0_wght200_GRAD0_opsz24.svg" alt="Bæredygtighed ikon">
    <p>Enkelthed</p>
  </div>
  <div class="ikonItem">
    <img src="/assets/icons/eco_24dp_849A28_FILL0_wght200_GRAD0_opsz24.svg" alt="Kvalitet ikon">
    <p>Kvalitet</p>
  </div>
</section>

<section class="produkterForside">
  <div class="spaceBetweenforside">
    <h2>Se vores nyeste produkter</h2>
    <a href="<?php echo esc_url(site_url('/shop'));?>" class="visAlle">Se flere produkter <span class="material-symbols-rounded">keyboard_arrow_right</span></a>
  </div>
  <div class="swiper_wrap">
    <div class="swiper-button-prev"></div>
    <div class="swiper product-swiper">
      <div class="swiper-wrapper">
        <?php
        // De 8 nyeste produkter vises
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 8,
          'orderby' => 'date',
          'order' => 'DESC',
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="swiper-slide">
              <?php get_template_part('template-parts/cards/card', 'product'); ?>
            </div>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-button-next"></div>
   
  </div>
</section>

<section class="billede-tekst-sektion">
  <div class="indhold-wrapper-forside">
    <div class="billede-container">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Torsdagskassen.jpg" alt="Beskrivende tekst">
    </div>
    <div class="tekst-container">
      <h2>Torsdagskassen</h2>
      <p>
        Torsdagskassen er en ugentlig frugt og grøntsagskasse (uden binding), som vi sammensætter af det bedste fra vores egne og andres marker. Vi supplerer altid indholdet med hjælp fra danske kollegaer og udenlandske leverandører og producenter. Alt er biodynamisk eller økologisk. Varer fra egen avl er som udgangspunkt dyrket biodynamisk.
      </p>
      <h3>229,00 kr.</h3>
      <a href="/#" class="btn-filled ">Læs mere om denne uges torsdagskasse</a> <br>
      <a href="<?php echo esc_url(site_url('/product-category/maltidskasser'));?>" class="btn-filled btn-outline">Se andre måltidskasser</a>      


    </div>
  </div>
</section>

<section class="produkterForside">
  <div class="spaceBetweenforside">
    <h2>Gårdens favoritter</h2>
    <a href="<?php echo esc_url(site_url('/shop'));?>" class="visAlle">Se flere produkter <span class="material-symbols-rounded">keyboard_arrow_right</span></a>
  </div>
  <div class="swiper_wrap">
    <div class="swiper-button-prev"></div>
    <div class="swiper product-swiper">
      <div class="swiper-wrapper">
        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 8,
          'orderby' => 'date',
          'order' => 'DESC',
          'meta_query' => array(
            array(
              'key'     => 'favorit_produkt', // Navnet på custom field
              'value'   => true,                // Eller 'true' afhængigt af hvordan det er gemt
              
            ),
          ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="swiper-slide">
              <?php get_template_part('template-parts/cards/card', 'product'); ?>
            </div>
            <?php
          }
        }
        wp_reset_postdata();
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="swiper-button-next"></div>
    
  </div>
</section>

<hr class="divider">

<section class="billed-sektion-forside">
  <a class="billede stort zoom-billede" href="#" >
    <img src="/assets/img/dauphinoise.jpg" alt="Opskrifter">
    <div class="gavekort-forside">Opskrifter</div>
    <div class="pil-forside">→</div>
  </a>
  
  <a class="billede lille zoom-billede" href="#">
    <img src="/assets/img/COLOURBOX26861284.jpg" alt="Levering">
    <div class="gavekort-forside">Levering</div>
    <div class="pil-forside">→</div>
  </a>
  
  <a class="billede lille zoom-billede" href="#">
    <img src="/assets/img/kassen_1.jpg" alt="Gavekort">
    <div class="gavekort-forside">Gavekort</div>
    <div class="pil-forside">→</div>
  </a>
</section>
<section class="restaurant-section">
  <div class="text-restaurant-forside">
    <h2>Gårdrestaurant</h2>
    <p>
      Hos Birkmosegaard er vi stolte af også at kunne byde velkommen i vores egen gårdrestaurant.
    </p>
    <p>
      Restauranten er en hyggelig og stemningsfuld restaurant beliggende i landlige omgivelser, hvor fokus er på lokale råvarer og hjemmelavet mad.
    </p>
    <p>
      Her kan du nyde sæsonens bedste smage i rolige, naturskønne omgivelser - perfekt til både hverdag og særlige lejligheder.
    </p>
    <a href="/#" class="btn-filled-forside ">Læs mere om restauranten</a>
  </div>
</section>
<section class="facebook-anmeldelser">
  <h2>Det siger vores  kunder om os</h2>
  <div class="anmeldelser-grid">
    <div class="anmeldelse-card">
       <a class="facebook-logo" href="https://www.facebook.com/profile.php?id=100063862530530&sk=reviews" target="_blank" aria-label="Se anmeldelsen på Facebook">
    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
      <path d="M22 12c0-5.5228-4.4772-10-10-10S2 6.4772 2 12c0 4.9916 3.657 9.1284 8.438 9.8787v-6.988H7.8984V12h2.5396V9.797c0-2.5074 1.4923-3.8908 3.7774-3.8908 1.094 0 2.2386.195 2.2386.195v2.462h-1.2609c-1.2424 0-1.6309.7716-1.6309 1.562V12h2.7731l-.4437 2.8907h-2.3294v6.988C18.343 21.1284 22 16.9916 22 12z"/>
    </svg>
  </a>
      <p>"Endnu en dejlig smagsoplevelse. Enkel mad og gode råvarer fra lokalområdet😋😋😋"</p>
      <span>- Helle Colmorten.</span>
    </div>
    <div class="anmeldelse-card">
        <a class="facebook-logo" href="https://www.facebook.com/profile.php?id=100063862530530&sk=reviews" target="_blank" aria-label="Se anmeldelsen på Facebook">
    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
      <path d="M22 12c0-5.5228-4.4772-10-10-10S2 6.4772 2 12c0 4.9916 3.657 9.1284 8.438 9.8787v-6.988H7.8984V12h2.5396V9.797c0-2.5074 1.4923-3.8908 3.7774-3.8908 1.094 0 2.2386.195 2.2386.195v2.462h-1.2609c-1.2424 0-1.6309.7716-1.6309 1.562V12h2.7731l-.4437 2.8907h-2.3294v6.988C18.343 21.1284 22 16.9916 22 12z"/>
    </svg>
  </a>
      <p>"Skønne, duftende saftige grøntsager lige til døren. Masse andre produkter af høj kvalitet, alt fra kød, mel, frugt og vin. Jesper og Kung gør det super godt!"</p>
      <span>- Idun Varvin.</span>
    </div>
    <div class="anmeldelse-card">
      <a class="facebook-logo" href="https://www.facebook.com/profile.php?id=100063862530530&sk=reviews" target="_blank" aria-label="Se anmeldelsen på Facebook">
    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
      <path d="M22 12c0-5.5228-4.4772-10-10-10S2 6.4772 2 12c0 4.9916 3.657 9.1284 8.438 9.8787v-6.988H7.8984V12h2.5396V9.797c0-2.5074 1.4923-3.8908 3.7774-3.8908 1.094 0 2.2386.195 2.2386.195v2.462h-1.2609c-1.2424 0-1.6309.7716-1.6309 1.562V12h2.7731l-.4437 2.8907h-2.3294v6.988C18.343 21.1284 22 16.9916 22 12z"/>
    </svg>
  </a>
      <p>"Masser af gode grøntsager af høj kvalitet.. en glæde at købe mine grøntsager der ..hver uge."</p>
      <span>- Susanne Wex.</span>
    </div>
    <div class="anmeldelse-card">
       <a class="facebook-logo" href="https://www.facebook.com/profile.php?id=100063862530530&sk=reviews" target="_blank" aria-label="Se anmeldelsen på Facebook">
    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
      <path d="M22 12c0-5.5228-4.4772-10-10-10S2 6.4772 2 12c0 4.9916 3.657 9.1284 8.438 9.8787v-6.988H7.8984V12h2.5396V9.797c0-2.5074 1.4923-3.8908 3.7774-3.8908 1.094 0 2.2386.195 2.2386.195v2.462h-1.2609c-1.2424 0-1.6309.7716-1.6309 1.562V12h2.7731l-.4437 2.8907h-2.3294v6.988C18.343 21.1284 22 16.9916 22 12z"/>
    </svg>
  </a>
      <p>"Dejlig afslappet stemning, god, kyndig og hyggelig betjening. Lækker og inspirerende mad. Kan varmt anbefale spisestedet. 5 stjerner"</p>
      <span>- Stine Invernizzi.</span>
    </div>
    <div class="anmeldelse-card">
       <a class="facebook-logo" href="https://www.facebook.com/profile.php?id=100063862530530&sk=reviews" target="_blank" aria-label="Se anmeldelsen på Facebook">
    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
      <path d="M22 12c0-5.5228-4.4772-10-10-10S2 6.4772 2 12c0 4.9916 3.657 9.1284 8.438 9.8787v-6.988H7.8984V12h2.5396V9.797c0-2.5074 1.4923-3.8908 3.7774-3.8908 1.094 0 2.2386.195 2.2386.195v2.462h-1.2609c-1.2424 0-1.6309.7716-1.6309 1.562V12h2.7731l-.4437 2.8907h-2.3294v6.988C18.343 21.1284 22 16.9916 22 12z"/>
    </svg>
  </a>
      <p>"En fornøjelse at handle lokalt - fantastisk udvalg."</p>
      <span>- Camilla H.</span>
    </div><div class="anmeldelse-card">
       <a class="facebook-logo" href="https://www.facebook.com/profile.php?id=100063862530530&sk=reviews" target="_blank" aria-label="Se anmeldelsen på Facebook">
    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
      <path d="M22 12c0-5.5228-4.4772-10-10-10S2 6.4772 2 12c0 4.9916 3.657 9.1284 8.438 9.8787v-6.988H7.8984V12h2.5396V9.797c0-2.5074 1.4923-3.8908 3.7774-3.8908 1.094 0 2.2386.195 2.2386.195v2.462h-1.2609c-1.2424 0-1.6309.7716-1.6309 1.562V12h2.7731l-.4437 2.8907h-2.3294v6.988C18.343 21.1284 22 16.9916 22 12z"/>
    </svg>
  </a>
      <p>"Super kvalitet og rimelige priser, når man ser på, hvor gode, friske økologiske varer, I leverer."</p>
      <span>- Miriam Feilberg.</span>
    </div>
  
  </div>
</section>
</main>
<?php get_footer(); ?>

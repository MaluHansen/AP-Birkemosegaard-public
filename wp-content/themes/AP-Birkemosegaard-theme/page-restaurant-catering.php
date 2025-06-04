<?php get_header(); ?>
<main>
  <section class="introGaardrestaurant">
    <div class="introGaardrestaurantTekst">
      <h1>Gårdrestaurant</h1>
      <p>
        Birkemosegaards gårdrestaurant ligger midt i det økologiske landskab
        på Sjællands Odde og tilbyder smagfulde måltider lavet af egne
        råvarer i sæson. Restauranten er en naturlig forlængelse af gårdens
        værdier og filosofi. <br />
        <br />
        Her samles gæster omkring langborde og nyder retter tilberedt med
        friske grøntsager, kød og korn fra marken lige udenfor. Fokus er på
        økologi, nærvær og enkel mad lavet med respekt for naturens rytme og
        årstiderne.
      </p>
    </div>
    <div class="introGaardrestaurantBillede fade-in">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/introbilledeGaardrestaurant-1.png" alt="billede fra restaurant" />
    </div>
  </section>
  <section class="events">
    <h2>Events</h2>
    <div class="eventCards">
      <div class="eventCard">
        <div class="eventTekst">
          <h3>
            Casamadre <br />
            pop-up
          </h3>
          <p><i class="fa-solid fa-calendar-days"></i> 29. Maj</p>
          <p><i class="fa-solid fa-clock"></i> KL. 18.30</p>
          <p>Italiensk aften med gæstekokke fra Nørrebro</p>
          <p>450 kr forudbetales ved booking</p>
          <a class="btn-filled" href="#">Læs mere</a>
        </div>
        <div class="eventBillede">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Riccardo_1_stor.jpeg" alt="billede af riccardo" />
        </div>
      </div>
      <div class="eventCard">
        <div class="eventTekst">
          <h3>
            Ranee’s <br />
            pop-up
          </h3>
          <p><i class="fa-solid fa-calendar-days"></i> 7. Juni</p>
          <p><i class="fa-solid fa-clock"></i> KL. 18.30</p>
          <p>Thailandsk aften i fællesskab med Ranee og sit team</p>
          <p>450 kr forudbetales ved booking</p>
          <a class="btn-filled" href="#">Læs mere</a>
        </div>
        <div class="eventBillede">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Ranees.jpg" alt="billede af mad" />
        </div>
      </div>
    </div>
  </section>
  <section class="catering">
    <div class="cateringBillede fade-in">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/catering.jpg" alt="billede fra restaurant" />
    </div>
    <div class="cateringTekst">
      <h2>Catering</h2>
      <p>
        Birkemosegaards køkken rykker også ud af gården. Vi tilbyder
        catering til både private og erhverv – med fokus på sæsonens
        økologiske råvarer og smagfulde, ærlige retter. Uanset om du skal
        holde bryllup, firmaarrangement, fødselsdag eller noget helt fjerde,
        skræddersyr vi en menu, der passer til anledningen og jeres ønsker.
        <br />
        <br />
        Alt laves fra bunden i vores gårdkøkken med råvarer, vi selv har
        dyrket eller hentet fra producenter, vi stoler på. Du kan vælge
        mellem flere forskellige formater – fra en uformel buffet til en
        serveret middag med flere retter.
      </p>
      <br />
      <p>
        Sheila Avila kan bookes til små og store selskaber privat og i
        restauranten samt cateringopgaver.
      </p>
      <a class="btn-filled" href="#">Book Sheila</a>
      <br />
      <p>
        Kung kan bookes til mindre thaiopgaver. Både i restauranten og som
        catering.
      </p>
      <a class="btn-filled" href="#">Book Kung</a>
    </div>
  </section>
  <section class="restaurantGavekort" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/catering.jpg)">
    <div class="restaurantGavekortTekst fade-in">
      <h2>Køb gavekort til restauranten</h2>
      <p>
        Et gavekort til vores restaurant kan være en fin måde at dele
        oplevelsen på Birkemosegaard med andre. Det kan bruges til en middag
        i restauranten, et pop-up arrangement eller noget helt tredje – og
        giver modtageren mulighed for selv at vælge tidspunkt og oplevelse.
        <br />
        <br />
        Du vælger selv beløbet og bestiller gavekortet online via knappen
        herunder.
      </p>
      <br />
      <a class="btn-filled" href="#">Bestil gavekort</a>
    </div>
  </section>
  <section class="hvemErVi">
    <div class="hvemErViTekst">
      <h2>Hvem er vi?</h2>
      <p>
        Birkemosegaard har været drevet økologisk siden 1991 og er i dag en
        familieejet gård med fokus på bæredygtighed, biodiversitet og
        kvalitet i alle led. Her dyrker vi jorden med omtanke og lader
        naturen spille en aktiv rolle i produktionen. <br />
        <br />
        Vi arbejder tæt sammen som familie og tror på åbenhed og
        gennemsigtighed – både i vores måde at producere fødevarer på og i
        mødet med dem, der besøger os. På gården finder du alt fra
        grøntsager og kvæg til café, restaurant og fællesskab.
      </p>
      <br />
      <a class="btn-filled" href="#">Læs mere om os</a>
    </div>
    <div class="hvemErViBillede fade-in">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hvemervi.png" alt="billede af ejerne af birkemosegaard" />
    </div>
  </section>
</main>
<?php get_footer(); ?>
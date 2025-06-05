<?php get_header(); ?>
<main>
  <section class="omgaardenForside">
    <div class="omgaardenImg fade-in">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Leveringsbillede.jpg" alt="billede af grøntsagskasse" />
    </div>
    <div class="omgaardenContent">
      <h2>Afhentning og levering</h2>
      <p>
        Når du handler hos Birkemosegaard, kan du nemt hente dine varer direkte på gården eller få dem leveret til udvalgte lokalområder. Vi tilbyder fleksible løsninger, så du kan vælge den leveringsform, der passer dig bedst.
      </p>
      <p>
        Ved afhentning på gården pakker vi dine varer klar til det aftalte tidspunkt. Hvis du vælger levering, sørger vi for, at dine varer bliver leveret friske og forsvarligt pakket – lige til døren eller til et lokalt udleveringssted.
        Du vælger afhentnings- eller leveringsmetode ved bestilling, og vi informerer dig om næste mulige afhentnings- eller leveringsdag.        
      </p>

      
  
    </div>
  </section>
  <hr class="divider">
  <section class="torsdags-grid">
    <div class="grid-header">
      <h2>Gratis levering om Torsdagen</h2>
    </div>
    <div class="grid-venstre">
      <p>
        Om torsdagen leverer vi varer gratis til vores afhentningssteder i Nykøbing Sjælland, Roskilde, København, Charlottenlund og Lyngby.
        Til torsdagslevering kan man både bestille vores Torsdagskasse samt alle andre fra vores webshop, herunder kolonialvarer og kød.
      </p>
      <p>Hjemmelevering om torsdagen koster 69 kr. og er gratis ved minimumskøb for 600 kr.</p>
    </div>

    <div class="grid-hoejre">
      <ul>
        <li><strong>OBS</strong> Man behøver ikke købe Torsdagskassen for at få leveret varer torsdag, så længe man bestiller for minimum 230 kr.</li>
        <li>Ved køb af ekstra varer uden Torsdagskasse, skal der minimum bestilles for 230 kr</li>
        <li>Ved tilkøb af ekstra varer udover Torsdagskassen, skal der minimum bestilles for 150 kr</li>
      </ul>
    </div>
  </section>
  <div class="afhentningssteder">
    <h2>Se vores afhentningssteder</h2>
  </div>
  <section class="kort-sektion">

    <!-- Venstre infoboks -->
    <div class="info-boks" id="infoBox">
      <h3>Vælg en lokation på kortet</h3>
      <p>Info kommer frem her...</p>
    </div>

    <!-- Midterste kort -->
    <div class="kort-container" id="kort"></div>

    <!-- Højre liste over byer -->
    <div class="accordion-container" id="accordionContainer"></div>
  </section>
  <section class="torsdags-grid">
    <div class="grid-header">
      <h2>Hjemmelevering hver anden fredag</h2>
    </div>
    <div class="grid-venstre">
      <p>
        Vi kører varetur hver fredag og skifter mellem to forskellige ruter i Storkøbenhavn, Roskilde og Nordøstsjælland. Dvs. Man kan på en adresse inden for vores ruteplan få leveret varer hver anden fredag.
      </p>
      <p>Hjemmelevering om fredagen koster 69 kr. og er gratis ved minimumskøb for 600 kr.
        HUSK at bestille 24 timer inden leveringsdato!</p>
    </div>

    <div class="grid-hoejre">
      <ul>
        <li><strong>OBS</strong> Man behøver ikke købe Torsdagskassen for at få leveret varer torsdag, så længe man bestiller for minimum 230 kr.</li>
        <li>Ved køb af ekstra varer uden Torsdagskasse, skal der minimum bestilles for 230 kr</li>
        <li>Ved tilkøb af ekstra varer udover Torsdagskassen, skal der minimum bestilles for 150 kr</li>
      </ul>
    </div>
  </section>
  <section class="fredags-sektion">
    <h2>Fredagsvareture</h2>
    <p>Bemærk: Ingen levering uge 22 (Kristi himmelfartsdag)</p>
    <div class="vareture-container">
      <div class="varetur-box">
        <h3>Varetur 1<br>Uge 21, 23</h3>
        <ul>
          <li>København K</li>
          <li>København V</li>
          <li>Frederiksberg C</li>
          <li>2100 København Ø</li>
          <li>2150 Nordhavn</li>
          <li>2200 København N</li>
          <li>2400 København NV</li>
          <li>2450 København SV</li>
          <li>2500 Valby</li>
          <li>2800 Kongens Lyngby</li>
        </ul>
      </div>
      <div class="varetur-box">
        <h3>Varetur 2<br>Uge 20, 24</h3>
        <ul>
          <li>2300 København S</li>
          <li>2600 Glostrup</li>
          <li>2605 Brøndby</li>
          <li>2610 Rødovre</li>
          <li>2620 Albertslund</li>
          <li>2625 Vallensbæk</li>
          <li>2630 Taastrup</li>
          <li>2635 Ishøj</li>
          <li>2640 Hedehusene</li>
          <li>2650 Hvidovre</li>
        </ul>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
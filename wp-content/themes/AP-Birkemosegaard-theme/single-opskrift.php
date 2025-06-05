<?php get_header(); ?>
<main>
    <h1 class="opskriftTitel"><?php the_title(); ?></h1>
    <section class="ingredienser">
        <div class="ingredienserBillede">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="ingredienserTekst">
            <!-- Henter ACF-felt for antal personer -->
            <h2>Indgredienser til <?php the_field('antal_personer'); ?> personer</h2>
            <ul>
                <?php
                // Henter ACF-feltet 'ingrediens_liste' og splitter det op i punkter baseret på <p>-tags
                $ingrediens_liste = get_field('ingrediens_liste');
                if ($ingrediens_liste) {
                    $paragraffer = explode("</p>", $ingrediens_liste);
                    foreach ($paragraffer as $p) {
                        $tekst = trim(strip_tags($p)); // Fjerner HTML og mellemrum
                        if (!empty($tekst)) {
                            echo '<li>' . esc_html($tekst) . '</li>'; // Viser som listeelement
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </section>
    <section class="fremgangsmetode">
        <div class="fremgangsmetodeTekst">
            <h2>Fremgangsmåde</h2>
            <ol>
                <?php
                // Henter ACF-feltet 'fremgangsmade' og viser hvert afsnit som et punkt i en ordnet liste
                $fremgangs_liste = get_field('fremgangsmade');
                if ($fremgangs_liste) {
                    $paragraffer = explode("</p>", $fremgangs_liste);
                    foreach ($paragraffer as $p) {
                        $tekst = trim(strip_tags($p));
                        if (!empty($tekst)) {
                            echo '<li>' . esc_html($tekst) . '</li> <br>';
                        }
                    }
                }
                ?>
            </ol>
        </div>
    </section>
    <section class="andreOpskrifter">
        <h2>Vi tror også du vil synes om</h2>
        <div class="opskriftGrid-singleOpskrift">
            <div class="opskriftCard">
                <div class="image-wrapper-singleOpskrift">
                    <a href="/#" class="zoom-billede">
                        <img
                            src="/assets/img/borscht.jpg"
                            alt=""
                            class="opskrift-billede-singleOpskrift" />
                    </a>
                </div>
                <h3>Persian Beetroot Borscht</h3>
                <p>Under 30 minutter</p>
                <button class="btn-filled-singleOpskrift">Se opskrift</button>
            </div>
            <div class="opskriftCard">
                <div class="image-wrapper-singleOpskrift">
                    <a href="/#" class="zoom-billede">
                        <img
                            src="/assets/img/borscht.jpg"
                            alt=""
                            class="opskrift-billede-singleOpskrift" />
                    </a>
                </div>
                <h3>Persian Beetroot Borscht</h3>
                <p>Under 30 minutter</p>
                <button class="btn-filled-singleOpskrift">Se opskrift</button>
            </div>
            <div class="opskriftCard">
                <div class="image-wrapper-singleOpskrift">
                    <a href="/#" class="zoom-billede">
                        <img
                            src="/assets/img/borscht.jpg"
                            alt=""
                            class="opskrift-billede-singleOpskrift" />
                    </a>
                </div>
                <h3>Persian Beetroot Borscht</h3>
                <p>Under 30 minutter</p>
                <button class="btn-filled-singleOpskrift">Se opskrift</button>
            </div>
            <div class="opskriftCard">
                <div class="image-wrapper-singleOpskrift">
                    <a href="/#" class="zoom-billede">
                        <img src="/assets/img/borscht.jpg" alt="" />
                    </a>
                </div>
                <h3>Persian Beetroot Borscht</h3>
                <p>Under 30 minutter</p>
                <button class="btn-filled-singleOpskrift">Se opskrift</button>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
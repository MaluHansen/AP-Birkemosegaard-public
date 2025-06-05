<?php get_header(); ?>
<main>
  <div class="archive-hero">
    <!-- Viser sidetitlen fra WooCommerce, fx "Shop" -->
    <h1 class="archive-heading"><?php woocommerce_page_title(); ?></h1>
    <div class="actions-wrapper">
      <button id="filter-toggle-btn" class="btn-filled btn-outline">
        <span class="material-symbols-rounded btn-img-icon">page_info</span>
        <span class="btn-text">Vis filtre</span>
      </button>
      <div class="sort-selector">
        <!-- Viser WooCommerce's sorterings-dropdown, så brugeren kan vælge f.eks.
        sortering efter popularitet, nyeste produkter eller pris -->
        <?php woocommerce_catalog_ordering(); ?>
      </div>
    </div>
  </div>

  <section class="products">

    <div class="product-filters">
      <!-- Denne linje sørger for, at filterformularen altid sender brugeren tilbage til shop siden
       uanset hvorfra formularen blev sendt, og at URL'en bliver korrekt escaped -->
      <form id="product-filter-form" method="get" action="<?= esc_url(get_permalink(wc_get_page_id('shop'))); ?>">
        <!-- Kategorier -->
        <div class="filter-section">
          <h4 class="filter-sec-heading">Kategorier</h4>
          <?php
          // Henter de valgte kategorier fra URL'en. Hvis der ikke er valgt nogen, sættes det som en tom array.
          $selected = $_GET['fcat'] ?? [];
          // Sikrer at $selected altid er et array, også selv hvis der kun er et valgt element.
          $selected = is_array($selected) ? $selected : [$selected];

          // Henter alle hovedkategorier (forældre) i produktkategorier, som har produkter.
          $parent_terms = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
          ]);

          // Looper igennem alle hovedkategorier
          foreach ($parent_terms as $parent) {
            // Henter underkategorier til hver hovedkategori
            $child_terms = get_terms([
              'taxonomy'   => 'product_cat',
              'hide_empty' => true,
              'parent'     => $parent->term_id,
            ]);

            // Springer hovedkategorien over, hvis der ikke findes nogen underkategorier
            if (empty($child_terms)) continue;

            // Udskriver kategorigruppe med hovedkategoriens navn og en "Vis alle" checkbox
            echo '<div class="category-group">';
            echo '<p class="cat-group-heading">' . esc_html($parent->name) . '</p>';
            echo '<ul class="filter-list">';

            // Sæt checkbox som checked hvis brugeren allerede har valgt denne kategori
            $checked_parent = in_array($parent->slug, $selected) ? 'checked' : ''; ?>
            <li>
              <label class="checkbox-custom">
                <input type="checkbox" name="fcat[]" value="<?= esc_attr($parent->slug); ?>" <?= $checked_parent; ?>>
                <span class="material-symbols-rounded checkbox-icon"></span>
                Vis alle
              </label>
            </li>
            <?php

            // Looper gennem alle underkategorier og viser dem som checkboxes
            foreach ($child_terms as $child) {
              $checked = in_array($child->slug, $selected) ? 'checked' : ''; ?>
              <li>
                <label class="checkbox-custom">
                  <input type="checkbox" name="fcat[]" value="<?= esc_attr($child->slug); ?>" <?= $checked; ?>>
                  <span class="material-symbols-rounded checkbox-icon"></span>
                  <?= esc_html($child->name); ?>
                </label>
              </li>
          <?php }

            echo '</ul></div>'; // Afslutter kategorigruppe
          }
          ?>
        </div>

        <!-- Brands -->
        <div class="filter-section">
          <h4 class="filter-sec-heading">Brands</h4>
          <ul class="filter-list">
            <?php
            // Henter de valgte brands fra URL'en, eller tomt array hvis ingen er valgt
            $selected_brands = $_GET['fbrand'] ?? [];
            // Henter alle brands (fra custom taxonomy 'product_brand') som har produkter
            $brands = get_terms(['taxonomy' => 'product_brand', 'hide_empty' => true]);

            // Looper gennem alle brands og viser dem som checkboxes
            foreach ($brands as $brand) {
              $checked = in_array($brand->slug, $selected_brands) ? 'checked' : ''; ?>
              <li>
                <label class="checkbox-custom">
                  <input type="checkbox" name="fbrand[]" value="<?= esc_attr($brand->slug); ?>" <?= $checked; ?>>
                  <span class="material-symbols-rounded checkbox-icon"></span>
                  <?= esc_html($brand->name); ?>
                </label>
              </li>
            <?php

            }
            ?>
          </ul>
        </div>

        <!-- Øko-mærker -->
        <div class="filter-section">
          <h4 class="filter-sec-heading">Øko-mærke</h4>
          <ul class="filter-list">
            <?php
            // Henter valgte økomærker fra URL'en
            $selected_eco = $_GET['foko'] ?? [];
            // Henter alle øko-mærke-termer fra custom taxonomy 'oko-maerke'
            $eco_labels = get_terms(['taxonomy' => 'oko-maerke', 'hide_empty' => true]);

            foreach ($eco_labels as $label) {
              // Tjekker om øko-mærket er valgt
              $checked = in_array($label->slug, $selected_eco) ? 'checked' : '';
              // Henter det tilknyttede ikon til mærket fra ACF feltet 'eco_icon'
              $icon = get_field('eco_icon', 'oko-maerke_' . $label->term_id); ?>
              <li>
                <label class="checkbox-custom">
                  <input type="checkbox" name="foko[]" value="<?= esc_attr($label->slug); ?>" <?= $checked; ?>>
                  <span class="material-symbols-rounded checkbox-icon"></span>
                  <img src="<?= esc_url($icon['url']); ?>" height="16px" alt="">
                  <?= esc_html($label->name); ?>
                </label>
              </li>
            <?php } ?>
          </ul>
        </div>

        <button class="btn-filled" type="submit">Filtrér</button>
      </form>
      <!-- Link til at nulstille filtrene og genindlæse shoppen uden URL-parametre -->
      <a class="detaljer" href="<?= esc_url(site_url('shop')); ?>">Nultil filtre</a>
    </div>

    <!-- Produktgrid -->
    <div class="product-grid">
      <?php
      // Starter WooCommerce loop og indlæser hvert produkt ved hjælp af en kort-komponent
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/cards/card', 'product');
      }
      // Nulstiller global postdata efter loopet
      wp_reset_postdata();
      ?>
    </div>
  </section>
  <!-- WooCommerce paginering og resultatvisning -->
  <?php
  woocommerce_pagination(); // Viser næste/forrige side links
  woocommerce_result_count(); // Viser hvor mange produkter der vises ud af hvor mange mulige
  ?>
</main>
<?php get_footer(); ?>
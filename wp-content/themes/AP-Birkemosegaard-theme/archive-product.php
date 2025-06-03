<?php get_header(); ?>
<main>
  <div class="archive-hero">
    <h1 class="archive-heading"><?php woocommerce_page_title(); ?></h1>
    <div class="actions-wrapper">
      <button id="filter-toggle-btn" class="btn-filled btn-outline">
        <span class="material-symbols-rounded btn-img-icon">page_info</span>
        <span class="btn-text">Vis filtre</span>
      </button> 
      <div class="sort-selector">
        <?php woocommerce_catalog_ordering(); ?>
      </div>     
    </div>
  </div>

  <section class="products">

    <div class="product-filters">
      <form id="product-filter-form" method="get" action="<?= esc_url(get_permalink(wc_get_page_id('shop'))); ?>">
        <!-- Kategorier -->
        <div class="filter-section">
          <h4 class="filter-sec-heading">Kategorier</h4>
          <?php
          $selected = $_GET['fcat'] ?? [];
          $selected = is_array($selected) ? $selected : [$selected];

          $parent_terms = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
          ]);

          foreach ($parent_terms as $parent) {
            $child_terms = get_terms([
              'taxonomy'   => 'product_cat',
              'hide_empty' => true,
              'parent'     => $parent->term_id,
            ]);

            if (empty($child_terms)) continue;

            echo '<div class="category-group">';
            echo '<p class="cat-group-heading">' . esc_html($parent->name) . '</p>';
            echo '<ul class="filter-list">';


            $checked_parent = in_array($parent->slug, $selected) ? 'checked' : ''; ?>
              <li>
                <label class="checkbox-custom">
                  <input type="checkbox" name="fcat[]" value="<?= esc_attr($parent->slug); ?>" <?= $checked_parent; ?>>
                  <span class="material-symbols-rounded checkbox-icon"></span>
                  Vis alle
                </label>
              </li>
            <?php
            
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

            echo '</ul></div>';
          }
          ?>
        </div>

        <!-- Brands -->
        <div class="filter-section">
          <h4 class="filter-sec-heading">Brands</h4>
          <ul class="filter-list">
            <?php
            $selected_brands = $_GET['fbrand'] ?? [];
            $brands = get_terms(['taxonomy' => 'product_brand', 'hide_empty' => true]);

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
            $selected_eco = $_GET['foko'] ?? [];
            $eco_labels = get_terms(['taxonomy' => 'oko-maerke', 'hide_empty' => true]);

            foreach ($eco_labels as $label) {
              $checked = in_array($label->slug, $selected_eco) ? 'checked' : '';
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
      <a class="detaljer" href="<?= esc_url(site_url('shop'));?>">Nultil filtre</a>
    </div>

    <!-- Produktgrid -->
    <div class="product-grid">
      <?php
      
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/cards/card', 'product');
      }
      wp_reset_postdata();
      ?>
    </div> 
  </section>
    <?php 
      woocommerce_pagination();
      woocommerce_result_count();
    ?> 
</main>
<?php get_footer(); ?>

<?php get_header();?>
<main>
  <h1><?php woocommerce_page_title();?></h1>
  <?php woocommerce_catalog_ordering(); ?>
  <section class="products">
  
    <div class="product-filters">
      <a href="<?php echo site_url('/shop') ?>">Ryd filtre</a>
<form id="product-filter-form" method="get" action="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>">
  <div class="filter-section">
    <p><strong>Kategorier:</strong></p>
    <?php
    $selected = isset($_GET['fcat']) ? (array) $_GET['fcat'] : [];

    $parent_terms = get_terms(array(
      'taxonomy'   => 'product_cat',
      'hide_empty' => true,
      'parent'     => 0,
    ));

    foreach ($parent_terms as $parent) {
      $child_terms = get_terms(array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => true,
        'parent'     => $parent->term_id,
      ));

      if (empty($child_terms)) continue;

      // Åben automatisk accordion hvis parent eller nogen child er valgt
      $is_open = in_array($parent->slug, $selected);
      foreach ($child_terms as $child) {
        if (in_array($child->slug, $selected)) {
          $is_open = true;
          break;
        }
      }

      echo "<details " . ($is_open ? 'open' : '') . ">";
      echo "<summary><strong>{$parent->name}</strong></summary>";
      echo "<ul style='margin-left: 1rem;'>";

      // ✅ "Vis alle" (parent)
      $checked_parent = in_array($parent->slug, $selected) ? 'checked' : '';
      echo "<li>
              <label>
                <input type='checkbox' name='fcat[]' value='{$parent->slug}' $checked_parent> Vis alle
              </label>
            </li>";

      // ✅ Childs
      foreach ($child_terms as $child) {
        $checked = in_array($child->slug, $selected) ? 'checked' : '';
        echo "<li>
                <label>
                  <input type='checkbox' name='fcat[]' value='{$child->slug}' $checked> {$child->name}
                </label>
              </li>";
      }

      echo "</ul>";
      echo "</details><br>";
    }
    ?>
  </div>
  <!-- Brand Filter -->
<div class="filter-section">
  <p><strong>Brands</strong></p>
  <ul>
    <?php
    $selected_brands = isset($_GET['fbrand']) ? (array) $_GET['fbrand'] : [];

    $brands = get_terms(array(
      'taxonomy'   => 'product_brand',
      'hide_empty' => true,
    ));

    foreach ($brands as $brand) {
      $checked = in_array($brand->slug, $selected_brands) ? 'checked' : '';
      echo "<li>
              <label>
                <input type='checkbox' name='fbrand[]' value='{$brand->slug}' $checked> {$brand->name}
              </label>
            </li>";
    }
    ?>
  </ul>
</div>

<div class="filter-section">
  <p><strong>Øko-mærke</strong></p>
  <ul>
    <?php
    $selected_eco = isset($_GET['foko']) ? (array) $_GET['foko'] : [];

    $eco_labels = get_terms(array(
      'taxonomy'   => 'oko-maerke',
      'hide_empty' => true,
    ));

    foreach ($eco_labels as $label) {
      $checked = in_array($label->slug, $selected_eco) ? 'checked' : '';
      echo "<li>
              <label>
                <input type='checkbox' name='foko[]' value='{$label->slug}' $checked> {$label->name}
              </label>
            </li>";
    }
    ?>
  </ul>
</div>





  <button type="submit">Filtrér</button>
</form>




    </div>

    <div class="product-grid">
      
      <?php
      while(have_posts()){
        the_post();
        get_template_part('template-parts/card', 'product');
      };
        


      wp_reset_postdata();
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
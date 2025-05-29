<?php get_header(); ?>
<main>
<section class="products">
  <div class="product-filters">

    <form method="get" action="">

      <!-- Kategorifilter -->
      <fieldset>
        <legend>Kategorier</legend>
        <?php
        $selected_cats = $_GET['fcat'] ?? [];
        if (!is_array($selected_cats)) $selected_cats = [$selected_cats];

        $categories = get_terms([
          'taxonomy' => 'product_cat',
          'hide_empty' => false,
          'parent'     => 0
        ]);
        foreach ($categories as $cat) {
          $checked = in_array($cat->slug, $selected_cats) ? 'checked' : '';
          echo "<label><input type='checkbox' name='fcat[]' value='{$cat->slug}' $checked> {$cat->name}</label><br>";
        }
        ?>
      </fieldset>

      <!-- Brandfilter -->
      <fieldset>
        <legend>Brands</legend>
        <?php
        $selected_brands = $_GET['fbrand'] ?? [];
        if (!is_array($selected_brands)) $selected_brands = [$selected_brands];

        $brands = get_terms([
          'taxonomy' => 'product_brand',
          'hide_empty' => true,
        ]);
        foreach ($brands as $brand) {
          $checked = in_array($brand->slug, $selected_brands) ? 'checked' : '';
          echo "<label><input type='checkbox' name='fbrand[]' value='{$brand->slug}' $checked> {$brand->name}</label><br>";
        }
        ?>
      </fieldset>

      <!-- Sortering -->
      <label for="orderby">Sorter efter:</label>
      <select name="orderby" id="orderby">
        <option value="date" <?php selected($_GET['orderby'] ?? '', 'date'); ?>>Nyeste</option>
        <option value="title" <?php selected($_GET['orderby'] ?? '', 'title'); ?>>Navn (A–Å)</option>
        <option value="price_asc" <?php selected($_GET['orderby'] ?? '', 'price_asc'); ?>>Pris (lav til høj)</option>
        <option value="price_desc" <?php selected($_GET['orderby'] ?? '', 'price_desc'); ?>>Pris (høj til lav)</option>
      </select>

      <button type="submit">Filtrer</button>
    </form>
  </div>

  <div class="product-grid">
    <?php
    $args = array(
      'post_type' => 'product',
      'posts_per_page' => -1
    );

    // Sortering
    $orderby = 'date';
    $order = 'DESC';

    if (!empty($_GET['orderby'])) {
        switch ($_GET['orderby']) {
            case 'title':
                $orderby = 'title';
                $order = 'ASC';
                break;
            case 'price_asc':
                $orderby = 'meta_value_num';
                $order = 'ASC';
                $args['meta_key'] = '_price';
                break;
            case 'price_desc':
                $orderby = 'meta_value_num';
                $order = 'DESC';
                $args['meta_key'] = '_price';
                break;
        }
    }

    $args['orderby'] = $orderby;
    $args['order'] = $order;

    // Filtrering via tax_query
    $tax_query = [];

    if (!empty($_GET['fcat']) && is_array($_GET['fcat'])) {
      $tax_query[] = [
        'taxonomy' => 'product_cat',
        'field'    => 'slug',
        'terms'    => array_map('sanitize_text_field', $_GET['fcat']),
        'operator' => 'IN',
      ];
    }

    if (!empty($_GET['fbrand']) && is_array($_GET['fbrand'])) {
      $tax_query[] = [
        'taxonomy' => 'product_brand',
        'field'    => 'slug',
        'terms'    => array_map('sanitize_text_field', $_GET['fbrand']),
        'operator' => 'IN',
      ];
    }

    if (!empty($tax_query)) {
      $args['tax_query'] = $tax_query;
    }

    // WP_Query
    $loop = new WP_Query($args);

    while ($loop->have_posts()) : $loop->the_post();
      get_template_part('template-parts/card', 'product');
    endwhile;

    wp_reset_postdata();
    ?>
  </div>
</section>
</main>
<?php get_footer(); ?>

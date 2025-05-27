<?php get_header(); ?>
<main>


    <form method="get" action="<?php echo esc_url( get_post_type_archive_link('product') ); ?>">

    <!-- Kategorifilter -->
    <label for="category">Kategori:</label>
    <select name="product_cat">
        <option value="">Alle kategorier</option>
        <?php
        $categories = get_terms([
            'taxonomy' => 'product_cat',
            'hide_empty' => true
        ]);
        foreach ( $categories as $category ) {
            $selected = selected($_GET['product_cat'] ?? '', $category->slug, false);
            echo "<option value='{$category->slug}' $selected>{$category->name}</option>";
        }
        ?>
    </select>
    <!-- Brandfilter (forudsætter pa_brand-attribut) -->
    <label for="brand">Brand:</label>
    <select name="brand">
        <option value="">Alle brands</option>
        <?php
        $brands = get_terms([
            'taxonomy' => 'product_brand',
            'hide_empty' => true
        ]);
        foreach ( $brands as $brand ) {
            $selected = selected($_GET['brand'] ?? '', $brand->slug, false);
            echo "<option value='{$brand->slug}' $selected>{$brand->name}</option>";
        }
        ?>
    </select>


    <button type="submit">Filtrer</button>
</form>

    <?php while ( have_posts() ) : the_post(); global $product; ?>
        <div class="shop-produkt-card">
            <a href="<?php the_permalink(); ?>">
                <?php echo woocommerce_get_product_thumbnail(); ?>
            </a>
        </div>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>
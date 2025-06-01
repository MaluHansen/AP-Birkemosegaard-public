<?php 
$product = wc_get_product(get_the_ID());
$category = get_the_terms($product->get_id(), 'product_cat')[0] ?? null;
$parentCat = $category ? get_term($category->parent, 'product_cat') : null;
?>
<ul class="breadcrumbs-product">
    <li>
        <a href="<?= get_permalink(wc_get_page_id('shop')); ?>">Produkter</a>
        <span class="material-symbols-rounded">keyboard_arrow_right</span>
    </li>
    <?php if ($parentCat): ?>
        <li>
            <a href="<?= esc_url(get_term_link($parentCat)); ?>">
                <?= esc_html($parentCat->name); ?>
            </a>
            <span class="material-symbols-rounded">keyboard_arrow_right</span>
        </li>
    <?php endif; ?>
    <li><?php the_title(); ?></li>
</ul>



<?php
$product = wc_get_product(get_the_ID());

// Hent ACF-felter
$beskrivelse = get_field('produkt_beskrivelse');
$naering     = get_field('naeringsindhold');
$ingredienser = get_field('ingredienser');

// Lav en array med de felter der findes
$tabs = [];

if ($beskrivelse) {
    $tabs[] = [
        'label' => 'Om produktet',
        'content' => $beskrivelse,
        'id' => 1
    ];
}

if ($naering) {
    $tabs[] = [
        'label' => 'Næringsindhold',
        'content' => $naering,
        'id' => 2
    ];
}

if ($ingredienser) {
    $tabs[] = [
        'label' => 'Ingredienser',
        'content' => $ingredienser,
        'id' => 3
    ];
}
?>

<?php if (!empty($tabs)): ?>
<div class="product-detail-tabs">
    <div class="tabs">
        <?php foreach ($tabs as $index => $tab): ?>
            <button class="tab-btn <?= $index === 0 ? 'active-tab' : ''; ?>" data-tab="<?= $tab['id']; ?>">
                <?= esc_html($tab['label']); ?>
            </button>
        <?php endforeach; ?>
    </div>

    <?php foreach ($tabs as $index => $tab): ?>
        <div class="tab-content <?= $index === 0 ? 'active-tab' : ''; ?>" data-content="<?= $tab['id']; ?>">
            <?= wp_kses_post($tab['content']); ?>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

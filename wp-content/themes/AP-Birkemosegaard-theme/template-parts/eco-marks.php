<?php
$eco_marks = get_the_terms(get_the_ID(), 'oko-maerke');

if ($eco_marks && !is_wp_error($eco_marks)): ?>
    <div class="oko-icons">
        <?php foreach ($eco_marks as $mark):
            $icon = get_field('eco_icon', 'oko-maerke_' . $mark->term_id);
            if ($icon): ?>
                <img src="<?= esc_url($icon['url']); ?>" alt="<?= esc_attr($mark->name); ?>">
            <?php else: ?>
                <span><?= esc_html($mark->name); ?></span>
            <?php endif;
        endforeach; ?>
    </div>
<?php endif; ?>


<div class="card card-opskrift">
    <a class="card-wrapper" href="<?php the_permalink(); ?>">
        <div class="card-img card-img-opskrift">
            <?php echo the_post_thumbnail(); ?>
        </div>
        <div class="card-content">
            <div class="card-content-wrapper card-content-wrapper-opskrift">
                <h3 class="card-heading"><?php echo the_title(); ?></h3>
                <div class="opskrift-data">
                    <p><span class="material-symbols-rounded">timer</span><?php the_field('tid'); ?></p>
                    <p><span class="material-symbols-rounded">group</span><?php the_field('antal_personer'); ?> Portioner</p>
                </div>
            </div>
        </div>
    </a>
</div>
 
   






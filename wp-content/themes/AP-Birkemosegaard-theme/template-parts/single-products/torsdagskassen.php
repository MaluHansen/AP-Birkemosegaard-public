<?php
$product = wc_get_product(get_the_ID());?>

<section class="product">
    <div class="product-container">
        <div class="product-img">
            <?= $product->get_image(); ?>
        </div>

        <div class="product-info-single">
            <div class="product-info-info-single">
                <h1 class="product-h1"><?php the_title(); ?></h1>
                <!-- Indsæt økomærker template -->
                <?php get_template_part('template-parts/eco-marks'); ?>
            </div>
            <div class="om-torsdagskassen">
                <p>
                    Torsdagskassen er en ugentlig frugt og grøntsagskasse (uden binding), som vi sammensætter af det bedste fra vores egne og andres marker. Vi supplerer altid indholdet med hjælp fra danske kollegaer og udenlandske leverandører og producenter. 
                </p>
                <p>
                    Alt er biodynamisk eller økologisk. Varer fra egen avl er som udgangspunkt dyrket biodynamisk.
                </p>
            </div>
            <div>
                <p class="product-price-single"><?= $product->get_price_html(); ?></p>
                <?php get_template_part('template-parts/add-to-cart-simple'); ?>
                <p class="detaljer" style="font-size: 12px;">OBS! Varer skal hentes SAMME dag de leveres med mindre andet er aftalt. <br>
                Uafhentede varer overgår til afhentningsstedet.</p>
            </div>

        </div>
    </div>
    <div class="product-under-tkassen">
            <div class="product-detail-tabs">
                <div class="tabs">
                    <button class="tab-btn active-tab" data-tab="1">Om produktet</button>
                </div>
                <div class="tab-content active-tab" data-content="1">
                    <h4>Indhold i denne uge:</h4>
                    <p><?php echo the_field('indhold_denne_uge');?></p>
                </div>
            </div>
            <div class="torsdagskassen-levering">
                <h4>Ved afhentning</h4> <br>
                <ul>
                    <li>Standard-Torsdagskassen er i den grønne plastkasse, som bliver på opsamlingsstedet.</li>
                    <li>Ekstra varer er i papkassen. Papkassen tages med hjem.</li>
                    <li>Frostvarer er i individuel plastpose med navn i termokassen. Termokassen bliver på opsamlingsstedet.</li>
                    <li>Varerne skal hentes mellem kl. 15.00 og 18.00 (nogle steder kl. 17 og 20) medmindre andet er aftalt. Ved forsinkelse sender vi mail/sms.</li>
                    <li>Afhentes kassen ikke inden for aftalt tidspunkt, overgår indholdet til afhentningsstedet med mindre andet er aftalt.</li>
                    <li>Vigtigt! Husk at gå ind og få krydset dit navn af på vedlagte liste eller ved disken på opsamlingsstedet.</li>
                </ul>
            </div>
    </div>
</section>
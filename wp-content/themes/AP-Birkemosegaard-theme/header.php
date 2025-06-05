<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head();?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header>
    <div class="logo">
        <a href="<?php echo esc_url(site_url());?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/Birkemosegaard-logo.svg" alt="Birkemosegaard logo"></a>
    </div>
    <nav class="global-nav">
        <ul class="global-menu">
            <li><a <?php if(is_front_page()) echo 'class="active"';?>  href="<?php echo esc_url(site_url());?>">Forside</a></li>
            <li class="products-dropdown">
                <a <?php if(is_shop()) echo 'class="active"';?>  href="<?php echo esc_url(site_url('/shop'));?>" aria-haspopup="true" aria-expanded="false">Produkter</a>
                <ul class="products-dropdown-container">
                    <?php
                    $parent_categories = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => true,
                        'parent'     => 0,
                    ]);

                    foreach ($parent_categories as $cat) {
                        $cat_link = get_term_link($cat);
                        if (!is_wp_error($cat_link)) {
                        echo '<li><a href="' . esc_url($cat_link) . '">' . esc_html($cat->name) . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </li>
            <li><a <?php if(is_post_type_archive('opskrift')) echo 'class="active"';?> href="<?php echo esc_url(site_url('/opskrifter'));?>">Opskrifter</a></li>
            <li><a <?php if(is_page('om-gaarden')) echo 'class="active"';?> href="<?php echo esc_url(site_url('/om-gaarden'));?>">Om gården</a></li>
            <li><a <?php if(is_page('restaurant-catering')) echo 'class="active"';?> href="<?php echo esc_url(site_url('/restaurant-catering'));?>">Restaurant & Catering</a></li>
            <li><a <?php if(is_page('afhentning-levering')) echo 'class="active"';?> href="<?php echo esc_url(site_url('/afhentning-levering'));?>">Afhentning & Levering</a></li>
            <li><a <?php if(is_page('kontakt')) echo 'class="active"';?> href="<?php echo esc_url(site_url('/kontakt'));?>">Kontakt</a></li>
        </ul>
        <div class="global-menu-icons">

            <div class="search-bar-wrapper" style="position: relative;">
                <div class="search-bar">
                    <input type="text" class="search-input" placeholder="Søg..." id="live-search" autocomplete="off">
                    <button class="search-submit">
                        <span class="material-symbols-rounded icon-nav" id="search-icon">search</span>    
                    </button>
                </div>
                
            </div>
            <div id="search-results" class="hidden"></div>

            <div class="cart">
                <span class="material-symbols-rounded icon-nav" id="cart-icon">shopping_cart</span>

               <div class="cart-counts cart-contents">
                    <?php echo WC()->cart->get_cart_contents_count(); ?>
               </div> 
            </div>
                        
            <div class="cart-modal">
            <?php get_template_part('template-parts/mini-cart'); ?>
            </div>
    
            <span class="material-symbols-rounded icon-nav" id="profile-icon">account_circle</span>
            <div class="login-popup">
                <h4>Log ind</h4>
                <p>Ny kunde? <a href="#" class="preHeader">Opret profil her</a></p>
                <form class="login-popup-container" action="" id="login-popup-form">
                    <div class="form-field">
                        <input type="text" id="email" placeholder=" " required>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="form-field">
                        <input type="password" id="psw" placeholder=" " required>
                        <label for="psw">Adgangskode</label>
                        <span class="material-symbols-rounded toggle-password">visibility_off</span>
                    </div>
                    <div class="login-popup-last">
                        <label class="checkbox-custom">
                            <input type="checkbox">
                            <span class="material-symbols-rounded checkbox-icon"></span>
                            Husk mig
                        </label>
                        <a href="#" class="detaljer">Glemt adgangskode?</a>
                    </div>
                    <a href="<?php echo esc_url(site_url('/profil'));?>" class="btn-filled btn-login btn-card">Log ind</a>
                </form>
            </div>
        </div>
    </nav>
    <span class="material-symbols-rounded menu-toggle" id="burger-toggle">menu</span>
    <?php get_template_part('template-parts/to-top-btn'); ?>
</header>
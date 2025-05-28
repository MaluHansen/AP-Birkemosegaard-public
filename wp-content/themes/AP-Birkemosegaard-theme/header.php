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
                <a <?php if(is_shop()) echo 'class="active"';?>  href="<?php echo get_permalink( wc_get_page_id('shop')); ?>" aria-haspopup="true" aria-expanded="false">Produkter</a>
                <ul class="products-dropdown-container">
                    <li><a href="#">placeholder</a></li>
                    <li><a href="#">placeholder</a></li>
                    <li><a href="#">placeholder</a></li>
                    <li><a href="#">placeholder</a></li>
                    <li><a href="#">placeholder</a></li>
                    <li><a href="#">placeholder</a></li>
                </ul>
            </li>
            <li><a href="#">Opskrifter</a></li>
            <li><a href="#">Om gården</a></li>
            <li><a href="#">Restaurant & Catering</a></li>
            <li><a href="#">Afhentning & Levering</a></li>
            <li><a href="<?php echo site_url('/cart') ?>">Kontakt</a></li>
        </ul>
        <div class="global-menu-icons">
            
            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Søg...">
                <button class="search-submit">
                    <span class="material-symbols-rounded icon-nav" id="search-icon">search</span>    
                </button>
            </div>

            <span class="material-symbols-rounded icon-nav" id="cart-icon">shopping_cart</span>
            <div class="cart-modal">
                <div class="cart-modal-content">
                    <div class="cart-modal-header">
                        <p>kurv</p>
                        <span class="material-symbols-rounded icon-nav" id="cart-modal-close">close</span>
                    </div>
                    
                </div>
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
                    
                    <button class="btn-filled">Log ind</button>
                </form>
            </div>
            
            
            
        </div>
    </nav>
</header>
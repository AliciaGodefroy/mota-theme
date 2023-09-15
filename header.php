<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Nathalie Mota</title>
        <?php wp_head(); ?>
    </head>
<body>
    <?php wp_body_open(); ?>
    <header class="header ctn">
        <div class="header_wrp">
            <div class="header_desk">
                <div class="header_logo">
                    <a href="<?php echo home_url() ?>">
                        <img src="<?php echo get_stylesheet_directory_uri()."/assets/img/Logo.png" ?>" alt="Logo Nathalie Mota">
                    </a>
                </div>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'menu_class'     => 'menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s<li class="menu-item"><a class="btn-contact">Contact</a></li></ul>',
                    ) );
                    ?>
                </nav>
                <div class="header_burger">
                    <img class="header_burger-icon" src="<?php echo get_template_directory_uri(); ?>/assets/svg/Menu.svg" alt="Icon du menu mobile">
                </div>
            </div>
            <div class="header_mobile">
                <div class="header_mobile-wrp">
                    <a class="header_logo" href="<?php echo home_url('/'); ?>"> <!-- Permet de revenir à l'accueil une fois logo est cliqué -->
                        <img id="logo-mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.png" alt="Logo"> <!-- Pour avoir adresse absolute (dit "complet") -->
                    </a>

                    <img class="header_mobile-close" src="<?php echo get_template_directory_uri(); ?>/assets/svg/cross-menu.svg" alt="Close the menu">
                </div>


                <nav class="mobile-navigation" role="navigation">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'menu_class'     => 'menu',
                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s<li class="menu-item"><a class="btn-contact">Contact</a></li></ul>',
                    ) );
                    ?>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Foundation 6 Wordpress theme">
    <meta name="keywords" content="Foundation 6, Wordpress">
    <meta name="author" content="D.C">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_title('', false); ?>
    <?php wp_head(); ?>
</head>

<body>

    <a href="#main" accesskey="S"> Skip navigation </a>

    <header>

        <nav class="navbar navbar-expand-md navbar-light">

            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">

                    <span class="navbar-toggler-icon"></span>

                </button>


                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>

                <?php wp_nav_menu(

                    array(
                        'theme_location'    => 'main-nav',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse justify-content-end mr-5',
                        'container_id'      => 'bs-example-navbar-collapse-1',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    )
                );
                ?>

            </div>

        </nav>

    </header>

    <main id="main">
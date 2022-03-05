<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Bootstrap Wordpress theme">
    <meta name="keywords" content="Bootstrap, Wordpress">
    <meta name="author" content="D.C">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_title('', false); ?>
    <?php wp_head(); ?>
</head>

<body>

    <a href="#main" class="d-none" accesskey="S"> Skip navigation </a>

    <header>

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="">

            <div class="container-fluid">

                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                ?>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php wp_nav_menu(

                    array(
                        'theme_location'    => 'main-nav',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'main-nav',
                        'menu_class'        => 'nav-item',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    )
                );
                ?>

            </div>
            
        </nav>

    </header>

    <main id="main">
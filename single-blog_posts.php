<?php get_header(); ?>

<div id="single_blog_posts" class="content-area col-sm-12 col-lg-8 mx-auto">

    <?php

    $id = get_the_ID();

    $args = array(
        'post_type' => 'blog_posts',
        'p' => $id,
    );

    $products = new WP_Query($args);

    if ($products->have_posts()) {
        while ($products->have_posts()) {
            $products->the_post();

    ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div id="prevpost"><?php previous_post_link(); ?></div>

                <div id="nextpost"><?php next_post_link(); ?> </div>

                <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>

                <?php echo get_the_date(); ?>

                <?php the_time(); ?>

                <?php the_author(); ?><br />

                <?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

                <p><?php the_field("bp") ?></p>

                <?php the_category(', ') ?>

                <?php the_tags(', ') ?>

                <?php comments_popup_link(); ?>.

                <?php edit_post_link(); ?>

                <?php comments_template(); ?>

        <?php
        }
    } else {
        echo ' No posts';
    }
        ?>

            </div>

            <?php get_footer(); ?>
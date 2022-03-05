<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

        <h1><?php the_title(); ?></h1>

        <?php the_content() ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
<?php get_header(); ?>

<div id="search" class="content-area col-sm-12 col-lg-8 mx-auto">

    <h1><?php the_search_query() ?></h1>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

            <a href="<?php the_permalink() ?>"> <h2><?php the_title(); ?></h2> </a>

            <br>

            <p><?php the_field("bp") ?></p>

        <?php endwhile; ?>

    <?php else : ?>

        <p><?php echo __('No results found for'); ?> &nbsp; <?php echo get_search_query(); ?></p>

    <?php endif; ?>

</div>

<?php get_footer(); ?>
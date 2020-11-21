<?php get_header(); ?>

<div id="single_blog_posts" class="content-area col-sm-12 col-lg-8 mx-auto">

    <?php

    $id = get_the_ID();

    $args = array(
        'post_type' => 'blog_posts',
        'p' => $id,
    );

    $the_query = new WP_Query($args); ?>

    <?php if ($the_query->have_posts()) : ?>

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <h1> Single blog post</h1>
        <?php endwhile; ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div id="prevpost"><?php previous_post_link(); ?></div>

            <div id="nextpost"><?php next_post_link(); ?> </div>

            <a href="<?php the_permalink(); ?>"> <h2><?php the_title(); ?></h2> </a>

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

        </div>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
<?php get_header(); ?>

    <main id="main" class="ms-3 me-3 container mx-auto">

        <h1 class="text-md-end m-5"> Search: &nbsp; <?php the_search_query() ?></h1>

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

                <h2 class="text-md-end m-5"> 
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h2>

                <br>

                <?php the_content() ?>

                Comments:

                <?php comments_popup_link(); ?>

                <br>
                <br>
                <br>

            <?php endwhile; ?>

        <?php else : ?>

            <p><?php echo __('No results found for:'); ?> &nbsp; <?php echo get_search_query(); ?></p>

        <?php endif; ?>

        <?php get_search_form(); ?>

    </main>

<?php get_footer(); ?>
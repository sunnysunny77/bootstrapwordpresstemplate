<?php get_header(); ?>

    <section id="search" class="content-area col-sm-12 col-lg-8 mx-auto">

        <h1>Search: &nbsp; <?php the_search_query() ?></h1>

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

                <h2> 
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

    </section>

<?php get_footer(); ?>
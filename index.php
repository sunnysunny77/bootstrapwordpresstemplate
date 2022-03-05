<?php get_header(); ?>

    <main id="main" class="ps-3 pe-3 container mx-auto">

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

                <h1 class="text-md-end m-5"> <?php the_title(); ?></h1>

                <?php the_content() ?>

            <?php endwhile; ?>

        <?php endif; ?>

    </main>

<?php get_footer(); ?>
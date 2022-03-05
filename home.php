<?php get_header() ?>

  <main id="main" class="ps-3 pe-3">

    <h1 class="text-md-end m-5"> <?php echo get_bloginfo(); ?> </h1>

    <?php if (have_posts()) { ?>

      <?php while (have_posts()) { the_post(); ?>

        <?php
        $classes = [
          'd-flex',
          'container',
          'mb-5',
          'align-items-sm-center',
          'align-items-md-start',
          'mx-auto',
          'flex-column'
        ];
        ?>

        <article <?php post_class($classes); ?> id="post-<?php the_ID(); ?>">

          <h2 class="text-md-end m-5"> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>

          <p>
            By:&nbsp;
            <?php the_author(); ?>
            ,
            <?php echo get_the_date(); ?>
          </p>

          <?php if (has_post_thumbnail()) {  echo '<div role="img" aria-label="post_thumbnail" style="background-image: url(' . get_the_post_thumbnail_url() . ');"></div>'; } ?>

          <?php the_content() ?>

          <?php the_category();  ?>

          <p>

            <?php the_tags(); ?>

          </p>

          <p>

            Comments:

            <?php comments_popup_link(); ?>

          </p>

          <?php edit_post_link(); ?>

        </article>

      <?php } ?>

    <?php } ?>

  </main>

<?php get_footer(); ?>
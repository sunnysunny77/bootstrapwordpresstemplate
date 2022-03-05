<?php get_header() ?>

  <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

      <?php
      $classes = [
        'content-area',
        'col-sm-12 ',
        'col-lg-8',
        'mx-auto'
      ];
      ?>

      <section id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

        <h1>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>

        <?php echo get_the_date(); ?>

        <?php the_time(); ?>

        <?php the_author(); ?><br />

        <?php
        if (has_post_thumbnail()) {
        ?>
          <div>
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>

        <?php the_content() ?>

        <?php edit_post_link(); ?>

        <?php the_post_navigation(array(
          'prev_text'                  => __('← %title'),
          'next_text'                  => __('→ %title'),
          'screen_reader_text' => __('Continue Reading'),
        )); ?>

        <p>
          By:&nbsp;
          <?php the_author(); ?>
          ,
          <?php echo get_the_date(); ?>
        </p>
        
        <?php the_category();  ?>

        <p>

          <?php the_tags(); ?>

        </p>

        <?php if (comments_open() || get_comments_number()) {
          comments_template();
        } ?>
        
      </section>

    <?php endwhile; ?>

  <?php endif; ?>

<?php get_footer(); ?>
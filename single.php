<?php get_header() ?>

  <main id="main" class="ps-3 pe-3">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

      <?php
        $classes = [
          'd-flex',
          'col-sm-12',
          'col-md-6',
          'mb-5',
          'align-items-sm-center',
          'align-items-md-start',
          'mx-auto',
          'flex-column'
        ];
        ?>

        <section id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

          <h1 class="text-md-end m-5"><?php the_title(); ?></h1>

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

  </main>

<?php get_footer(); ?>
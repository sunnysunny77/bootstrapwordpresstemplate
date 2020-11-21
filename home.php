<?php get_header() ?>

<div id="home" class="content-area col-sm-12 col-lg-8 mx-auto">

  <h1><?php single_post_title(); ?></h1>

  <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <h2> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h2>

        <?php echo get_the_date(); ?>

        <?php the_time(); ?>

        <?php the_author(); ?>

        <?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

        <p><?php the_field("bp") ?></p>

        <?php the_category(', ') ?>

        <?php the_tags(', ') ?>

        <?php comments_popup_link(); ?>.

        <?php edit_post_link(); ?>
		           
      </div> 

    <?php endwhile; ?>

  <?php endif; ?>

  <?php wp_pagenavi(); ?>
 
	<?php dynamic_sidebar("widget1"); ?>

</div>

<?php get_footer() ?>
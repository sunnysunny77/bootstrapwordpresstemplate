<?php get_header() ?>

<div id="index" class="content-area col-sm-12 col-lg-8 mx-auto">
	
  <h1><?php single_post_title(); ?></h1>
	
  <?php

      $args = array(
        'post_type' => 'blog_posts',
      );
      
      $products = new WP_Query( $args );
      
      if( $products->have_posts() ) {
        while( $products->have_posts() ) {
          $products->the_post();

  ?>
      
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <h3> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h3>

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
    
  <?php
  }
    }
    else {
      echo ' No posts';
  }
  ?>
    
  <?php dynamic_sidebar("widget1"); ?>

</div>

<?php get_footer() ?>
<?php get_header(); ?>

<div id="front" class="content-area col-sm-12 col-lg-8 mx-auto">

	<h1><?php the_title(); ?></h1>

	<p class="text-center"><?php the_field(""); ?></p>

	<?php dynamic_sidebar("widget"); ?>

</div>

<?php get_footer(); ?>